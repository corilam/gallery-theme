<?php
/**
 * Template Name: News Category Page
 *
 * This is the template you use to display the news category page
 * 
 *
 * @package Gallery Theme
 */
get_header(); ?>

<div id="container">
	<div class="row">
    <div id="content" class="large-12 columns">

    <h1 class="entry-title-cpt"><?php the_title(); ?></h1> <!-- Page Title -->
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		the_content();
		endwhile;
	endif; ?>
		
    <?php 
	
	if ( get_query_var('paged') ) $paged = get_query_var('paged');  
	if ( get_query_var('page') ) $paged = get_query_var('page');
	
	$query = new WP_Query(array('post_type' => 'news'));
    	if ( $query->have_posts() ) : ?>
		
	<?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<div class="small-12 medium-6 large-4 columns news-category left category-block">	
		<div class="entry">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('home-thumbnail'); ?></a>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<p><span class="date left"><?php the_date(); ?></span><br>
			<?php the_excerpt(); ?></p>
			<div class="blog-button"><a href="<?php the_permalink(); ?>">READ MORE</a></div>
		</div>
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