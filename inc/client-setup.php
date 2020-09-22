<?php

/**
 * Togo Client Setup
 *
 * @package c9-togo
 */

/* Custom Block Styles */
// Registers a style variation for headings (blueprints behind heading)
register_block_style(
	'core/list',
	array(
		'name'         => 'light-list',
		'label'        => __('White Text', 'c9-togo'),
	)
);

/* add style for turning links white */
register_block_style(
	'c9-blocks/grid',
	array(
		'name'         => 'light-links',
		'label'        => __('White Links', 'c9-togo'),
	)
);

/* add style for green gradient buttons */
register_block_style(
	'core/button',
	array(
		'name'         => 'c9-btn-green',
		'label'        => __('Green Gradient', 'c9-togo'),
	)
);

add_action('after_setup_theme', 'c9_client_setup');
if (!function_exists('c9_client_setup')) {

	function c9_client_setup()
	{

        // Make specific theme colors available in the editor.
        add_theme_support('editor-color-palette', array(
            array(
                'name' => 'light-gray',
                'color'    => '#b0b0b0',
                'slug' => 'color-light-gray',
            ),
            array(
                'name' => 'yellow',
                'color' => '#ffe605',
                'slug'    => 'color-yellow',
            ),
            array(
                'name' => 'faded-green',
                'color'    => '#7adcb4',
                'slug'    => 'color-faded-green',
            ),
            array(
                'name' => 'green',
                'color'    => '#00d082',
                'slug'    => 'color-green',
            ),
            array(
                'name' => 'dark-gray',
                'color'    => '#242424',
                'slug'    => 'color-dark-gray',
            ),
            array(
                'name' => 'white',
                'color'    => '#ffffff',
                'slug' => 'color-white',
            ),
            array(
                'name' => 'orange',
                'color' => '#ffb442',
                'slug'    => 'color-orange',
            ),
            array(
                'name' => 'alt-green',
                'color'    => '#00ff8c',
                'slug'    => 'color-alt-green',
            ),
            array(
                'name' => 'blue',
                'color'    => '#2e46d3',
                'slug'    => 'color-blue',
            ),
            array(
                'name' => 'black',
                'color'    => '#000000',
                'slug'    => 'color-black',
            ),
		));

		global $wp_filesystem;
		// Initialize the WP filesystem, no more using 'file-put-contents' function
		if (empty($wp_filesystem)) {
			require_once(ABSPATH . '/wp-admin/includes/file.php');
			require_once(ABSPATH . '/wp-admin/includes/class-wp-filesystem-base.php');
			require_once(ABSPATH . '/wp-admin/includes/class-wp-filesystem-direct.php');
			WP_Filesystem();
		}

		/**
		 * Apearance > Customizer for fresh sites
		 * Customizer Sample Content
		 */
		add_theme_support(
			'starter-content',
			array(
				'attachments' => array(
					'logo' => array(
						'post_title' => _x('C9 Togo Logo', 'C9 Togo Logo', 'c9-togo'),
						'file' => '/client/client-assets/img/c9-togo-logo-rough.svg',
					),
				),
				'posts'	=> array(
					'home'			=> array(
						'comment_status'	=> 'closed',
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory_uri() . '/client/content/home.html')
					),
					'setup'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Setup', 'c9-togo'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory_uri() . '/client/content/setup.html')
					),
					'styleguide'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Style Guide', 'c9-togo'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory_uri() . '/client/content/styleguide.html')
					),
					'blog'			=> array(
						'post_content'			=> __('This page will show all of the blog posts once you have populated your database with blog items.', 'c9-togo')
					),
				),
				'options'			=> array(
					'show_on_front'		=> 'page',
					'page_on_front'		=> '{{home}}',
					'page_for_posts' 	=> '{{blog}}',
					'blogname'			=> 'C9 Togo',
					'blogdescription'	=> __('A blocks-based WordPress Theme for restaurants, breweries, or dispensaries offering online ordering, pickup, togo, or local delivery with the power of WooCommerce.', 'c9-togo'),
				),
				'theme_mods'		=> array(
					'custom_logo' 			=> '{{logo}}',
					'c9_show_search'		=> 'show',
					'c9_copyright_content'	=> '&copy; 2020. <a href="https://www.covertnine.com" title="Web design company in Chicago" target="_blank">WordPress Website design by COVERT NINE</a>.',
					'c9_default_font'		=> 'yes',
					'c9_heading_font'		=> 'Sen:400,700,800',
					'c9_subheading_font'	=> 'Sen:400,700,800',
					'c9_body_font'			=> 'Sen:400,700,800',
					'c9_author_visible'		=> 'hide',
					'c9_blog_sidebar'		=> 'hide',
					'c9_archive_sidebar'	=> 'hide',
					'c9_show_social'		=> 'show',
					'c9_twitter'			=> '#',
					'c9_instagram'			=> '#',
					'c9_spotify'			=> '#',
					'c9_youtube'			=> '#',
					'c9_linkedin'			=> '#',


				),
				'nav_menus'		=> array(
					'primary'		=> array(
						'name'			=>	__('Top Navigation Menu', 'c9-togo'),
						'items'			=> array(
							'page_home',
							'page_setup'	=> array(
								'type'		=> 'post_type',
								'object'	=> 'page',
								'object_id'	=> '{{setup}}',
							),
							'page_styleguide'	=> array(
								'type'		=> 'post_type',
								'object'	=> 'page',
								'object_id'	=> '{{styleguide}}',
							),
							'page_blog'
						),
					),
				),
				'widgets'	=> array(
					'footerfull'	=> array(
						'c9togo_resources'	=> array(
							'text',
							array(
								'title'	=> __('Secondary Menu', 'c9-togo'),
								'text'	=> '<ul id="menu-footer-resources" class="menu">
									<li class="menu-item">
										<a href="{{setup}}">Setup</a>
									</li>
									<li class="menu-item">
										<a href="{{blog}}">Blog</a>
									</li>
									<li class="menu-item">
										<a href="{{styleguide}}">Style Guide</a>
									</li>
									<li class="menu-item">
										<a href="{{home}}">Home</a>
									</li>
								</ul>'
							)
						),
						'c9togo_company'	=> array(
							'text',
							array(
								'title'	=> __('Company Menu', 'c9-togo'),
								'text'	=> '<ul id="menu-footer-company" class="menu">
									<li class="menu-item">
										<a href="#">Our History</a>
									</li>
									<li class="menu-item">
										<a href="/#browse-menu">Browse Menu</a>
									</li>
									<li class="menu-item">
										<a href="/#order">Order Now</a>
									</li>
									<li class="menu-item">
										<a href="#">Contact Us</a>
									</li>
									<li class="menu-item">
										<a href="#">Privacy Policy</a>
									</li>
								</ul>'
							)
						),
						'meta_custom' => array('meta', array(
							'title'	=> __('WordPress Meta', 'c9-togo'),
						)),
						'c9togo_about' => array(
							'text',
							array(
								'title'	=> __('About C9-Togo', 'c9-togo'),
								'text'	=> __('Be sure to activate the <strong>C9 Blocks Plugin</strong> during theme setup. The blocks plugin includes the custom WordPress blocks for tabs, toggles, and the responsive grid system that makes the theme look super duper.', 'c9-togo')
							)
						)
					),
					'right-sidebar'	=> array(
						'search',
						'c9togo_about' => array(
							'text',
							array(
								'title'	=> __('About C9-Togo', 'c9-togo'),
								'text'	=> __('Be sure to activate the <strong>C9 Blocks Plugin</strong> and <strong>C9 Admin Dashboard</strong> during theme setup. The blocks plugin includes the custom WordPress blocks for tabs, toggles, and the responsive grid system that makes the theme look super duper.', 'c9-togo')
							)
						),
						'meta_custom' => array('meta', array(
							'title'	=> 'Meta Widget',
						)),
					),
					'left-sidebar'	=> array(
						'search',
						'c9togo_about' => array(
							'text',
							array(
								'title'	=> __('About C9-Togo', 'c9-togo'),
								'text'	=> __('Be sure to activate the <strong>C9 Blocks Plugin</strong> and <strong>C9 Admin Dashboard</strong> during theme setup. The blocks plugin includes the custom WordPress blocks for tabs, toggles, and the responsive grid system that makes the theme look super duper.', 'c9-togo')
							)
						),
						'meta_custom' => array('meta', array(
							'title'	=> __('Meta Widget', 'c9-togo'),
						)),
					),
				),
			)
		);

	}
}
