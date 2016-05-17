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
      'eazy_flickity_slider' => '',
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
  $eazy_flickity_slider = $atts['eazy_flickity_slider'];

  //set query options
  $eazyoptions = array( 
    'post_type' => 'eazy_flickity_slide', 
    'order' => $order, 
    'orderby' => $orderby, 
    'posts_per_page' => $posts, 
    'height' => $height, 
    'width' => $width, 
    'eazy_flickity_slider' => $eazy_flickity_slider, 
  ); 
      
  // The Query
  $eazyquery = new WP_Query( $eazyoptions );
  $flickity_slides = array();

  // The Loop
  if ( $eazyquery->have_posts() ) {
      
      //Check if slider name is set, if it is set add slider name to id
      if(isset($eazy_flickity_slider)){ 
        $flickity_open = '<div class="gallery flickity-shortcode" id="slider-'. $eazy_flickity_slider .'" style="';
          if (isset($width)) {$flickity_open .= 'max-width: '. $width . '; ';}
          if (isset($height)) {$flickity_open .= 'max-height: '. $height . '; ';}
      $flickity_open .= '">';
      }else{
        $flickity_open = '<div class="gallery flickity-shortcode" id="all-slides">';
      }//end if 

      while ( $eazyquery->have_posts() ) {
        $eazyquery->the_post(); 
        $thumb_id = get_post_thumbnail_id();
        $flickity_slides[] = "<div class='gallery-cell'><img src='".wp_get_attachment_image_src($thumb_id,'full', true)[0]."' alt='".get_post(get_post_thumbnail_id())->post_title."'></div>";
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

}