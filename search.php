<?php
/**
 * The template for displaying search results pages.
 * @package WordPress
 * @subpackage Buddy_BUildr
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'buddy-buildr' ), get_search_query() ); ?></h1>
			</header><!-- .page-header -->

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>

				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'templates/parts/content', 'search' );

			// End the loop.
			endwhile;

			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'buddy-buildr' ),
				'next_text'          => __( 'Next page', 'buddy-buildr' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'buddy-buildr' ) . ' </span>',
			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'templates/parts/content-none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php
get_template_part( 'templates/parts/offcanvas' );
 get_footer(); ?>
