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
			)
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
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/home.html')
					),
					'setup'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Setup', 'c9-togo'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/setup.html')
					),
					'styleguide'		=> array(
						'comment_status'	=> 'closed',
						'post_type'			=> 'page',
						'post_title'		=> __('Style Guide', 'c9-togo'),
						'post_content'		=>  $wp_filesystem->get_contents(get_template_directory() . '/client/content/styleguide.html')
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



/**
 * Registering block patterns category with core Gutenberg blocks
 */
add_action('init', 'c9togo_register_block_patterns_cat');
function c9togo_register_block_patterns_cat()
{
	if (class_exists('WP_Block_Patterns_Registry')) {
		register_block_pattern_category(
			'COVERT NINE',
			array('label' => __('C9 All Patterns', 'c9-togo'))
		);
		register_block_pattern_category(
			'Video',
			array('label' => __('C9 Video', 'c9-togo'))
		);
		register_block_pattern_category(
			'Audio',
			array('label' => __('C9 Audio', 'c9-togo'))
		);
		register_block_pattern_category(
			'Article',
			array('label' => __('C9 Article', 'c9-togo'))
		);
	}
}

/**
 * Registering block patterns with core Gutenberg blocks
 */
add_action('init', 'c9togo_register_block_patterns');
function c9togo_register_block_patterns()
{
	if (class_exists('WP_Block_Patterns_Registry')) {

		register_block_pattern(
			'c9-togo/c9-coming-soon-core',
			array(
				'title'			=> __('Coming Soon Opt-in', 'c9-togo'),
				'description' 	=> __('Start building your audience before you launch with a coming soon page that captures emails or phone numbers.', 'c9-togo'),
				'keywords'		=> array('landing page', 'page', 'template', 'splash', 'coming soon'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-togo/client/client-assets/img/build-burger-ingredients.jpg\",\"id\":2789,\"hasParallax\":true,\"dimRatio\":80,\"overlayColor\":\"color-black\",\"minHeight\":995,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-80 has-color-black-background-color has-background-dim has-parallax\" style=\"background-image:url(/wp-content/themes/c9-togo/client/client-assets/img/build-burger-ingredients.jpg);min-height:995px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/feather-logo-gradient-rb.svg\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->\n<h1 class=\"has-text-align-center\">Something Great is Coming Soon</h1>\n<!-- /wp:heading -->\n\n<!-- wp:spacer {\"height\":60} -->\n<div style=\"height:60px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-center has-small-font-size\">Click the button below to get notified via email when we're up and running</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":10} -->\n<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"textColor\":\"color-black\",\"className\":\"is-style-c9-btn-green\"} -->\n<div class=\"wp-block-button is-style-c9-btn-green\"><a class=\"wp-block-button__link has-color-black-color has-text-color\">Get Notifications</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"textColor\":\"color-white\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-white-color has-text-color\">Learn More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:cover -->",
				'categories'	=> array('COVERT NINE', 'header', 'buttons', 'text')
			)
		);
		register_block_pattern(
			'c9-togo/c9-video-embed-core',
			array(
				'title'			=> __('Video Embed + YouTube Link', 'c9-togo'),
				'description' 	=> __('Feature a video file you upload with a link to a YouTube video link.', 'c9-togo'),
				'content'		=> "<!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaId\":1935,\"mediaLink\":\"#\",\"mediaType\":\"video\",\"style\":{\"color\":{\"background\":\"#f3f3f3\"}}} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile has-background\" style=\"background-color:#f3f3f3\"><figure class=\"wp-block-media-text__media\"><video controls src=\"/wp-content/themes/c9-togo/client/client-assets/img/c9-starter-templates-clip.mp4\"></video></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":3} -->\n<h3>Using C9 Blocks Plugin</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"placeholder\":\"Content…\",\"fontSize\":\"small\"} -->\n<p class=\"has-small-font-size\">If you haven't, we highly recommend installing the C9 Blocks and C9 Admin Dashboard Plugins. <strong>For animations, and additional child theme features like a single page animated website, get on the C9 email list.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"https://www.youtube.com/watch?v=8qyP5abkoe4\" target=\"_blank\" rel=\"noreferrer noopener\">YouTube Video Pop</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text -->",
				'categories'	=> array('COVERT NINE', 'Video', 'header', 'buttons')
			)
		);
		register_block_pattern(
			'c9-togo/c9-information-dialog-core',
			array(
				'title'			=> __('Information Dialog Two Buttons', 'c9-togo'),
				'description' 	=> __('Highlight important information, and link to two separate places with buttons.', 'c9-togo'),
				'content'		=> "<!-- wp:group {\"style\":{\"color\":{\"background\":\"#f7f7f7\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":1,\"fontSize\":\"huge\"} -->\n<h1 class=\"has-huge-font-size\"><strong><span class=\"has-inline-color has-color-green-color\">C9</span></strong> — Group Block</h1>\n<!-- /wp:heading -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">COVERT NINE - The nine essentials ingredients for good digital marketing. Copywriting, Design, Development, SEO, PPC, Social Media, Email, Videos, Photograph</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"textColor\":\"color-black\",\"className\":\"is-style-c9-btn-green\"} -->\n<div class=\"wp-block-button is-style-c9-btn-green\"><a class=\"wp-block-button__link has-color-black-color has-text-color\">Learn More</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">Contact Us</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:spacer {\"height\":20} -->\n<div style=\"height:20px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div></div>\n<!-- /wp:group -->",
				'categories'	=> array('COVERT NINE', 'text', 'buttons')
			)
		);
		register_block_pattern(
			'c9-togo/c9-spotify-core',
			array(
				'title'			=> __('Spotify Embed, Track Listing + Button', 'c9-togo'),
				'description' 	=> __('Embed a playlist, track listing or lyrics, and a button to open it up!', 'c9-togo'),
				'content'		=> "<!-- wp:columns {\"style\":{\"color\":{\"background\":\"#e1fff3\"}}} -->\n<div class=\"wp-block-columns has-background\" style=\"background-color:#e1fff3\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:embed {\"url\":\"https://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":5} -->\n<h5 class=\"has-text-align-left\">Spotify Stream Block</h5>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Track Listing Song Name</li><li>Under Control</li><li>The October</li><li>Kids \\\&amp; Knives<br><strong>Savile Remix</strong></li><li>Out of Season (Acoustic)</li><li>1981 (Demo)</li><li>The November</li></ul>\n<!-- /wp:list -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":25,\"textColor\":\"color-success\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-success-color has-text-color\" href=\"https://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\" style=\"border-radius:25px\">Listen on Spotify</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Audio')
			)
		);
		register_block_pattern(
			'c9-togo/c9-article-450-core',
			array(
				'title'			=> __('Article 450 Words', 'c9-togo'),
				'description' 	=> __('Get your article laid out before writing with a 450 word placeholder and some imagery to tet you started.', 'c9-togo'),
				'content'		=> "<!-- wp:image {\"align\":\"full\",\"id\":1908,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image alignfull size-full\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/food-table-overview-shot.jpg\" alt=\"\" class=\"wp-image-1908\"/><figcaption><strong>Full Width Image Block</strong> C9 Logo + Photo CC0.</figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:spacer {\"height\":57} -->\n<div style=\"height:57px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"><!-- wp:paragraph -->\n<p><strong>Author Name</strong><br>Author Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":6,\"textColor\":\"c9music-black\"} -->\n<h6 class=\"has-c-9-music-black-color has-text-color\">December 16th, 2084</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"dropCap\":true} -->\n<p class=\"has-drop-cap\">Dum velit laoreet id donec. In fermentum posuere urna nec tincidunt praesent. Amet purus gravida quis blandit turpis cursus in. Tincidunt tortor aliquam nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Paragraphs inside of columns</strong>. Cras fermentum odio. Facilisi nullam vehicula ipsum a arcu cursus vitae. Id leo in vitae turpis massa sed elementum tempus. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. </p><cite>No one actually said this--Tim</cite></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Heading inside of article</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In fermentum posuere urna nec. Velit scelerisque in dictum non consectetur a erat nam. Gravida dictum fusce ut placerat orci. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. In eu mi bibendum neque egestas congue quisque egestas diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Vel fringilla est ullamcorper eget nulla. Lacinia at quis risus sed vulputate odio ut enim blandit. Ut pharetra sit amet aliquam id diam. Tristique nulla aliquet enim tortor at auctor. Justo nec ultrices dui sapien. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Dictum sit amet justo donec.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"10%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:10%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":2799,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/chips-guac-salsa-1024x683.jpg\" alt=\"\" class=\"wp-image-2799\"/><figcaption>Photo Caption</figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"dropCap\":true,\"fontSize\":\"medium\"} -->\n<p class=\"has-drop-cap has-medium-font-size\">Bring complex landing pages to life in minutes from section + page templates or build pages from scratch using C9 Grid and C9 Post Grid blocks. But, you can't do that if you don't download C9 Blocks when you install the C9 Theme.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":18}}} -->\n<p style=\"font-size:18px\">This layout uses core blocks from WordPress including columns, images, paragraphs, and more paragraphs!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Now go make your own theme!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/feather-logo-gradient-rb.svg\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":2797,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/tacos-1024x683.jpg\" alt=\"\" class=\"wp-image-2797\"/><figcaption><strong>Photo Caption</strong></figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. Quam pellentesque nec nam aliquam sem. Ut diam quam nulla porttitor massa id neque aliquam vestibulum. Mauris augue neque gravida in fermentum et. Risus commodo viverra maecenas accumsan. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Elit eget gravida cum sociis natoque penatibus. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Nec sagittis aliquam malesuada bibendum arcu vitae elementum. Id cursus metus aliquam eleifend mi in nulla posuere. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nec tincidunt praesent semper feugiat nibh sed pulvinar. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\"} -->\n<p class=\"has-text-align-left\">Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-left has-small-font-size\"><strong>Share with your bestie</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:social-links {\"align\":\"left\"} -->\n<ul class=\"wp-block-social-links alignleft\"><!-- wp:social-link {\"url\":\"facebook.com/covertnine\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://twitter.com/covertnine\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://instagram.com/covertnine\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://github.com/covertnine\",\"service\":\"github\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://www.linkedin.com/company/10990511\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Article', 'text', 'header', 'columns')
			)
		);
		register_block_pattern(
			'c9-togo/c9-article-600-core',
			array(
				'title'			=> __('Article 600 Words', 'c9-togo'),
				'description' 	=> __('Get your article laid out before writing with a 600 word placeholder and some imagery to tet you started.', 'c9-togo'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-togo/client/client-assets/img/build-burger-ingredients.jpg\",\"id\":2789,\"hasParallax\":true,\"dimRatio\":60,\"overlayColor\":\"color-primary\",\"minHeight\":772,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-60 has-color-primary-background-color has-background-dim has-parallax\" style=\"background-image:url(/wp-content/themes/c9-togo/client/client-assets/img/build-burger-ingredients.jpg);min-height:772px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Write title…\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\"><strong>C9 Togo Article </strong>Block Pattern</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"><!-- wp:paragraph -->\n<p><strong>Author Name</strong><br>Author Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":6,\"textColor\":\"c9music-black\"} -->\n<h6 class=\"has-c-9-music-black-color has-text-color\">December 16th, 2084</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"dropCap\":true} -->\n<p class=\"has-drop-cap\">Dum velit laoreet id donec. In fermentum posuere urna nec tincidunt praesent. Amet purus gravida quis blandit turpis cursus in. Tincidunt tortor aliquam nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Paragraphs inside of columns</strong>. Cras fermentum odio. Facilisi nullam vehicula ipsum a arcu cursus vitae. Id leo in vitae turpis massa sed elementum tempus. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Maecenas accumsan lacus vel facilisis volutpat. Arcu risus quis varius quam quisque. Semper feugiat nibh sed pulvinar. Molestie a iaculis at erat pellentesque. Ullamcorper malesuada proin libero nunc consequat interdum varius sit. Nisl nisi scelerisque eu ultrices vitae auctor eu augue. Orci sagittis eu volutpat odio facilisis mauris sit. Senectus et netus et malesuada fames.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:pullquote -->\n<figure class=\"wp-block-pullquote\"><blockquote><p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. </p><cite>No one actually said this--Tim</cite></blockquote></figure>\n<!-- /wp:pullquote -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:image {\"align\":\"right\",\"id\":2792,\"width\":315,\"height\":209,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"alignright size-large is-resized\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/chicken-wings-1024x683.jpg\" alt=\"\" class=\"wp-image-2792\" width=\"315\" height=\"209\"/><figcaption><strong>Photo is CC0.</strong></figcaption></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Heading inside of article</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In fermentum posuere urna nec. Velit scelerisque in dictum non consectetur a erat nam. Gravida dictum fusce ut placerat orci. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. In eu mi bibendum neque egestas congue quisque egestas diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Vel fringilla est ullamcorper eget nulla. Lacinia at quis risus sed vulputate odio ut enim blandit. Ut pharetra sit amet aliquam id diam. Tristique nulla aliquet enim tortor at auctor. Justo nec ultrices dui sapien. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Dictum sit amet justo donec.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":28} -->\n<div style=\"height:28px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>Now share this article or my boss will yell at me.</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"10%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:10%\"><!-- wp:image {\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"/wp-content/themes/c9-togo/client/client-assets/img/feather-logo-gradient-rb.svg\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:social-links {\"align\":\"center\"} -->\n<ul class=\"wp-block-social-links aligncenter\"><!-- wp:social-link {\"url\":\"facebook.com/covertnine\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://twitter.com/covertnine\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://instagram.com/covertnine\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://github.com/covertnine\",\"service\":\"github\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://www.linkedin.com/company/10990511\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links -->",
				'categories'	=> array('COVERT NINE', 'Article', 'text', 'header', 'columns')
			)
		);
		register_block_pattern(
			'c9-togo/c9-style-guide-core',
			array(
				'title'			=> __('C9 Togo Style Guide', 'c9-togo'),
				'description'	=> __('A style guide with type, buttons, and core blocks frequently used.', 'c9-togo'),
				'content'		=> "<!-- wp:cover {\"url\":\"/wp-content/themes/c9-togo/client/client-assets/img/widescreen-homepage-hero-1920x1200-v2.jpg\",\"id\":2805,\"hasParallax\":true,\"dimRatio\":70,\"minHeight\":611,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-70 has-background-dim has-parallax\" style=\"background-image:url(/wp-content/themes/c9-togo/client/client-assets/img/widescreen-homepage-hero-1920x1200-v2.jpg);min-height:611px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"color-white\",\"fontSize\":\"huge\"} -->\n<h1 class=\"has-text-align-center has-color-white-color has-text-color has-huge-font-size\"><strong>Know where you're going?</strong><br>C9 Helper Style Guide</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":2,\"backgroundColor\":\"color-success\"} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-color-success-background-color has-background\" href=\"#\" style=\"border-radius:2px\" target=\"_blank\" rel=\"noreferrer noopener\">Download now</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"borderRadius\":2,\"textColor\":\"color-white\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-white-color has-text-color\" href=\"#\" style=\"border-radius:2px\">Tutorial Videos</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:spacer -->\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:search {\"label\":\"Or search through our archives\",\"placeholder\":\"How to design a signup page using C9 Blocks....\",\"width\":50,\"widthUnit\":\"%\",\"buttonText\":\"Search\",\"align\":\"center\"} /--></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:group {\"align\":\"wide\"} -->\n<div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-black\"} -->\n<p class=\"has-text-align-center has-color-black-color has-text-color\">Three calls to action so your visitors can pick their lane, and what they want to see next.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Ask a question</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-black\"} -->\n<p class=\"has-text-align-center has-color-black-color has-text-color\">Sign up for a newsletter or hit the most popular category of your shop.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Sign up for alerts</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-black\"} -->\n<p class=\"has-text-align-center has-color-black-color has-text-color\">Consider your three most popular user paths and use those links in these three buttons.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Buy Tickets</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:spacer {\"height\":70} -->\n<div style=\"height:70px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"textAlign\":\"center\"} -->\n<h2 class=\"has-text-align-center\"><span class=\"has-inline-color has-color-black-color\">C9 Togo</span> Core Blocks Typography</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"color-yellow\"} -->\n<h1 class=\"has-text-align-center has-color-yellow-color has-text-color\">Heading One</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"textColor\":\"color-orange\"} -->\n<h2 class=\"has-text-align-center has-color-orange-color has-text-color\">Heading Two</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"color-gray\"} -->\n<h3 class=\"has-text-align-center has-color-gray-color has-text-color\">Heading Three</h3>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"textColor\":\"color-black\"} -->\n<h4 class=\"has-text-align-center has-color-black-color has-text-color\">Heading Four</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":5,\"textColor\":\"color-danger\"} -->\n<h5 class=\"has-text-align-center has-color-danger-color has-text-color\">Heading Five</h5>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\n<h6 class=\"has-text-align-center\">Heading Six</h6>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"c9music-faded-red\"} -->\n<h1 class=\"has-text-align-center has-c-9-music-faded-red-color has-text-color\">Heading One</h1>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"textColor\":\"c9music-black\"} -->\n<h2 class=\"has-text-align-center has-c-9-music-black-color has-text-color\">Heading Two</h2>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"c9music-dark-gray\"} -->\n<h3 class=\"has-text-align-center has-c-9-music-dark-gray-color has-text-color\">Heading Three</h3>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"textColor\":\"c9music-red\"} -->\n<h4 class=\"has-text-align-center has-c-9-music-red-color has-text-color\">Heading Four</h4>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":5,\"textColor\":\"c9music-mint-green\"} -->\n<h5 class=\"has-text-align-center has-c-9-music-mint-green-color has-text-color\">Heading Five</h5>\n<!-- /wp:heading -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\n<h6 class=\"has-text-align-center\">Heading Six</h6>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"fontSize\":\"small\"} -->\n<p class=\"has-small-font-size\"><strong>Small Font Paragraph. </strong>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"dropCap\":true,\"fontSize\":\"normal\"} -->\n<p class=\"has-drop-cap has-normal-font-size\">Pat enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"normal\"} -->\n<p class=\"has-normal-font-size\"><strong>Normal Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\n<p class=\"has-medium-font-size\"><strong>Medium Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\n<p class=\"has-large-font-size\"><strong>Large Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"fontSize\":\"huge\"} -->\n<p class=\"has-huge-font-size\"><strong>Large Font Paragraph. </strong>Ut enim ad minim veniam, quis. </p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":6} -->\n<h6>Ordered List</h6>\n<!-- /wp:heading -->\n\n<!-- wp:list {\"ordered\":true} -->\n<ol><li>List Item</li><li>List Item</li><li>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin.</li><li>List Item</li></ol>\n<!-- /wp:list --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":6} -->\n<h6>Unordered List</h6>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>List Item</li><li>List Item</li><li>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin.</li><li>List Item</li></ul>\n<!-- /wp:list --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\n<h6 class=\"has-text-align-center\">Separators (HR)</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-faded-red\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-faded-red-background-color has-c-9-music-faded-red-color\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-mint-green\",\"className\":\"is-style-wide\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-mint-green-background-color has-c-9-music-mint-green-color is-style-wide\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-red\",\"className\":\"is-style-dots\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-red-background-color has-c-9-music-red-color is-style-dots\"/>\n<!-- /wp:separator -->\n\n<!-- wp:separator {\"color\":\"c9music-black\",\"className\":\"is-style-dots\"} -->\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-black-background-color has-c-9-music-black-color is-style-dots\"/>\n<!-- /wp:separator -->\n\n<!-- wp:spacer -->\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->",
				'categories'	=> array('COVERT NINE', 'Article', 'text', 'header', 'columns')
			)
		);
	}
}
