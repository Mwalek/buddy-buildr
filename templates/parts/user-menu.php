<?php 

 ?>

 <div class="community_menu">
  	  <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
      <a href="<?php buddybuildr_bp_user_link() ?>notifications/" class="fa fa-lg fa-bell">Notifications <?php if( class_exists( 'Buddypress' ) ) { echo '<span class="alert_count">' . bp_notifications_get_unread_notification_count(bp_loggedin_user_id()) . '</span>';} ?></a>
  	  <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php if (function_exists('messages_get_unread_count')) {echo '<span class="alert_count">' . messages_get_unread_count( get_current_user_id() ) . '</span>';} ?></a>
  	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
    </div><!-- .community_menu -->

<div class="community_menu">
	<?php
		if ( class_exists('Buddypress')) {
	  	  <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
	      <a href="<?php buddybuildr_bp_user_link() ?>notifications/" class="fa fa-lg fa-bell">Notifications <?php if( class_exists( 'Buddypress' ) ) { echo '<span class="alert_count">' . bp_notifications_get_unread_notification_count(bp_loggedin_user_id()) . '</span>';} ?></a>
	  	  <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php if (function_exists('messages_get_unread_count')) {echo '<span class="alert_count">' . messages_get_unread_count( get_current_user_id() ) . '</span>';} ?></a>
	  	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
  	  	}
  	?>
</div><!-- .community_menu -->

<div class="community_menu">
	<?php
		if ( class_exists('Buddypress')) {
	  	  <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
	      <a href="<?php buddybuildr_bp_user_link() ?>settings/" class="fa fa-lg fa-cog">Settings</a>
	  	  <?php if (bp_is_active('messages')) { <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php buddybuildr_message_count() ?></a> } ?>
	  	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
  	  	}
  	?>
</div><!-- .community_menu -->

<div class="community_menu">
	<?php if ( class_exists('Buddypress')) : ?>
	  	  <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
	      <a href="<?php buddybuildr_bp_user_link() ?>settings/" class="fa fa-lg fa-cog">Settings</a>
	  	  <?php if (bp_is_active('messages')) { <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php buddybuildr_message_count() ?></a> } ?>
	  	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
  	  	}
  	<?php endif ?>
</div><!-- .community_menu -->

<div class="community_menu">
	<?php if ( class_exists('Buddypress')) : ?>
	  	  <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
	      <a href="<?php buddybuildr_bp_user_link() ?>settings/" class="fa fa-lg fa-cog">Settings</a>
	  	  <?php if (bp_is_active('messages')) { <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php buddybuildr_message_count() ?></a> } ?>
	  	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
  	  	}
  	<?php endif ?>
</div><!-- .community_menu -->

<div class="community_menu">
	<?php if ( class_exists('Buddypress')) : ?>
	  	  <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
	      <a href="<?php buddybuildr_bp_user_link() ?>settings/" class="fa fa-lg fa-cog">Settings</a>
	<?php endif ?>
	<?php if (bp_is_active('messages')) { <a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php buddybuildr_message_count() ?></a> } ?>
	  	  <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
  	  	}
  	<?php endif ?>
</div><!-- .community_menu -->

<div class="community_menu">

  	<?php if ( class_exists('Buddypress')) : ?>
        <a href="<?php buddybuildr_bp_user_link() ?>" class="fa fa-lg fa-user">Profile</a>
        <a href="<?php buddybuildr_bp_user_link() ?>settings/" class="fa fa-lg fa-cog">Settings</a>
  	<?php endif ?>

  	<?php if (bp_is_active('messages')) : ?> 
  		<a id="user-messages" href="<?php buddybuildr_bp_user_link() ?>messages/" class="fa fa-lg fa-inbox fw900">Messages <?php buddybuildr_message_count() ?></a>
  	<?php endif ?>

    <a href="<?php echo wp_logout_url(get_permalink()); ?>" class="fa fa-lg fa-sign-out-alt fw900">Logout</a>
    
    </div><!-- .community_menu -->