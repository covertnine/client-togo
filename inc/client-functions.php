<?php
/**
 * Togo Client Functions
 *
 * @package C9
 */

/****************************************************************************************/
/***************************** load client scripts for frontend styling
/****************************************************************************************/
if (!function_exists('client_scripts')) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function client_scripts()
	{


		$c9_default_font = get_theme_mod('c9_default_font');

		if ($c9_default_font == 'no') {
			wp_enqueue_style('c9-font-default', 'https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap', array('c9-styles'));
		}

		wp_enqueue_style('client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.min.css', array('c9-styles'));

		wp_enqueue_script('gsap', get_template_directory_uri() . '/client/client-assets/vendor/jquery.gsap.min.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('scrollto', get_template_directory_uri() . '/client/client-assets/vendor/plugins/ScrollToPlugin.min.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('scrollmagic', get_template_directory_uri() . '/client/client-assets/vendor/ScrollMagic/2.0.7/ScrollMagic.min.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('history-js', get_template_directory_uri() . '/client/client-assets/vendor/history.js', array('jquery', 'c9-scripts'), true);
		wp_enqueue_script('client-scripts', get_template_directory_uri() . '/client/client-assets/custom-client.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('client-scripts', get_template_directory_uri() . '/client/client-assets/transitions.js', array('jquery'), 'c9-scripts', true);
	}
} // endif function_exists( 'client_scripts' ).
add_action('wp_enqueue_scripts', 'client_scripts', 99);

/* add client compiled files to gutenberg editor */
if (!function_exists('c9_client_editor_style')) {
	function c9_client_editor_style()
	{

		$c9_default_font = get_theme_mod('c9_default_font', 'no');

		if ($c9_default_font != 'yes') {
			wp_enqueue_style('c9-font-default', 'https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap', array('c9-client-styles'));
		}


		wp_enqueue_style('c9-client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.css');
		wp_enqueue_style('c9-client-editor-styles', get_template_directory_uri() . '/client/client-assets/dist/client-editor.min.css', 99999);
	}
	add_action('enqueue_block_editor_assets', 'c9_client_editor_style', 99999999);
} //end if function exists

/****************************************************************************************/
/* Sets up colors and custom styles for core blocks */
/****************************************************************************************/
include("client-setup.php");

/****************************************************************************************/
/* WooCommerce */
/****************************************************************************************/
include("woocommerce-functions.php");

