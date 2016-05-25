<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gallery
 */

?>

	</div><!-- #content -->
	<div class="row footer-widget">
		<div class="large-4 medium-4 small-12 columns widget-column">
			<?php dynamic_sidebar('footer-1') ?>
		</div>
		<div class="large-4 medium-4 small-12 columns widget-column">
			<?php dynamic_sidebar('footer-2') ?>
		</div>
		<div class="large-4 medium-4 columns widget-column">
			<?php dynamic_sidebar('footer-3') ?>
		</div>
	</div>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			&copy;<?php echo date('Y'); ?> <?php echo of_get_option( 'example_textarea', 'Gallery Theme by Stafford Creative - Powered by Wordpress' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->
</div>

<?php wp_footer(); 
function footer_init() {?>	
	<script type="text/javascript">
		new WOW().init();
	</script>
	<script>	
	jQuery(document).ready(function() {
        jQuery("#gallery-home").owlCarousel({
    		items:1,
    		loop:true,
    		margin:10,
   			autoPlay:4000,
			nav:false,
    		autoplayHoverPause:true,
			responsive:{
				0:{
					items:1
				},
				400:{
					items:1
				},
				700:{
					items:1
				},
				800:{
					items:1
				},
				1200:{
					items:1
				}
			}
		}); 
	});
	</script>
	<?php }?>
</div>

</body>
</html>
