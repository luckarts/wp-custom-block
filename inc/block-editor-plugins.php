<?php

namespace Custom_Blocks\Block_Editor_Blocks;

use Custom_Blocks\Autoloader;

/**
 * Bind action & filter callbacks.
 *
 * @return void
 */
function setup() {
	$block_editor_plugins_dir = dirname( __DIR__ ) . '/src/blocks';

	// Load all PHP files located at `src/plugins/{ block editor plugin slug }/namespace.php`.
	Autoloader\load(
		$block_editor_plugins_dir . '/*/namespace.php',
		__NAMESPACE__
	);
}
