/*------------------------------------------------
            PRELOADER
------------------------------------------------*/
window.onload = function() {
    var loader_container = jQuery('#preloader');
    var loader = jQuery('#loader');
    loader_container.fadeOut();
    loader.fadeOut("slow");
};

jQuery(document).ready(function($) {

/*------------------------------------------------
            DECLARATIONS
------------------------------------------------*/

    var scroll = $(window).scrollTop();  
    var scrollup = $('.backtotop');
    var scrollup_target = $('.backtotop .btt-inner-wrapper');
    var menu_toggle = $('.menu-toggle');
    var secondary_menu_toggle = $('.secondary-menu-toggle');
    var navbar_menu_toggle = $('.navbar-menu-toggle');
    var dropdown_toggle = $('.main-navigation button.dropdown-toggle');
    var nav_menu = $('#site-navigation ul.nav-menu');
    var secondary_menu = $('#secondary-navigation ul.nav-menu');
    var navbar_menu = $('#navbar-navigation ul.nav-menu');
    var banner_slider = $('.banner-slider');
    var related_gallery_slider = $('.related-gallery-slider');
    var masonry_gallery = $('.grid');

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 1) {
            scrollup.css({bottom:"10%"});
        } 
        else {
            scrollup.css({bottom:"-200px"});
        }
    });

    scrollup_target.on('click', function() {
        $('html, body').animate({scrollTop: '0px'}, 800);
        return false;
    });

/*------------------------------------------------
                MENU, STICKY MENU AND SEARCH
------------------------------------------------*/

    $('#top-menu .topbar-menu-toggle').click(function(e){
        e.preventDefault();
        $('#top-menu .wrapper').slideToggle();
        $('#top-menu').toggleClass('top-menu-active');
    });

    menu_toggle.on('click', function(){
        nav_menu.slideToggle();
       $('#site-navigation').toggleClass('menu-open');
    });

    secondary_menu_toggle.on('click', function(){
        secondary_menu.slideToggle();
       $('#secondary-navigation').toggleClass('menu-open');
    });

    navbar_menu_toggle.on('click', function(){
        navbar_menu.slideToggle();
       $('#navbar-navigation').toggleClass('menu-open');
    });

    dropdown_toggle.on('click', function() {
        $(this).toggleClass('active');
       $(this).parent().find('.sub-menu').first().slideToggle();
    });

    $(window).scroll(function() {
        if ($(this).scrollTop() > 290) {
            $('.site-header.sticky-header').fadeIn();
            if ($('.site-header').hasClass('sticky-header')) {
                $('.site-header.sticky-header').addClass('nav-shrink');
                $('.site-header.sticky-header').fadeIn();
            }
        } 
        else {
            $('.site-header.sticky-header').removeClass('nav-shrink');
        }
    });

    $('a.search').on('click', function(e) {
        e.preventDefault();
        $('#search').toggleClass('search-open');
        $('#search .search-field').focus();
    });

    var searchClose = true;
    $('#search form').hover(function(){ 
        searchClose=false; 
    }, function(){ 
        searchClose=true; 
    });
    $('#search').on('click', function() { 
        if ( searchClose ) {
            $(this).toggleClass('search-open');
        }
    });

    /*--------------------------------------------------------------
     Keyboard Navigation
    ----------------------------------------------------------------*/
    if( $(window).width() < 1024 ) {
        $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
                $('#navbar').find('.menu-toggle').focus();
            }
        });
    }
    else {
        $( '#primary-menu li:last-child' ).unbind('keydown');
    }

    if( $(window).width() < 1024 ) {
        $('#secondary-menu').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.secondary-menu-toggle').focus();
            }
        });
    }
    else {
        $( '#secondary-menu li:last-child' ).unbind('keydown');
    }

    if( $(window).width() < 1024 ) {
        $('#navbar-navigation').find("li").last().bind( 'keydown', function(e) {
            if( e.which === 9 ) {
                e.preventDefault();
                $('#navbar').find('.navbar-menu-toggle').focus();
            }
        });
    }
    else {
        $( '#navbar-navigation li:last-child' ).unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            $('#primary-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                    $('#navbar').find('.menu-toggle').focus();
                }
            });
        }
        else {
            $( '#primary-menu li:last-child' ).unbind('keydown');
        }

        if( $(window).width() < 1024 ) {
            $('#secondary-menu').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.secondary-menu-toggle').focus();
                }
            });
        }
        else {
            $( '#secondary-menu li:last-child' ).unbind('keydown');
        }

        if( $(window).width() < 1024 ) {
            $('#navbar-navigation').find("li").last().bind( 'keydown', function(e) {
                if( e.which === 9 ) {
                    e.preventDefault();
                    $('#navbar').find('.navbar-menu-toggle').focus();
                }
            });
        }
        else {
            $( '#navbar-navigation li:last-child' ).unbind('keydown');
        }
    });

    $('#search').on('keydown', function(e) {
        tabKey = e.keyCode;
        shiftKey = e.shiftKey;
        if ( tabKey === 27 ) {
            e.preventDefault();
            $(this).removeClass('search-open');
        };

        if ( tabKey === 9 ) {
            e.preventDefault();
            if ( $("#search input").is(":focus") ) {
                $(this).find('button').focus();
            }
        };

        if ( shiftKey && tabKey === 9 ) {
            if ( $("#search button").is(":focus") ) {
                $(this).find('input').focus();
            }
        }
    });

    $('#site-navigation').on('keydown', function(e) {
        tabKey = e.keyCode === 9;
        shiftKey = e.shiftKey;
        if( $('#site-navigation').hasClass('menu-open') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                nav_menu.slideUp();
                $('#site-navigation').removeClass('menu-open');
            };
        }
    });

    $('#secondary-navigation').on('keydown', function(e) {
        tabKey = e.keyCode === 9;
        shiftKey = e.shiftKey;
        if( $('#secondary-navigation').hasClass('menu-open') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                secondary_menu.slideUp();
                $('#secondary-navigation').removeClass('menu-open');
            };
        }
    });

    $('#navbar-navigation').on('keydown', function(e) {
        tabKey = e.keyCode === 9;
        shiftKey = e.shiftKey;
        if( $('#navbar-navigation').hasClass('menu-open') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                navbar_menu.slideUp();
                $('#navbar-navigation').removeClass('menu-open');
            };
        }
    });

