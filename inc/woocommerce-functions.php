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

/****************************************************************************************/
/******** Adding shopping cart icon to the navigation
/****************************************************************************************/

// append shopping cart if enabled
add_filter( 'wp_nav_menu_items', 'c9_add_woocommerce_icon', 9, 2 );
function c9_add_woocommerce_icon( $items, $args ) {

	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 

	if ( is_plugin_active('woocommerce') ) { //show cart contents if woo is active

		if ( 'primary' == $args->theme_location ) {

			$count = WC()->cart->get_cart_contents_count();

			//if there are items in the cart, put a number in front of the icon
			if ( $count != 0 ) {
				$items .= '<li itemscope="itemscope" class="nav-woocommerce menu-item nav-item" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . wc_get_cart_url() . '" title="Shopping Cart" class="nav-link"><span class="view-cart">' . __('View Cart', 'c9') . '</span> <i class="fa fa-shopping-cart fa-md"></i><span class="count">' . $count . '</span></a></li>';
			}

		}
	} //end checking if woocommerce is active
	return $items;
}

/****************************************************************************************/
/******** Hide long description WYSIWYG field on woocommerce single
/****************************************************************************************/
	function c9_hide_wysiwyg($post) {

		global $post;

		if (get_post_type($post) == 'product') {
			?>
	<style type="text/css">
		#postdivrich {display: none;}
	</style>
			<?php
		}
}
add_action( 'admin_enqueue_scripts', 'c9_hide_wysiwyg' );

/****************************************************************************************/
/******** Changing labels to delivery instead of shipping
/****************************************************************************************/
//Change the Shipping Address checkout label
function c9_shipping_field_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Ship to a different address?' :
		$translated_text = __( 'Deliver to different address?', 'woocommerce' );
		break;
	}
	return $translated_text;
}
add_filter( 'gettext', 'c9_shipping_field_strings', 20, 3 );

add_filter( 'woocommerce_shipping_package_name', 'c9_shipping_package_name' );
function c9_shipping_package_name( $name ) {
  return 'Delivery';
}

add_filter('gettext', 'translate_reply');
add_filter('ngettext', 'translate_reply');

function translate_reply($translated) {
	$translated = str_ireplace('Shipping', 'Delivery', $translated);
	return $translated;
}

/* hiding nag message from wooODT Lite */
remove_filter( 'admin_notices', 'byconsolewooodt_free_plugin_activation_admin_notice_error');
