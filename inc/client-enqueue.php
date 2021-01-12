<?php

/**
 * Client-specific scripts for frontend
 *
 * @package c9-togo
 */

if (!function_exists('c9togo_client_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function c9togo_client_scripts()
	{

		$c9_default_font = get_theme_mod('c9_default_font');

		if ($c9_default_font == 'no') {
			wp_enqueue_style('c9togo-font-default', 'https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap', array('c9-styles'));
		}

		wp_enqueue_style('c9togo-client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.min.css', array('c9-styles'));
		wp_add_inline_style('c9togo-client-styles', c9_togo_custom_css_output());
	}
} // endif function_exists( 'client_scripts' ).
add_action('wp_enqueue_scripts', 'c9togo_client_scripts', 99);
