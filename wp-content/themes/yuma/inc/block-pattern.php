<?php
/**
 * block patterns
 *
 * @package yuma
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {
	$pattern_category = apply_filters( 'yuma_block_pattern_categories', array( 
		'yuma' => esc_html__( 'Yuma', 'yuma' ), 
		'yuma-intro' => esc_html__( 'Yuma Intro', 'yuma' ), 
		'yuma-banner' => esc_html__( 'Yuma Banner', 'yuma' ), 
		'yuma-cta' => esc_html__( 'Yuma Call to Action', 'yuma' ), 
		'yuma-testimonial' => esc_html__( 'Yuma Testimonial', 'yuma' ),
		'yuma-featured' => esc_html__( 'Yuma Featured', 'yuma' ),
	) );
	foreach ( $pattern_category as $key => $value ) {
		register_block_pattern_category(
			$key,
			array( 'label' => $value )
		);
	}
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	register_block_pattern(
		'yuma/beauty-banner-pattern',
		array(
			'title'      => esc_html__( 'Beauty Banner', 'yuma' ),
			'categories' => array( 'yuma', 'yuma-banner' ),
			'content'    => '<!-- wp:cover {"url":"' . get_parent_theme_file_uri( '/assets/pattern-img/beauty-banner.jpg' ) . '","id":1287,"dimRatio":0,"focalPoint":{"x":"0.45","y":"0.08"},"minHeight":100,"minHeightUnit":"vh","contentPosition":"center center","isDark":false,"align":"full"} -->
			<div class="wp-block-cover alignfull is-light" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1287" alt="' . esc_attr__( 'banner', 'yuma' ) . '" src="' . get_parent_theme_file_uri( '/assets/pattern-img/beauty-banner.jpg' ) . '" style="object-position:45% 8%" data-object-fit="cover" data-object-position="45% 8%"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"lineHeight":"1","fontStyle":"normal","fontWeight":"300","letterSpacing":"2px","textTransform":"uppercase"}},"fontSize":"small"} -->
			<h5 class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:300;line-height:1;text-transform:uppercase;letter-spacing:2px">' . esc_html__( 'Hena beauty salon', 'yuma' ) . '</h5>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"center","style":{"typography":{"textTransform":"capitalize","fontStyle":"normal","fontWeight":"500"}},"fontSize":"extra-large"} -->
			<h2 class="has-text-align-center has-extra-large-font-size" style="font-style:normal;font-weight:500;text-transform:capitalize">' . esc_html__( 'Make time for yourself', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","fontSize":"regular"} -->
			<p class="has-text-align-center has-regular-font-size">' . esc_html__( 'From haircuts and facials to manicures and pedicures, our salon has so much to offer.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"tangaroa","style":{"typography":{"fontSize":"14px"},"spacing":{"padding":{"top":"15px","right":"36px","bottom":"15px","left":"36px"}},"border":{"radius":"0px"}}} -->
			<div class="wp-block-button has-custom-font-size" style="font-size:14px"><a class="wp-block-button__link has-tangaroa-background-color has-background" style="border-radius:0px;padding-top:15px;padding-right:36px;padding-bottom:15px;padding-left:36px">' . esc_html__( 'Contact Us', 'yuma' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:cover -->',
		)
	);

	register_block_pattern(
		'yuma/zigzag-about-pattern',
		array(
			'title'      => esc_html__( 'ZigZag About', 'yuma' ),
			'categories' => array( 'yuma', 'yuma-intro' ),
			'content'    => '<!-- wp:group {"align":"full","className":"zigzag-about-pattern"} -->
			<div class="wp-block-group alignfull zigzag-about-pattern"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1218,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
			<figure class="wp-block-image size-full is-style-default"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/makeup.jpg' ) . '" alt="' . esc_attr__( 'makeup', 'yuma' ) . '" class="wp-image-1218"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"25px","right":"25px","bottom":"25px","left":"25px"}}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="padding-top:25px;padding-right:25px;padding-bottom:25px;padding-left:25px"><!-- wp:heading {"textAlign":"center","level":6,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"small"} -->
			<h6 class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:400;line-height:1">' . esc_html__( 'Hena Beauty Salon', 'yuma' ) . '</h6>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.7"}},"fontSize":"extra-large"} -->
			<h2 class="has-text-align-center has-extra-large-font-size" style="line-height:1.7">' . esc_html__( 'Fashion Trends', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:separator {"style":{"color":{"background":"#c09369"}}} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#c09369;color:#c09369"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size">' . esc_html__( 'Our salon can enhance your confidence. From haircuts and facials to manicures and pedicures, our salon have so much to offer.', 'yuma' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"25px","right":"25px","bottom":"25px","left":"25px"}}}} -->
			<div class="wp-block-column is-vertically-aligned-center" style="padding-top:25px;padding-right:25px;padding-bottom:25px;padding-left:25px"><!-- wp:heading {"textAlign":"center","level":6,"style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1"}},"fontSize":"small"} -->
			<h6 class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:400;line-height:1">' . esc_html__( 'Hena Beauty Salon', 'yuma' ) . '</h6>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"center","style":{"typography":{"lineHeight":"1.7"}},"fontSize":"extra-large"} -->
			<h2 class="has-text-align-center has-extra-large-font-size" style="line-height:1.7">' . esc_html__( 'Opening Schedule', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:separator {"style":{"color":{"background":"#c09369"}}} -->
			<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background" style="background-color:#c09369;color:#c09369"/>
			<!-- /wp:separator -->

			<!-- wp:paragraph {"align":"center","fontSize":"small"} -->
			<p class="has-text-align-center has-small-font-size"><em>' . esc_html__( 'Monday to Friday – 09:00 – 21:00', 'yuma' ) . '</em><br><em>' . esc_html__( 'Saturday – 10:00 – 18:00', 'yuma' ) . '</em><br><em>' . esc_html__( 'Sunday – 12:00 – 18:00', 'yuma' ) . '</em></p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":1234,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
			<figure class="wp-block-image size-full is-style-default"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/spa.jpg' ) . '" alt="' . esc_attr__( 'spa', 'yuma' ) . '" class="wp-image-1234"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'yuma/testimonial-one-pattern',
		array(
			'title'      => esc_html__( 'Testimonial One', 'yuma' ),
			'categories' => array( 'yuma', 'yuma-testimonial' ),
			'content'    => '<!-- wp:group {"tagName":"section","align":"full","className":"testimonial-1-pattern"} -->
			<section class="wp-block-group alignfull testimonial-1-pattern"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","fontSize":"extra-large"} -->
			<h2 class="has-text-align-center has-extra-large-font-size">' . esc_html__( 'Testimonial', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"}}} -->
			<p class="has-text-align-center" style="line-height:1">' . esc_html__( 'What Our Clients Say', 'yuma' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textColor":"ronchi"} -->
			<h2 class="has-ronchi-color has-text-color">"</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"align":"center","id":1473,"width":100,"height":100,"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image aligncenter size-thumbnail is-resized is-style-rounded"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/testimonial1.jpg' ) . '" alt="' . esc_attr__( 'testimonial 1', 'yuma' ) . '" class="wp-image-1473" width="100" height="100"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . esc_html__( 'Yuma lets you build the way you choose! It is highly dynamic. You can use Customizer, Elementor and Gutenberg ready templates.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"lineHeight":"1"}},"fontSize":"regular"} -->
			<h3 class="has-text-align-center has-regular-font-size" style="line-height:1">' . esc_html__( 'Dave Marcel', 'yuma' ) . '</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
			<h5 class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__( 'Founder', 'yuma' ) . '</h5>
			<!-- /wp:heading -->

			<!-- wp:social-links {"iconColor":"black","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

			<!-- wp:social-link {"url":"#","service":"twitter"} /-->

			<!-- wp:social-link {"url":"#","service":"google"} /--></ul>
			<!-- /wp:social-links --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textColor":"ronchi"} -->
			<h2 class="has-ronchi-color has-text-color">"</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"align":"center","id":1481,"width":100,"height":100,"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image aligncenter size-thumbnail is-resized is-style-rounded"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/testimonial3.jpg' ) . '" alt="' . esc_attr__( 'testimonial 3', 'yuma' ) . '" class="wp-image-1481" width="100" height="100"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . esc_html__( 'Yuma lets you build the way you choose! It is highly dynamic. You can use Customizer, Elementor and Gutenberg ready templates.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"lineHeight":"1"}},"fontSize":"regular"} -->
			<h3 class="has-text-align-center has-regular-font-size" style="line-height:1">' . esc_html__( 'Robert Madison', 'yuma' ) . '</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
			<h5 class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__( 'Ceo', 'yuma' ) . '</h5>
			<!-- /wp:heading -->

			<!-- wp:social-links {"iconColor":"black","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

			<!-- wp:social-link {"url":"#","service":"twitter"} /-->

			<!-- wp:social-link {"url":"#","service":"google"} /--></ul>
			<!-- /wp:social-links --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textColor":"ronchi"} -->
			<h2 class="has-ronchi-color has-text-color">"</h2>
			<!-- /wp:heading -->

			<!-- wp:image {"align":"center","id":1480,"width":100,"height":100,"sizeSlug":"thumbnail","linkDestination":"none","className":"is-style-rounded"} -->
			<figure class="wp-block-image aligncenter size-thumbnail is-resized is-style-rounded"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/testimonial2.jpg' ) . '" alt="' . esc_attr__( 'testimonial 2', 'yuma' ) . '" class="wp-image-1480" width="100" height="100"/></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">' . esc_html__( 'Yuma lets you build the way you choose! It is highly dynamic. You can use Customizer, Elementor and Gutenberg ready templates.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:group -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"lineHeight":"1"}},"fontSize":"regular"} -->
			<h3 class="has-text-align-center has-regular-font-size" style="line-height:1">' . esc_html__( 'Jane Cole', 'yuma' ) . '</h3>
			<!-- /wp:heading -->

			<!-- wp:heading {"textAlign":"center","level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
			<h5 class="has-text-align-center has-small-font-size" style="font-style:normal;font-weight:400">' . esc_html__( 'Manager', 'yuma' ) . '</h5>
			<!-- /wp:heading -->

			<!-- wp:social-links {"iconColor":"black","iconColorValue":"#000000","size":"has-small-icon-size","className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
			<ul class="wp-block-social-links has-small-icon-size has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

			<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

			<!-- wp:social-link {"url":"#","service":"twitter"} /-->

			<!-- wp:social-link {"url":"#","service":"google"} /--></ul>
			<!-- /wp:social-links --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></section>
			<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'yuma/cta-three-pattern',
		array(
			'title'      => esc_html__( 'Call to Action Three', 'yuma' ),
			'categories' => array( 'yuma', 'yuma-cta' ),
			'content'    => '<!-- wp:group {"align":"full","className":"cta-3-pattern"} -->
			<div class="wp-block-group alignfull cta-3-pattern"><!-- wp:cover {"url":"' . get_parent_theme_file_uri( '/assets/pattern-img/beauty-banner.jpg' ) . '","id":1287,"dimRatio":70,"focalPoint":{"x":"0.51","y":"0.39"},"minHeight":500,"customGradient":"linear-gradient(135deg,rgb(67,87,244) 0%,rgb(213,42,94) 100%)","contentPosition":"center center"} -->
			<div class="wp-block-cover" style="min-height:500px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-70 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(135deg,rgb(67,87,244) 0%,rgb(213,42,94) 100%)"></span><img class="wp-block-cover__image-background wp-image-1287" alt="' . esc_attr__( 'cta background', 'yuma' ) . '" src="' . get_parent_theme_file_uri( '/assets/pattern-img/beauty-banner.jpg' ) . '" style="object-position:51% 39%" data-object-fit="cover" data-object-position="51% 39%"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
			<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:heading {"style":{"typography":{"fontSize":"36px","fontStyle":"normal","fontWeight":"600"}}} -->
			<h2 style="font-size:36px;font-style:normal;font-weight:600">' . esc_html__( 'Create website in minutes', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__( 'Start with an action word, here is a great place to write something specific that you want your visitors to read to create more attraction.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"20px"} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"10px","bottom":"10px","left":"30px","right":"30px"}},"border":{"radius":"0px"},"color":{"background":"#d7247a"}},"fontSize":"small"} -->
			<div class="wp-block-button has-custom-font-size has-small-font-size"><a class="wp-block-button__link has-background" style="border-radius:0px;background-color:#d7247a;padding-top:10px;padding-right:30px;padding-bottom:10px;padding-left:30px">' . esc_html__( 'Try For Free', 'yuma' ) . '</a></div>
			<!-- /wp:button -->

			<!-- wp:button {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"28px","right":"28px"}},"border":{"radius":"0px"}},"className":"is-style-outline","fontSize":"small"} -->
			<div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link" style="border-radius:0px;padding-top:8px;padding-right:28px;padding-bottom:8px;padding-left:28px">' . esc_html__( 'Book A Demo', 'yuma' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"33.33%"} -->
			<div class="wp-block-column" style="flex-basis:33.33%"></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:group -->',
		)
	);

	register_block_pattern(
		'yuma/cta-banner-pattern',
		array(
			'title'      => esc_html__( 'Call to Action Banner', 'yuma' ),
			'categories' => array( 'yuma', 'yuma-cta', 'yuma-banner' ),
			'content'    => '<!-- wp:cover {"url":"' . get_parent_theme_file_uri( '/assets/pattern-img/cta-banner.jpg' ) . '","id":1783,"dimRatio":0,"minHeight":100,"minHeightUnit":"vh","isDark":false,"align":"full","className":"cta-banner-pattern"} -->
			<div class="wp-block-cover alignfull is-light cta-banner-pattern" style="min-height:100vh"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1783" alt="' . esc_attr__( 'cta banner', 'yuma' ) . '" src="' . get_parent_theme_file_uri( '/assets/pattern-img/cta-banner.jpg' ) . '" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%"></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading {"style":{"typography":{"fontSize":"66px"}}} -->
			<h2 style="font-size:66px">' . esc_html__( 'Make It Beautiful', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"fontSize":"large"} -->
			<p class="has-large-font-size">' . esc_html__( 'Everything has beauty, but not everyone sees it', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"25px"} -->
			<div style="height:25px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"}}} -->
			<div class="wp-block-button"><a class="wp-block-button__link" style="border-radius:0px">' . esc_html__( 'Start A Free Trial', 'yuma' ) . '</a></div>
			<!-- /wp:button -->

			<!-- wp:button {"textColor":"black","style":{"border":{"radius":"0px"},"color":{"background":"#ffffff00"}},"fontSize":"regular"} -->
			<div class="wp-block-button has-custom-font-size has-regular-font-size"><a class="wp-block-button__link has-black-color has-text-color has-background" style="border-radius:0px;background-color:#ffffff00">' . esc_html__( 'No credit card required.', 'yuma' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div></div>
			<!-- /wp:cover -->',
		)
	);

	register_block_pattern(
		'yuma/featured-blog-pattern',
		array(
			'title'      => esc_html__( 'Featured Blog', 'yuma' ),
			'categories' => array( 'yuma', 'yuma-featured' ),
			'content'    => '<!-- wp:group {"tagName":"section","align":"full","className":"featured-blog-pattern"} -->
			<section class="wp-block-group alignfull featured-blog-pattern"><!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","fontSize":"extra-large"} -->
			<h2 class="has-text-align-center has-extra-large-font-size">' . esc_html__( 'Featured News', 'yuma' ) . '</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"align":"center","style":{"typography":{"lineHeight":"1"}}} -->
			<p class="has-text-align-center" style="line-height:1">' . esc_html__( 'Check latest blogs for more inspiration', 'yuma' ) . '</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->

			<!-- wp:spacer {"height":"30px"} -->
			<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:columns -->
			<div class="wp-block-columns"><!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":2049,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
			<figure class="wp-block-image size-full is-style-default"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/featured1.jpg' ) . '" alt="' . esc_attr__( 'featured', 'yuma' ) . '" class="wp-image-2049"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
			<h4 style="font-style:normal;font-weight:500">' . esc_html__( 'The moon lives in the lining of your skin', 'yuma' ) . '</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__( 'Start with an action word, here is a great place to write something specific that you want your visitors to read to create more attraction.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"spacing":{"padding":{"top":"8px","bottom":"8px","left":"20px","right":"20px"}},"typography":{"fontSize":"14px"}}} -->
			<div class="wp-block-button has-custom-font-size" style="font-size:14px"><a class="wp-block-button__link" style="border-radius:0px;padding-top:8px;padding-right:20px;padding-bottom:8px;padding-left:20px">' . esc_html__( 'Read More', 'yuma' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":2050,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
			<figure class="wp-block-image size-full is-style-default"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/featured2.jpg' ) . '" alt="' . esc_attr__( 'featured', 'yuma' ) . '" class="wp-image-2050"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
			<h4 style="font-style:normal;font-weight:500">' . esc_html__( 'You are more beautiful than you realize', 'yuma' ) . '</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__( 'Start with an action word, here is a great place to write something specific that you want your visitors to read to create more attraction.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"20px","right":"20px"}},"border":{"radius":"0px"},"typography":{"fontSize":"14px"}}} -->
			<div class="wp-block-button has-custom-font-size" style="font-size:14px"><a class="wp-block-button__link" style="border-radius:0px;padding-top:8px;padding-right:20px;padding-bottom:8px;padding-left:20px">' . esc_html__( 'Read More', 'yuma' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->

			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:image {"id":2051,"sizeSlug":"full","linkDestination":"none","className":"is-style-default"} -->
			<figure class="wp-block-image size-full is-style-default"><img src="' . get_parent_theme_file_uri( '/assets/pattern-img/featured3.jpg' ) . '" alt="' . esc_attr__( 'featured', 'yuma' ) . '" class="wp-image-2051"/></figure>
			<!-- /wp:image -->

			<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}}} -->
			<h4 style="font-style:normal;font-weight:500">' . esc_html__( 'Beauty is the promise of the future to you', 'yuma' ) . '</h4>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>' . esc_html__( 'Start with an action word, here is a great place to write something specific that you want your visitors to read to create more attraction.', 'yuma' ) . '</p>
			<!-- /wp:paragraph -->

			<!-- wp:spacer {"height":"10px"} -->
			<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"20px","right":"20px"}},"border":{"radius":"0px"},"typography":{"fontSize":"14px"}}} -->
			<div class="wp-block-button has-custom-font-size" style="font-size:14px"><a class="wp-block-button__link" style="border-radius:0px;padding-top:8px;padding-right:20px;padding-bottom:8px;padding-left:20px">' . esc_html__( 'Read More', 'yuma' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></section>
			<!-- /wp:group -->',
		)
	);

}