<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Foothills
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'foothills' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		edit_post_link(
				sprintf(
				/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'foothills' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
		);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
