<?php

/*
	
@package Buddy Buildr
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/

if ( ! function_exists( 'buddybuildr_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since Buddybuildr 1.0
	 */

	function buddybuildr_setup() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'small-thumbnail', $width = 180, $height = 120, $crop = true );
		add_image_size( 'banner-image', $width = 1002, $height = 210, $crop = true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'main' => __( 'Main Menu', 'buddy-buildr' ),
			'footer' => __( 'Footer Menu', 'buddy-buildr' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 *
		 * See: https://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Enable support for custom logo.
		add_theme_support( 'custom-logo', array(
			'flex-height' => false,
		) );

	}
endif;

add_action( 'after_setup_theme', 'buddybuildr_setup' );

if ( ! function_exists( 'buddybuildr_thumbnail' ) ) :
	/**
	 * Output the thumbnail if it exists.
	 *
	 * @param string $size Thunbnail size to output.
	 */
	function buddybuildr_thumbnail( $size = '' ) {

		if ( has_post_thumbnail() ) { ?>
			<div class="post-thumbnail">

				<?php if ( ! is_single() ) : ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php the_post_thumbnail( $size ); ?>
					</a>
				<?php else : ?>
					<?php the_post_thumbnail( $size ); ?>
				<?php endif; ?>

			</div><!-- .post-thumbnail -->
		<?php
		}

	}
endif;

// Add Customizer Preview File.js

add_action( 'customize_preview_init', 'buddybuildr_customizer_preview' );

function buddybuildr_customizer_preview() {
	wp_enqueue_script(
		  'buddybuildr_customizer_preview',
		  get_template_directory_uri() . '/scripts/customizer.js',
		  array( 'jquery','customize-preview' ),
		  '',
		  true
	);
}

/**
 * Fallback Menu
 * @since Buddy Buildr 1.0
 */
if ( ! function_exists( 'buddybuildr_default_menu' ) ) {
	function buddybuildr_default_menu() {
	    get_template_part( 'templates/parts/default-menu' );
	}
}

/**
 * Alters theme excerpt length
 * @since Buddy Buildr 1.0
 */

function buddybuildr_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'buddybuildr_excerpt_length', 999 );

/**
 * Register widget area.
 * @since Buddy Buildr 1.0
 */

function buddybuildr_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'buddy-buildr' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'buddy-buildr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'BuddyPress Sidebar', 'buddy-buildr' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'This sidebar will only appear on Buddypress Pages. Add any widget here.', 'buddy-buildr' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'buddybuildr_widgets_init' );

/**
 * Sets up dynamic copyright date in the Buddy Buildr Theme footer
 * @since Buddy Buildr 1.0
 */

function buddybuildr_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	return $output;
}

/*	
	========================
		THEME META
	========================
*/

function buddybuildr_add_fields_meta_box() {
	add_meta_box(
		'buddybuildr_fields_meta_box', // $id
		'Buddy Buildr Page Options', // $title
		'buddybuildr_meta_box_markup', // $callback
		'page', // $screen
		'normal', // $context
		'high' // $priority
	);
}
add_action( 'add_meta_boxes', 'buddybuildr_add_fields_meta_box' );

