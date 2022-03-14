<?php

?>

<div id="Lsidenav" class="sidenav lsidenav  rabbitjack">
  <a href="javascript:void(0)" class="" onclick="LeftNav()">Close Menu</a>
  <nav id="mobile-navigation" class="main-mobile-navigation" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
  </nav>
</div><!-- #Lsidenav -->

<div id="Rsidenav" class="sidenav rsidenav jackrabbit">

  <div id="community_container" class="community_container">
    <div class="side-search"><?php get_search_form(); ?></div>
    <div id="my_community_header"><h3 id="MCH_title" class="kill_margin fa fa-lg fa-comment"><?php echo get_bloginfo( 'name' ); ?> Community</h3></div>
    <div class="community_menu">
  	  <?php if ( class_exists('Buddypress')) : ?>
        <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
        <a href="<?php buddybuildr_bp_user_link() ?>settings/" class="fa fa-lg fa-cog fw900">Settings</a>
    <?php endif ?>

    <?php if ( class_exists('Buddypress') && bp_is_active('messages') ) : ?> 
      <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php buddybuildr_message_count() ?></a>
    <?php endif ?>

    <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
    </div><!-- .community_menu -->
  </div><!-- .community_container -->

  <div id="notifications_container" class="notifications_container" style="display:none;">
    <?php buddybuildr_notifications_menu() ?>
  </div><!-- .notifications_container -->

</div><!-- #Rsidenav -->
