<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package    WordPress
 * @subpackage Buddy_Buildr
 */

buddybuildr_header_switcher(); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

            <ul class="grid-wrap" id="grid-wrap">

                <!-- WP LOOP STARTS HERE -->
                <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>

                    <!-- LIST ITEM FOR EACH POST -->
                    <li <?php post_class('grid-item'); ?> id="post-<?php the_ID(); ?>">

                        <!-- FEATURED IMAGE FOR THE POST -->
                        <div class="grid-item-image">

                        <?php if (has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('large'); ?></a>
                                <?php else: ?>
                                <a href="<?php the_permalink(); ?>"><div class="grid-item-df-img"><?php get_template_part('images/lens.svg');?></div></a>
                                <?php endif; ?>

                            <div class="video_art media_art" >
                        <?php get_template_part('images/play.svg');?><br>
                                <span>Play Video</span>
                            </div>

                            <div class="audio_art media_art" >
                        <?php get_template_part('images/music.svg');?><br>
                                <span>Play Audio</span>
                            </div>

                            <div class="gallery_art media_art" >
                        <?php get_template_part('images/picture.svg');?><br>
                                <span>View Gallery</span>
                            </div>

                        </div>
                        <div class="grid-item-content">
                        <!-- POST TITLE -->
                        <span class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>

                        <!-- POST METADATA -->
                        <p class="author-text">
                            <span class="posted-on"><span class="fas fa-calendar fa-fw" aria-hidden="true"></span><?php echo the_time('F jS, Y');?></span><span class="byline"><span class="fas fa-user-circle fa-fw" aria-hidden="true"></span><?php the_author_posts_link(); ?></span> </p>            
                        <!-- POST EXCERPT
                        <?php the_excerpt(); ?> -->
                        </div><!-- .grid-item-content -->
                        

                <?php endwhile; ?>
                <?php endif; ?>

                    <!-- END OF THE LIST ITEM -->
                    </li>

                <!-- <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>></div> -->
                

            <!-- END OF THE GRID CONTAINER -->      
            </ul>

            <?php // Previous/next page navigation.
            the_posts_pagination(
                array(
                'prev_text'          => __('Previous page', 'buddy-buildr'),
                'next_text'          => __('Next page', 'buddy-buildr'),
                'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('Page', 'buddy-buildr') . ' </span>',
                ) 
            ); ?>

            <?php one_post_shown(); ?>

            </main><!-- .site-main -->
        </div><!-- .content-area -->

<?php 
get_template_part('templates/parts/offcanvas');
get_footer();
