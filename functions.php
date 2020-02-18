<?php
namespace theme_lena;

// load gutenberg demo page
require_once get_template_directory() . '/demo.php';

    function theme_support()  {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Set content-width
		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 660;
		}

		// Post thumbnails
		add_theme_support( 'post-thumbnails' );

		// Set post thumbnail size.
		set_post_thumbnail_size( 1200, 9999 );

		// Title tag
		add_theme_support( 'title-tag' );

		// HTML5 semantic markup
		add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Alignwide and alignfull classes in the block editor
		add_theme_support( 'align-wide' );


    }
    add_action( 'after_setup_theme', __NAMESPACE__ . '\theme_support' );

/**
 * load lena theme assets like styles & scripts
 */
function enqueue_assets() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

    $assetsPath = '/assets/dist/';

    foreach (glob(get_stylesheet_directory() . $assetsPath . '*/*.bundle.*.js') as $i => $assetFile) {

        $assetPathInfo   = pathinfo($assetFile);
        $assetFile       = basename($assetFile);
        $version         = basename($assetPathInfo['dirname']);
        $assetFileHandle = explode('.', $assetFile)[0];

        if ($i === 0) {
            $assetsHandles = 'js-webpack-' . $assetFileHandle;
        }

        $file = $assetsPath . $version . '/' . $assetFile;
        wp_enqueue_script('js-webpack-' . $assetFileHandle, get_stylesheet_directory_uri() . $file, ($i > 0 ? $assetsHandles : NULL), NULL, FALSE);
    }
}

add_action('wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets');
add_action('admin_enqueue_scripts', __NAMESPACE__ . '\enqueue_assets');


/**
 * Block Editor Settings.
 * Add custom colors to the block editor.
 */

function block_editor_settings() {

	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Blue', 'lena' ),
			'slug'  => 'blue',
			'color'	=> '#59BACC',
		),
		array(
			'name'  => __( 'Green', 'lena' ),
			'slug'  => 'green',
			'color' => '#58AD69',
		),
		array(
			'name'  => __( 'Orange', 'lena' ),
			'slug'  => 'orange',
			'color' => '#FFBC49',
		),
		array(
			'name'	=> __( 'Red', 'lena' ),
			'slug'	=> 'red',
			'color'	=> '#E2574C',
		),
	) );
}
add_action( 'after_setup_theme', __NAMESPACE__ . '\block_editor_settings' );
