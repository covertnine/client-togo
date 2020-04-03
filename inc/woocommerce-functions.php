<?php
/* WooCommerce Specific filters and functionality for C9 Band */

add_action( 'after_setup_theme', 'c9_add_woocommerce_support' );
function c9_add_woocommerce_support() {

	add_theme_support( 'woocommerce' );
    // remove related products from single
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

}

/* remove jetpack messages */
add_filter( 'woocommerce_helper_suppress_admin_notices', '__return_true' );

// $path defaults to 'woocommerce/' (in client folder)
add_filter('woocommerce_template_path', function () {
    return 'client/woocommerce/';
});

/* fixes gravity forms ugly ass spinner */
add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );
function gf_spinner_replace( $image_src, $form ) {
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}



//remove related items
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
// $path defaults to 'woocommerce/' (in client folder)
add_filter('woocommerce_template_path', function () {
    return 'client/woocommerce/';
});

/****************************************************************************************/
/******** Adding filter to look for client folder templates before child theme templates
/****************************************************************************************/
add_filter( 'template_include', function( $template ) {
  $path = explode('/', $template );
  $template_chosen = end( $path );
  $grandchild_template = get_template_directory() . '/client/' . $template_chosen;
  if ( file_exists( $grandchild_template  ) ) {
     	$template = $grandchild_template;
  }
  return $template;
}, 99);
/****************************************************************************************/

