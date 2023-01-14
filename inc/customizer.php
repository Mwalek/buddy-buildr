<?php

function buddybuildr_customize_register( $wp_customize )
{

    /*******************************************
     PANELS
     ********************************************/


    // Panel 1

    $wp_customize->add_panel(
        'general', array(
        'prioryity'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('General', 'buddy-buildr'),
        'description'    => __('General Buddy Buildr Options', 'buddy-buildr'),
        ) 
    );

    // Panel 2

    $wp_customize->add_panel(
        'header', array(
        'priority'       => 13,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header Options', 'buddy-buildr'),
        'description'    => __('Several settings pertaining to Buddy Buildr Header', 'buddy-buildr'),
        ) 
    );

    // Panel 2 Sections

    // Panel 2 Sections A

    $wp_customize->add_section(
        'header_settings', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header General', 'buddy-buildr'),
        'description'    =>  __('General settings for the site header', 'buddy-buildr'),
        'panel'  => 'header',
        ) 
    );

    // add the setting for the Header Search
    $wp_customize->add_setting(
        'header-search', array(
        'default' => 'header-search-on',
        ) 
    );

    // add the control for the Header Search
    $wp_customize->add_control(
        'header-search', array(
        'label'      => 'Show search icon?',
        'section'    => 'header_settings',
        'settings'   => 'header-search',
        'type'       => 'radio',
        'priority' => 12,
        'choices'    => array(
            'header-search-on'   => 'Yes',
            'header-search-off'  => 'No',
         ) ) 
    );

    $wp_customize->add_setting(
        'sticky_header', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_checkbox',
        )
    );

    // add the control for the Sticky Header
    $wp_customize->add_control(
        'sticky_header', array(
        'type' => 'checkbox',
        'priority' => 12,
        'section' => 'header_settings',
        'settings' => 'sticky_header',
        'label' => esc_html__('Enable sticky header Site-wide.', 'buddy-buildr'),
        )
    );

    // add the setting for the Header Size
    $wp_customize->add_setting(
        'header-size', array(
        'default' => 'header-size-min',
        'transport'   => 'postMessage',
        ) 
    );

    // add the control for the Header Size
    $wp_customize->add_control(
        'header-size', array(
        'label'      => 'Set Desired Header Size',
        'section'    => 'header_settings',
        'settings'   => 'header-size',
        'type'       => 'radio',
        'priority'     => 11,
        'choices'    => array(
            'header-size-min'   => 'Minimal',
            'header-size-full'  => 'Full',
         ) ) 
    );

    // add the setting for the Header Size
    $wp_customize->add_setting(
        'header-type', array(
        'default' => 'header-type-def',
        'transport'   => 'refresh',
        ) 
    );

    // add the control for the Header Size
    $wp_customize->add_control(
        'header-type', array(
        'label'      => 'Show APPIFY Header:',
        'section'    => 'header_settings',
        'settings'   => 'header-type',
        'type'       => 'radio',
        'priority'     => 10,
        'choices'    => array(
            'header-type-def'   => 'Only on App Pages',
            'header-type-app'  => 'Site-wide',
         ) ) 
    );

    // Panel 2 Sections B ( Header Colors )

    // add the section to contain the Header Color settings
    $wp_customize->add_section(
        'header_colors', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Header Colors', 'buddy-buildr'),
        'description'    =>  __('Adjust main header colors', 'buddy-buildr'),
        'panel'  => 'header',
        ) 
    );

    $wp_customize->add_setting(
        'header_background_color', array(
        'default'     => '#d44646',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_setting(
        'header_color', array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'header_background_color', array(
            'label'        => 'Header Background Color',
            'section'    => 'header_colors',
            'settings'   => 'header_background_color',
            ) 
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'header_color', array(
            'label'        => 'Header Color',
            'section'    => 'header_colors',
            'settings'   => 'header_color',
            ) 
        ) 
    );

    // Section C

    $wp_customize->add_section(
        'layout_settings', array(
        'priority'       => 12,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Layout Settings', 'buddy-buildr'),
        'description'    =>  __('Page feature configuration', 'buddy-buildr'),
        'panel'  => 'header',
        ) 
    );

    // Panel 2 Sections D ( Header Icons )

    

    // Panel 2 Sections E ( Header Button Colors )

    // Panel 3

    $wp_customize->add_panel(
        'appify_header', array(
        'priority'       => 13,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Appify Header Options', 'buddy-buildr'),
        'description'    => __('Several settings pertaining to Appify Header', 'buddy-buildr'),
        ) 
    );

    // Panel 3 Sections

    // Panel 3 Sections A

    $wp_customize->add_section(
        'appify_header_settings', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Appify Header General', 'buddy-buildr'),
        'description'    =>  __('General settings for the appify header', 'buddy-buildr'),
        'panel'  => 'appify_header',
        ) 
    );

    // add the setting for the Header Search
    $wp_customize->add_setting(
        'appify-header-search', array(
        'default' => 'app-header-search-on',
        ) 
    );

    // add the control for the Header Search
    $wp_customize->add_control(
        'header-search', array(
        'label'      => 'Show search icon?',
        'section'    => 'appify_header_settings',
        'settings'   => 'appify-header-search',
        'type'       => 'radio',
        'priority' => 12,
        'choices'    => array(
            'appify-header-search-on'   => 'Yes',
            'appify-header-search-off'  => 'No',
         ) ) 
    );

    $wp_customize->add_setting(
        'appify_sticky_header', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_checkbox',
        )
    );

    // add the control for the Sticky Header
    $wp_customize->add_control(
        'appify_sticky_header', array(
        'type' => 'checkbox',
        'priority' => 11,
        'section' => 'appify_header_settings',
        'settings' => 'appify_sticky_header',
        'label' => esc_html__('Enable sticky Appify header Site-wide.', 'buddy-buildr'),
        )
    );

    // Panel 3 Sections B ( Header Colors )

    // add the section to contain the Header Color settings
    $wp_customize->add_section(
        'appify_header_colors', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __(' Appify Header Colors', 'buddy-buildr'),
        'description'    =>  __('Adjust main header colors for your Application', 'buddy-buildr'),
        'panel'  => 'appify_header',
        ) 
    );

    $wp_customize->add_setting(
        'appify_header_background_color', array(
        'default'     => '#d44646',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_setting(
        'appify_header_color', array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_setting(
        'appify_hamburger_color', array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'appify_header_background_color', array(
            'label'        => 'App Header Background Color',
            'section'    => 'appify_header_colors',
            'settings'   => 'appify_header_background_color',
            ) 
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'appify_header_color', array(
            'label'        => 'Header Color',
            'section'    => 'appify_header_colors',
            'settings'   => 'appify_header_color',
            ) 
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'appify_hamburger_color', array(
            'label'        => 'Hamburger Icon Color',
            'section'    => 'appify_header_colors',
            'settings'   => 'appify_hamburger_color',
            ) 
        ) 
    );

    // Panel 3 Sections C ( Header Icons )

    // add the section to contain the Header Icon settings
    $wp_customize->add_section(
        'header_icons', array(
        'priority'       => 13,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('App Header Icons', 'buddy-buildr'),
        'description'    =>  __('Choose header icons and their URLs. Consult theme documentation if unsure.', 'buddy-buildr'),
        'panel'  => 'appify_header',
        ) 
    );

    // All header icon settings

    $wp_customize->add_setting(
        'header_icon_one', array(
        'default' => 'fa fa-home',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text'
        ) 
    );

    $wp_customize->add_setting(
        'icon_one_link', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw', //cleans URL from all invalid characters
        )
    );

    $wp_customize->add_setting(
        'enable_icon_one_menu', array(
        'default' => false,
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_checkbox',
        )
    );

    $wp_customize->add_setting(
        'header_icon_two', array(
        'default' => 'fa fa-cube',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text'
        ) 
    );

    $wp_customize->add_setting(
        'icon_two_link', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw', //cleans URL from all invalid characters
        )
    );

    $wp_customize->add_setting(
        'header_icon_three', array(
        'default' => 'fa fa-bell',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text'
        )
    );

    // All header icon controls

    $wp_customize->add_control(
        'header_icon_1', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'header_icons',
        'settings' => 'header_icon_one',
        'label' => esc_html__('Icon 1 Settings', 'buddy-buildr'),
        'description' => esc_html__('ICON CLASS: Choose the class name for the first icon.', 'buddy-buildr'),
        )
    );

    $wp_customize->add_control(
        'enable_icon_one_menu', array(
        'type' => 'checkbox',
        'priority' => 11,
        'section' => 'header_icons',
        'settings' => 'enable_icon_one_menu',
        'label' => esc_html__('Enable pop-up menu for this icon. Select the menu from Appearance > Menus.', 'buddy-buildr'),
        )
    );

    $wp_customize->add_control(
        'icon_one_link', array(
        'type' => 'url',
        'priority' => 12,
        'section' => 'header_icons',
        'description' => esc_html__('ICON URL: Specify which page to direct users when they click the icon. E.g https://mwale.me.', 'buddy-buildr'),
        )
    );

    $wp_customize->add_control(
        'header_icon_2', array(
        'type' => 'text',
        'priority' => 13,
        'section' => 'header_icons',
        'settings' => 'header_icon_two',
        'label' => esc_html__('Icon 2 Settings', 'buddy-buildr'),
        'description' => esc_html__('ICON CLASS: Choose the class name for the second icon', 'buddy-buildr'),
        ) 
    );

    $wp_customize->add_control(
        'icon_two_link', array(
        'type' => 'url',
        'priority' => 14,
        'section' => 'header_icons',
        'settings' => 'icon_two_link',
        'description' => esc_html__('ICON URL: Specify which page to direct users when they click the icon. E.g https://mwale.me.', 'buddy-buildr'),
        )
    );

    $wp_customize->add_control(
        'header_icon_3', array(
        'type' => 'text',
        'priority' => 15,
        'section' => 'header_icons',
        'settings' => 'header_icon_three',
        'label' => esc_html__('Icon 3 Settings', 'buddy-buildr'),
        'description' => esc_html__('ICON CLASS: Choose the class name for the third icon. This is the icon that links to Notifications.', 'buddy-buildr'),
        ) 
    );

    // Panel 4

    $wp_customize->add_panel(
        'buddypress_options', array(
        'priority'       => 14,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('BuddyPress Options', 'buddy-buildr'),
        'description'    => __('Several settings pertaining to BuddyPress in Buddy Buildr theme', 'buddy-buildr'),
        ) 
    );

    // Panel 4 Sections

    // Panel 4 Sections A

    $wp_customize->add_section(
        'buddypress_general', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('BuddyPress General', 'buddy-buildr'),
        'description'    =>  __('General theme settings for BuddyPress', 'buddy-buildr'),
        'panel'  => 'buddypress_options',
        ) 
    );

    // add the setting for the Header Search
    $wp_customize->add_setting(
        'buddypress-sidebars', array(
        'default' => 'sidebars-off',
        ) 
    );

    // add the control for the Header Search
    $wp_customize->add_control(
        'buddypress-sidebars', array(
        'label'      => 'Show these on BuddyPress pages:',
        'section'    => 'buddypress_general',
        'settings'   => 'buddypress-sidebars',
        'type'       => 'radio',
        'choices'    => array(
            'sidebar1-on'   => 'Global Sidebar',
            'sidebar2-on'  => 'BuddyPress Sidebar',
            'sidebars-on'  => 'Both',
            'sidebars-off'  => 'None',
         ) ) 
    );

    // Panel 3

    $wp_customize->add_panel(
        'search_options', array(
        'priority'       => 15,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Search Options', 'buddy-buildr'),
        'description'    => __('Make the search template your own'),
        ) 
    );

    // Panel 4 Sections

    // Panel 4 Sections A

    $wp_customize->add_section(
        'search_general', array(
        'priority'       => 10,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Search General', 'buddy-buildr'),
        'description'    =>  __('General search settings for Buddy Buildr', 'buddy-buildr'),
        'panel'  => 'search_options',
        ) 
    );

    // add the setting for the Search Cover Image Size
    $wp_customize->add_setting(
        'search-image-size', array(
        'default' => 'search-image-half',
        'transport'   => 'postMessage',
        ) 
    );

    // add the control for the Search Cover Image Size
    $wp_customize->add_control(
        'search-image-size', array(
        'label'      => 'Size of Search Featured Image',
        'section'    => 'search_general',
        'settings'   => 'search-image-size',
        'type'       => 'radio',
        'choices'    => array(
            'search-image-half'   => 'Half',
            'search-image-full'  => 'Full',
         ) ) 
    );

    // add the setting for the search-heading
    $wp_customize->add_setting(
        'custom_search_heading', array(
        'default'           => __('This is an optional sub-heading.', 'buddy-buildr'),
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
        ) 
    );

    // add the control for the search heading
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_search_heading',
            array(
                'priority'       => 11,
                'label'    => __('Search Heading', 'buddy-buildr'),
                'section'  => 'search_general',
                'settings' => 'custom_search_heading',
                'type'     => 'text'
            )
        )
    );

    // add the setting for the search-subheading
    $wp_customize->add_setting(
        'custom_search_subheading', array(
        'default'           => __('Welcome to our Search Page', 'buddy-buildr'),
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
        ) 
    ); 

    // add the control for the search heading
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_search_subheading',
            array(
                'priority'       => 12,
                'label'    => __('Search Sub-Heading', 'buddy-buildr'),
                'section'  => 'search_general',
                'settings' => 'custom_search_subheading',
                'type'     => 'text'
            )
        )
    );

    // add the setting for the placeholder text
    $wp_customize->add_setting(
        'custom_search_placeholder', array(
        'default'           => __('Im Looking for ...', 'buddy-buildr'),
        'transport'   => 'postMessage',
        'sanitize_callback' => 'sanitize_text'
        ) 
    );

    // add the control for the placeholder text
    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_search_placeholder',
            array(
                'priority'       => 13,
                'label'    => __('Search Placeholder', 'buddy-buildr'),
                'section'  => 'search_general',
                'settings' => 'custom_search_placeholder',
                'type'     => 'text',
                'input_attrs' => array(
                    'placeholder' => __('Psst! type some instructions ...', 'buddy-buildr'),
                )
            )
        )
    );

    // add the setting for the Seach Heading size
    $wp_customize->add_setting(
        'search_heading_size', array(
        'default'     => 0,
        'transport'   => 'postMessage',
        ) 
    );

    // add the control for the Seach Heading size
    $wp_customize->add_control(
        new WP_Customize_Range(
            $wp_customize, 'search_heading_size', array(
            'priority'       => 12,
            'label'    =>  'Search Heading Size',
            'min' => 24,
            'max' => 100,
            'step' => 8,
            'section' => 'search_general',
            ) 
        ) 
    );

    // Panel 4: Section B

    $wp_customize->add_section(
        'search_colors', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Search Colors', 'buddy-buildr'),
        'description'    =>  __('Search color settings for Buddy Buildr', 'buddy-buildr'),
        'panel'  => 'search_options',
        ) 
    );

    //Search Heading Color
    $wp_customize->add_setting(
        'search_heading_color', array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'search_heading_color', array(
            'label'        => 'Search Heading Color',
            'section'    => 'search_colors',
            'settings'   => 'search_heading_color',
            ) 
        ) 
    );

    //Search Sub-Heading Color
    $wp_customize->add_setting(
        'search_subheading_color', array(
        'default'     => '#ffffff',
        'transport'   => 'postMessage',
        ) 
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'search_subheading_color', array(
            'label'        => 'Search Sub-Heading Color',
            'section'    => 'search_colors',
            'settings'   => 'search_subheading_color',
            ) 
        ) 
    );

    // Panel 4: Section C

    $wp_customize->add_section(
        'search_personalize', array(
        'priority'       => 11,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __('Personalize Search', 'buddy-buildr'),
        'description'    =>  __('These options only affect the Buddy Buildr Search template.', 'buddy-buildr'),
        'panel'  => 'search_options',
        ) 
    );

    $args = array(
    'public'   => true,
    '_builtin' => false
    );

    $output = 'names'; // names or objects, note names is the default
    $operator = 'and'; // 'and' or 'or'

    $post_types = get_post_types($args, $output, $operator); 
    array_unshift($post_types, "default", "posts", "pages");

    /*foreach ( $post_types as $post_type ) {

       print $post_type ;
    }*/

    $wp_customize->add_setting(
        'search_types', array(
        'transport' => 'postMessage'
        )
    );

    $wp_customize->add_control(
        'search_type_controls', array(
        'label'    => esc_html__('Post Type to search for:', 'buddy-buildr'),
        'type'     => 'select',
        'section'  => 'search_personalize',
        'settings' => 'search_types',
        'priority' => 4,
        'choices'  => $post_types,
        )
    );


}

