<?php
/**
 * Le fichier modèle principal
 *
 * C’est le fichier modèle le plus générique dans un thème WordPress
 * et l’un des deux fichiers requis pour un thème (l’autre étant style.css).
 * Il est utilisé pour afficher une page lorsque rien de plus spécifique ne correspond à une requête.
 * Par exemple, il rassemble la page d’accueil quand aucun fichier home.php n’existe.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>
<h1 class="trace">front-page.php</h1>
<?php get_header(); ?>

    <main class="site__main">
    <?php
		if ( have_posts() ) :
            while ( have_posts() ) :
				the_post(); 
                the_title('<h2>','</h2>');?>
            <h1><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h1>
            
            <?php   the_content(null, true);?>
                
            <?php endwhile;?>
            <?php endif;
    ?>    
    </main>    
<?php get_footer(); ?>
</html>
