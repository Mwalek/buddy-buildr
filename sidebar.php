<?php
/**
 * The sidebar containing the main widget area
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Buddy_BUildr
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>

	<aside id="secondary" class="widget-area">
		<div class="secondary-container">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
	</aside><!-- #secondary -->

<?php endif; ?>

<?php if ( ( is_active_sidebar( 'sidebar-2' ) || get_theme_mod( 'buddypress-sidebars' ) != false) && get_theme_mod( 'buddypress-sidebars' ) != 'sidebars-off') : ?>

	<aside id="buddypress-sidebar" class="buddypress-widget-area widget-area">
		<div class="buddypress-widget-container">
			<div class="sidebar-options">
				<span class="sidebar-tablinks" onclick="openSidebar(event, 'BuddypressTab')" id="defaultsidebarOpen"><i style="font-size:24px" class="fa">&#xf0c0;</i></span><span class="sidebar-tablinks" onclick="openSidebar(event, 'GlobalTab')"><i style="font-size:24px" class="fa">&#xf074;</i></span><span class="sidebar-tablinks" onclick="openSidebar(event, 'GeneralTab')"><i style="font-size:24px" class="fa">&#xf034;</i></span>
			</div>
			<div id="BuddypressTab" class="sidebar-tabcontent">
				<?php dynamic_sidebar( 'sidebar-2' ); ?>
			</div>

			<div id="GlobalTab" class="sidebar-tabcontent">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div>

			<div id="GeneralTab" class="sidebar-tabcontent" style="padding: 10px;">
			  <h3>Sidebar Settings</h3>
			  <p>Sorry. Settings are not available at this time.</p>
			</div> 
		</div>
	</aside><!-- #secondary -->

<?php endif; ?>