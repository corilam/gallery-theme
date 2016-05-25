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
	<header class="entry-header" style="padding-top:2%;">
		<h2 class="single-title"><?php the_title(); ?></h2>
	</header>

	<div class="entry-content">
		<?php the_content( ); ?>
	</div><!-- .entry-content -->
</div><!-- columns -->

<div class="large-4 medium-12 columns exhibit-details" style="padding:3% 4%;">
	<?php if ( get_post_meta($post->ID, 'eve_details', true)){ ?>
		<h5 class="event-details"><?php echo get_post_meta($post->ID, 'eve_details', true); ?></h5>
		<?php } ?>
	<?php if ( get_post_meta($post->ID, 'eve_date', true)){ ?>
		<div class="exhibit-info"><?php echo get_post_meta($post->ID, 'eve_date', true); ?></div>
	<?php } ?>
	<?php if ( get_post_meta($post->ID, 'eve_location', true)){ ?>
		<div class="exhibit-info"><?php echo get_post_meta($post->ID, 'eve_location', true); ?></div>
	<?php } ?>
	<?php if ( get_post_meta($post->ID, 'eve_cost', true)){ ?>
		<div class="exhibit-info"><?php echo get_post_meta($post->ID, 'eve_cost', true); ?></div>
	<?php } ?>
	<?php if ( get_post_meta($post->ID, 'eve_misc', true)){ ?>
		<div class="bio"><?php echo get_post_meta($post->ID, 'eve_misc', true); ?></div>
	<?php } ?>
</div><!-- columns -->

<div id="content" class="large-12 columns previous-events" style="padding-top:3%;">
	
	<!-- hide or display past events via checkbox -->
	<?php if(get_post_meta( get_the_ID(), 'eve_checkbox', true ) == false) 
		echo '<style>.previous-events {display:none;}</style>'; ?>
			
	<!-- Past Events -->
	<?php 
	$query = new WP_Query(array('post_type' => 'events', 'meta_key' => '_end_eventtimestamp'));
	if ( $query->have_posts() ) :
		echo '<h2 class="entry-title-cpt">'; echo get_post_meta( get_the_ID(), 'eve_past_label', true ); echo'</h2>';
		endif; ?>

	<?php 	
	if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	if ( get_query_var('page') ) $paged = get_query_var('page');
	
	$today = date('Ymdhs');
	$query = new WP_Query(
		array(
			'post_type' => 'events',
			'meta_key' => '_end_eventtimestamp',
			'meta_compare' => '>',
			'meta_value' => $today,
			'posts_per_page' => 6, 
			'orderby' => 'meta_value_num', 
			'order' => 'ASC'
			)
		);
    	if ( $query->have_posts() ) : ?>
		
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		
		<div class="large-4 medium-6 small-12 columns left category-block">
			<?php the_post_thumbnail('exhibit-page'); ?>
			<div class="artist-cat-title-container"><div class="artist-cat-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>
</div>
	
</article><!-- #post-## -->