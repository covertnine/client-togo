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
			wp_enqueue_style('c9-font-default', 'https://fonts.googleapis.com/css2?family=Sen:wght@400;700;800&display=swap', array('c9-styles'));
		}

		wp_enqueue_style('client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.min.css', array('c9-styles'));

		wp_enqueue_script('gsap', get_template_directory_uri() . '/client/client-assets/vendor/jquery.gsap.min.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('scrollto', get_template_directory_uri() . '/client/client-assets/vendor/plugins/ScrollToPlugin.min.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('scrollmagic', get_template_directory_uri() . '/client/client-assets/vendor/ScrollMagic/2.0.7/ScrollMagic.min.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('history-js', get_template_directory_uri() . '/client/client-assets/vendor/history.js', array('jquery', 'c9-scripts'), true);
		wp_enqueue_script('client-scripts', get_template_directory_uri() . '/client/client-assets/custom-client.js', array('jquery', 'c9-scripts'), '', true);
		wp_enqueue_script('client-transitions', get_template_directory_uri() . '/client/client-assets/transitions.js', array('jquery'), 'c9-scripts', true);
	}
} // endif function_exists( 'client_scripts' ).
add_action('wp_enqueue_scripts', 'c9togo_client_scripts', 99);
