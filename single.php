<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Gallery
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div class="row">
		<main id="main" class="site-main" role="main">
		<div class="large-8 small-12 columns single-blog">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content-blog', get_post_format() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?></div>
		<div class="large-4 small-12 columns">
			<?php get_sidebar(); ?>
		</div>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
