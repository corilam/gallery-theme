<?php
/**
 * Template Name: Events Category Page
 *
 * This is the template you use to display the events category page
 * 
 *
 * @package Gallery Theme
 */
get_header(); ?>

<div id="container">
<div class="row">
    <div id="content" class="large-12 columns" style="padding-bottom:3%;">
	<!-- Upcoming Events -->
    <h2 class="entry-title-cpt"><?php the_title(); ?></h2> <!-- Page Title -->
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		the_content();
		endwhile;
	endif; ?>
		
    <?php 
	
	if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	if ( get_query_var('page') ) $paged = get_query_var('page');
	
	$today = date('Ymdhs');
	$query = new WP_Query(
		array(
		'post_type' => 'events', 
		'meta_key' => '_end_eventtimestamp', 
		'orderby' => 'meta_value_num', 
		'order' => 'ASC',
		'posts_per_page' => 20, 
		'meta_compare' => '>=',
		'meta_value' => $today
		)
	); 
	?>
		
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>	
		
		<div class="large-6 medium-6 small-12 columns left category-block wow fadeIn">
			<?php the_post_thumbnail('exhibit-page'); ?>
			<div class="exhibit-cat-title-container"><div class="artist-cat-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br>
			</div></div>
			<div class="exhibit-date-container"><?php echo get_post_meta($post->ID, 'eve_date', true); ?></div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	
</div>

<div id="content" class="large-12 columns previous-events">
	
	<!-- hide or display past events via checkbox -->
	<?php if(get_post_meta( get_the_ID(), 'ge_checkbox', true ) == false) 
		echo '<style>.previous-events {display:none;}</style>'; ?>
			
	<!-- Past Events -->
	<?php 
	$query = new WP_Query(array('post_type' => 'events', 'meta_key' => '_end_eventtimestamp'));
	if ( $query->have_posts() ) :
		echo '<h2 class="entry-title-cpt">'; echo get_post_meta( get_the_ID(), 'ge_past_label', true ); echo'</h2>';
		endif; ?>

	<?php 	
	if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	if ( get_query_var('page') ) $paged = get_query_var('page');
	
	$today = date('Ymdhs');
	$query = new WP_Query(
		array(
			'post_type' => 'events',
			'meta_key' => '_end_eventtimestamp',
			'meta_compare' => '<',
			'meta_value' => $today,
			'posts_per_page' => 3, 
			'orderby' => 'meta_value_num', 
			'order' => 'DSC'
			)
		);
    	if ( $query->have_posts() ) : ?>
		
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		
		<div class="large-4 medium-6 small-12 columns left category-block wow fadeIn">
			<?php the_post_thumbnail('exhibit-page'); ?>
			<div class="artist-cat-title-container"><div class="artist-cat-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div></div>
		</div>
	<?php endwhile; wp_reset_postdata(); ?>
	<!-- show pagination here -->
<?php else : ?>
	<!-- show 404 error here -->
<?php endif; ?>


</div>

</div>
</div>


<?php get_footer() ?>