/*------------------------------------------------
                WOOCART ACTIVE
------------------------------------------------*/
$( 'div.mini-cart a.cart-contents' ).on( 'click', function(e) {
    e.preventDefault();
    $(this).parent('div.mini-cart').toggleClass('active');
} );

/*------------------------------------------------
                OFF CANVAS
------------------------------------------------*/
$('#off-canvas-area').find('a').last().addClass('off-canvas-last');
$('a.off-canvas-bar').on( 'click', function(event){
    event.preventDefault();
    $('#off-canvas-area').addClass('active');
} );

$('span.off-canvas-close').on( 'click', function(){
    $('#off-canvas-area').removeClass('active');
} );

$('#off-canvas-area').on( 'keydown', function(e) {
    tabKey = e.keyCode;
    shiftKey = e.shiftKey;
    if ( tabKey === 9 ) {
        if ( $('#off-canvas-area a.off-canvas-last').is(':focus') ) {
            e.preventDefault();
            $('#off-canvas-area').find('a:first').focus();
        }
    }

    if ( tabKey === 27 ) {
        e.preventDefault();
        $('#off-canvas-area').removeClass('active');
        $('a.off-canvas-bar').focus();
    };
} );

$('a.off-canvas-bar').on('keydown', function(e) {
    tabKey = e.keyCode;
    shiftKey = e.shiftKey;

    if ( tabKey === 27 ) {
        e.preventDefault();
        $('#off-canvas-area').removeClass('active');
        $('a.off-canvas-bar').focus();
    };

    if ( tabKey === 13 ) {
        e.preventDefault();
        $('#off-canvas-area').addClass('active');
        $('#off-canvas-area').find('a:first').focus();
    };

});

/*------------------------------------------------
                SLICK SLIDERS
------------------------------------------------*/


$('.topbar-slider').slick();
var slider_center_mode = banner_slider.hasClass( 'center-mode' ) ? true : false;
var slider_multi_column = banner_slider.hasClass( 'column-4' ) || banner_slider.hasClass( 'column-3' ) || banner_slider.hasClass( 'column-2' ) ? true : false;
banner_slider.slick({
    centerMode: slider_center_mode ? true  : false,
    centerPadding: slider_center_mode ? '200px'  : false,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: slider_multi_column  ? 2 : 1,
                centerMode: slider_center_mode ? true  : false,
                centerPadding: slider_center_mode ? '100px'  : false,
            }
        },
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: slider_multi_column  ? 2 : 1,
                centerMode: slider_center_mode ? true  : false,
                centerPadding: slider_center_mode ? '80px'  : false,
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                centerMode: slider_center_mode ? true  : false,
                centerPadding: slider_center_mode ? '60px'  : false,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 1,
                centerMode: false,
                centerPadding: false,
            }
        }
    ]
});

var status = $('.pagingInfo');

/*------------------------------------------------
                MASONRY
------------------------------------------------*/

masonry_gallery.imagesLoaded( function() {
    masonry_gallery.packery({
        itemSelector: '.grid-item'
    });
});
                
$('#filter-posts ul li a').on('click', function(event) {
    event.preventDefault();
    var selector = $(this).attr('data-filter');
    if ( ! $('.blog-posts-wrapper').hasClass('grid') ) {
        if ( '*' == selector ) {
            $('.blog-posts-wrapper article').show();
        } else {
            selector = selector.replace('.', '');
            $('.blog-posts-wrapper article').hide();
            $('.blog-posts-wrapper article.' + selector).show();
        }
    } else {
        masonry_gallery.isotope({ filter: selector });
    }
    $('#filter-posts ul li').removeClass('active');
    $(this).parent().addClass('active');
    return false;
});

packery = function () {
    masonry_gallery.isotope({
        resizable: true,
        itemSelector: '.grid-item',
        layoutMode : 'packery',
        gutter: 0,
    });
};
packery();

/*------------------------------------------------
                END JQUERY
------------------------------------------------*/

});