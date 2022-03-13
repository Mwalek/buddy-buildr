<?php if( current_user_can( 'manage_options' ) ): ?>

<ul class="p15">                  
    <li><a href="<?php echo admin_url('nav-menus.php'); ?>"><?php esc_html_e( 'Set up your menu', 'buddy-buildr' ); ?></a></li>
</ul>

<?php else: ?>

	<p class="p15">Built by <a href="//www.mwale.me" target="_blank" style="text-decoration: none;">Mwale</a></p>

<?php endif ?>