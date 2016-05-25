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

	<div class="home-content">
		<?php the_content( ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
