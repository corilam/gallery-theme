<?php
/**
 * Template Name: Sidebar Page
 *
 * Use this template if you want to have a sidebar on one of your content pages.
 * 
 *
 * @package Gallery Theme
 */
get_header(); ?>

<div class="row"><!-- Foundation Row -->

	<div class="large-9 medium-8 columns">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main" style="padding-top:20px;">
				
				<?php the_post_thumbnail('slideshow'); ?>
				
				<h1 class="entry-title"><?php the_title(); ?> </h1>

				<?php while ( have_posts() ) : the_post(); ?>

				<?php endwhile; // end of the loop. ?>
				
				<?php the_content(); ?>

			</main><!-- #main -->
			
		</div><!-- #primary -->

	</div><!-- END large-9 medium-8 columns -->

	<div class="large-3 medium-4 columns">
		<?php get_sidebar(); ?>
	</div><!-- END large-3 medium-4 columns -->

</div><!-- END Foundation Row -->

<?php get_footer(); ?>