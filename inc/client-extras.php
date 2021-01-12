<?php

/**
 * Client-specific functions for c9-togo
 *
 * @package c9-togo
 */

/**
 * Add custom fields to menu item
 *
 * This will allow us to play nicely with any other plugin that is adding the same hook
 *
 * @param  int $item_id
 * @params obj $item - the menu item
 * @params array $args
 */
function c9togo_nav_custom_fields($item_id, $item)
{

	wp_nonce_field('custom_menu_meta_nonce', '_custom_menu_meta_nonce_name');
	$c9togo_custom_menu_meta = get_post_meta($item_id, '_custom_menu_meta', true);
?>

	<input type="hidden" name="custom-menu-meta-nonce" value="<?php echo wp_create_nonce('c9togo_custom_menu_meta'); ?>" />

	<div class="field-custom_menu_meta description-wide" style="margin: 5px 0;">
		<label for="custom-menu-meta-for-<?php echo esc_attr($item_id); ?>">
			<?php esc_html_e('Navigation Link Style', 'c9-togo'); ?>
		</label>
		<br />

		<input type="hidden" class="nav-menu-id" value="<?php echo esc_attr($item_id); ?>" />
		<select name="c9togo_custom_menu_meta[<?php echo esc_attr($item_id); ?>]" id="custom-menu-meta-for-<?php echo esc_attr($item_id); ?>">
			<option value="" <?php if ((esc_attr($c9togo_custom_menu_meta) == "") || (empty(esc_attr($c9togo_custom_menu_meta)))) echo " selected"; ?>>Default</option>
			<option value="c9-order-now" <?php if (esc_attr($c9togo_custom_menu_meta) == "c9-order-now") echo " selected"; ?>><?php esc_html_e("Green Button", 'c9-togo'); ?></option>
			<option value="c9-yellow-btn" <?php if (esc_attr($c9togo_custom_menu_meta) == "c9-yellow-btn") echo " selected"; ?>><?php esc_html_e("Yellow Button", 'c9-togo'); ?></option>
		</select>


	</div>

<?php
}
add_action('wp_nav_menu_item_custom_fields', 'c9togo_nav_custom_fields', 10, 2);


/**
 * Save the menu item meta
 *
 * @param int $menu_id
 * @param int $menu_item_db_id
 */
function c9togo_nav_update($menu_id, $menu_item_db_id)
{

	// Verify this came from our screen and with proper authorization.
	if (!isset($_POST['_custom_menu_meta_nonce_name']) || !wp_verify_nonce($_POST['_custom_menu_meta_nonce_name'], 'custom_menu_meta_nonce')) {
		return $menu_id;
	}

	if (isset($_POST['c9togo_custom_menu_meta'][$menu_item_db_id])) {
		$sanitized_data = esc_attr($_POST['c9togo_custom_menu_meta'][$menu_item_db_id]);
		update_post_meta($menu_item_db_id, '_custom_menu_meta', $sanitized_data);
	} else {
		delete_post_meta($menu_item_db_id, '_custom_menu_meta');
	}
}
add_action('wp_update_nav_menu_item', 'c9togo_nav_update', 10, 2);


/**
 * Displays select drop down on the front-end.
 *
 * @param string   $classes The css classes with the nav item
 * @param WP_Post  $item  The current menu item.
 * @return string
 */
function c9togo_custom_menu_class($classes, $item)
{

	if (is_object($item) && isset($item->ID)) {

		$c9togo_custom_menu_meta = get_post_meta($item->ID, '_custom_menu_meta', true);

		if (!empty($c9togo_custom_menu_meta)) {
			$classes[] = $c9togo_custom_menu_meta;
		}
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'c9togo_custom_menu_class', 10, 4);
