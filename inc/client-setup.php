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
	}
}

/**
 * Registering block patterns category with core Gutenberg blocks
 */
add_action('init', 'c9starter_register_block_patterns_cat');
function c9starter_register_block_patterns_cat()
{
	if (class_exists('WP_Block_Patterns_Registry')) {
		register_block_pattern_category(
			'COVERT NINE',
			array('label' => __('C9 All Patterns', 'c9-togo'))
		);
		register_block_pattern_category(
			'landingpage',
			array('label' => __('C9 Page Templates', 'c9-togo'))
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
add_action('init', 'c9starter_register_block_patterns');
function c9starter_register_block_patterns()
{
	if (class_exists('WP_Block_Patterns_Registry')) {

		$theme_directory_uri = get_template_directory_uri();
		$image_path_1 = $theme_directory_uri . '/client/client-assets/img/build-burger-ingredients.jpg';
		$image_path_2 = $theme_directory_uri . '/client/client-assets/img/chips-guac-salsa.jpg';
		$image_path_3 = $theme_directory_uri . '/client/client-assets/img/food-table-overview-shot-1024x683.jpg';
		$image_path_4 = $theme_directory_uri . '/client/client-assets/img/burger-sausauge-fries-msutard-1024x672.jpg';
		$image_path_5 = $theme_directory_uri . '/client/client-assets/img/chicken-wings-1024x683.jpg';
		$image_path_6 = $theme_directory_uri . '/client/client-assets/img/tacos-1024x683.jpg';
		$image_path_7 = $theme_directory_uri . '/client/client-assets/img/burger-sausauge-fries-msutard.jpg';
		$video_path_1 = $theme_directory_uri . '/client/client-assets/img/c9-starter-templates-clip.mp4';
		$logo_path = $theme_directory_uri . '/client/client-assets/img/feather-logo-gradient-rb.svg';

		$c9_coming_soon_core_content = "<!-- wp:cover {\"url\":\"" . esc_url($image_path_1) . "\",\"id\":2789,\"dimRatio\":80,\"overlayColor\":\"color-primary\",\"minHeight\":995,\"minHeightUnit\":\"px\",\"align\":\"full\",\"className\":\"has-background-dim-80 has-color-primary-background-color has-background-dim\"} -->
<div class=\"wp-block-cover alignfull has-background-dim-80 has-color-primary-background-color has-background-dim container\" style=\"min-height:995px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-color-primary-background-color has-background-dim-80 has-background-dim\"></span><img class=\"wp-block-cover__image-background wp-image-2789\" alt=\"\" src=\"" . esc_url($image_path_1) . "\" data-object-fit=\"cover\"/><div class=\"wp-block-cover__inner-container\"><!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->
<figure class=\"wp-block-image aligncenter size-large is-resized\"><img src=\"" . esc_url($logo_path) . "\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure>
<!-- /wp:image -->

<!-- wp:heading {\"textAlign\":\"center\",\"level\":1} -->
<h1 class=\"has-text-align-center\"><mark style=\"background-color:rgba(0, 0, 0, 0)\" class=\"has-inline-color has-color-white-color\">Something Great is Coming Soon</mark></h1>
<!-- /wp:heading -->

<!-- wp:spacer {\"height\":\"60px\"} -->
<div style=\"height:60px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"small\"} -->
<p class=\"has-text-align-center has-small-font-size\"><mark style=\"background-color:rgba(0, 0, 0, 0)\" class=\"has-inline-color has-color-white-color\">Click the button below to get notified via email when we're up and running</mark></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {\"height\":\"10px\"} -->
<div style=\"height:10px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>
<!-- /wp:spacer -->

<!-- wp:buttons {\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->
<div class=\"wp-block-buttons\"><!-- wp:button {\"className\":\"is-style-c9-btn-green\"} -->
<div class=\"wp-block-button is-style-c9-btn-green\"><a class=\"wp-block-button__link wp-element-button\">Get Notifications</a></div>
<!-- /wp:button -->

<!-- wp:button {\"textColor\":\"color-white\",\"className\":\"is-style-outline\"} -->
<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-white-color has-text-color wp-element-button\">Learn More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>
<!-- /wp:cover -->";



		register_block_pattern(
			'c9-togo/c9-coming-soon-core',
			array(
				'title'			=> __('Coming Soon Opt-in', 'c9-togo'),
				'description' 	=> __('Start building your audience before you launch with a coming soon page that captures emails or phone numbers.', 'c9-togo'),
				'content'		=> $c9_coming_soon_core_content,
				'categories'	=> array('COVERT NINE', 'header', 'buttons', 'text', 'landingpage')
			),
		);
		/*

		*/
		register_block_pattern(
			'c9-togo/c9-watch-video-core',
			array(
				'title'			=> __('Watch Video', 'c9-togo'),
				'description' 	=> __('Focus the page attention on a video button link, with an auto-playing video clip in the background.', 'c9-togo'),
				'content'		=> "<!-- wp:cover {\"url\":\"" . esc_url($video_path_1) . "\",\"id\":3697,\"dimRatio\":80,\"overlayColor\":\"color-primary\",\"backgroundType\":\"video\",\"minHeight\":995,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\r\n<div class=\"wp-block-cover alignfull has-background-dim-80 has-color-primary-background-color has-background-dim\" style=\"min-height:995px\"><video class=\"wp-block-cover__video-background\" autoplay muted loop playsinline src=\"" . esc_url($video_path_1) . "\"></video><div class=\"wp-block-cover__inner-container\"><!-- wp:group {\"style\":{\"color\":{\"background\":\"#ededed\"}}} -->\r\n<div class=\"wp-block-group has-background\" style=\"background-color:#ededed\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\r\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"" . esc_url($logo_path) . "\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure></div>\r\n<!-- /wp:image -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"style\":{\"color\":{\"text\":\"#222222\"}}} -->\r\n<h1 class=\"has-text-align-center has-text-color\" style=\"color:#222222\">Watch the video to learn more.</h1>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph {\"align\":\"center\",\"textColor\":\"color-primary\",\"fontSize\":\"small\"} -->\r\n<p class=\"has-text-align-center has-color-primary-color has-text-color has-small-font-size\">Watch the video below to learn how to build page templates with C9 Blocks</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:spacer {\"height\":29} -->\r\n<div style=\"height:29px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer -->\r\n\r\n<!-- wp:buttons {\"align\":\"center\"} -->\r\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\r\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"https://www.youtube.com/watch?v=8qyP5abkoe4\">Building Pages</a></div>\r\n<!-- /wp:button --></div>\r\n<!-- /wp:buttons --></div></div>\r\n<!-- /wp:group --></div></div>\r\n<!-- /wp:cover -->",
				'categories'	=> array('COVERT NINE', 'header', 'buttons', 'text', 'Video', 'landingpage')
			),
		);
		register_block_pattern(
			'c9-togo/c9-video-embed-core',
			array(
				'title'			=> __('Video Embed + YouTube Link', 'c9-togo'),
				'description' 	=> __('Feature a video file you upload with a link to a YouTube video link.', 'c9-togo'),
				'content'		=> "<!-- wp:media-text {\"mediaPosition\":\"right\",\"mediaId\":1935,\"mediaLink\":\"#\",\"mediaType\":\"video\"} -->\n<div class=\"wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile\"><figure class=\"wp-block-media-text__media\"><video controls src=\"" . esc_url($video_path_1) . "\"></video></figure><div class=\"wp-block-media-text__content\"><!-- wp:heading {\"level\":3} -->\n<h3>Using C9 Blocks Plugin</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"placeholder\":\"Content…\",\"fontSize\":\"small\"} -->\n<p class=\"has-small-font-size\">If you haven't, we highly recommend installing the C9 Blocks and C9 Admin Dashboard Plugins. <strong>For animations, and additional child theme features like a single page animated website, get on the C9 email list.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"https://www.youtube.com/watch?v=8qyP5abkoe4\" target=\"_blank\" rel=\"noreferrer noopener\">YouTube Video Pop</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:media-text -->",
				'categories'	=> array('COVERT NINE', 'Video', 'header', 'buttons')
			),
		);
		register_block_pattern(
			'c9-togo/c9-information-dialog-core',
			array(
				'title'			=> __('Information Dialog Two Buttons', 'c9-togo'),
				'description' 	=> __('Highlight important information, and link to two separate places with buttons.', 'c9-togo'),
				'content'		=> "<!-- wp:group {\"backgroundColor\":\"color-info\"} -->\n<div class=\"wp-block-group has-color-info-background-color has-background\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"level\":1,\"fontSize\":\"huge\"} -->\n<h1 class=\"has-huge-font-size\"><span class=\"has-inline-color has-color-danger-color\"><strong>C9</strong></span> — Group Block</h1>\n<!-- /wp:heading -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">COVERT NINE - The nine essentials ingredients for good digital marketing. Copywriting, Design, Development, SEO, PPC, Social Media, Email, Videos, Photograph</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra.\&nbsp;Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra.\&nbsp;Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra.\&nbsp;</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":50} -->\n<div style=\"height:50px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">Learn More</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">Contact Us</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n<!-- wp:spacer {\"height\":20} -->\n<div style=\"height:20px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer --></div></div>\n<!-- /wp:group -->",
				'categories'	=> array('COVERT NINE', 'text', 'buttons')
			),
		);
		register_block_pattern(
			'c9-togo/c9-spotify-core',
			array(
				'title'			=> __('Spotify Embed, Track Listing + Button', 'c9-togo'),
				'description' 	=> __('Embed a playlist, track listing or lyrics, and a button to open it up!', 'c9-togo'),
				'content'		=> "<!-- wp:columns {\"backgroundColor\":\"color-info\"} -->\n<div class=\"wp-block-columns has-color-info-background-color has-background\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:embed {\"url\":\"https://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":5} -->\n<h5 class=\"has-text-align-left\">Spotify Stream Block</h5>\n<!-- /wp:heading -->\n\n<!-- wp:list -->\n<ul><li>Track Listing Song Name</li><li>Under Control</li><li>The October</li><li>Kids \&amp; Knives<br><strong>Savile Remix</strong></li><li>Out of Season (Acoustic)</li><li>1981 (Demo)</li><li>The November</li></ul>\n<!-- /wp:list -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":25,\"textColor\":\"color-success\",\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-success-color has-text-color\" href=\"https://open.spotify.com/album/4wNkTCWvNYJr8BL4obFo3y?si=YyBupJfnSi2lGBg_71TvGQ\" style=\"border-radius:25px\">Listen on Spotify</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Audio')
			),
		);
		register_block_pattern(
			'c9-togo/c9-podcast-embed-core',
			array(
				'title'			=> __('Podcast Episode', 'c9-togo'),
				'description' 	=> __('Feature a show photo, audio embed file, and everything you need for a podcast episode post.', 'c9-togo'),
				'keywords'		=> array('landing page', 'spotify', 'template', 'embed', 'audio'),
				'content'		=> "<!-- wp:columns {\"style\":{\"color\":{\"background\":\"#f3f3f3\"}}} -->\n<div class=\"wp-block-columns has-background\" style=\"background-color:#f3f3f3\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"50%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:50%\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"fontSize\":\"large\"} -->\n<h1 class=\"has-text-align-center has-large-font-size\">♫ Episode 919 ♫<br><span class=\"has-inline-color has-c-9-music-mint-green-color\">Don't listen to Pew-Pew.m4a</span></h1>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Content…\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-center has-small-font-size\">If you haven't, we highly recommend installing the <a href=\"#\">C9 Blocks</a> and <a href=\"#\">C9 Admin Dashboard Plugins</a>. <strong>For animations, and additional child theme features like a single page animated website, get on the C9 email list.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:list -->\n<ul class=\"\"><!-- wp:list-item -->\n<li class=\"\"><strong><strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">✓</span></strong> Song Name</strong> - Track Title</li>\n<!-- /wp:list-item -->\n\n<!-- wp:list-item -->\n<li class=\"\"><strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">✓</span> Song Name</strong> - Track Title</li>\n<!-- /wp:list-item -->\n\n<!-- wp:list-item -->\n<li class=\"\"><strong><span class=\"has-inline-color has-c-9-music-mint-green-color\">✓</span> Song Name</strong> - Track Title</li>\n<!-- /wp:list-item --></ul>\n<!-- /wp:list -->\n\n<!-- wp:spacer {\"height\":19} -->\n<div style=\"height:19px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\" href=\"https://www.youtube.com/watch?v=8qyP5abkoe4\" target=\"_blank\" rel=\"noreferrer noopener\">YouTube Video Pop</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"className\":\"size-large is-resized\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"" . esc_url($image_path_3) . "\" alt=\"\" /></figure>\n<!-- /wp:image -->\n\n<!-- wp:audio {\"id\":1974} -->\n<figure class=\"wp-block-audio\"><audio controls src=\"/wp-content/themes/c9-starter/client/client-assets/audio/pew-pew.m4a\"></audio></figure>\n<!-- /wp:audio --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Video', 'header', 'buttons', 'Audio', 'landingpage')
			),
		);

		register_block_pattern(
			'c9-togo/c9-events-core',
			array(
				'title'			=> __('Events Schedule', 'c9-togo'),
				'description' 	=> __('Add a bunch of dates and places and links to a table with a nice header and FAQ, cause events are coming back!', 'c9-togo'),
				'keywords'		=> array('landing page', 'spotify', 'template', 'embed', 'audio', 'music', 'shows', 'schedule', 'table'),
				'content'		=> "<!-- wp:cover {\"url\":\"" . esc_url($image_path_1) . "\",\"id\":1895,\"overlayColor\":\"c9music-black\",\"focalPoint\":{\"x\":\"0.49\",\"y\":\"0.67\"},\"minHeight\":849,\"minHeightUnit\":\"px\",\"contentPosition\":\"bottom center\",\"align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-c-9-music-black-background-color has-background-dim has-custom-content-position is-position-bottom-center\" style=\"background-image:url(" . esc_url($image_path_1) . ");min-height:849px;background-position:49% 67%\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"66.66%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:66.66%\"><!-- wp:image {\"id\":1955,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large aligncenter is-resized\"><img src=\"" . esc_url($logo_path) . "\" alt=\"\" class=\"wp-image-1955\" width=\"51\" height=\"38\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"fontSize\":\"large\"} -->\n<h1 class=\"wp-block-heading has-text-align-center has-large-font-size\"><mark style=\"background-color:rgba(0, 0, 0, 0);color:#fdfdfd\" class=\"has-inline-color\">Event of the Century</mark></h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"className\":\"has-inline-color has-color-light-color has-text-align-center\",\"fontSize\":\"small\"} --><p class=\"has-inline-color has-color-light-color has-text-align-center has-small-font-size\"><mark style=\"background-color:rgba(0, 0, 0, 0)\" class=\"has-inline-color has-color-white-color\">↓ SCROLL FOR THE DATES AND LISTEN TO THE JAMS WHILE YOU DO!</mark></p><!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"33.33%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:33.33%\"><!-- wp:embed {\"url\":\"https://open.spotify.com/album/1EFnZuLUzXx0B6ZsL9aqum?si=mGx9OSaiSJ2T2GlAojjwDw\",\"type\":\"rich\",\"providerNameSlug\":\"spotify\",\"allowResponsive\":false,\"responsive\":true,\"className\":\"\"} -->\n<figure class=\"wp-block-embed is-type-rich is-provider-spotify wp-block-embed-spotify\"><div class=\"wp-block-embed__wrapper\">\nhttps://open.spotify.com/album/1EFnZuLUzXx0B6ZsL9aqum?si=mGx9OSaiSJ2T2GlAojjwDw\n</div></figure>\n<!-- /wp:embed --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:spacer {\"height\":17} -->\n<div style=\"height:17px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:group {\"style\":{\"color\":{\"background\":\"#f7f7f7\"}}} -->\n<div class=\"wp-block-group has-background\" style=\"background-color:#f7f7f7\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"70%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:70%\"><!-- wp:heading {\"level\":1,\"style\":{\"typography\":{\"fontSize\":35}}} -->\n<h1 style=\"font-size:35px\"><strong><span class=\"has-inline-color has-c-9-music-red-color\">C9</span></strong> — Events Block Pattern</h1>\n<!-- /wp:heading -->\n\n<!-- wp:spacer {\"height\":23} -->\n<div style=\"height:23px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3,\"fontSize\":\"medium\"} -->\n<h3 class=\"has-medium-font-size\">COVERT NINE - The nine essentials ingredients for good digital marketing. Copywriting, Design, Development, SEO, PPC, Social Media, Email, Videos, Photograph</h3>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator -->\n\n<!-- wp:paragraph -->\n<p><strong>Tickets and on-sale information would be great in here. </strong>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Frequently asked questions would go great in here.</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>All content editing is done inline. </strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Have fun!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link\">GET TICKETS</a></div>\n<!-- /wp:button -->\n\n<!-- wp:button {\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\">ASK TIRESOME QUESTIONS</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\",\"width\":\"60%\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\" style=\"flex-basis:60%\"><!-- wp:table {\"className\":\"is-style-stripes\"} -->\n<figure class=\"wp-block-table is-style-stripes\"><table><thead><tr><th>Date</th><th>City</th><th class=\"has-text-align-center\" data-align=\"center\">Tickets</th></tr></thead><tbody><tr><td>6-7-2021</td><td>Chicago, IL</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>6-8-2021</td><td>Chicago, IL</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>6-14-2021</td><td>Savannah, GA</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"\">Buy Tickets</a></td></tr><tr><td>6-18-2021</td><td>Los Angeles, CA</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-1-2021</td><td>New York City!</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-12-2021</td><td>Paris, France</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-18-2021</td><td>Washington DC</td><td class=\"has-text-align-center\" data-align=\"center\"><a href=\"#\">Buy Tickets</a></td></tr><tr><td>7-31-2021</td><td>Chicago, IL</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr><tr><td>8-2-2021</td><td>Milwaukee, WI</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr><tr><td>8-4-2021</td><td>Portland, OR</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr><tr><td>8-6-2021</td><td>Seattle, WA</td><td class=\"has-text-align-center\" data-align=\"center\">Coming soon!</td></tr></tbody></table></figure>\n<!-- /wp:table --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:spacer {\"height\":35} -->\n<div style=\"height:35px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->",
				'categories'	=> array('COVERT NINE', 'text', 'header', 'buttons', 'Audio', 'landingpage')
			),
		);


		register_block_pattern(
			'c9-togo/c9-article-450-core',
			array(
				'title'			=> __('Article 450 Words', 'c9-togo'),
				'description' 	=> __('Get your article laid out before writing with a 450 word placeholder and some imagery to tet you started.', 'c9-togo'),
				'content'		=> "<!-- wp:image {\"align\":\"full\",\"id\":1908,\"sizeSlug\":\"full\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image alignfull size-full\"><img src=\"" . esc_url($image_path_2) . "\" alt=\"\" class=\"wp-image-1908\"/><figcaption><strong>Full Width Image Block</strong> C9 Logo + Photo CC0.</figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:spacer {\"height\":57} -->\n<div style=\"height:57px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"><!-- wp:paragraph -->\n<p><strong>Author Name</strong><br>Author Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":6,\"textColor\":\"c9music-black\"} -->\n<h6 class=\"has-c-9-music-black-color has-text-color\">December 16th, 2084</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"dropCap\":true} -->\n<p class=\"has-drop-cap\">Dum velit laoreet id donec. In fermentum posuere urna nec tincidunt praesent. Amet purus gravida quis blandit turpis cursus in. Tincidunt tortor aliquam nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Paragraphs inside of columns</strong>. Cras fermentum odio. Facilisi nullam vehicula ipsum a arcu cursus vitae. Id leo in vitae turpis massa sed elementum tempus. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:quote -->\n<blockquote class=\"wp-block-quote\"><p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. </p><cite>No one actually said this--Tim</cite></blockquote>\n<!-- /wp:quote -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Heading inside of article</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In fermentum posuere urna nec. Velit scelerisque in dictum non consectetur a erat nam. Gravida dictum fusce ut placerat orci. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. In eu mi bibendum neque egestas congue quisque egestas diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Vel fringilla est ullamcorper eget nulla. Lacinia at quis risus sed vulputate odio ut enim blandit. Ut pharetra sit amet aliquam id diam. Tristique nulla aliquet enim tortor at auctor. Justo nec ultrices dui sapien. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Dictum sit amet justo donec.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"10%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:10%\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":2799,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url($image_path_4) . "\" alt=\"\" class=\"wp-image-2799\"/><figcaption>Photo Caption</figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"dropCap\":true,\"fontSize\":\"medium\"} -->\n<p class=\"has-drop-cap has-medium-font-size\">Bring complex landing pages to life in minutes from section + page templates or build pages from scratch using C9 Grid and C9 Post Grid blocks. But, you can\'t do that if you don\'t download C9 Blocks when you install the C9 Theme.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"style\":{\"typography\":{\"fontSize\":18}}} -->\n<p style=\"font-size:18px\">This layout uses core blocks from WordPress including columns, images, paragraphs, and more paragraphs!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Now go make your own theme!</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\",\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large is-resized\"><img src=\"" . esc_url($logo_path) . "\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"id\":2797,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large\"><img src=\"" . esc_url($image_path_5) . "\" alt=\"\" class=\"wp-image-2797\"/><figcaption><strong>Photo Caption</strong></figcaption></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. Quam pellentesque nec nam aliquam sem. Ut diam quam nulla porttitor massa id neque aliquam vestibulum. Mauris augue neque gravida in fermentum et. Risus commodo viverra maecenas accumsan. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Elit eget gravida cum sociis natoque penatibus. Ullamcorper a lacus vestibulum sed arcu non odio euismod lacinia. Nec sagittis aliquam malesuada bibendum arcu vitae elementum. Id cursus metus aliquam eleifend mi in nulla posuere. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nec tincidunt praesent semper feugiat nibh sed pulvinar. Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\"} -->\n<p class=\"has-text-align-left\">Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"fontSize\":\"small\"} -->\n<p class=\"has-text-align-left has-small-font-size\"><strong>Share with your bestie</strong></p>\n<!-- /wp:paragraph -->\n\n<!-- wp:social-links {\"align\":\"left\"} -->\n<ul class=\"wp-block-social-links alignleft\"><!-- wp:social-link {\"url\":\"facebook.com/covertnine\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://twitter.com/covertnine\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://instagram.com/covertnine\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://github.com/covertnine\",\"service\":\"github\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://www.linkedin.com/company/10990511\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'categories'	=> array('COVERT NINE', 'Article', 'text', 'header', 'columns', 'landingpage')
			),
		);
		
		register_block_pattern(
			'c9-togo/c9-article-600-core',
			array(
				'title'			=> __('Article 600 Words', 'c9-togo'),
				'description' 	=> __('Get your article laid out before writing with a 600 word placeholder and some imagery to tet you started.', 'c9-togo'),
				'content'		=> "<!-- wp:cover {\"url\":\"" . esc_url($image_path_1) . "\",\"id\":2789,\"hasParallax\":true,\"dimRatio\":60,\"customOverlayColor\":\"#222222\",\"minHeight\":772,\"minHeightUnit\":\"px\",\"align\":\"full\",\"c9ContainerWidth\":\"container-fluid\",\"c9Align\":\"full\"} -->\n<div class=\"wp-block-cover alignfull has-parallax alignfull container-fluid\" style=\"min-height:772px\"><span aria-hidden=\"true\" class=\"wp-block-cover__background has-background-dim-60 has-background-dim\" style=\"background-color:#222222\"></span><div role=\"img\" class=\"wp-block-cover__image-background wp-image-2789 has-parallax\" style=\"background-position:50% 50%;background-image:url(" . esc_url($image_path_1) . ")\"></div><div class=\"wp-block-cover__inner-container\"><!-- wp:paragraph {\"align\":\"center\",\"placeholder\":\"Write title…\",\"fontSize\":\"large\"} -->\n<p class=\"has-text-align-center has-large-font-size\"><mark style=\"background-color:rgba(0, 0, 0, 0);color:#fbfbfb\" class=\"has-inline-color\"><strong>C9 Togo Article</strong> Block Pattern</mark></p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:cover -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"width\":\"15%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:15%\"><!-- wp:paragraph -->\n<p><strong>Author Name</strong><br>Author Title</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":6,\"textColor\":\"c9music-black\"} -->\n<h6 class=\"has-c-9-music-black-color has-text-color\">December 16th, 2084</h6>\n<!-- /wp:heading -->\n\n<!-- wp:separator -->\n<hr class=\"wp-block-separator\"/>\n<!-- /wp:separator --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"80%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:80%\"><!-- wp:paragraph {\"dropCap\":true} -->\n<p class=\"has-drop-cap\">Dum velit laoreet id donec. In fermentum posuere urna nec tincidunt praesent. Amet purus gravida quis blandit turpis cursus in. Tincidunt tortor aliquam nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p><strong>Paragraphs inside of columns</strong>. Cras fermentum odio. Facilisi nullam vehicula ipsum a arcu cursus vitae. Id leo in vitae turpis massa sed elementum tempus. Facilisis leo vel fringilla est ullamcorper eget nulla facilisi. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Maecenas accumsan lacus vel facilisis volutpat. Arcu risus quis varius quam quisque. Semper feugiat nibh sed pulvinar. Molestie a iaculis at erat pellentesque. Ullamcorper malesuada proin libero nunc consequat interdum varius sit. Nisl nisi scelerisque eu ultrices vitae auctor eu augue. Orci sagittis eu volutpat odio facilisis mauris sit. Senectus et netus et malesuada fames.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:pullquote -->\n<figure class=\"wp-block-pullquote\"><blockquote><p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. </p><cite>No one actually said this--Tim</cite></blockquote></figure>\n<!-- /wp:pullquote -->\n\n<!-- wp:spacer {\"height\":48} -->\n<div style=\"height:48px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:image {\"align\":\"right\",\"id\":2792,\"width\":315,\"height\":209,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<div class=\"wp-block-image\"><figure class=\"alignright size-large is-resized\"><img src=\"" . esc_url($image_path_6) . "\" alt=\"\" class=\"wp-image-2792\" width=\"315\" height=\"209\"/><figcaption><strong>Photo is CC0 if you want <a href=\"https://www.flickr.com/photos/assaultshirts/50576944571/in/dateposted/\">it</a>.</strong></figcaption></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":3} -->\n<h3>Heading inside of article</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Orci eu lobortis elementum nibh tellus molestie. Tellus cras adipiscing enim eu turpis egestas pretium aenean pharetra. Eu volutpat odio facilisis mauris sit amet massa. Nec feugiat in fermentum posuere urna nec tincidunt. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Facilisi cras fermentum odio eu feugiat pretium nibh ipsum. Feugiat nibh sed pulvinar proin gravida hendrerit lectus a. Nibh sit amet commodo nulla facilisi nullam vehicula ipsum a.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>In fermentum posuere urna nec. Velit scelerisque in dictum non consectetur a erat nam. Gravida dictum fusce ut placerat orci. Mattis molestie a iaculis at erat pellentesque adipiscing commodo. In eu mi bibendum neque egestas congue quisque egestas diam. </p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Vel fringilla est ullamcorper eget nulla. Lacinia at quis risus sed vulputate odio ut enim blandit. Ut pharetra sit amet aliquam id diam. Tristique nulla aliquet enim tortor at auctor. Justo nec ultrices dui sapien. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Dictum sit amet justo donec.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:spacer {\"height\":28} -->\n<div style=\"height:28px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\n<!-- /wp:spacer -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><strong>Now share this article or my boss will yell at me.</strong></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"width\":\"10%\"} -->\n<div class=\"wp-block-column\" style=\"flex-basis:10%\"><!-- wp:image {\"id\":3798,\"width\":51,\"height\":38,\"sizeSlug\":\"large\",\"linkDestination\":\"none\"} -->\n<figure class=\"wp-block-image size-large is-resized\"><img src=\"" . esc_url($logo_path) . "\" alt=\"\" class=\"wp-image-3798\" width=\"51\" height=\"38\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:social-links {\"align\":\"center\"} -->\n<ul class=\"wp-block-social-links aligncenter\"><!-- wp:social-link {\"url\":\"facebook.com/covertnine\",\"service\":\"facebook\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://twitter.com/covertnine\",\"service\":\"twitter\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://instagram.com/covertnine\",\"service\":\"instagram\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://github.com/covertnine\",\"service\":\"github\"} /-->\n\n<!-- wp:social-link {\"url\":\"https://www.linkedin.com/company/10990511\",\"service\":\"linkedin\"} /--></ul>\n<!-- /wp:social-links -->",
				'categories'	=> array('COVERT NINE', 'Article', 'text', 'header', 'columns', 'landingpage')
			),
		);

		register_block_pattern(
			'c9-togo/c9-style-guide-core',
			array(
				'title'			=> __('C9 Togo Style Guide', 'c9-togo'),
				'description'	=> __('A style guide with type, buttons, and core blocks frequently used.', 'c9-togo'),
				'content'		=> "<!-- wp:cover {\"url\":\"" . esc_url($image_path_7) . "\",\"id\":2805,\"dimRatio\":70,\"minHeight\":611,\"minHeightUnit\":\"px\",\"align\":\"full\"} -->\r\n<div class=\"wp-block-cover alignfull has-background-dim-70 has-background-dim\" style=\"background-image:url(" . esc_url($image_path_7) . ");min-height:611px\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"color-light\",\"fontSize\":\"huge\"} -->\r\n<h1 class=\"wp-block-heading has-text-align-center has-color-light-color has-text-color has-huge-font-size\"><mark style=\"background-color:rgba(0, 0, 0, 0);color:#fbfbfb\" class=\"has-inline-color\"><strong>Know where you're going?</strong><br>C9 Helper Style Guide</mark></h1>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:buttons {\"align\":\"center\",\"layout\":{\"type\":\"flex\",\"justifyContent\":\"center\"}} -->
				<div class=\"wp-block-buttons\"><!-- wp:button {\"backgroundColor\":\"color-success\",\"style\":{\"border\":{\"radius\":\"2px\"}},\"className\":\"is-style-c9-btn-green\"} -->
				<div class=\"wp-block-button is-style-c9-btn-green\"><a class=\"wp-block-button__link has-color-success-background-color has-background wp-element-button\" href=\"https://www.covertnine.com/form/c9-beta\" style=\"border-radius:2px\" target=\"_blank\" rel=\"noreferrer noopener\">Download now</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {\"style\":{\"border\":{\"radius\":\"2px\"},\"color\":{\"text\":\"#fbfbfb\"}},\"className\":\"is-style-outline\"} -->
				<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-text-color wp-element-button\" href=\"https://youtube.com/covertnine\" style=\"border-radius:2px;color:#fbfbfb\">Tutorial Videos</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons -->\r\n\r\n<!-- wp:spacer -->\r\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer -->\r\n\r\n<!-- wp:search {\"label\":\"\u003cmark style=\u0022background-color:rgba(0, 0, 0, 0);color:#fbfbfb\u0022 class=\u0022has-inline-color\u0022\u003eOr search through our archives\u003c/mark\u003e\",\"placeholder\":\"How to design a signup page using C9 Blocks....\",\"width\":50,\"widthUnit\":\"%\",\"buttonText\":\"Search\",\"align\":\"center\"} /--></div></div>\r\n<!-- /wp:cover -->\r\n\r\n<!-- wp:group {\"align\":\"wide\"} -->\r\n<div class=\"wp-block-group alignwide\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"align\":\"wide\"} -->\r\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\"} -->\r\n<p class=\"has-text-align-center\">Three calls to action so your visitors can pick their lane, and what they want to see next.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:buttons {\"align\":\"center\"} -->\r\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\r\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Ask a question</a></div>\r\n<!-- /wp:button --></div>\r\n<!-- /wp:buttons --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\"} -->\r\n<p class=\"has-text-align-center\">Sign up for a newsletter or hit the most popular category of your shop.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:buttons {\"align\":\"center\"} -->\r\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\r\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Sign up for alerts</a></div>\r\n<!-- /wp:button --></div>\r\n<!-- /wp:buttons --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"align\":\"center\"} -->\r\n<p class=\"has-text-align-center\">Consider your three most popular user paths and use those links in these three buttons.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:buttons {\"align\":\"center\"} -->\r\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":50,\"textColor\":\"color-danger\",\"className\":\"is-style-outline\"} -->\r\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link has-color-danger-color has-text-color\" style=\"border-radius:50px\">Buy Tickets</a></div>\r\n<!-- /wp:button --></div>\r\n<!-- /wp:buttons --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns --></div></div>\r\n<!-- /wp:group -->\r\n\r\n<!-- wp:spacer {\"height\":70} -->\r\n<div style=\"height:70px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\"} -->\r\n<h2 class=\"has-text-align-center\">C9 Togo Core Blocks Typography</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"color-secondary\"} -->\r\n<h1 class=\"has-text-align-center has-color-secondary-color has-text-color\">Heading One</h1>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"textColor\":\"color-primary\"} -->\r\n<h2 class=\"has-text-align-center has-color-primary-color has-text-color\">Heading Two</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"color-success\"} -->\r\n<h3 class=\"has-text-align-center has-color-success-color has-text-color\">Heading Three</h3>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"textColor\":\"color-warning\"} -->\r\n<h4 class=\"has-text-align-center has-color-warning-color has-text-color\">Heading Four</h4>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":5,\"textColor\":\"color-danger\"} -->\r\n<h5 class=\"has-text-align-center has-color-danger-color has-text-color\">Heading Five</h5>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\r\n<h6 class=\"has-text-align-center\">Heading Six</h6>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":1,\"textColor\":\"c9music-faded-red\"} -->\r\n<h1 class=\"has-text-align-center has-c-9-music-faded-red-color has-text-color\">Heading One</h1>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"textColor\":\"c9music-black\"} -->\r\n<h2 class=\"has-text-align-center has-c-9-music-black-color has-text-color\">Heading Two</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"textColor\":\"c9music-dark-gray\"} -->\r\n<h3 class=\"has-text-align-center has-c-9-music-dark-gray-color has-text-color\">Heading Three</h3>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":4,\"textColor\":\"c9music-red\"} -->\r\n<h4 class=\"has-text-align-center has-c-9-music-red-color has-text-color\">Heading Four</h4>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":5,\"textColor\":\"c9music-mint-green\"} -->\r\n<h5 class=\"has-text-align-center has-c-9-music-mint-green-color has-text-color\">Heading Five</h5>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\r\n<h6 class=\"has-text-align-center\">Heading Six</h6>\r\n<!-- /wp:heading --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:paragraph {\"fontSize\":\"small\"} -->\r\n<p class=\"has-small-font-size\"><strong>Small Font Paragraph. </strong>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph {\"dropCap\":true,\"fontSize\":\"normal\"} -->\r\n<p class=\"has-drop-cap has-normal-font-size\">Pat enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph {\"fontSize\":\"normal\"} -->\r\n<p class=\"has-normal-font-size\"><strong>Normal Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph {\"fontSize\":\"medium\"} -->\r\n<p class=\"has-medium-font-size\"><strong>Medium Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph {\"fontSize\":\"large\"} -->\r\n<p class=\"has-large-font-size\"><strong>Large Font Paragraph. </strong>Ut enim ad minim veniam, quis nostrud. </p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph {\"fontSize\":\"huge\"} -->\r\n<p class=\"has-huge-font-size\"><strong>Large Font Paragraph. </strong>Ut enim ad minim veniam, quis. </p>\r\n<!-- /wp:paragraph --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:columns -->\r\n<div class=\"wp-block-columns\"><!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":6} -->\r\n<h6>Ordered List</h6>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:list {\"ordered\":true} -->\r\n<ol><li>List Item</li><li>List Item</li><li>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin.</li><li>List Item</li></ol>\r\n<!-- /wp:list --></div>\r\n<!-- /wp:column -->\r\n\r\n<!-- wp:column -->\r\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":6} -->\r\n<h6>Unordered List</h6>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:list -->\r\n<ul><li>List Item</li><li>List Item</li><li>There are more heading styles, large fonts, subheadings, and more in the C9 Blocks Plugin.</li><li>List Item</li></ul>\r\n<!-- /wp:list --></div>\r\n<!-- /wp:column --></div>\r\n<!-- /wp:columns -->\r\n\r\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":6} -->\r\n<h6 class=\"has-text-align-center\">Separators (HR)</h6>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:separator -->\r\n<hr class=\"wp-block-separator\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:separator {\"color\":\"c9music-faded-red\"} -->\r\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-faded-red-background-color has-c-9-music-faded-red-color\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:separator {\"color\":\"c9music-mint-green\",\"className\":\"is-style-wide\"} -->\r\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-mint-green-background-color has-c-9-music-mint-green-color is-style-wide\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:separator {\"color\":\"c9music-red\",\"className\":\"is-style-dots\"} -->\r\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-red-background-color has-c-9-music-red-color is-style-dots\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:separator {\"color\":\"c9music-black\",\"className\":\"is-style-dots\"} -->\r\n<hr class=\"wp-block-separator has-text-color has-background has-c-9-music-black-background-color has-c-9-music-black-color is-style-dots\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:spacer -->\r\n<div style=\"height:100px\" aria-hidden=\"true\" class=\"wp-block-spacer\"></div>\r\n<!-- /wp:spacer -->",
				'categories'	=> array('COVERT NINE', 'Article', 'text', 'header', 'columns', 'landingpage')
			),
		);
	}
}
