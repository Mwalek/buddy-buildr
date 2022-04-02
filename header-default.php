<!DOCTYPE html>
<html <?php language_attributes() ?> >
<head>
	<meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1, <?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	 <?php wp_head(); ?>
 </head>
  
<body <?php body_class( array( "databoypro", "buddybuildr", "exterior", "m5tfw" ) ); ?>>
<?php
// action hook for any content placed before the header, including the widget area
do_action ( 'buddybuildr_before_header' );
?>
	<div class="bb-pre-icon"></div>

<div id="Overlay" class="body_overlay"></div>
 
	<div id="page" class="site grid-container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'buddy-buildr' ); ?></a>
		<header id="Dmasthead" class="site-header">
		<div id="DefaultHeader" class="site-header-main site-header-common transition-right">
			<div class="site-branding site-header-item kill_margin">
		  		<div onclick="mobileMenu()" class="hamburger site-header-item zufallig">
					<div></div>
					<div></div>
					<div></div>
				</div>
				<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' ); $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
					if ( has_custom_logo() ) {
						echo '<a href="'. esc_url( home_url( '/' ) ) .'"rel="home"><img src="'. esc_url( $logo[0] ) .'"></a>';} 
					elseif ( is_front_page() || is_home() ) {
						echo '<h1 class="site-title kill_margin site-header-item"><a href="'. esc_url( home_url( '/' ) ) .'"rel="home">'.get_bloginfo( 'name' ) .'</a></h1>';
					}
					else {
						echo '<p class="site-title kill_margin site-header-item"><a href="'. esc_url( home_url( '/' ) ) .'"rel="home">'.get_bloginfo( 'name' ) .'</a></p>';
					}
				?>
			</div><!-- .site-branding -->
			<?php
    // action hook for any content placed after the site branding container in the header, including the widget area.
    do_action ( 'buddybuildr_in_header' );
    ?>
			<div class="site-header-main-right site-header-item">
				<nav id="site-navigation" class="main-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'main', 'menu_id' => 'primary-menu', ) ); ?>
				</nav><!-- #site-navigation -->
				<div class="basic_icons site-header-item">
					<a id="SearchIconD" class="header-search-icon toggle-header-search" name="europa-view" href="#"><i class="buddybuildr-icon buddybuildr-search"></i></a>
					<!-- <a href="#" for="modal-1" class="header-user-icon"><i class="fa fa-user-circle"></i></a>-->
					<?php if ( class_exists('Buddypress') && bp_is_active( 'notifications' ) ) { echo '<a class="alert_icon" onclick="NotificationsNav2()" id="Notif" href="#"><i class="buddybuildr-icon buddybuildr-bell-o"></i>' . buddybuildr_notification_count(). '</a>';}?>
					<a href="#" class="header-user-icon"><label class="btn" for="modal-1"><i class="buddybuildr-icon buddybuildr-user-circle-o"></i></label></a>
				</div>
			</div><!--.site-header-main-right-->
		</div><!--.site-header-main-->
		<div class="header-site-search transition-left">
			<!-- <p class="m_devices inline_block kill_margin">
				<span class="search_prefix">Search </span><?php echo get_bloginfo( 'name' ); ?>
			</p> -->
				<div class="header-site-search-box"><?php get_search_form(); ?></div>
				<span class="buddybuildr-icon buddybuildr-close toggle-header-search site-header-item close-header-search"></span>
		</div><!-- .site-search -->
	</header><!-- #masthead -->
