<!DOCTYPE html>
<html <?php language_attributes() ?> >
<head>
	<meta name="viewport" http-equiv="Content-Type" content="width=device-width, initial-scale=1, <?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	 <?php wp_head(); ?>
 </head>
  
<body <?php body_class( array( "databoypro", "buddybuildr", "m5", "m5tfw" ) ); ?>>

<div id="Overlay" class="body_overlay"></div>
 
	<div id="page" class="site grid-container">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'buddy-buildr' ); ?></a>
		<header id="masthead" class="site-header">
					 
			<div class="header-wrapper m5-nav m5-nav-wrapper">

				<div class="header-left header-section">

					<div onclick="LeftNav()" class="hamburger site-header-item zufallig">
						<div></div>
						<div></div>
						<div></div>
					</div>

					<div class="site-branding site-header-item">
						<?php
				$custom_logo_id = get_theme_mod( 'custom_logo' ); $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
				if ( has_custom_logo() ) {
					echo '<a href="'. esc_url( home_url( '/' ) ) .'"rel="home"><img src="'. esc_url( $logo[0] ) .'"></a>';} else {
						echo '<h3 class="site-title kill_margin"><a href="'. esc_url( home_url( '/' ) ) .'"rel="home">'.get_bloginfo( 'name' ) .'</a></h3>';
						}
				?>
					</div>
					<div class="toggle-header-right site-header-item header-button"><i class="fa fa-door-open"></i> <?php echo buddybuildr_notification_count(); ?> </div>

				</div><!-- .header-left -->

				<div id="header-right" class="header-right header-section">
					<div class="header-social-area">

				<div class="social-area-icons site-header-item">
							<div class="dropdown">
  <a class="home-icon header-icon-one dropbtn" onclick="<?php icon_one_onclick() ?>" href="<?php icon_one_url() ?>"><i class=" <?php buddybuildr_header_icon_one() ?> "></i></a>
  <div id="icon1Dropdown" class="dropdown-content">
    <?php if ( get_theme_mod( 'enable_icon_one_menu' ) == true ) : ?>
			<nav id="icon1-navigation" class="icon1-navigation" role="navigation">
				<?php
					// icon 1 navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'icon1-menu',
						'theme_location' => 'icon1',
					) );
				?>
			</nav><!-- .icon1-navigation -->
<?php endif; ?>
  </div>
</div> 
							
<a class="header-icon-two" href="<?php icon_two_url() ?>"><i class="<?php buddybuildr_header_icon_two() ?>"></i></a>
							<a id="SearchIcon" class="header-search-icon" onclick="controlSearch()" href="javascript:void();"><i class="fa fa-search"></i></a>

							<?php if ( class_exists('Buddypress') && bp_is_active( 'notifications' ) ) { echo '<a class="header-icon-three" onclick="NotificationsNav()" id="Notif" href="#"><i class="' . buddybuildr_header_icon_three() . '"></i>' . buddybuildr_notification_count(). '</a>';}?>
						</div>

						<div class="username no-margin-left site-header-item">

							<?php global $current_user; wp_get_current_user(); ?>
							<?php if ( !is_user_logged_in() && get_option( 'users_can_register' ) ) :?>
								<a href="<?php echo wp_login_url(); ?>" class="login">Login</a>
				    			<span class="p10">|</span>
				    			<a href="<?php echo wp_registration_url(); ?>" class="register">Get Started</a>
							<?php elseif ( !is_user_logged_in()): ?>
								<a href="<?php echo wp_login_url(); ?>" class="login">Login</a>
							<?php else: ?>
								<a onclick="RightNav()" id="Cen" href="javascript:void();" class="login"><?php echo $current_user->display_name; ?></a>
							<?php endif ?>

						</div><!-- .username -->
					</div><!-- .header-social-area -->
				</div><!-- .header-right -->

			</div><!-- .m5-nav (header-wrapper) --->
	
        </header><!-- #header -->
