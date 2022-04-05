<?php

?>

<div id="lSidenav" class="sidenav lsidenav  rabbitjack">
  <button onclick="LeftNav()" class="styless-button offcanvas-close">Close Menu</button>
  <nav id="mobile-navigation" class="main-mobile-navigation" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'main' ) ); ?>
  </nav>
</div><!-- #lSidenav -->

<div id="Rsidenav" class="sidenav rsidenav">

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

  <div id="notifications_container" class="notifications_container">
    <?php buddybuildr_notifications_menu() ?>
  </div><!-- .notifications_container -->

</div><!-- #Rsidenav -->

<!-- MODAL STARTS -->

<input class="modal-state" id="modal-1" type="checkbox" />
<div class="modal">
  <label class="modal__bg" for="modal-1"></label>
  <div class="modal__inner">
    <label class="modal__close" for="modal-1"></label>
    <h2>Login</h2>
    <?php $redirect_to = '';?>
    <div class="bb-login">
    <form name="loginform" id="loginform" action="<?php echo site_url( '/wp-login.php' ); ?>" method="post">
    <p class="fieldset"><input class="full-width has-padding has-border" id="user_login" type="text" size="20" value="" name="log" placeholder=" Username / E-mail"></p>
    <p class="fieldset"><input class="full-width has-padding" id="user_pass" type="password" size="20" value="" name="pwd" placeholder="Password"></p>
    <p class="fieldset"><input id="rememberme" type="checkbox" value="forever" name="rememberme"> Remember me</p>
    <p class="fieldset"><input class="full-width bb-curves bb-login-submit" id="wp-submit" type="submit" value="Login" name="wp-submit"></p>
    <input type="hidden" value="<?php echo esc_attr( $redirect_to ); ?>" name="redirect_to">
    <input type="hidden" value="1" name="testcookie">
    </form>
  </div><!--.bb-login-->
    <div class="signing_links">
      New here? <a href="<?php echo site_url('/wp-login.php?action=register&redirect_to=' . get_permalink());?>">Sign Up</a> | Lost Password?<a href="<?php echo wp_lostpassword_url(); ?>" title="Lost Password"> Get a new one</a>
    </div>
  </div>
</div>

<!-- MODAL ENDS -->
