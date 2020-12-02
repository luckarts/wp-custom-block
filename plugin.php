<?php
/**
 * Plugin Name: Block Editor Gutenberg
 * Description: learn Gutenberg custom blocks
 * Author:      Luc Bachelerie
 * Author URI:  https://bachelart.fr/
 * Version:     1.0
 *
 * @package block-custom
 */

if ( defined( 'WP_INSTALLING' ) && WP_INSTALLING ) {
	return;
}

// Plugins to be loaded for any site.

require_once( __DIR__ . '/asset-loader/asset-loader.php' );
require_once( __DIR__ . '/custom-blocks.php' );



