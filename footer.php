

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
// action hook for any content placed before the content, including the widget area
do_action ( 'buddybuildr_footer' );
?>
		<div class="footer-nav-container">
			<nav id="footer-navigation" class="footer-navigation" role="navigation">
			<?php
					// icon 1 navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'footer-menu m15',
						'theme_location' => 'footer',
						'fallback_cb'    => 'buddybuildr_default_menu',
					) );
				?>
			</nav>
		</div>
		<div class="site-info">
			<p class="footer-text p15">
			
			<?php echo bloginfo('name'); ?>
			<?php echo buddybuildr_copyright(); ?>
				
			</p>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->	
	<?php
// action hook for any content placed before the content, including the widget area
do_action ( 'buddybuildr_after_footer' );
?>
</div><!-- .site -->


<?php wp_footer(); ?>
</body>
</html>