<?php
/**
 * underscore functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package underscore
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

//////////////////////////////////////////////////
function underscore_setup() {
		/*
		* Laissez WordPress gérer le titre du document.
		* En ajoutant le support de thème, nous déclarons que ce thème n’utilise pas un
		* balise <title> codée en dur dans la tête du document, et s’attendre à ce que WordPress
		* Fournissez-le-nous.
		*/
	add_theme_support( 'title-tag' );


    /*
		* Remplacer le balisage de base par défaut pour le formulaire de recherche, le formulaire de commentaires et les commentaires
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
add_action( 'after_setup_theme', 'underscore_setup' );


/**
 * Enqueue scripts et styles.
 */
function underscore_scripts() {
	/*
	wp_enqueue_style( 'underscore-style',
					   get_stylesheet_uri(), 
					   array(),
					_S_VERSION );
	*/				

	wp_enqueue_style('underscore-style',
					 get_template_directory_uri() . '/style.css',
					 array(), 
					 filemtime(get_template_directory() . '/style.css'), false);
	
}
add_action( 'wp_enqueue_scripts', 'underscore_scripts' );

/*-----------Initialisation de la fonction de navigation-------------------- */


	function mon_31w_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Menu Primaire', 'text_domain' ),
	    	
		) );
	}
	add_action( 'after_setup_theme', 'mon_31w_register_nav_menu', 0 );



	/*-------pour filtrer chaqun des elements du menu-----*/
	function igc31w_filtre_choix_menu($obj_menu, $arg){
	// 	var_dump($obj_menu);
	//  die();
	
	if ($arg->menu == "primaire"){
		foreach($obj_menu as $cle => $value)
		{
		   // print_r($value);
		  // $value->title = substr($value->title,7);
		   $value->title = wp_trim_words($value->title,3,"...");
		   // echo $value->title . '<br>';
	 
		}
	}
	/**
	 * Filtre le menu aside
	 */
	if ($arg->menu == "aside"){
		foreach($obj_menu as $cle => $value)
		{
		   // print_r($value);
		   $value->title = substr($value->title,7);
		   $value->title = wp_trim_words($value->title,3,"...");
		   $array = explode(" ", $value->title);
		   array_splice ($array,-1);
		   $value->title = implode(" ", $array);
		   // echo $value->title . '<br>';
	 
		}
	}
		return $obj_menu;
	}
	add_filter("wp_nav_menu_objects","igc31w_filtre_choix_menu",10,2);

	/* -------------- Ajout de la description dans menu */
	/**
	 * filtre du menu evenement
	 * @arg string $item_output  string represent l'element du menu
	 * @arg obj $item         element du menu
	 */
function prefix_nav_description( $item_output, $item) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( '</a>',
        '<hr><span class="menu-item-description">' . $item->description . '</span><div class="menu__item__icone"></div></a>',
              $item_output );
    }
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 2 );

// l'argument 10 : niveau de privilège
// l'argument 2 : le nombre d'argument dans la fonction de rappel: «prefix_nav_description»
	/*--inicialisation sidebar--*/

	add_action( 'widgets_init', 'my_register_sidebars' );
	function my_register_sidebars() {
	/* Register the 'footer-1' sidebar. */
	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Sidebar-footer-1' ),
			'description'   => __( 'Premier sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Sidebar-footer-2' ),
			'description'   => __( 'deuxieme sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer-3',
			'name'          => __( 'Sidebar-footer-3' ),
			'description'   => __( 'troisieme sidebar du footer' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'aside-1',
			'name'          => __( 'Sidebar-aside-1' ),
			'description'   => __( 'premiere sidebar du aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'aside-2',
			'name'          => __( 'Sidebar-aside-2' ),
			'description'   => __( 'dexieme sidebar du aside' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	
	/* Repeat register_sidebar() code for additional sidebars. */


		/**
	 *
	 *	La fonction permettra de modifier la requête principale de wordpress « main query »
	 *	Les artcle qui s'afficheront dans la page d'accueil seront les article de catégorie « accueil »
	 *
	 */
	function igc_31w_filtre_requete( $query ) {
		if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
			$query->set( 'category_name', 'accueil' );
		}
	}
	add_action( 'pre_get_posts', 'igc_31w_filtre_requete' );

}
?>