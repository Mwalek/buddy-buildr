<?php
add_action( 'customize_register', 'buddybuildr_register_theme_customizer' );
/*
 * Register Our Customizer Stuff Here
 */
function buddybuildr_register_theme_customizer( $wp_customize ) {

	/*******************************************
	 PANELS
	 ********************************************/


	 // Panel 11

	 $wp_customize->add_panel( 'text_blocks', array(
	 	'prioryity'       => 20,
	 	'capability'     => 'edit_theme_options',
	 	'theme_supports' => '',
	 	'title'          => __('Text Blocks', 'buddy-buildr'),
	 	'description'    => __('Set editable text for certain content.', 'buddy-buildr'),
	) );

	// Panel 1 Sections

	// Panel 1 Section A (Search Page Text)

	$wp_customize->add_section( 'custom_body_text', array(
	    'priority'       => 10,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Body Text', 'buddy-buildr'),
	    'description'    =>  __('Change text that appears in the main body of templates', 'buddy-buildr'),
	    'panel'  => 'text_blocks',
    ) );

	// add the setting for the footer text
	$wp_customize->add_setting( 'search_text_block', array(
		 'default'           => __( 'Go on, click me!', 'buddy-buildr' ),
		 'transport'   => 'postMessage',
		 'sanitize_callback' => 'sanitize_text'
	) );

    // add the control for the footer text
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_search_text',
		    array(
		        'label'    => __( 'Search Text', 'buddy-buildr' ),
		        'section'  => 'custom_body_text',
		        'settings' => 'search_text_block',
		        'type'     => 'text'
		    )
	    )
	);

	//$wp_customize->get_setting( 'search_text_block' )->transport = 'postMessage';

    // Panel 2 Section B ( Header and Footer Text )

    // add the section to contain the footer text settings

    $wp_customize->add_section( 'custom_header_footer_text', array(
	    'priority'       => 11,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Header & Footer Text', 'buddy-buildr'),
	    'description'    =>  __('Change text that appears in the header and footer', 'buddy-buildr'),
	    'panel'  => 'text_blocks',
    ) );

	// add the setting for the site identity text
	$wp_customize->add_setting( 'site_identity_text_block', array(
		 'default'           => __( 'THE SITE', 'buddy-buildr' ),
		 'sanitize_callback' => 'sanitize_text'
	) );

    // add the control for the site identity text
	$wp_customize->add_control( new WP_Customize_Control(
	    $wp_customize,
		'custom_header_text',
		    array(
		        'label'    => __( 'Site Identity Text', 'buddy-buildr' ),
		        'section'  => 'custom_header_footer_text',
		        'settings' => 'site_identity_text_block',
		        'type'     => 'text',
		        'description'    =>  __('Replace the site title in the header with initials or words of your choice', 'buddy-buildr'),
		    )
	    )
	);

}