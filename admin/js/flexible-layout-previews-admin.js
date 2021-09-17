(function( $ ) {
	'use strict';

	/**
	 * Add the required html/attributes needed to display previews
	 * inside the ACF Popup.
	 */
	$( document ).on( 'click', 'a[data-name="add-layout"]', function() {
		$( 'span.es-acf-fc-preview' ).each( function( index, el ) {
			var preview = $( el ).data( 'preview' );
			var layout = $( el ).data( 'layout' );

			if ( preview ) {
				$( '.acf-fc-popup ul li a[data-layout="' + layout + '"]' ).attr( 'data-preview', preview );
			}
		} );

		$( '.acf-fc-popup' ).append( '<div class="es-acf-fc-image-wrap no-preview"><img src="" alt=""/></div>' );
		} );

	/**
	 * User hovers on the flexible layout inside the ACF Popup.
	 */
	$( document ).on( 'mouseenter', '.acf-fc-popup ul li a', function() {
		var preview = $( this ).data( 'preview' );

		if ( preview ) {
			$( '.es-acf-fc-image-wrap' ).addClass( 'preview-visible' );
			$( '.es-acf-fc-image-wrap img' ).attr( 'src', preview );
		}
	});

	/**
	 * User stops hovering the flexible layout inside the ACF Popup
	 */
	$( document ).on( 'mouseleave', '.acf-fc-popup ul li a', function() {
		$( '.es-acf-fc-image-wrap' ).removeClass( 'preview-visible' );
		$( '.es-acf-fc-image-wrap img' ).attr( 'src', '' );
	});

})( jQuery );
