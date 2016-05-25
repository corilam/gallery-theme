<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Gallery Theme
 */
get_header(); ?>

<div class="row">
	<div class="large-12 medium-12 columns">
		<div id="primary" class="content-area">
			<main id="main" class="site-main slideshow" role="main">		
				<div id="gallery-home" class="owl-carousel"> 
				<?php
				$slideshowcpt = get_post_meta( get_the_ID(), 'bldob_slideselect', true);
				if ('events' == $slideshowcpt){
					$today = date('Ymdhs');
					$my_query = new WP_Query( $args = array('post_type' => 'events', 'posts_per_page' => 5, 'meta_key' => '_end_eventtimestamp', 
					'orderby' => 'meta_value_num', 'meta_compare' => '>', 'meta_value' => $today));
				} else {
					$my_query = new WP_Query( $args = array( 'post_type' => $slideshowcpt, 'posts_per_page' => 5, 'order' => 'DSC'));}
				while ( $my_query->have_posts() ) : $my_query->the_post();
          		echo '<div>'; the_post_thumbnail('slideshow'); echo'<div class="slideshow-text"><h3 class="slideshow-title"><a href="'; the_permalink(); 
				echo '">'; the_title();
				echo '</a></h3></div></div>';
				endwhile; wp_reset_query(); ?>
				</div>
			</main>			
		</div>
	</div>
</div>

<div class="row">
	<div class="large-12 medium-12 columns">		
			<?php
			while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'home' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;			
			wp_reset_query(); ?>
	</div>
</div>

<div class="row home-top-blocks top-row-home">
	<?php if(get_post_meta( get_the_ID(), 'bldob_checkbox_top', true ) == false) 
	echo '<style>.top-row-home {display:none;}</style>'; ?>
	
	<div class="large-4 medium-4 small-12 columns">
		<div class="home-block-container wow fadeIn">
		<div class="tab-spacer">
		<?php if ( get_post_meta($post->ID, 'bldob_home_box_title_1', true) ) { ?>
		<span class="home-block-title"><?php echo get_post_meta( get_the_ID(), 'bldob_home_box_title_1', true); ?></span>
		<?php } ?>
	</div>
	<?php
	$this_post = $post->ID;
		$homebox1 = get_post_meta( get_the_ID(), 'bldob_home_box_1', true);
  		query_posts( array( 'post_type' => $homebox1, 'posts_per_page' => 1, '$homebox1' => 'featured', 'post__not_in' => array($this_post) ));
  		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
  		<h3><div class="border-home-blocks"><?php the_post_thumbnail('home-thumbnail'); ?><div class="pull-up"><div class="home-block-text-container"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="home-block-text"><?php the_title(); ?></a></div></div></div></h3>
	<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<div class="home-block-container wow fadeIn">
			<div class="tab-spacer">
		<?php if ( get_post_meta($post->ID, 'bldob_home_box_title_2', true) ) { ?>
		<span class="home-block-title"><?php echo get_post_meta( get_the_ID(), 'bldob_home_box_title_2', true); ?></span>
		<?php } ?>
	</div>
	<?php
	$this_post = $post->ID;
	$homebox2 = get_post_meta( get_the_ID(), 'bldob_home_box_2', true);
  	query_posts( array( 'post_type' => $homebox2, 'posts_per_page' => 1, '$homebox2' => 'featured', 'post__not_in' => array($this_post) ) );
  	if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>
  		<h3><div class="border-home-blocks"><?php the_post_thumbnail('home-thumbnail'); ?><div class="pull-up"><div class="home-block-text-container"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="home-block-text"><?php the_title(); ?></a></div></div></div></h3>
	<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<div class="home-block-container wow fadeIn">
			<div class="tab-spacer">
			<?php if ( get_post_meta($post->ID, 'bldob_home_box_title_3', true) ) { ?>
			<span class="home-block-title"><?php echo get_post_meta( get_the_ID(), 'bldob_home_box_title_3', true); ?></span>
			<?php } ?>
		</div>
		<?php
		$this_post = $post->ID;
		$homebox3 = get_post_meta( get_the_ID(), 'bldob_home_box_3', true);
  		query_posts( array( 'post_type' => $homebox3, 'posts_per_page' => 1, '$homebox3' => 'featured', 'post__not_in' => array($this_post) ) );
  		if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
  		<h3><div class="border-home-blocks"><?php the_post_thumbnail('home-thumbnail'); ?><div class="pull-up"><div class="home-block-text-container"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="home-block-text"><?php the_title(); ?></a></div></div></div></h3>
		<?php endwhile; endif; wp_reset_query(); ?>
		</div>
	</div>
</div>

<div class="row home-top-blocks previous-events">
	<!-- Hide or show bottom row -->
	<?php if(get_post_meta( get_the_ID(), 'bldob_checkbox', true ) == false) 
	echo '<style>.previous-events {display:none;}</style>'; ?>
	
	<h2 class="entry-title-cpt"><?php echo get_post_meta( get_the_ID(), 'bldob_home_box_title_4', true); ?></h2>
	<?php
		$this_post = $post->ID;
		$homebox4 = get_post_meta( get_the_ID(), 'bldob_home_box_4', true);
  		query_posts( array( 'post_type' => $homebox4, 'posts_per_page' => 3 ) );
  		if ( have_posts() ) : while ( have_posts() ) : the_post();
		?>
		<div class="large-4 medium-4 small-12 columns" style="float:left;">
		<div class="home-block-container wow fadeIn">
			<div class="tab-spacer">
			<?php if ( get_post_meta($post->ID, 'bldob_home_box_title_4', true) ) { ?>
			<span class="home-block-title"><?php echo get_post_meta( get_the_ID(), 'bldob_home_box_title_4', true); ?></span>
			<?php } ?>
		</div>
	
  		<h3><?php the_post_thumbnail('home-thumbnail'); ?><div class="pull-up"><div class="home-block-text-container"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" class="home-block-text"><?php the_title(); ?></a></div></div></h3>

		</div>
	</div>
	<?php endwhile; endif; wp_reset_query(); ?>
</div>

<?php get_footer(); ?>