<?php
/**
 * Template part for displaying archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gallery
 */

?>
<div class="large-4 medium-6 small-12 columns" style="float:left;">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-thumbnail'); ?></a>
	<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php gallery_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif;?>
	</header><!-- .entry-header -->

</article>
</div>