<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gallery
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!-- Google Analytics -->
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', '<?php of_get_option( 'google_analytics', 'no entry'); ?>', 'auto');
ga('send', 'pageview');
</script>
<!-- End Google Analytics -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="google-font">
	
	<!-- Social Icons-->
	<div class="social-block full-size wow slideInRight">
		<?php if (of_get_option( 'facebook_url', true)){ ?>
		<a href="<?php echo of_get_option( 'facebook_url', 'no entry'); ?>" class="hvr-pulse">
			<div class="social facebook"><i class="fa fa-facebook"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'gplus_url', true)){ ?>
		<a href="<?php echo of_get_option( 'gplus_url', 'no entry'); ?>">
			<div class="social gplus"><i class="fa fa-google-plus"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'twitter_url', true)){ ?>
		<a href="<?php echo of_get_option( 'twitter_url', 'no entry'); ?>" class="social-tab">
			<div class="social twitter"><i class="fa fa-twitter"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'pinterest_url', true)){ ?>
		<a href="<?php echo of_get_option( 'pinterest_url', 'no entry'); ?>">
			<div class="social pinterest"><i class="fa fa-pinterest"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'instagram_url', true)){ ?>
		<a href="<?php echo of_get_option( 'instagram_url', 'no entry'); ?>">
			<div class="social instagram"><i class="fa fa-instagram"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'linkedin_url', true)){ ?>
		<a href="<?php echo of_get_option( 'linkedin_url', 'no entry'); ?>">
			<div class="social linkedin"><i class="fa fa-linkedin"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'flickr_url', true)){ ?>
		<a href="<?php echo of_get_option( 'flickr_url', 'no entry'); ?>">
			<div class="social flickr"><i class="fa fa-flickr"></i></div>
		</a>
		<?php } ?>
		
		<?php if (of_get_option( 'email_url', true)){ ?>
		<a href="mailto:<?php echo of_get_option( 'email_url', 'no entry'); ?>">
			<div class="social email"><i class="fa fa-envelope"></i></div>
		</a>
		<?php } ?>
	</div> 

	<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'gallery' ); ?></a>
	<div class="row">
	<header class="header" role="banner">
		<div class="site-branding full-size">
			<?php if ( of_get_option( 'logo_uploader', true)) : ?>
				<h1 class="site-title logo google-font-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo of_get_option( 'logo_uploader', true); ?>"></a></h1>
			<?php else : ?>
				<h1 class="site-title google-font-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1> 				
			<?php
			endif; ?>

		</div><!-- .site-branding -->

		<nav id="site-navigation-desktop" class="main-navigation full-size " role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'main-nav' ) ); ?>
		</nav><!-- #site-navigation -->
		
		<div id="nav-container" class="mobile">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<nav id="site-navigation-mobile">
			 <div class="button">
                <a href="#">
                    <img class="btn-open" src="<?php bloginfo('stylesheet_directory'); ?>/images/btn-hamburger.png">
                    <img class="btn-close" src="<?php bloginfo('stylesheet_directory'); ?>/images/btn-close.png">
                </a>
            </div>
			 </nav>
				 <div class="overlay">
					 <div class="wrap">
						 <ul class="wrap-nav">
				 <?php wp_nav_menu( array( 'theme_location' => 'main-nav', 'menu_id' => 'main-nav' ) ); ?>
				 
			<div class="social-block mobile wow slideInRight">
				<?php if (of_get_option( 'facebook_url', true)){ ?>
					<a href="<?php echo of_get_option( 'facebook_url', 'no entry'); ?>" class="hvr-pulse">
						<div class="social facebook"><i class="fa fa-facebook"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'gplus_url', true)){ ?>
					<a href="<?php echo of_get_option( 'gplus_url', 'no entry'); ?>">
						<div class="social gplus"><i class="fa fa-google-plus"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'twitter_url', true)){ ?>
					<a href="<?php echo of_get_option( 'twitter_url', 'no entry'); ?>" class="social-tab">
						<div class="social twitter"><i class="fa fa-twitter"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'pinterest_url', true)){ ?>
					<a href="<?php echo of_get_option( 'pinterest_url', 'no entry'); ?>">
						<div class="social pinterest"><i class="fa fa-pinterest"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'instagram_url', true)){ ?>
					<a href="<?php echo of_get_option( 'instagram_url', 'no entry'); ?>">
						<div class="social instagram"><i class="fa fa-instagram"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'linkedin_url', true)){ ?>
					<a href="<?php echo of_get_option( 'linkedin_url', 'no entry'); ?>">
						<div class="social linkedin"><i class="fa fa-linkedin"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'flickr_url', true)){ ?>
					<a href="<?php echo of_get_option( 'flickr_url', 'no entry'); ?>">
						<div class="social flickr"><i class="fa fa-flickr"></i></div>
					</a>
				<?php } ?>
		
				<?php if (of_get_option( 'email_url', true)){ ?>
					<a href="mailto:<?php echo of_get_option( 'email_url', 'no entry'); ?>">
						<div class="social email"><i class="fa fa-envelope"></i></div>
					</a>
				<?php } ?>
			</div> 
			 			</ul>
			 		</div>
				</div>
		</div>
		
	</div><!-- End Foundation Row -->
	<div id="content" class="site-content">
