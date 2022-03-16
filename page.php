<?php

/**
 * The template for displaying all pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Buddy_Buildr
 */

buddybuildr_header_switcher(); ?>

		<div id="primary" class="content-area">
			<?php
// action hook for any content placed before the content, including the widget area
do_action ( 'buddybuildr_before_content' );
?>
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'templates/parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
			<?php
// action hook for any content placed after the content, including the widget area
do_action ( 'buddybuildr_after_content' );
?>
		</div><!-- #primary -->

<?php
get_template_part( 'templates/parts/offcanvas' );
get_footer();
