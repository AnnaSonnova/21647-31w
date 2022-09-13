<?php
/**
 * UNDERSCORES functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UNDERSCORES
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
////////////////////
function underscores_setup(){

/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support( 'post-thumbnails' );

        /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

}

add_action( 'after_setup_theme', 'underscores_setup' );
/////////////////////////
/**
 * Enqueue scripts and styles.
 */
function underscores_scripts() {
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array(), _S_VERSION );
	
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );