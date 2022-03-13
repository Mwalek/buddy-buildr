<?php

/**
 * 404 Page (Not Found) Template
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package M5_TFW
 */

get_header(); ?>

		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="content404">
					<h1 class="page-title"><?php _e( '404 Error', 'buddy-buildr' ); ?></h1>
					<p><?php _e( 'Sorry, that page cannot be found. Please use one of the links below to get around.', 'buddy-buildr' ); ?></p>
					<ul class="error-links">
                      <li><a href="<?php echo home_url(); ?> ">Home</a></li>
                      <li> 
                      	<?php
if ( get_option( 'page_for_posts' ) ) {
   echo '<a href="'.esc_url(get_permalink( get_option( 'page_for_posts' ) )).'">'.esc_html__( 'Popular Posts', 'buddy-buildr' ).'</a>';
} else {
   echo '<a href="'.esc_url( home_url( '/' ) ).'">'.esc_html__( 'Popular Posts', 'buddy-buildr' ).'</a>';
}
?>
                      </li>                      
                 </ul>
				</div><!-- .404-wrap -->

			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_template_part( 'templates/parts/offcanvas' );
get_footer();
