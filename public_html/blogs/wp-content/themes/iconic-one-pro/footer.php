<?php
/**
 * Footer section template.
 * @package WordPress
 * 
 * @since Iconic One Pro 1.0
 */
?>
<?php $options = get_option('iconiconepro'); ?>
	</div><!-- #main .wrapper -->
	<?php if($options['iconic_one_pro_footer_widget'] == '1') { // display footer widgets() ?>
			<div id="iop-footer" class="widget-area">
				<div class="footer-widget">
                <?php if( is_active_sidebar( 'footer-one' ) ) dynamic_sidebar( 'footer-one' ); ?>
				</div>
				<div class="footer-widget">
				<?php if( is_active_sidebar( 'footer-two' ) ) dynamic_sidebar( 'footer-two' ); ?>
				</div>
				<div class="footer-widget">
				<?php if( is_active_sidebar( 'footer-three' ) ) dynamic_sidebar( 'footer-three' ); ?>
				</div>
            </div>
	 <?php } ?>		
	<footer id="colophon" role="contentinfo">
		<div class="site-info">
		<div class="footercopy"><?php echo get_theme_mod( 'textarea_copy', 'custom footer text left' ); ?></div>
		<div class="footercredit"><?php echo get_theme_mod( 'custom_text_right', 'custom footer text right' ); ?></div>
		</div><!-- .site-info -->
		</footer><!-- #colophon -->
		<div class="site-wordpress">
		<?php if($options['themonic_credit_link'] == '1') { // for removing credit link () ?>
		        <?php if ( $options['themonic_affiliate'] !== '' ): ?>
					<a href="http://webtechexperts.in/<?php echo $options['Website_Designing']; ?>">Website Designing</a> by Web Tech Experts | Powered by <a href="http://www.seotechexperts.com">SEO Tech Experts</a>
					  <?php else:?>
					<a href="http://webtechexperts.in/">Website Designing</a> by Web Tech Experts | Powered by <a href="http://www.seotechexperts.com">SEO Tech Experts</a>
				<?php endif; ?>	
									
		<?php } ?>		
				</div><!-- .site-info -->
				<div class="clear"></div>
			<?php if ($options['enable_footer_code'] != '') { ?>
				<?php if ($options['footer_analytics'] != '') { ?>
					 <div class="footer-analytics"><?php echo $options['footer_analytics']; ?></div>
				<?php } ?>
			<?php } ?>	
		</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>