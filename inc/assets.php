<?php
/**
 * Register and load all custom block scripts & style bundles.
 *
 * @package block-custom
 */

namespace Custom_Blocks\Assets;

use Asset_Loader;

/**
 * Bind callbacks.
 *
 * @return void
 */
add_action( 'init', __NAMESPACE__ . '\setup' );

function setup() {
	add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_editor_assets' );
	add_action( 'enqueue_block_assets', __NAMESPACE__ . '\\enqueue_frontend_assets' );
}

/**
 * enqueue_block_editor_assets add_action( "wp_enqueue_scripts", __NAMESPACE__ . '\frontend_assets' );

 * Enqueue editor assets from the generated `asset-manifest.json` file.
 *
 * @return void
 */
function enqueue_editor_assets() {
	Asset_Loader\autoenqueue(
		dirname( plugin_dir_path( __FILE__ ) ) . '/build/asset-manifest.json',
		// Expect the bundle to be generated as editor.js.
		'editor.js',
		[
			'handle'  => 'custom-blocks',
			'scripts' => [
				'wp-blocks',
				'wp-components',
				'wp-compose',
				'wp-data',
				'wp-edit-post',
				'wp-element',
			],
		]
	);
}

/**
 * Enqueue assets from manifest which apply to both block editor & frontend.
 *
 * @return void
 */
function enqueue_frontend_assets() {
	Asset_Loader\autoenqueue(
		dirname( plugin_dir_path( __FILE__ ) ) . '/build/asset-manifest.json',
		// Expect the bundle to be generated as editor.js.
		'frontend.js',
		[
			'handle'  => 'custom-blocks-frontend',
				'scripts' => []
		]
	);
}
