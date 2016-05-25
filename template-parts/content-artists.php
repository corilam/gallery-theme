<?php
/**
 * Template part for displaying Single Artist Details
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Gallery
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="full-width-header"><?php the_post_thumbnail('Artist Header'); ?></div>
	
	<div class="large-4 medium-12 columns bio-details">
		<h2 class="single-title"><?php the_title(); ?></h2>
		<?php if ( get_post_meta($post->ID, 'tf_lifespan', true) ) { ?>
		<p><strong><?php echo get_post_meta( get_the_ID(), 'tf_lifespan', true ); ?>
		</strong></p><?php } ?>
		<?php if ( get_post_meta($post->ID, 'tf_biography', true) ) { ?>
		<p><span class="bio"><?php echo get_post_meta( get_the_ID(), 'tf_biography', true ); ?>
		</span></p><?php } ?>
	</div><!-- columns -->
	
	<div class="large-8 medium-12 columns">
		<div class="entry-content">
			<?php the_content( ); ?>
			<div class="row">
			<div class="large-6 medium-6 small-12 columns artist-images">
			<?php if ( get_post_meta($post->ID, 'meta-image1', true) ) { ?>
				<a href="<?php echo get_post_meta($post->ID, 'meta-image1', true); ?>" rel="lightbox"><div style="background-image:url(<?php $meta_value = get_post_meta( get_the_ID(), 'meta-image1', true );
				if( !empty( $meta_value )) {echo $meta_value;} ?>);" class="artist-other-works"></div></a><?php } ?>
					<span class="date left"><?php echo get_post_meta($post->ID, 'meta-image-description1', true); ?></span>
			</div>	
			<div class="large-6 medium-6 small-12 columns artist-images">
			<?php if ( get_post_meta($post->ID, 'meta-image2', true) ) { ?>
						<a href="<?php echo get_post_meta($post->ID, 'meta-image2', true); ?>" rel="lightbox"><div style="background-image:url(<?php $meta_value = get_post_meta( get_the_ID(), 'meta-image2', true );
    					if( !empty( $meta_value )) {echo $meta_value;} ?>);" class="artist-other-works"></div></a><?php } ?>
						<span class="date left"><?php echo get_post_meta($post->ID, 'meta-image-description2', true); ?></span>
			</div></div>
			<div class="row">
			<div class="large-6 medium-6 small-12 columns artist-images">
			<?php if ( get_post_meta($post->ID, 'meta-image3', true) ) { ?>
						<a href="<?php echo get_post_meta($post->ID, 'meta-image3', true); ?>" rel="lightbox"><div style="background-image:url(<?php $meta_value = get_post_meta( get_the_ID(), 'meta-image3', true );
    					if( !empty( $meta_value )) {echo $meta_value;} ?>);" class="artist-other-works"></div></a><?php } ?>
						<span class="date left"><?php echo get_post_meta($post->ID, 'meta-image-description3', true); ?></span>
					</div>
			<div class="large-6 medium-6 small-12 columns artist-images">
			<?php if ( get_post_meta($post->ID, 'meta-image4', true) ) { ?>
						<a href="<?php echo get_post_meta($post->ID, 'meta-image4', true); ?>" rel="lightbox"><div style="background-image:url(<?php $meta_value = get_post_meta( get_the_ID(), 'meta-image4', true );
    					if( !empty( $meta_value )) {echo $meta_value;} ?>);" class="artist-other-works"></div></a><?php } ?>
						<span class="date left"><?php echo get_post_meta($post->ID, 'meta-image-description4', true); ?></span>
			</div></div>
			<div class="row">
			<div class="large-6 medium-6 small-12 columns artist-images">
			<?php if ( get_post_meta($post->ID, 'meta-image5', true) ) { ?>
				<a href="<?php echo get_post_meta($post->ID, 'meta-image5', true); ?>" rel="lightbox"><div style="background-image:url(<?php $meta_value = get_post_meta( get_the_ID(), 'meta-image5', true );
				if( !empty( $meta_value )) {echo $meta_value;} ?>);" class="artist-other-works"></div></a><?php } ?>
					<span class="date left"><?php echo get_post_meta($post->ID, 'meta-image-description5', true); ?></span>
			</div>	
			<div class="large-6 medium-6 small-12 columns artist-images">
			<?php if ( get_post_meta($post->ID, 'meta-image6', true) ) { ?>
						<a href="<?php echo get_post_meta($post->ID, 'meta-image6', true); ?>" rel="lightbox"><div style="background-image:url(<?php $meta_value = get_post_meta( get_the_ID(), 'meta-image6', true );
    					if( !empty( $meta_value )) {echo $meta_value;} ?>);" class="artist-other-works"></div></a><?php } ?>
						<span class="date left"><?php echo get_post_meta($post->ID, 'meta-image-description6', true); ?></span>
			</div></div>	
		</div><!-- .entry-content -->
	</div><!-- columns -->
	<div class="large-12 columns">
	<?php the_post_navigation(); ?>
	</div>

	<footer class="entry-footer">
		<?php gallery_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
</article><!-- #post-## -->