function buddybuildr_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");

    ?>
        <div class="buddybuildr_form" >

        	<div class="bb_form_field">
        		<div class="bb_field_wrapper">     
			        <label for="header-text-dropdown">Header Text Color</label>
			            <select name="header-text-dropdown">
			                <?php 
			                    $option_values = array('Default', 'Light', 'Dark');

			                    foreach($option_values as $key => $value) 
			                    {
			                        if($value == get_post_meta($object->ID, "header-text-dropdown", true))
			                        {
			                            ?>
			                                <option selected><?php echo $value; ?></option>
			                            <?php    
			                        }
			                        else
			                        {
			                            ?>
			                                <option><?php echo $value; ?></option>
			                            <?php
			                        }
			                    }
			                ?>
			            </select>
			            <br> 
			    </div><!-- .bb_field_wrapper -->
		    </div><!-- .bb_form_field -->

		    <div class="bb_form_field" >
		    	<div class="bb_field_wrapper">
		            <label for="header-transparent-checkbox" class="container">Transparent Header
		            	<?php
		                $checkbox_value = get_post_meta($object->ID, "header-transparent-checkbox", true);

		                if($checkbox_value == "")
		                {
		                    ?>
		                        <input name="header-transparent-checkbox" type="checkbox" value="true">
		                    <?php
		                }
		                else if($checkbox_value == "true")
		                {
		                    ?>  
		                        <input name="header-transparent-checkbox" type="checkbox" value="true" checked>
		                    <?php
		                }
		            	?>
		            	<span class="checkmark"></span>
		            </label>

		        </div><!-- .bb_field_wrapper --> 
		    </div><!-- .bb_form_field -->

		    <div class="bb_form_field" >
		    	<div class="bb_field_wrapper">
		            <label for="primary-padding-checkbox" class="container">Add space between header and content
		            	<?php
		                $checkbox_value = get_post_meta($object->ID, "primary-padding-checkbox", true);

		                if($checkbox_value == "")
		                {
		                    ?>
		                        <input name="primary-padding-checkbox" type="checkbox" value="true">
		                    <?php
		                }
		                else if($checkbox_value == "true")
		                {
		                    ?>  
		                        <input name="primary-padding-checkbox" type="checkbox" value="true" checked>
		                    <?php
		                }
		            	?>
		            	<span class="checkmark"></span>
		            </label>

	            </div><!-- .bb_field_wrapper -->
	    	</div><!-- .bb_form_field -->

	    	<div class="bb_form_field" >
		    	<div class="bb_field_wrapper">
		            <!-- <p> Hide the following on this page: </p> -->
		            <label for="header-rightblock-checkbox" class="container">Header Right Block
					  <?php
		                $checkbox_value = get_post_meta($object->ID, "header-rightblock-checkbox", true);

		                if($checkbox_value == "")
		                {
		                    ?>
		                        <input name="header-rightblock-checkbox" type="checkbox" value="true">
		                    <?php
		                }
		                else if($checkbox_value == "true")
		                {
		                    ?>  
		                        <input name="header-rightblock-checkbox" type="checkbox" value="true" checked>
		                    <?php
		                }
		            ?>
					  <span class="checkmark"></span>
					</label>
	            </div><!-- .bb_field_wrapper -->
	    	</div><!-- .bb_form_field --> 

	        <div class="bb_form_field" >
	    		<div class="bb_field_wrapper">
		            <label for="header-branding-checkbox" class="container" >Header Title/Logo
		            	<?php
		                $checkbox_value = get_post_meta($object->ID, "header-branding-checkbox", true);

		                if($checkbox_value == "")
		                {
		                    ?>
		                        <input name="header-branding-checkbox" type="checkbox" value="true">
		                    <?php
		                }
		                else if($checkbox_value == "true")
		                {
		                    ?>  
		                        <input name="header-branding-checkbox" type="checkbox" value="true" checked>
		                    <?php
		                }
		            	?>
		            	<span class="checkmark"></span>
		            </label>
		            
		            </div><!-- .bb_field_wrapper -->
	    	</div><!-- .bb_form_field -->

        </div><!-- buddybuildr_form -->
    <?php  
}

function save_buddybuildr_meta_box($post_id, $post, $update) {

    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "page";

    if($slug != $post->post_type)
        return $post_id;

    $meta_box_text_value = "";
    $header_text_dropdown_value = "";
    $header_transparent_checkbox_value = "";
    $primary_padding_checkbox_value = "";
    $header_rightblock_checkbox_value = "";
    $header_branding_checkbox_value = "";

    if(isset($_POST["meta-box-text"])) {
        $meta_box_text_value = $_POST["meta-box-text"];
    }   
    update_post_meta($post_id, "meta-box-text", $meta_box_text_value);

    if(isset($_POST["header-text-dropdown"])) {
        $meta_box_dropdown_value = $_POST["header-text-dropdown"];
    }   
    update_post_meta($post_id, "header-text-dropdown", $meta_box_dropdown_value);

    if(isset($_POST["header-transparent-checkbox"])) {
        $header_transparent_checkbox_value = $_POST["header-transparent-checkbox"];
    }   
    update_post_meta($post_id, "header-transparent-checkbox", $header_transparent_checkbox_value);

    if(isset($_POST["primary-padding-checkbox"])) {
        $primary_padding_checkbox_value = $_POST["primary-padding-checkbox"];
    }   
    update_post_meta($post_id, "primary-padding-checkbox", $primary_padding_checkbox_value);

    if(isset($_POST["header-rightblock-checkbox"])) {
        $header_rightblock_checkbox_value = $_POST["header-rightblock-checkbox"];
    }   
    update_post_meta($post_id, "header-rightblock-checkbox", $header_rightblock_checkbox_value);

    if(isset($_POST["header-branding-checkbox"])) {
        $header_branding_checkbox_value = $_POST["header-branding-checkbox"];
    }   
    update_post_meta($post_id, "header-branding-checkbox", $header_branding_checkbox_value);
}

