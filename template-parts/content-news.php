<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gallery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="full-width-header"><?php the_post_thumbnail('Artist Header'); ?></div>
	
	<div class="large-8 medium-12 columns">
		<div class="content-body edge-space">
	<header class="entry-header">
		<span class="date"><?php the_time('jS F Y') ?></span>
		<h2 class="single-title"><?php the_title(); ?></h2>
	</header>

	<div class="entry-content">
		<?php the_content( ); ?>
	</div><!-- .entry-content -->
</div>
</div><!-- columns -->

<div class="large-4 medium-12 columns">
	<div class="news-side-feed">
	<?php
		global $wp_query;
		$this_post = $post->ID;
  		query_posts( array( 'post_type' => 'news', 'posts_per_page' => 1, 'post__not_in' => array($this_post) ) );
  		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('other-news'); ?></a><a href="<?php the_permalink() ?>" rel="bookmark" class="home-block-text" style="display:block; height:24px;"><?php the_title(); ?></a></h5>
	<?php endwhile; endif; wp_reset_query(); ?>
	</div>
</div><!-- columns -->

	<footer class="entry-footer">
		<?php gallery_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->