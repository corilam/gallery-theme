<?php
/**
 * Template Name: Full Width Page
 *
 * Use this page if you don't want a sidebar and you want your content
 * to be full width.
 *
 * @package Gallery Theme
 */
get_header(); ?>

<div class="row"><!-- Foundation Row -->

	<div class="large-12 columns">
		<div id="primary" class="content-area">
			
			<?php the_post_thumbnail('slideshow'); ?>
			
			<main id="main" class="site-main" role="main">
				
				<h1 class="entry-title"><?php the_title(); ?> </h1>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php endwhile; // end of the loop. ?>
				
				<?php the_content(); ?>

			</main><!-- #main -->
			
		</div><!-- #primary -->

	</div><!-- END large-12 columns -->

</div><!-- END Foundation Row -->

<?php get_footer(); ?>