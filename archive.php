<?php
/**
 * The template for displaying artist category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gallery
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="row">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header" style="margin-bottom:5%;">
				<h1 class="entry-title-cpt"><?php echo the_archive_title(); ?></h1>
				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-archive', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content-archive', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>

<?php
get_footer();
