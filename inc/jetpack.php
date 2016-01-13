<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Foothills
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function foothills_jetpack_setup() {
	// Add theme support for Infinite Scroll.
	add_theme_support( 'infinite-scroll', array(
			'container' => 'main',
			'render'    => 'foothills_infinite_scroll_render',
			'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_theme_support( 'jetpack-responsive-videos' );
}
add_action( 'after_setup_theme', 'foothills_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function foothills_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		if ( is_search() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_format() );
		endif;
	}
}
