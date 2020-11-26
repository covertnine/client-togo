<?php

/**
 * Togo WooCommerce Specific filters
 *
 * @package c9-togo
 */

add_action('after_setup_theme', 'c9togo_add_woocommerce_support');
if (!function_exists('c9togo_add_woocommerce_support')) {

	function c9togo_add_woocommerce_support()
	{

		add_theme_support('woocommerce');
		add_theme_support('wc-product-gallery-zoom');
		add_theme_support('wc-product-gallery-lightbox');
		add_theme_support('wc-product-gallery-slider');
	}
}

// $path defaults to 'woocommerce/' (in client folder)
add_filter('woocommerce_template_path', 'c9togo_woocommerce_client_path', 20);
function c9togo_woocommerce_client_path()
{
	return 'client/woocommerce/';
};

/****************************************************************************************/
/******** Adding filter to look for client folder templates before child theme templates
/****************************************************************************************/
add_filter('template_include', 'c9togo_woocommerce_template_include', 99);

function c9togo_woocommerce_template_include($template)
{
	$path = explode('/', $template);
	$template_chosen = end($path);
	$grandchild_template = get_template_directory() . '/client/' . $template_chosen;
	if (file_exists($grandchild_template)) {
		$template = $grandchild_template;
	}
	return $template;
};
/****************************************************************************************/

/****************************************************************************************/
/******** Adding shopping cart icon to the navigation
/****************************************************************************************/

// append shopping cart if enabled
add_filter('wp_nav_menu_items', 'c9togo_add_woocommerce_icon', 9, 2);
function c9togo_add_woocommerce_icon($items, $args)
{

	if (defined('WC_VERSION')) { //show cart contents if woo is active

		if ('primary' == $args->theme_location) {

			$count = esc_attr(WC()->cart->get_cart_contents_count());

			//if there are items in the cart, put a number in front of the icon
			if ($count != 0) {
				$items .= '<li itemscope="itemscope" class="nav-woocommerce menu-item nav-item" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="Shopping Cart" class="nav-link"><span class="view-cart">' . __('View Cart', 'c9-togo') . '</span> <i class="fa fa-shopping-cart fa-md"></i><span class="count">' . $count . '</span></a></li>';
			} else { //if not just put in an icon
				$items .= '<li itemscope="itemscope" class="nav-woocommerce menu-item nav-item" itemtype="https://www.schema.org/SiteNavigationElement"><a href="' . esc_url(wc_get_cart_url()) . '" title="Shopping Cart" class="nav-link"><span class="view-cart">' . __('View Cart', 'c9-togo') . '</span> <i class="fa fa-shopping-cart fa-md"></i></a></li>';
			} //end count check

		} //end checking active theme menu location
	} //end checking if woocommerce is active
	return $items;
}

/****************************************************************************************/
/******** Hide long description WYSIWYG field on woocommerce single
/****************************************************************************************/
function c9togo_hide_wysiwyg($post)
{

	global $post;

	if (get_post_type($post) == 'product') {
?>
		<style type="text/css">
			#postdivrich {
				display: none;
			}
		</style>
<?php
	}
}
add_action('admin_enqueue_scripts', 'c9togo_hide_wysiwyg');

/****************************************************************************************/
/******** Changing labels to delivery instead of shipping
/****************************************************************************************/
//Change the Shipping Address checkout label
function c9togo_shipping_field_strings($translated_text, $text, $domain)
{
	switch ($translated_text) {
		case 'Ship to a different address?':
			$translated_text = __('Deliver to different address?', 'c9-togo');
			break;
	}
	return $translated_text;
}
add_filter('gettext', 'c9togo_shipping_field_strings', 20, 3);

add_filter('woocommerce_shipping_package_name', 'c9togo_shipping_package_name');
function c9togo_shipping_package_name($name)
{
	return 'Delivery';
}

add_filter('gettext', 'c9togo_translate_reply');
add_filter('ngettext', 'c9togo_translate_reply');

function c9togo_translate_reply($translated)
{
	$translated = str_ireplace('Shipping', 'Delivery', $translated);
	return $translated;
}
