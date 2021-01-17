<?php

/**
 *
 * Add fields and configure admin settings API.
 *
 * @since   2.1.9
 * @package c9-togo
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if (!function_exists('c9togo_customize_register')) {
	/**
	 * Register basic customizer support.
	 *
	 * @param object $wp_customize Customizer reference.
	 */
	function c9togo_customize_register($wp_customize)
	{


		/* added for displaying site title and tagline */
		// Add "display_title_and_tagline" setting for displaying the site-title & tagline.
		$wp_customize->add_setting(
			'c9togo_display_title_and_tagline',
			array(
				'capability'        => 'edit_theme_options',
				'default'           => true,
				'sanitize_callback' => 'c9_sanitize_checkbox',
			)
		);

		// Add control for the "display_title_and_tagline" setting.
		$wp_customize->add_control(
			'c9togo_display_title_and_tagline',
			array(
				'type'    => 'checkbox',
				'section' => 'title_tagline',
				'label'   => esc_html__('Display Site Title & Tagline', 'c9-togo'),
			)
		);

		$wp_customize->add_setting(
			'c9togo_link_hover',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_link_hover',
				array(
					'label'      => esc_html__('Link Hover', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_link_hover',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_link',
				array(
					'label'      => esc_html__('Top Navigation Link', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_link',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_link_hover',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_link_hover',
				array(
					'label'      => esc_html__('Top Navigation Link Active/Hover', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_link_hover',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_dropdown_menu',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_dropdown_menu',
				array(
					'label'      => esc_html__('Top Navigation Dropdown Background', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_dropdown_menu',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_dropdown_link',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_dropdown_link',
				array(
					'label'      => esc_html__('Top Navigation Dropdown Link', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_dropdown_link',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_dropdown_link_hover_bg',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_dropdown_link_hover_bg',
				array(
					'label'      => esc_html__('Top Navigation Dropdown Link Background Hover', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_dropdown_link_hover_bg',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_dropdown_link_hover',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_dropdown_link_hover',
				array(
					'label'      => esc_html__('Top Navigation Dropdown Link Active/Hover', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_dropdown_link_hover',
					'priority'	 => 10
				)
			)
		);

		$wp_customize->add_setting(
			'c9togo_nav_mobile_menu',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_nav_mobile_menu',
				array(
					'label'      => esc_html__('Mobile Top Navigation Background', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_nav_mobile_menu',
					'priority'	 => 10
				)
			)
		);

		//woocommerce store notice
		$wp_customize->add_setting(
			'c9togo_store_notice',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_store_notice',
				array(
					'label'      => esc_html__('WooCommerce Store Notice Background', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_store_notice',
					'priority'	 => 10
				)
			)
		);
		//woocommerce store notice
		$wp_customize->add_setting(
			'c9togo_store_notice_text',
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_hex_color',
				'type' 				=> 'theme_mod',
				'capability' 		=> 'edit_theme_options',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'c9togo_store_notice_text',
				array(
					'label'      => esc_html__('WooCommerce Store Notice Text', 'c9-togo'),
					'section'    => 'colors',
					'settings'	 => 'c9togo_store_notice_text',
					'priority'	 => 10
				)
			)
		);
	}
}
add_action('customize_register', 'c9togo_customize_register');

/**
 * Generate inline styles and minify them if colors are updated
 */
function c9_togo_custom_css_output()
{

	$c9togo_nav_mobile_menu 			= esc_html(get_theme_mod('c9togo_nav_mobile_menu', ''));
	$c9togo_nav_link					= esc_html(get_theme_mod('c9togo_nav_link', ''));
	$c9togo_nav_dropdown_menu 			= esc_html(get_theme_mod('c9togo_nav_dropdown_menu', ''));
	$c9togo_nav_link_hover 				= esc_html(get_theme_mod('c9togo_nav_link_hover', ''));
	$c9togo_nav_dropdown_link 			= esc_html(get_theme_mod('c9togo_nav_dropdown_link', ''));
	$c9togo_nav_dropdown_link_hover_bg	= esc_html(get_theme_mod('c9togo_nav_dropdown_link_hover_bg', ''));
	$c9togo_nav_dropdown_link_hover 	= esc_html(get_theme_mod('c9togo_nav_dropdown_link_hover', ''));
	$c9togo_store_notice				= esc_html(get_theme_mod('c9togo_store_notice', ''));
	$c9togo_store_notice_text			= esc_html(get_theme_mod('c9togo_store_notice_text', ''));
	$c9togo_link_hover					= esc_html(get_theme_mod('c9togo_link_hover', ''));

	$c9_togo_custom_css 	= '';

	if (!empty($c9togo_link_hover)) {
		$c9_togo_custom_css .= '
		.wc-block-grid__product-link:hover .wc-block-grid__product-title, .wc-block-grid__product-link:hover .wc-block-grid__product-title:hover,
		.entry-content a:hover,
		.widget_nav_menu .menu-item a:hover,
		.widget_recent_entries a:hover,
		#wrapper-footer .site-footer a:hover {color: ' . $c9togo_link_hover . ';}';
	}

	if (!empty($c9togo_nav_mobile_menu)) {
		$c9_togo_custom_css .=  '@media only screen and (max-width: 991px) {
			.header-navbar .navbar-small { background-color: ' . $c9togo_nav_mobile_menu . ';}}';
	}

	if (!empty($c9togo_nav_dropdown_menu)) {
		$c9_togo_custom_css .=  '
			.header-navbar .nav .nav-item .dropdown-menu { background-color: ' . $c9togo_nav_dropdown_menu . ';}';
	}

	if (!empty($c9togo_nav_link)) {
		$c9_togo_custom_css .= '
		.navbar-light .navbar-nav .active>.nav-link,
		.navbar-light .navbar-nav .nav-link.active,
		.navbar-light .navbar-nav .nav-link.show,
		.navbar-light .navbar-nav .show>.nav-link,
		.header-navbar .nav-search .btn-nav-search,
		.header-navbar .navbar-toggler,
		.navbar-light .navbar-nav .nav-link {color: ' . $c9togo_nav_link . ';}';
	}

	if (!empty($c9togo_nav_link_hover)) {
		$c9_togo_custom_css .= '
		.header-navbar .navbar:not(.navbar-small) .nav-link:hover,
		.header-navbar .dropdown-item:hover,
		.header-navbar .navbar-toggler:hover,
		.header-navbar .nav-link:hover,
		.header-navbar .nav>.nav-item>.nav-link:focus,
		.header-navbar .nav-search .btn-nav-search:focus,
		.header-navbar .nav-search .btn-nav-search:hover,
		.header-navbar .nav-woocommerce .nav-link:hover,
		.header-navbar .nav-woocommerce .nav-link:focus,
		.navbar-light .navbar-nav .nav-link:focus,
		.navbar-light .navbar-nav .nav-link:hover {color: ' . $c9togo_nav_link_hover . ';}';
	}

	if (!empty($c9togo_nav_dropdown_link)) {
		$c9_togo_custom_css .=  '
			.header-navbar .dropdown-item { color: ' . $c9togo_nav_dropdown_link . ';}';
	}

	if (!empty($c9togo_nav_dropdown_link_hover_bg)) {
		$c9_togo_custom_css .=  '
			.header-navbar .nav .nav-item .dropdown-menu .dropdown-item:hover { background-color: ' . $c9togo_nav_dropdown_link_hover_bg . ';}';
	}

	if (!empty($c9togo_nav_dropdown_link_hover)) {
		$c9_togo_custom_css .=  '
			.header-navbar .nav .nav-item .dropdown-menu .dropdown-item:hover { color: ' . $c9togo_nav_dropdown_link_hover . ';}';
	}

	if (!empty($c9togo_store_notice)) {
		$c9_togo_custom_css .=  '
			.woocommerce-store-notice, p.demo_store { background-color: ' . $c9togo_store_notice . ';}';
	}

	if (!empty($c9togo_store_notice_text)) {
		$c9_togo_custom_css .=  '
			.woocommerce-store-notice, p.demo_store,
			.woocommerce-store-notice, p.demo_store a { color: ' . $c9togo_store_notice_text . ';}';
	}

	if (!empty($c9_togo_custom_css)) {
		require_once(get_template_directory() . '/assets/fonts/class-c9fontstyles.php');

		$c9_togo_custom_css_minified = C9FontStyles::minify_css($c9_togo_custom_css);
		return $c9_togo_custom_css_minified;
	}
}