add_action("save_post", "save_buddybuildr_meta_box", 10, 3);

/*	
	========================
		THEME HEADER
	========================
*/

function buddybuildr_header_switcher() {
	if ( get_theme_mod( 'header-type' ) == "header-type-def" && 'app' != get_post_type() ) {
		get_header('default');
	}
	elseif ( get_theme_mod( 'header-type' ) == "header-type-def" && 'app' == get_post_type() ) {
		get_header();
	}
	elseif ( get_theme_mod( 'header-type' ) == "header-type-app" ) {
		get_header();
	}
	else {
		get_header('default');
	}
}

function buddybuildr_header_icon_one() {

	if( get_theme_mod( 'header_icon_one') != "" ) {
		echo get_theme_mod( 'header_icon_one');
	}
	else {
		echo 'fa fa-home';
	}
}

function buddybuildr_header_icon_two() {

	if( get_theme_mod( 'header_icon_two') != "" ) {
		echo get_theme_mod( 'header_icon_two');
	}
	else {
		echo 'fa fa-cube'; 
	}
}

function buddybuildr_header_icon_three() {

	if( get_theme_mod( 'header_icon_three') != "" ) {
		return get_theme_mod( 'header_icon_three');
	}
	else {
		return 'fa fa-bell'; 
	}
}

function icon_one_link() {
	if ( get_theme_mod( 'icon_one_link' ) != "" ) {
		return get_theme_mod( 'icon_one_link');
	}
	else {
		echo home_url();
	}
}



function icon_one_url() {
	if ( get_theme_mod( 'enable_icon_one_menu' ) == false ) {
		echo icon_one_link();
	}
	else {
		echo '#' ;
	}
}

function icon_two_url() {
	if ( get_theme_mod( 'enable_icon_two_menu' )!= "" ) {
		return get_theme_mod( 'enable_icon_two_menu');
	}
	else {
		echo '#' ;
	}
}

function icon_two_display() {
	if ( get_theme_mod( 'icon_two_link' )== "" ) {
		?>
			<style type="text/css">
				a.header-icon-two {
					display: none;
				}
			</style>
		<?php
	}
}
add_action ( 'wp_enqueue_scripts', 'icon_two_display' );

function icon_one_onclick() {
	if ( get_theme_mod( 'enable_icon_one_menu' ) == false ) {
		echo 'doNothing' ;
	}
	else {
		echo 'icon1Pop()';
	}
}

function icon_one_menu() {
	if ( get_theme_mod( 'enable_icon_one_menu' ) == true ) { // true
    	register_nav_menus( array(
			'icon1' => __( 'Icon 1 Menu', 'buddy-buildr' ),
		) );
    }
}
add_action( 'init', 'icon_one_menu' );

function header_search_display() {
	if ( get_theme_mod( 'header-search' ) == "header-search-off" ) {
		?>
			<style type="text/css">
				.social-area-icons .header-search-icon {
					display: none;
				}
			</style>
		<?php
	}
}

add_action ( 'wp_enqueue_scripts', 'header_search_display' );

/*	
	========================
		THEME LAYOUT
	========================
*/

// Exterior Header Size
function exterior_header_size() {
	if ( get_theme_mod( 'header-size' ) == "header-size-full" ) {
		?>
			<style type="text/css">
			@media only screen and (min-width:899px) {
				#Dmasthead .site-header-main {
					height: 90px;
					padding: 25px 20px;
				}
				header#Dmasthead {height: 90px;}
				#Dmasthead .header-site-search.transition-left {
					top: -90px;
					padding: 25px 10px;
					height: 90px;
				}
			}
			</style>
		<?php
	}
	elseif (get_theme_mod( 'header-size') == "header-size-min") {
		?>
			<style type="text/css">
				#Dmasthead .site-header-main {
					height: 60px;
					padding: 10px;
				}
				header#Dmasthead {height: 60px;}
				#Dmasthead .header-site-search.transition-left {
					top: -60px;
					padding: 10px;
					height: 60px;
				}
			</style>
		<?php
	}
	else {
		?>
			<style type="text/css">
				#Dmasthead .site-header-main {
					height: 60px;
					padding: 10px;
				}
				header#Dmasthead {height: 60px;}
				#Dmasthead .header-site-search.transition-left {
					top: -60px;
					padding: 10px;
					height: 60px;
				}
			</style>
		<?php
	}
}

