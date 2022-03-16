<?php

/**
 * The template for displaying pages with a sidebar
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Buddy_Buildr
 * Template Name: Sidebar
 */

buddybuildr_header_switcher(); ?>

		<div id="primary" class="content-area">
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
		</div><!-- #primary -->
		<?php get_sidebar(); ?>

<?php
get_template_part( 'templates/parts/offcanvas' );
get_footer();
