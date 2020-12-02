<?php



namespace Custom_Blocks\Block_Editor_Blocks\Block_A;
use \WP_Query;

/**
 * Set up meta values which will be used in the demo block editor plugin.
 *
 * Normally this sort of work should go into a (WordPress) plugin-level meta
 * registration namespace, but each of these demo plugins & blocks is meant
 * to be as standalone as possible.
 *
 * @package block-playground
 */
/**
 * Bind action & filter callbacks.
 *
 * @return void
 */
function setup() {
	add_action( 'init', __NAMESPACE__ . '\\register_dynamic_block' );
	// Once block editor assets are enqueued, inject our localization data.

}
function register_dynamic_block() {

	// Only load if Gutenberg is available.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	// Hook server side rendering into render callback
	register_block_type( 'hmr-demo/block-a', [

		'render_callback' => __NAMESPACE__ . '\render_dynamic_block',
	] );


}
/**
 * Server rendering for /blocks/examples/12-dynamic
 */

function render_dynamic_block(array $attributes) {
/* 	$args = array(
		'post_type' => 'post',
    'post_content' => 'content',

);
$query = new WP_Query($args);
$posts ='';while ( $query->have_posts() ) : $query->the_post();
 endwhile;
 */
$my_posts = get_posts([
	'posts_per_page' => 5
]);

return $my_posts[$attributes['selectedPost']-1]->post_content;
}


/*
custom plugin
avec case enter new things
new case create every
and select
*/
