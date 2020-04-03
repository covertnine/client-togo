<?php
// Band Client Functions

/****************************************************************************************/
/***************************** load client scripts for frontend styling
/****************************************************************************************/
if (!function_exists('client_scripts')) {
    /**
     * Load theme's JavaScript and CSS sources.
     */
    function client_scripts()
    {

        wp_enqueue_style('client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.min.css', array('c9-styles'));

        wp_enqueue_script('gsap', '//s3-us-west-2.amazonaws.com/s.cdpn.io/16327/gsap-latest-beta.min.js', array('jquery'), '', true);
        wp_enqueue_script('scrollto', '//s3-us-west-2.amazonaws.com/s.cdpn.io/16327/ScrollToPlugin3.min.js', array('jquery'), '', true);
        wp_enqueue_script('scrollmagic', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', '', '', true);
        wp_enqueue_script('client-scripts', get_template_directory_uri() . '/client/client-assets/custom-client.js', array('jquery'), '', true);

        //wp_enqueue_script('smooth-state', get_template_directory_uri() . '/client/client-assets/vendor/jquery.smoothState.min.js', array('jquery'), true);
        //wp_enqueue_style('c9-megamenu', get_stylesheet_directory_uri() . '/client/client-assets/vendor/megamenu.css', array('c9-styles'));

    }
} // endif function_exists( 'client_scripts' ).
add_action('wp_enqueue_scripts', 'client_scripts', 99);

/* add client compiled files to gutenberg editor */
if (!function_exists('c9_client_editor_style')) {
    function c9_client_editor_style()
    {

        wp_enqueue_style('c9-client-typekit-style', '//use.typekit.net/uqa4rne.css');
        wp_enqueue_style('c9-client-styles', get_template_directory_uri() . '/client/client-assets/dist/client.css');
        wp_enqueue_style('c9-client-editor-styles', get_template_directory_uri() . '/client/client-assets/dist/client-editor.min.css', 99999);
    }
    add_action('enqueue_block_editor_assets', 'c9_client_editor_style', 99999999);
} //end if function exists


add_action('after_setup_theme', 'c9_client_setup');
if (!function_exists('c9_client_setup')) {

    function c9_client_setup()
    {
        /*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
        add_theme_support('post-formats', array(
            'video',
            'quote'
        ));
    }
}

/****************************************************************************************/
/* C9 Music Admin Settings */
/****************************************************************************************/
if ( ! function_exists( 'c9_hide_font_setting' ) ) {
	/**
	 * Hide admin setting for font cause we already set those in CSS
	 */
	function c9_hide_font_setting() {
		wp_enqueue_style( 'c9-client-admin-styles', get_template_directory_uri() . '/client/client-assets/dist/client-admin.css' );
	}
	add_action( 'admin_print_styles', 'c9_hide_font_setting', 999);
} //end if function exists

/****************************************************************************************/
/* WooCommerce */
/****************************************************************************************/
include("woocommerce-functions.php");

/****************************************************************************************/
/* ACF */
/****************************************************************************************/

define( 'ACF_LITE' , true );

/****************************************************************************************/

/****************************************************************************************/
/* clean up header with excess WP stuff */
/****************************************************************************************/

/*Removes RSD, XMLRPC, WLW, WP Generator, ShortLink and Comment Feed links*/
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'feed_links_extra', 3 );

/*Removes prev and next article links*/
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
