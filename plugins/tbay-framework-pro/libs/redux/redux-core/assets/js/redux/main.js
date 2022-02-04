/* global redux, document */

(function( $ ) {
	'use strict';

	$.redux = $.redux || {};

	$( document ).ready(
		function() {
			var opt_name;
			var li;

			var tempArr = [];

			$.fn.isOnScreen = function() {
				var win;
				var viewport;
				var bounds;

				if ( ! window ) {
					return;
				}

				win = $( window );
				viewport = {
					top: win.scrollTop()
				};

				viewport.right = viewport.left + win.width();
				viewport.bottom = viewport.top + win.height();

				bounds = this.offset();

				bounds.right = bounds.left + this.outerWidth();
				bounds.bottom = bounds.top + this.outerHeight();

				return ( ! ( viewport.right < bounds.left || viewport.left > bounds.right || viewport.bottom < bounds.top || viewport.top > bounds.bottom ) );
			};

			$( 'fieldset.redux-container-divide' ).css( 'display', 'none' );

			// Weed out multiple instances of duplicate Redux instance.
			if ( redux.customizer ) {
				$( '.wp-full-overlay-sidebar' ).addClass( 'redux-container' );
			}

			$( '.redux-container' ).each(
				function() {
					opt_name = $.redux.getOptName( this );

					if ( $.inArray( opt_name, tempArr ) === -1 ) {
						tempArr.push( opt_name );
						$.redux.checkRequired( $( this ) );
						$.redux.initEvents( $( this ) );
					}
				}
			);

			$( '.redux-container' ).on(
				'click',
				function() {
					opt_name = $.redux.getOptName( this );
				}
			);

			if ( undefined !== redux.optName ) {
				$.redux.disableFields();
				$.redux.hideFields();
				$.redux.disableSections();
				$.redux.initQtip();
				$.redux.tabCheck();
				$.redux.notices();
			}
		}
	);

	$.redux.disableSections = function() {
		$( '.redux-group-tab' ).each(
			function() {
				if ( $( this ).hasClass( 'disabled' ) ) {
					$( this ).find( 'input, select, textarea' ).attr( 'name', '' );
				}
			}
		);
	};

	$.redux.disableFields = function() {
		$( 'label[for="redux_disable_field"]' ).each(
			function() {
				$( this ).parents( 'tr' ).find( 'fieldset:first' ).find( 'input, select, textarea' ).attr( 'name', '' );
			}
		);
	};

	$.redux.hideFields = function() {
		$( 'label[for="redux_hide_field"]' ).each(
			function() {
				var tr = $( this ).parent().parent();

				$( tr ).addClass( 'hidden' );
			}
		);
	};

	$.redux.getOptName = function( el ) {
		var metabox;
		var li;
		var optName;
		var item = $( el );

		if ( redux.customizer ) {
			optName = item.find( '.redux-customizer-opt-name' ).data( 'opt-name' );
		} else {
			optName = $( el ).parents( '.redux-wrap-div' ).data( 'opt-name' );
		}

		// Compatibility for metaboxes
		if ( undefined === optName ) {
			metabox = $( el ).parents( '.postbox' );
			if ( 0 === metabox.length ) {
				metabox = $( el ).parents( '.redux-metabox' );
			}
			if ( 0 !== metabox.length ) {
				optName = metabox.attr( 'id' ).replace( 'redux-', '' ).split( '-metabox-' )[0];
				if ( undefined === optName ) {
					optName = metabox.attr( 'class' )
					.replace( 'redux-metabox', '' )
					.replace( 'postbox', '' )
					.replace( 'redux-', '' )
					.replace( 'hide', '' )
					.replace( 'closed', '' )
					.trim();
				}
			} else {
				optName = $( '.redux-ajax-security' ).data( 'opt-name' );
			}
		}
		if ( undefined === optName ) {
			optName = $( el ).find( '.redux-form-wrapper' ).data( 'opt-name' );
		}

		// Shim, let's just get an opt_name shall we?!
		if ( undefined === optName ) {
			optName = redux.opt_names[0];
		}

		if ( undefined !== optName ) {
			redux.optName = window['redux_' + optName.replace( /\-/g, '_' )];
		}

		return optName;
	};

	$.redux.getSelector = function( selector, fieldType ) {
		if ( ! selector ) {
			selector = '.redux-container-' + fieldType + ':visible';
			if ( redux.customizer ) {
				selector = $( document ).find( '.control-section-redux.open' ).find( selector );
			} else {
				selector = $( document ).find( '.redux-group-tab:visible' ).find( selector );
			}
		}
		return selector;
	};
})( jQuery );