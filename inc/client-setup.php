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
			'c9',
			array('label' => __('C9 Togo All Patterns', 'c9-togo'))
		);
		register_block_pattern_category(
			'landingpage',
			array('label' => __('C9 Togo Page + Post Templates', 'c9-togo'))
		);
		register_block_pattern_category(
			'video',
			array('label' => __('C9 Togo Video', 'c9-togo'))
		);
		register_block_pattern_category(
			'audio',
			array('label' => __('C9 Togo Audio', 'c9-togo'))
		);
	}
}