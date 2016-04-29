<?php
function eazy_flickity_slider_homepage() {

	$args = array( 'post_type' => 'eazy_flickity_slide', 'eazy_flickity_slider' => 'homepage' );
	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {

		echo '<div class="r0bsc0tt-homepage-slider">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();?>
	            <div class="gallery-cell">         
	                <?php the_post_thumbnail('full' ); ?>
	            </div>
	    <?php
		}
		echo '</div>';
	} else {
		// no posts found
	}

/* Restore original Post Data */
wp_reset_postdata();
   
}