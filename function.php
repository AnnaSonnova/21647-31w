<?php
/**
 * UNDERSCORES fonctions et définitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package UNDERSCORES
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Remplacer le numéro de version du thème sur chaque version.
	define( '_S_VERSION', '1.0.0' );
}
////////////////////
function underscores_setup(){

/*
		* Activer la prise en charge des miniatures des publications et des pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support( 'post-thumbnails' );

        /*
		* Changement du balisage de base par défaut pour le formulaire de recherche, le formulaire de commentaire et les commentaires
		* à la sortie HTML5 valide.
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
 * Scripts et styles enqueue.
 */
function underscores_scripts() {
	wp_enqueue_style( 'underscores-style', get_stylesheet_uri(), array(), _S_VERSION );
	
}
add_action( 'wp_enqueue_scripts', 'underscores_scripts' );