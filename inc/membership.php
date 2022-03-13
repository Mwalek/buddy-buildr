<?php

/*
	
@package Buddy Buildr
	
	========================
		MEMBERSHIP OPTIONS
	========================
*/
/**
 * Adds a class called logged out for logged out users
 * @since Buddy Buildr 1.0
 */

add_filter('body_class','buddybuildr_logged_in_class_names');

function buddybuildr_logged_in_class_names($classes) {
    if( is_user_logged_in() ) {
    	$classes[] = 'logged-in';
    } else {
    	$classes[] = 'logged-out';
    }
    // return the $classes array
    return $classes;
}

/**
 * Alters css if admin bar is showing
 * @since Buddy Buildr 1.0
 */

function buddybuildr_adminbar_shown() {
	if ( is_admin_bar_showing() ) {
		?>
			<style type="text/css">
				.buddybuildr .sidenav {padding-top:46px;}
				@media only screen and (min-width:783px) {
					.buddybuildr .sidenav {padding-top:32px !important;}
				}
			</style>
		<?php
	}
}
add_action ( 'wp_enqueue_scripts', 'buddybuildr_adminbar_shown' );

/*	
	========================
		THEME CUSTOMIZER INSTRUCTIONS
	========================
*/

// Add a class if 'Transparent Header' checkbox is ticked

add_filter('body_class','transparent_header_class_name');

function transparent_header_class_name($classes) {

	// Retrieves the stored value from the database
	 $meta_value = get_post_meta( get_the_ID(), 'header-transparent-checkbox', true );

	// Checks and displays the retrieved value
	if( !empty( $meta_value ) ) {
		$classes[] = 'transparent-header';
	} 

	// Return the $classes array
	return $classes;

}

add_filter('body_class','hide_header_rightblock_class_name');

function hide_header_rightblock_class_name($classes) {

	// Retrieves the stored value from the database
	 $meta_value = get_post_meta( get_the_ID(), 'header-rightblock-checkbox', true );

	// Checks and displays the retrieved value
	if( !empty( $meta_value ) ) {
		$classes[] = 'header-rightblock-hidden';
	} 

	// Return the $classes array
	return $classes;

}

add_filter('body_class','hide_header_branding_class_name');

function hide_header_branding_class_name($classes) {

	// Retrieves the stored value from the database
	 $meta_value = get_post_meta( get_the_ID(), 'header-branding-checkbox', true );

	// Checks and displays the retrieved value
	if( !empty( $meta_value ) ) {
		$classes[] = 'header-branding-hidden';
	} 

	// Return the $classes array
	return $classes;

}

function buddybuildr_header_text() {

	$meta_value = get_post_meta( get_the_ID(), 'header-text-dropdown', true );

	if ( 'Dark' == $meta_value ) {
		?>
			<style type="text/css">
				.m5 .site-header-item, .m5 .site-header-item a {
					color: #777;
				}

				.m5 .hamburger div {
					background-color: #777;
				}
			</style>
		<?php
	}

	if ( 'Light' == $meta_value ) {
		?>
			<style type="text/css">
				.m5 .site-header-item, .m5 .site-header-item a {
					color: #fff;
				}

				.m5 .hamburger div {
					background-color: #fff;
				}
			</style>
		<?php
	}
}
add_action ( 'wp_head', 'buddybuildr_header_text' );

/*	
	========================
		BUDDYPRESS
	========================
*/

// Buddy Buildr Notifications Menu www.cityflavourmagazine.com

function buddybuildr_notifications_menu() {
	global $bp;

	if ( !is_user_logged_in() )
    return false;

	if (!function_exists( 'bp_notifications_get_notifications_for_user' ) )
	return ;

	echo '<li id="top-notification">';
	echo '<h3>'; _e( 'Notifications', 'buddybuildr' ); echo'</h3>';

	if ( $notifications = bp_notifications_get_notifications_for_user( $bp->loggedin_user->id ) ) { ?>

	<?php
	}

	echo '</a>';
	echo '<ul>';

	if ( $notifications ) {
	    $counter = 0;
	    for ( $i = 0; $i < count($notifications); $i++ ) {
	        $alt = ( 0 == $counter % 2 ) ? ' class="alt"' : ''; ?>

	        <li<?php echo $alt ?>><?php echo $notifications[$i] ?></li>

	        <?php $counter++;
	    }
	    echo '<a href="'.esc_url( bp_loggedin_user_domain() ).'notifications">'.esc_html__( 'view all notifications', 'buddybuildr' ).'</a>';
	} else { ?>

	    <li style="text-align: center;"><a href="<?php echo $bp->loggedin_user->domain ?>notifications"><?php _e( 'You have no new alerts.', 'buddybuildr' ); ?></a></li>

	<?php
	}

	echo '</ul>';
	echo '</li>';
}

function buddybuildr_notification_count() {

	// Show nothing for logged out users
		if ( ! is_user_logged_in() ) {
			return;
		}
		// let us get the notifications for the user.
		if ( function_exists( 'bp_notifications_get_notifications_for_user' ) ) {
			$user_id = bp_loggedin_user_id();
			$count = bp_notifications_get_unread_notification_count( $user_id );
		}

	if ( function_exists( 'bp_notifications_get_notifications_for_user' ) && $count > 0 ) { 
		return '<span class="alert_count">' . $count . '</span>';
		} else { 
		// The notif count is 0.
		}
}

function buddybuildr_message_count() {
	// Show nothing for logged out users
		if ( ! is_user_logged_in() ) {
			return;
		}

	// let us get the notifications for the user.
		if ( function_exists( 'messages_get_unread_count' ) ) {
			$count = messages_get_unread_count( get_current_user_id() );
		}
	if ( function_exists( 'messages_get_unread_count' ) && $count > 0 ) { 
		return '<span class="alert_count">' . $count . '</span>';
		} else { 
		// The notif count is 0.
		}
}

function buddybuildr_bp_user_link() {
	if( class_exists( 'Buddypress' ) ) {
		echo bp_loggedin_user_domain();
	}
}