add_action ( 'wp_enqueue_scripts', 'exterior_header_size' );

function primary_padding_checkbox() {

	// Retrieves the stored value from the database
	 $meta_value = get_post_meta( get_the_ID(), 'primary-padding-checkbox', true );

	// Checks and displays the retrieved value
	if( !empty( $meta_value ) ) {

		?>
			<style type="text/css">
				#primary {
					padding-top: 50px;
				}
			</style>
		<?php
	}
}

add_action ( 'wp_enqueue_scripts', 'primary_padding_checkbox' );

function buddypress_page_layout() {

	// What to do when only Global Sidebar is activated

	if (get_theme_mod( 'buddypress-sidebars' ) == "sidebar1-on") {

		?>
			<style type="text/css">

				body.buddypress #buddypress-sidebar {display: none;}

				body.buddypress div.site.grid-container {
					min-height: 100vh;
					display: grid;
					grid-template-columns: 100%;
					grid-template-areas: "h"
					                     "m"
					                     "s"
					                     "f";
				}

				@media (min-width: 768px) {
					body.buddypress div.site.grid-container {
					    grid-template-columns: 250px 1fr;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h"
					                         "s m"
					                         "f f";
				  	}
			  	}

			  	@media (min-width: 880px) {
					body.buddypress div.site.grid-container {
						grid-template-columns: 300px 1fr;
					}
				}

		    </style>
		<?php

	}


	// What to do when only BP Sidebar is activated

	if (get_theme_mod( 'buddypress-sidebars' ) == "sidebar2-on") {

		?>
			<style type="text/css">

				body.buddypress #secondary {display: none;}

				body.buddypress .site.grid-container {
					min-height: 100vh;
					display: grid;
					grid-template-columns: 100%;
					grid-template-areas: "h"
					                     "m"
					                     "b"
					                     "f";
				}

				@media (min-width: 768px) {
					body.buddypress .site.grid-container {
					    grid-template-columns: 1fr 250px;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h"
					                         "m b"
					                         "f f";
					}
				}

				@media (min-width: 880px) {
					body.buddypress .site.grid-container {
						grid-template-columns: 1fr 300px;
					}
				}

			</style>
		<?php

	}

	// What to do when Both BP Sidebar and regular Sidebar are activated

	if ( get_theme_mod( 'buddypress-sidebars' ) == "sidebars-on" ) {

		?>
			<style type="text/css">
		
				body.buddypress .site.grid-container {
					  min-height: 100vh;
					  display: grid;
					  grid-template-columns: 100%;
					  grid-template-areas: "h"
					                       "m"
					                       "s"
					                       "b"
					                       "f";
				}

				body.buddypress #secondary {display: none}

				@media (min-width: 786px) {
					body.buddypress .site.grid-container {
					    grid-template-columns: 300px 1fr;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h"
					                         "b m"
					                         "f f";
					}
					body.buddypress #secondary {
						display: none;
					}
				}

				@media (min-width: 1080px) {
					body.buddypress .site.grid-container {
					    grid-template-columns: 250px 1fr 250px;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h h"
					                         "s m b"
					                         "f f f";
					}
					body.buddypress #secondary {
						display: block;
					}
				}

				@media (min-width: 1200px) {
					body.buddypress .site.grid-container {
						grid-template-columns: 300px 1fr 300px;
					}
				}
			 </style>
		<?php
	}

	// What to do when none of the sidebars are activated

	if ( get_theme_mod( 'buddypress-sidebars' ) == "sidebars-off" ) {

		?>
			<style type="text/css">
		
				body.buddypress #secondary {display: none;}
				body.buddypress #buddypress-sidebar {display: none;}

			 </style>
		<?php
	}

}

add_action ( 'wp_enqueue_scripts', 'buddypress_page_layout' );

/*	
	========================
		SITE IDENTITY
	========================
*/

	function buddybuildr_site_identity() {
	if ( !has_custom_logo() ) {
		echo '<h3 class="site-title kill_margin"><a href="'. esc_url( home_url( '/' ) ) .'"rel="home">'.get_bloginfo( 'name' ) .'</a></h3>';
	}
		else if ( !has_custom_logo && get_theme_mod( 'custom_header_text' ) != "" ) {
			echo 'TSUp'; 
		}
		else {
			echo '<a href="'. esc_url( home_url( '/' ) ) .'"rel="home"><img src="'. esc_url( $logo[0] ) .'"></a>';
		}
}

