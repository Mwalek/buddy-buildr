( function( $ ) {

    wp.customize( 'header_background_color', function( value ) {
		value.bind( function( newval ) {
			$( '.header-wrapper' ).css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'header_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-header-item' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'header_color', function( value ) {
		value.bind( function( newval ) {
			$( '.site-header-item a' ).css( 'color', newval );
		} );
	} );
	
	wp.customize( 'hamburger_color', function( value ) {
		value.bind( function( newval ) {
			$( '.hamburger div' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'search_heading_color', function( value ) {
		value.bind( function( newval ) {
			$( '.search-heading' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'search_subheading_color', function( value ) {
		value.bind( function( newval ) {
			$( '.search-subheading' ).css( 'color', newval );
		} );
	} );

	wp.customize( 'login_button_background_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logged-out .login' ).css( 'background-color', newval );
		} );
	} );
	
	wp.customize( 'login_button_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logged-out .login' ).css( 'color', newval );
		} );
	} );
	
	wp.customize( 'register_button_background_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logged-out .register' ).css( 'background-color', newval );
		} );
	} );

	wp.customize( 'register_button_color', function( value ) {
		value.bind( function( newval ) {
			$( '.logged-out .register' ).css( 'background-color', newval );
		} );
	} );

	// Update the search header size in real time...
	wp.customize( 'search_heading_size', function( value ) {
		value.bind( function( newval ) {
			$( '.search-heading' ).css( 'font-size', newval +'px' );
		} );
	} );

	/* Text Blocks

	wp.customize( 'search_text_block', function( value ) {
    	value.bind( function( to ) {
        	$( '.search-heading' ).text( to );
        } );
    } );*/

    // Update the site title in real time...

    // Update the search heading in real time...
	wp.customize( 'custom_search_heading', function( value ) {
		value.bind( function( newval ) {
			$( '.search-heading' ).html( newval );
		} );
	} );

	// Update the search subheading in real time...
	wp.customize( 'custom_search_subheading', function( value ) {
		value.bind( function( newval ) {
			$( '.search-subheading' ).html( newval );
		} );
	} );

	// Update the search placeholder in real time...
	wp.customize( 'custom_search_placeholder', function( value ) {
		value.bind( function( newval ) {
			$( '.search-field' ).attr("placeholder", newval );
		} );
	} );

	wp.customize( 'search-image-size', function( value ) {
		value.bind( function( newval ) {
			$( '.page-template .bb_home_search_container' ).css( 'padding', newval );
		} );
	} );


	
} )( jQuery );