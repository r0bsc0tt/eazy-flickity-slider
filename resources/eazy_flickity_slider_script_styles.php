<?php 
if (function_exists('eazy_flickity_slides')) {
 
 // get all options set for shortcode, that are saved as object in custom field eazy-slider-option
  function get_eazy_script_options() {
    $thisid = get_queried_object_id();
    $all_options = get_post_meta( $thisid, 'eazy-slider-options' );
    $all_json = $all_options[0];

    //split string where object closes and opens
    $split = preg_split( '(}{)', $all_json, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE );

    $new_array = array();
    foreach ($split as $optionkey => $optionvalue) {
     // remove { and } from the strings
      $optionvalue = str_replace(array('{','}'), '', $optionvalue);

     $exploded[$optionkey] = explode(",", $optionvalue);

    }

    return $exploded;
  }



  function eazy_string_clean($string) {
    // would be nice to use a regex pattern instead of explicitly naming properties
    $cleaned = str_replace(array('{','}', '"', 'id:', 'width:', 'height:', 'draggable:', 'freescroll:', 'wraparound:', 'autoplay:', 'adaptiveheight:', 'adaptive',
      'prevnextbuttons:', 'pagedots:', 'imagesloaded:', 'cellalign:'), '', $string);
    return $cleaned;
  }



  //Add JS for shortcode
  function add_eazy_flickity_shortcode_script() {
   /* $queried_id         = get_queried_object_id();*/

    $split = get_eazy_script_options();
    $split = str_replace(array('{','}'), '', $split); 
   
   if ($split !== '') {

 
    ?>
     
    <?php foreach ($split as $key => $value) {
      $slideid            = eazy_string_clean($value[0]);
      $slidewidth         = eazy_string_clean($value[1]);
      $slideheight        = eazy_string_clean($value[2]);
      $draggable          = eazy_string_clean($value[3]);
      $freescroll         = eazy_string_clean($value[4]);
      $wraparound         = eazy_string_clean($value[5]);
      $autoplay           = eazy_string_clean($value[6]);
      $adaptiveheight     = eazy_string_clean($value[7]);
      $prevnextbuttons    = eazy_string_clean($value[8]);
      $pagedots           = eazy_string_clean($value[9]);
      $imagesloaded       = eazy_string_clean($value[10]);
      $cellalign          = eazy_string_clean($value[11]);
     ?>

          <script type="text/javascript">
          var changeSliderSize = document.getElementById("slider-<?php echo $slideid; ?>");
          changeSliderSize.style.maxWidth = "<?php echo $slidewidth; ?>";
          changeSliderSize.style.maxHeight = "<?php echo $slideheight; ?>";

          jQuery("#slider-<?php echo $slideid; ?>").flickity({
            <?php  if ($draggable !== "" ) { ?> draggable:  <?php echo $draggable; ?>, <?php 
                  }if ($freescroll !== "" ) { ?> freeScroll: <?php echo $freescroll; ?>, <?php 
                  }if ($wraparound !== "" ) { ?> wrapAround: <?php echo $wraparound; ?>, <?php 
                  }if ($autoplay !== "" ) { ?> autoPlay: <?php echo $autoplay; ?>, <?php 
                  }if ($adaptiveheight !== "" ) { ?> adaptiveHeght: <?php echo $adaptiveheight; ?>, <?php 
                  }if ($prevnextbuttons !== "" ) { ?> prevNextButtons: <?php echo $prevnextbuttons; ?>, <?php 
                  }if ($pagedots !== "" ) { ?> pageDots: <?php echo $pagedots ; ?>, <?php 
                  }if ($imagesloaded !== "" ) { ?> imagesLoaded: <?php echo $imagesloaded; ?>,  <?php 
                  }if ($cellalign !== "" ) { ?> cellAlign: "<?php echo $cellalign ; ?>", <?php } ?>
          });
          
      </script>
    <?php }
    }
  }

  //Add inline JS for homepage to fire
  function add_eazy_flickity_homepage_script() {
    ?>
      <script type="text/javascript">
          jQuery('.eazy-flickity-homepage-slider').flickity({
           // options
          autoPlay: true,
          cellAlign: 'center',
          contain: true,
          imagesLoaded: true,
          //freeScroll: true,
          lazyLoad: true,
          wrapAround: true,
          //cellSelector: '.gallery-cell',
          //setGallerySize: false
          });
      </script>
    <?php
  }



  // flickity dependencies as a funciton to use in the enqueue
  function eazy_flickity_slider_load_dependencies() {
    if (get_option( 'use-cdn' ) === 'cdnjs') {
      wp_enqueue_style( 'eazy-flickity-slider',  EZ_FLICKITY_ELEMENTS_URL  . 'resources/css/style.css' );
      wp_enqueue_script('flickity',  'https://cdnjs.cloudflare.com/ajax/libs/flickity/2.0.3/flickity.pkgd.min.js', array('jquery'), false, true );
    } else {
      wp_enqueue_style( 'eazy-flickity-slider',  EZ_FLICKITY_ELEMENTS_URL  . 'resources/css/style.css' );
      wp_enqueue_script('flickity',  EZ_FLICKITY_ELEMENTS_URL  . 'resources/js/flickity.pkgd.min.js', array('jquery'), false, true );
    }

  }


  // search through content to see if shortcode is present
  function eazy_content_search($ezquerytype, $var1, $var2) {
    $queried_obj = get_queried_object();
    $queried_id  = get_queried_object_id();
    ${$var1} = array( $ezquerytype => $queried_id );
    ${$var2} = get_posts(${$var1});
      if (${$var2}) {
        foreach (${$var2} as $key => $value) {
          if ( has_shortcode( $value->post_content, 'eazy-flickity-slider' ) ) {
                eazy_flickity_slider_load_dependencies();
                add_action( 'wp_footer', 'add_eazy_flickity_shortcode_script', 50 );
                break;
          }
        }
      }
  }


  // search through data based archives to see if shortcode is present
  function eazy_date_search() {
      // set date vars as vars available to qet query var
      $datevars = array( 'year', 'monthnum', 'w', 'day', 'hour', 'minute', 'second', 'm' );
      $eazydatevars = array();
      foreach ($datevars as $key) {
        if (get_query_var($key)) {
          $eazydatevars[$key] = get_query_var( $key); 
        }
      }
      //turn vars into query, look for eazy-flickity-slider shortcode
      $newqueryvars = http_build_query($eazydatevars) . "\n";
      $query = new WP_Query( $newqueryvars );
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          if ( has_shortcode( get_the_content(), 'eazy-flickity-slider' ) ) {
            eazy_flickity_slider_load_dependencies();
            add_action( 'wp_footer', 'add_eazy_flickity_shortcode_script', 50 );
            break;
          }
        }
        wp_reset_postdata();
      } else {
        // no posts found
      }
  }



  // conditionally add scripts to enqueue
  add_action( 'wp_enqueue_scripts', 'eazy_flickity_scripts_styles' );
  function eazy_flickity_scripts_styles(){
    if ( is_Front_page() ) {
      eazy_flickity_slider_load_dependencies();
      add_action( 'wp_footer', 'add_eazy_flickity_homepage_script', 50 );
    } elseif( is_singular()  ) { 
      eazy_flickity_slider_load_dependencies();
      add_action( 'wp_footer', 'add_eazy_flickity_shortcode_script', 50 );
    } elseif( is_category() ) {
      eazy_content_search('category', 'catargs', 'catposts');
    } elseif( is_tag() || is_tax()  ) {
      eazy_content_search('tag_id', 'tagargs', 'tagposts');
    } elseif ( is_author() ) {
      eazy_content_search('post_author', 'authorargs', 'authorposts');
    }elseif ( is_date() ) {
      eazy_date_search();
    } 

  }

}