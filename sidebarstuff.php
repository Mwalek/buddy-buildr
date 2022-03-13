<?php

function buddypress_page_layout() {

	// What to do when only BP Sidebar is activated

	if (get_theme_mod( 'buddypress-sidebars' ) == "sidebar2-on") {

		?>
			<style type="text/css">

				body.buddypress .grid-container {
					min-height: 100vh;
					display: grid;
					grid-template-columns: 100%;
					grid-template-areas: "h"
					                     "m"
					                     "b"
					                     "f";
				}

				@media (min-width: 768px) {
					body.buddypress .grid-container {
					    grid-template-columns: 1fr 250px;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h"
					                         "m b"
					                         "f f";
					}
				}

			</style>
		<?php

	}

	// What to do when only Regular Sidebar is activated

	if (get_theme_mod( 'buddypress-sidebars' ) == "sidebar1-on") {

		?>
			<style type="text/css">

				body.buddypress .grid-container {
					min-height: 100vh;
					display: grid;
					grid-template-columns: 100%;
					grid-template-areas: "h"
					                     "m"
					                     "s"
					                     "f";
				}

				@media (min-width: 768px) {
					body.buddypress .grid-container {
					    grid-template-columns: 250px 1fr;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h"
					                         "s m"
					                         "f f";
				  	}
			  	}

		    </style>
		<?php

	}

	// What to do when Both BP Sidebar and regular Sidebar are activated

	if ( get_theme_mod( 'buddypress-sidebars' ) == "sidebars-on" ) {

		?>
			<style type="text/css">
		
				body.buddypress .grid-container {
					  min-height: 100vh;
					  display: grid;
					  grid-template-columns: 100%;
					  grid-template-areas: "h"
					                       "m"
					                       "s"
					                       "b"
					                       "f";
				}

				@media (min-width: 768px) {
					body.buddypress .grid-container {
					    grid-template-columns: 250px 1fr 250px;
					    grid-template-rows: auto 1fr auto;
					    grid-template-areas: "h h h"
					                         "s m b"
					                         "f f f";
					}
				}
			 </style>
		<?php
	}

}

add_action ( 'wp_enqueue_scripts', 'buddypress_page_layout' );

<?php if ( is_active_sidebar( 'sidebar-2' ) && get_theme_mod( 'buddypress-sidebars' ) != 'sidebars-off') : ?>

	<aside id="buddypress-sidebar" class="buddypress-widget-area">
		<div class="buddypress-widget-container">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	</aside><!-- #secondary -->

<?php endif; ?>

if(($apple==1 || $orange==2) && cake==0)
<?php if ( ( is_active_sidebar( 'sidebar-2' ) || get_theme_mod( 'buddypress-sidebars' ) != 'sidebars-off') && get_theme_mod( 'buddypress-sidebars' ) != false) : ?>