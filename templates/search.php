<?php

/*
Template Name: Search
*/

buddybuildr_header_switcher(); ?>

<?php if ( has_post_thumbnail() ) {
	$backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
} else { 
//$backgroundImg = "$tempdirectory/images/default-image.jpg";
$directory = get_template_directory_uri();
//$backgroundImg[0] = "$tempdirectory/images/search.jpg";
$backgroundImg[0] = "$directory/images/default.png"; 
} 
?>
<div id="bb_home_search_container" style="background-image: url('<?php echo $backgroundImg[0]; ?>'); background-position: center; background-size: cover; background-repeat: no-repeat;">
	<div class="bb_home_search_container" style="background: rgba(0,0,0,.32);">
		 <h2 id="search-heading" class="search-heading"><?php buddybuildr_search_heading(); ?></h2>
		 <h3 id="search-subheading" class="search-subheading"><?php buddybuildr_search_subheading(); ?></h3>
		<div class="home-sc">
	    	<div class="home-sb" id="SBox">
	    		<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
		    		<label>
				        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
				        <input type="search" class="search-field"
				        	id="search"
				            placeholder="<?php buddybuildr_search_placeholder(); ?>"
				            value="<?php echo get_search_query() ?>" name="s"
				            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
				    </label>
		    		<input type="submit" class="search-submit also search-link" value="&#xf002" />
		    		<input type="hidden" value="<?php searchtemplate_post_type(); ?>" name="post_type" />
		    		<?php variant_search_hook(); ?>
		    	</form>
	      	</div><!-- .home-sb -->
		</div><!-- .home-sc -->
	</div><!-- .bb_home_search_container -->
</div><!-- #bb_home_search_container -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'templates/parts/content', 'home-search' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php
get_template_part( 'templates/parts/offcanvas' );
get_footer();