function buddybuildr_page_thumb() {
	if ( has_post_thumbnail() && !is_page_template( 'home-search.php' ) ) {
   		the_post_thumbnail();
   	}
   	if ( has_post_thumbnail() && is_page_template( 'home-search.php' ) ) {
   		// Do Nothing
   	}
   	else {
		// Do Nothing: No Thumbnail
   	}
}

// Search Template Text
function buddybuildr_search_heading() {

	if( get_theme_mod( 'custom_search_heading') != "" ) {
		echo get_theme_mod( 'custom_search_heading');
	}
	else {
		echo 'Welcome to our Search Page'; 
	}
}

function buddybuildr_search_subheading() {

	if( get_theme_mod( 'custom_search_subheading') != "" ) {
		echo get_theme_mod( 'custom_search_subheading');
	}
	else {
		//echo 'Some Text'; 
	}
}

function buddybuildr_search_placeholder() {

	if( get_theme_mod( 'custom_search_placeholder') != "" ) {
		echo get_theme_mod( 'custom_search_placeholder');
	}
	else {
		echo 'Im Looking for ...'; 
	}
}

function search_image_size() {
	if ( get_theme_mod( 'search-image-size' ) == "search-image-full" ) {
		?>
			<style type="text/css">
				.page-template .bb_home_search_container {
					padding: 200px 50px 350px;
				}
			</style>
		<?php
	}
}

add_action ( 'wp_enqueue_scripts', 'search_image_size' );

function search_image_size_refresh() {
	if ( get_theme_mod( 'search-image-size' ) == "search-image-full" ) {
		?>
			<style type="text/css">
				.page-template .bb_home_search_container {
					padding: 200px 50px 350px;
				}
				.page-template .bb_home_search_container.customize-partial-refreshing {
					padding: 200px 50px 350px;
				}
			</style>
		<?php
	}
}

add_action ( 'wp_enqueue_scripts', 'icon_two_display' );

function sticky_header_class_name($classes) {

	if ( get_theme_mod( 'sticky_header' )!= "" ) {
		$classes[] = 'sticky-header';
	} 

	// Return the $classes array
	return $classes;

}

add_filter('body_class','sticky_header_class_name');

/*
	==========================================
	 Custom Post Type
	==========================================
*/
function buddybuildr_custom_post_type (){
	
	$labels = array(
		'name' => 'App Page',
		'singular_name' => 'App Page',
		'add_new' => 'Add Item',
		'all_items' => 'All Items',
		'add_new_item' => 'Add Item',
		'edit_item' => 'Edit Item',
		'new_item' => 'New Item',
		'view_item' => 'View Item',
		'search_item' => 'Search App Page',
		'not_found' => 'No items found',
		'not_found_in_trash' => 'No items found in trash',
		'parent_item_colon' => 'Parent Item'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
		'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'revisions',
			'thumbnail'
		),
		'taxonomies' => array('category', 'post_tag'),
		'menu_position' => 5,
		'exclude_from_search' => false
	);
	register_post_type('app',$args);
}
add_action('init','buddybuildr_custom_post_type');

/* Search Header Size */

function buddybuildr_search_heading_size() {
	if ( get_theme_mod( 'search_heading_size' ) == false ) {
		echo '40';
	}
	else {
		echo get_theme_mod( 'search_heading_size');
	}
}


function one_post_shown() {
	global $wp_query; 
	$posts_shown = $wp_query->post_count;
	if ( $posts_shown == "1" ) {
		?>
			<style type="text/css">
				@media only screen and (min-width:768px) {
					.grid-item {
						max-width: 350px;
					}
				}
				
			</style>
		<?php
	}
}

/*
	==========================================
	 SEARCH VARIATIONS
	==========================================
*/

/* Search Variations Hook */

// Step 1
function variant_search_hook() {
	do_action('variant_search_hook');
}

// Step 2: Tag custom hook (Place the above function in theme template)

// Step 3
function search_changes() {
	echo '<h1>Hello WordPress!</h1>';
}
add_action('variant_search_hook', 'search_changes', 7);

/* Post type value */

function searchtemplate_post_type() {
	/* Do Nothing
	if( get_theme_mod( 'search_types') != "" ) {
		echo get_theme_mod( 'search_types');
	}*/
	/* Default */
	if( get_theme_mod( 'search_types') == "0" ) {
		echo '';
	}
	/* Posts */
	if( get_theme_mod( 'search_types') == "1" ) {
		echo 'posts';
	}
	/* Pages */
	if( get_theme_mod( 'search_types') == "2" ) {
		echo 'pages';
	}
	/* Any other post type */
	else {
		echo get_theme_mod( 'search_types');
	}
}

