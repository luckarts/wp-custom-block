# Asset Loader

This plugin exposes functions which may be used within other WordPress themes or plugins to aid in detecting and loading assets generated by Webpack, including those served from local `webpack-dev-server` instances.

[![Build Status](https://travis-ci.com/humanmade/asset-loader.svg?branch=master)](https://travis-ci.com/humanmade/asset-loader)

## Usage

Full documentation to come. See [react-wp-scripts](https://github.com/humanmade/react-wp-scripts) for directional inspiration about how the methods in [plugin.php](plugin.php) may be used.

Assuming a Webpack configuration (such as those created with the presets in [@humanmade/webpack-helpers](https://github.com/humanmade/webpack-helpers)) which sets up a Webpack DevServer instance for an entrypoint named `editor.js`, and assuming the asset manifest and the build, production version of the `editor.js` file would both end up in a `build/` folder within a theme or plugin, you may load the bundle by using the Asset Loader's autoloader method:

```php
<?php
namespace My_Plugin_Or_Theme;

use Asset_Loader;

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\\enqueue_block_editor_assets' );

/**
 * Enqueue the JS and CSS for blocks in the editor.
 *
 * @return void
 */
function enqueue_block_editor_assets() {
  Asset_Loader\autoenqueue(
    // In a plugin, this would be `plugin_dir_path( __FILE__ )` or similar.
    get_stylesheet_directory() . '/build/asset-manifest.json',
    // The output filename of the Webpack build.
    // At present this must be consistent between development & production builds.
    'editor.js',
    [
      'scripts' => [ 'wp-element', 'wp-editor' ],
      'handle'  => 'optional-manually-specified-script-handle',
    ]
  );
}
```

## License

This plugin is free software. You can redistribute it and/or modify it under the terms of the [GNU General Public License](LICENSE) as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.
