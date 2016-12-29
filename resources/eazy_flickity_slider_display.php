<?php
if (function_exists('eazy_flickity_slides')) {

  //add eazy-flickity-slider shortcode 
  add_shortcode( 'eazy-flickity-slider', 'eazy_flickity_slider_shortcode' );
  function eazy_flickity_slider_shortcode($atts){   

    //set attributes
    $atts = shortcode_atts(
      array(
        'post_type' => 'eazy_flickity_slide',
        'order' => '',
        'orderby' =>'',
        'post_date' =>'',
        'posts' => -1,
        'height' => NULL,
        'width' => NULL,
        'eazy_sliderid' => NULL,
      ),
      $atts
    );

    //set variables based on attributes
    $order = $atts['order'];
    $orderby = $atts['orderby'];
    $post_dateb = $atts['post_date'];
    $posts = $atts['posts'];
    $height = $atts['height'];
    $width = $atts['width'];
    $eazy_sliderid = $atts['eazy_sliderid'];
    $flickity_open = NULL;
    $flickity_close = NULL;
    
    //set query options
    $eazyoptions = array( 
      'post_type' => 'eazy_flickity_slide', 
      'order' => $order, 
      'orderby' => $orderby, 
      'posts_per_page' => $posts, 
      'height' => $height, 
      'width' => $width, 
      'eazy_sliderid' => $eazy_sliderid, 
    ); 

    // make empty array for slides 
    $flickity_slides = array();
   
    // The Query
    $eazyquery = new WP_Query( $eazyoptions );

    // The Loop
    if ( $eazyquery->have_posts() ) {
        
        //Check if slider name is set, if it is set add slider name to id
        if(isset($eazy_sliderid)){ 
          $flickity_open = '<div class="gallery flickity-shortcode" id="slider-'.$eazy_sliderid.'" >';
        }else{
          $flickity_open = '<div class="gallery flickity-shortcode" id="all-slides">';
        }//end if 

        while ( $eazyquery->have_posts() ) {
          $eazyquery->the_post(); 
          $thumb_id = get_post_thumbnail_id();
          $eazyimage_attributes = wp_get_attachment_image_src($thumb_id,'full', true);
          $flickity_slides[] = " 
          <div class='gallery-cell ".$eazy_sliderid."'>".(get_post_meta(get_the_ID(), '_eazy_slide_link', true) ?  '<a href="'. get_post_meta(get_the_ID(), '_eazy_slide_link', true) .'"</a>' : '' )."
          ".($thumb_id !== '' ? "<img src='".$eazyimage_attributes[0]."' alt='".get_post(get_post_thumbnail_id())->post_title."'>". (get_the_content() !== '' ? "<div class='eazy-slider-text'>".get_the_content()."</div>" : "") : (get_the_content() !== '' ? "<div class='eazy-slider-text-no-img'>".get_the_content()."</div>" : "")).(get_post_meta(get_the_ID(), '_eazy_slide_link', true) ?  '</a>' : '' )."</div>";
        } //end while

        $flickity_close = '</div>'; //closing div from class "gallery js flickity"
    } else {
      // no slides found
    }//end query

    //restore original Post Data 
    wp_reset_postdata();

    // concatenate open, slides & close, return them as $slider
    $slider = $flickity_open;
    foreach ($flickity_slides as $key => $slide) {
      $slider .= $slide;
    }
    $slider .= $flickity_close;
    return $slider;  

  }




  // add homepage slider function to call in theme
  function eazy_flickity_slider_homepage() {

    $args = array( 'post_type' => 'eazy_flickity_slide', 'eazy_sliderid' => 'homepage' );
    // The Query
    $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
      echo '<div class="eazy-flickity-homepage-slider">';
        while ( $the_query->have_posts() ) {
        $the_query->the_post();?>
          <div class="gallery-cell">      
            <?php
            // if link is set, put a href around thumb
            if (get_post_meta(get_the_ID(), '_eazy_slide_link', true)) { ?>
              <a href='<?php echo get_post_meta(get_the_ID(), "_eazy_slide_link", true)?>'>
                <img data-flickity-lazyload="<?php echo the_post_thumbnail_url('full'); ?>" src="<?php echo the_post_thumbnail_url('full'); ?>" alt="<?php echo the_title(); ?>" > 
                <?php //the_post_thumbnail('full'); ?>
              </a>
              <?php if(get_the_content() !== ''){echo '<div class="eazy-slider-text">'.get_the_content().'</div>';} ?>
            <?php }else {
              ?> <img data-flickity-lazyload="<?php echo the_post_thumbnail_url('full'); ?>" src="<?php echo the_post_thumbnail_url('full'); ?>" alt="<?php echo the_title(); ?>">  <?php
              if(get_the_content() !== ''){echo '<div class="eazy-slider-text">'.get_the_content().'</div>';}
            } ?>

          </div>
        <?php
        } //end while
      echo '</div>'; ?>
      <?php } //end if query 

    /* Restore original Post Data */
    wp_reset_postdata();  
  }

}