/*
	==========================================
	 THEME HOOKS
	==========================================
*/

/* Header Hooks */

function buddybuildr_header_hook() {

do_action('buddybuildr_header_hook');

}

/*	
	========================
		APP POST TYPE META
	========================
*/

/**
 * Add meta box
 *
 * @param post $post The post object
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/add_meta_boxes
 */
function app_add_meta_boxes( $post ){
	add_meta_box( 
		'app_meta_box', // $id
		 __( 'App Page Settings', 'Buddy_Buildr' ), // $title 
		'app_build_meta_box', // $callback
		'app', // $screen
		'side', // $context
		'low' // $priority
	);
}
add_action( 'add_meta_boxes', 'app_add_meta_boxes' );

/**
 * Build custom field meta box
 *
 * @param post $post The post object
 */
function app_build_meta_box( $post ){
	// make sure the form request comes from WordPress
	wp_nonce_field( basename( __FILE__ ), 'app_meta_box_nonce' );
	// retrieve the _app_nav current value
	$current_app_nav = get_post_meta( $post->ID, '_app_nav', true );
	// retrieve the _food_carbohydrates current value
	$current_description = get_post_meta( $post->ID, '_app_description', true );
	$themes = array( 'Light', 'Dark', 'Blue', 'Red' );
	
	// stores _app_themes array 
	$current_themes = ( get_post_meta( $post->ID, '_app_themes', true ) ) ? get_post_meta( $post->ID, '_app_themes', true ) : array();
	?>
	<div class='inside'>

		<h3><?php _e( 'In-App Navigation', 'Buddy_Buildr' ); ?></h3>
		<p>
			<input type="radio" name="appnav" value="0" <?php checked( $current_app_nav, '0' ); ?> /> Yes<br />
			<input type="radio" name="appnav" value="1" <?php checked( $current_app_nav, '1' ); ?> /> No
		</p>

		<h3><?php _e( 'Description', 'Buddy_Buildr' ); ?></h3>
		<p>
			<input type="text" name="description" value="<?php echo $current_description; ?>" /> 
		</p>

		<h3><?php _e( 'Themes', 'Buddy_Buildr' ); ?></h3>
		<p>
		<?php
		foreach ( $themes as $theme ) {
			?>
			<input type="checkbox" name="themes[]" value="<?php echo $theme; ?>" <?php checked( ( in_array( $theme, $current_themes ) ) ? $theme : '', $theme ); ?> /><?php echo $theme; ?> <br />
			<?php
		}
		?>
		</p>
	</div>
	<?php
}

/**
 * Store custom field meta box data
 *
 * @param int $post_id The post ID.
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
function app_save_meta_box_data( $post_id ){
	// verify meta box nonce
	if ( !isset( $_POST['app_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['app_meta_box_nonce'], basename( __FILE__ ) ) ){
		return;
	}
	// return if autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){
		return;
	}
  // Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ){
		return;
	}
	// store custom fields values
	// appnav string
	if ( isset( $_REQUEST['appnav'] ) ) {
		update_post_meta( $post_id, '_app_nav', sanitize_text_field( $_POST['appnav'] ) );
	}
	// store custom fields values
	// description string
	if ( isset( $_REQUEST['description'] ) ) {
		update_post_meta( $post_id, '_app_description', sanitize_text_field( $_POST['descrption'] ) );
	}
	// store custom fields values
	// themes array
	if( isset( $_POST['themes'] ) ){
		$themes = (array) $_POST['themes'];
		// sinitize array
		$themes = array_map( 'sanitize_text_field', $themes );
		// save data
		update_post_meta( $post_id, '_app_themes', $themes );
	}else{
		// delete data
		delete_post_meta( $post_id, '_app_themes' );
	}
}
add_action( 'save_post', 'app_save_meta_box_data' );

add_action( 'wp_head',    'wpdps_default_site_icon', 99 );
add_action( 'login_head', 'wpdps_default_site_icon', 99 );

function wpdps_default_site_icon()
{
    if ( ! has_site_icon()  && ! is_customize_preview() ) {
		$default_icon_url = get_template_directory_uri() . '/assets/images/favicon.ico';
    	echo '<link rel="icon" type="image/x-icon" href="' . $default_icon_url .'">';
    }
} 