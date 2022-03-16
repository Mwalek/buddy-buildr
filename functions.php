<?php

/**
 * Load all BuddyBuildr Assets
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Buddybuildr Theme Support functions
 */
require get_template_directory() . '/inc/theme-support.php';

/**
 * Buddybuildr Membership functions
 */
require get_template_directory() . '/inc/membership.php';

/**
 * Custom template tags for The Framework
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 * @since Buddy Buildr 1.0
 */

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/range.php';
require get_template_directory() . '/inc/customizer-textblocks.php';