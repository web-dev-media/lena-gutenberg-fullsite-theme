<?php
/**
 * Supports for populating the Gutenberg demo content new post.
 *
 * @package theme-lena
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden.' );
}

/**
 * Redirects the demo page to edit a new post.
 */
function theme_lena_redirect_demo() {
	global $pagenow;

	if ( 'admin.php' === $pagenow && isset( $_GET['page'] ) && 'gutenberg' === $_GET['page'] ) {
		wp_safe_redirect( admin_url( 'post-new.php?gutenberg-demo' ) );
		exit;
	}
}
add_action( 'admin_init', 'theme_lena_redirect_demo' );

/**
 * Assigns the default content for the Gutenberg demo post.
 *
 * @param string $content Default post content.
 *
 * @return string Demo content if creating a new Gutenberg demo post, or the
 *                default content otherwise.
 */
function theme_lena_default_demo_content( $content ) {
	$is_demo = isset( $_GET['gutenberg-demo'] );

	if ( $is_demo ) {
		// Prepopulate with some test content in demo.
		ob_start();
		include get_template_directory() . '/demo-content.php';
		return ob_get_clean();
	}

	return $content;
}
add_filter( 'default_content', 'theme_lena_default_demo_content' );

/**
 * Assigns the default title for the Gutenberg demo post.
 *
 * @param string $title Default post title.
 *
 * @return string Demo title if creating a new Gutenberg demo post, or the
 *                default title otherwise.
 */
function theme_lena_default_demo_title( $title ) {
	$is_demo = isset( $_GET['gutenberg-demo'] );

	if ( $is_demo ) {
		return __( 'Welcome to the Gutenberg Editor', 'gutenberg' );
	}

	return $title;
}
add_filter( 'default_title', 'theme_lena_default_demo_title' );

// remove gutenberg demo default filter
remove_filter( 'default_title', 'gutenberg_default_demo_title' );
remove_filter( 'default_content', 'gutenberg_default_demo_content' );
remove_action( 'admin_init', 'gutenberg_redirect_demo' );