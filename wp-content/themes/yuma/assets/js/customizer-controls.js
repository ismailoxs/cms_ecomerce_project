/**
 * Scripts within the customizer controls window.
 *
 */

jQuery( document ).ready(function($) {

    /********* Chosen Select Custom control ***********/
    $(".yuma-chosen-select").chosen({
        width: "100%"
    });
    
});

( function( api ) {
    // Deep linking for menus
    wp.customize.bind('ready', function() {
        jQuery('a.menu_locations').click(function(e) {
            e.preventDefault();
            wp.customize.section( 'menu_locations' ).focus()
        });
    });
} )( wp.customize );

//Update tab content
function yuma_customize_tab( $element ) {
    wp.customize.bind('ready', function() {
        var elementList = jQuery('#'+$element).find('label');

        if ( jQuery('#'+$element).css('display') !== 'none' ) {
            var prev = jQuery('#'+$element).find('label.customizer-tab-active').data('key');
            jQuery('#customize-controls li[id*="' + prev + '"]').addClass( 'customizer-active' );
        }

        jQuery('#'+$element).find('label').on('click', function(e) {
            var current = jQuery(this).data('key');
            jQuery(this).siblings().removeClass('customizer-tab-active');
            jQuery(this).addClass('customizer-tab-active');
            jQuery.each( elementList, function( i, val ) {
                var key = jQuery(val).data('key');
                jQuery('#customize-controls li[id*="' + key + '"]').removeClass( 'customizer-active' );
            } )
            jQuery('#customize-controls li[id*="' + current + '"]').addClass( 'customizer-active' );
        });

    });
}

( function( api ) {
    yuma_customize_tab( 'customize-control-yuma_theme_options-topbar_element_location' );
    yuma_customize_tab( 'customize-control-yuma_theme_options-header_element_location' );
    yuma_customize_tab( 'customize-control-yuma_theme_options-navbar_element_location' );
    yuma_customize_tab( 'customize-control-yuma_theme_options-footer_element_location' );
} )( wp.customize );


//close header elements
function yuma_customize_close_active_elements( $element ) {
    wp.customize.bind('ready', function() {
        jQuery( '#customize-control-yuma_theme_options-enable_' + $element ).on('change', function(){
            if ( jQuery( '#customize-control-yuma_theme_options-'+ $element +'_left_element, #customize-control-yuma_theme_options-'+ $element +'_center_element, #customize-control-yuma_theme_options-'+ $element +'_right_element' ).hasClass( 'customizer-active' ) ) {
                jQuery( '#customize-control-yuma_theme_options-'+ $element +'_left_element, #customize-control-yuma_theme_options-'+ $element +'_center_element, #customize-control-yuma_theme_options-'+ $element +'_right_element' ).removeClass( 'customizer-active' );
            } else {
                var active_tab = jQuery( '#customize-control-yuma_theme_options-'+ $element +'_element_location' ).find('label.customizer-tab-active').data('key');
                jQuery( '#customize-control-yuma_theme_options-'+ active_tab ).addClass( 'customizer-active' );
            }
        });
    });
}

( function( api ) {
    yuma_customize_close_active_elements( 'topbar' );
    yuma_customize_close_active_elements( 'header' );
    yuma_customize_close_active_elements( 'navbar' );
    yuma_customize_close_active_elements( 'footer' );
} )( wp.customize );

