<?php
 /**
  * Title: Sale Banner
  * Slug: yuma-shop/sale-banner
  * Categories: yuma-shop
  */
  ?>

<!-- wp:group {"align":"full","style":{"color":{"background":"#f6f6f7"},"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#f6f6f7;padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60)"><!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"padding":{"right":"var:preset|spacing|80"}}}} -->
<div class="wp-block-column is-vertically-aligned-center" style="padding-right:var(--wp--preset--spacing--80)"><!-- wp:heading {"level":3,"style":{"color":{"text":"#3248c6"}}} -->
<h3 class="wp-block-heading has-text-color" style="color:#3248c6"><?php esc_html_e( 'One Day Sale', 'yuma-shop' ); ?></h3>
<!-- /wp:heading -->

<!-- wp:heading {"style":{"typography":{"fontSize":"64px"}}} -->
<h2 class="wp-block-heading" style="font-size:64px"><?php esc_html_e( '50% off, let\'s make some magic', 'yuma-shop' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"regular"} -->
<p class="has-regular-font-size"><?php esc_html_e( 'Footwear to last you a lifetime. Bring power to your steps. Go faster, go stronger, never stop.', 'yuma-shop' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":220,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image size-full"><img src="<?php echo esc_url( get_stylesheet_directory_uri() );?>/images/expo.png" alt="" class="wp-image-220"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->