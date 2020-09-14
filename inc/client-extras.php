<?php

/**
 * Client-specific functions for c9-togo
 *
 * @package c9-togo
 */

/* fixes gravity forms ugly spinner */
add_filter('gform_ajax_spinner_url', 'c9togo_spinner_replace', 10, 2);
function c9togo_spinner_replace($image_src, $form)
{
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}

/**
* Add custom fields to menu item
*
* This will allow us to play nicely with any other plugin that is adding the same hook
*
* @param  int $item_id
* @params obj $item - the menu item
* @params array $args
*/
function kia_custom_fields( $item_id, $item ) {

	wp_nonce_field( 'custom_menu_meta_nonce', '_custom_menu_meta_nonce_name' );
	$custom_menu_meta = get_post_meta( $item_id, '_custom_menu_meta', true );
	?>

	<input type="hidden" name="custom-menu-meta-nonce" value="<?php echo wp_create_nonce( 'custom-menu-meta-name' ); ?>" />

	<div class="field-custom_menu_meta description-wide" style="margin: 5px 0;">
	    <span class="description"><?php _e( "Extra Field", 'custom-menu-meta' ); ?></span>
	    <br />

	    <input type="hidden" class="nav-menu-id" value="<?php echo $item_id ;?>" />

	    <div class="logged-input-holder">
	        <input type="text" name="custom_menu_meta[<?php echo $item_id ;?>]" id="custom-menu-meta-for-<?php echo $item_id ;?>" value="<?php echo esc_attr( $custom_menu_meta ); ?>" />
	        <label for="custom-menu-meta-for-<?php echo $item_id ;?>">
	            <?php _e( 'Custom menu text', 'custom-menu-meta'); ?>
	        </label>
	    </div>

	</div>

	<?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'kia_custom_fields', 10, 2 );


/**
* Save the menu item meta
*
* @param int $menu_id
* @param int $menu_item_db_id
*/
function kia_nav_update( $menu_id, $menu_item_db_id ) {

	// Verify this came from our screen and with proper authorization.
	if ( ! isset( $_POST['_custom_menu_meta_nonce_name'] ) || ! wp_verify_nonce( $_POST['_custom_menu_meta_nonce_name'], 'custom_menu_meta_nonce' ) ) {
		return $menu_id;
	}

	if ( isset( $_POST['custom_menu_meta'][$menu_item_db_id]  ) ) {
		$sanitized_data = sanitize_text_field( $_POST['custom_menu_meta'][$menu_item_db_id] );
		update_post_meta( $menu_item_db_id, '_custom_menu_meta', $sanitized_data );
	} else {
		delete_post_meta( $menu_item_db_id, '_custom_menu_meta' );
	}
}
add_action( 'wp_update_nav_menu_item', 'kia_nav_update', 10, 2 );


/**
* Displays text on the front-end.
*
* @param string   $title The menu item's title.
* @param WP_Post  $item  The current menu item.
* @return string
*/
function kia_custom_menu_title( $title, $item ) {

	if( is_object( $item ) && isset( $item->ID ) ) {

		$custom_menu_meta = get_post_meta( $item->ID, '_custom_menu_meta', true );

		if ( ! empty( $custom_menu_meta ) ) {
			$title .= ' - ' . $custom_menu_meta;
		}
	}
	return $title;
}
add_filter( 'nav_menu_item_title', 'kia_custom_menu_title', 10, 2 );
