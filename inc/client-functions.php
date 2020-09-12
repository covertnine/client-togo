<?php
/**
 * Client-specific functionality
 *
 * @package c9-togo
 */

/**
* Client frontend styles and scripts
*/
require_once "client-enqueue.php";

/**
* Client editor styles and scripts
*/
require_once "client-editor.php";

/**
* Sets up colors and custom styles for core blocks
*/
require_once "client-setup.php";

/**
* Client WooCommerce
*/
require_once "client-woocommerce.php";

function wporg_my_custom_field() {
    esc_html_e( 'Howdy! WordPress 5.4 is coming!', 'wporg' );
}
add_action( 'wp_nav_menu_item_custom_fields', 'wporg_my_custom_field' );
