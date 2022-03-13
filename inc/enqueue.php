<?php

/**
*	
* @package Buddybuildr
*	
*	========================
*		ADMIN ENQUEUE FUNCTIONS
*	========================
*/

/**
 * Enqueues Admin scripts and styles.
 * @since Buddy Buildr 1.0
 */

function buddybuildr_admin_assets( $hook ) {

	global $post;

	if ( $hook == 'post-new.php' || $hook == 'post.php' ) {
		wp_register_style( 'bb-admin-ui', get_template_directory_uri() . '/inc/core/assets/css/buddybuildr_admin_ui.css');
		wp_enqueue_style( 'bb-admin-ui');
	}

}

add_action( 'admin_enqueue_scripts', 'buddybuildr_admin_assets' );
/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/

if ( ! function_exists( 'buddybuildr_assets' ) ) {
	function buddybuildr_assets() {
		// Theme stylesheet.
		wp_enqueue_style( 'bb-style', get_stylesheet_uri() );
		/*wp_enqueue_script( 'jquery-ui-core' );
		wp_enqueue_script( 'jquery-effects-core' );*/
		/*wp_register_style( 'fontawesome', get_template_directory_uri() . '/webfonts/all.css' );
		wp_enqueue_style( 'fontawesome');
		/*wp_register_style( 'fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css' );
		wp_enqueue_style( 'fontawesome');
		/*wp_register_style( 'bb-less', get_template_directory_uri() . '/assets/css/style.css');
		wp_enqueue_style( 'bb-less');*/
		/*wp_register_style( 'fa-min', get_template_directory_uri() . '/assets/fontawesome/fontawesome.min.css');
		wp_enqueue_style( 'fa-min');*/	
	}
}

add_action( 'wp_enqueue_scripts', 'buddybuildr_assets' );

if ( ! function_exists( 'buddybuildr_footer_assets' ) ) {
	function buddybuildr_footer_assets() {
		wp_register_script('main-js-script', get_template_directory_uri() . '/scripts/js-main.js', array( 'jquery' ) ,'1.0', true);
		wp_enqueue_script('main-js-script');
		wp_register_style( 'fontawesome', get_template_directory_uri() . '/assets/css/webfonts/all.min.css' );
		wp_enqueue_style( 'fontawesome');
		wp_register_style( 'main-style', get_template_directory_uri() . '/css/buddybuildr.css' );
		wp_enqueue_style( 'main-style');
	}
}

add_action( 'get_footer', 'buddybuildr_footer_assets' );