add_action('customize_register', 'buddybuildr_customize_register');


/*******************************************************************************
 Add theme customizer sanitization functions
 ********************************************************************************/
 
 // Sanitize text
    
function sanitize_text( $text )
{
    return sanitize_text_field($text);
}

 // Sanitize checkbox

function sanitize_checkbox($checked)
{
    return ((isset($checked) && true == $checked) ? true : false);
}

/*******************************************************************************
 add class to body if options turned on using the body_class filter
 ********************************************************************************/

function buddybuildr_header_search_classes( $classes )
{
 
    // set the color scheme
    $header_search_function = get_theme_mod('header-search');
    $classes[] = $header_search_function;   
     
    return $classes;
     
}

add_filter('body_class', 'buddybuildr_header_search_classes');

add_action('wp_head', 'mkpd_customizer_css');

function mkpd_customizer_css()
{
    ?>
         <style type="text/css">
             #Amasthead .site-header-app {background-color: <?php echo get_theme_mod('appify_header_background_color', '#d44646'); ?>;}
             #Dmasthead .site-header-main {background-color: <?php echo get_theme_mod('header_background_color', '#d44646'); ?>;}
             #Amasthead .hamburger div {background-color:<?php echo get_theme_mod('appify_hamburger_color', '#ffffff'); ?>;}
             #Dmasthead .hamburger div {background-color:<?php echo get_theme_mod('header_color', '#ffffff'); ?>;}
             #Dmasthead .site-header-item {color:<?php echo get_theme_mod('header_color', '#ffffff'); ?>;}
             #Amasthead .site-header-app .site-header-item {color:<?php echo get_theme_mod('appify_header_color', '#ffffff'); ?>;}
             .site-header-main .site-header-item a {color:<?php echo get_theme_mod('header_color', '#ffffff'); ?>;}
             #Amasthead .site-header-app .site-header-item a {color:<?php echo get_theme_mod('appify_header_color', '#ffffff'); ?>;}
             #Amasthead .site-header-common + .header-site-search {background-color: <?php echo get_theme_mod('appify_header_background_color', '#d44646'); ?>;}
             #Dmasthead .site-header-common + .header-site-search {background-color: <?php echo get_theme_mod('header_background_color', '#d44646'); ?>;}
             .site-header-app .main-navigation a {color:<?php echo get_theme_mod('appify_header_color', '#ffffff'); ?>;}
             .header-search-on #SearchIcon {display: inline-block;}
             .header-search-off #SearchIcon {display: none;}
             .header-search-on .side-search {display: block;}
             .header-search-off .side-search {display: none;}
             .buddybuildr #page .search-heading { 
                 color:<?php echo get_theme_mod('search_heading_color', '#333'); ?>;
                 font-size: <?php buddybuildr_search_heading_size(); ?>px;
             }
             .buddybuildr #page .search-subheading { 
                 color:<?php echo get_theme_mod('search_subheading_color', '#fff'); ?>;
             }
         </style>
    <?php
}

?>
