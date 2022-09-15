<?php

/** 
 * Le fichier modèle principal par defaut
 *
 * C’est le fichier modèle le plus générique dans un thème WordPress
 * et l’un des deux fichiers requis pour un thème (l’autre étant style.css).
 * Il est utilisé pour afficher une page lorsque rien de plus spécifique ne correspond à une requête.
 * Par exemple, il rassemble la page d’accueil quand aucun fichier home.php n’existe.
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package UNDERSCORES
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        h1{
            background-color: blue;
            color: gray;
        }
    </style>

    <title>Document</title>
</head>
<body>
    <main>
    <?php
		if ( have_posts() ) :
            while ( have_posts() ) :
				the_post();
                the_title('<h1>', '</h1>');
                the_content(null, true);
            endwhile; 
        endif;       
	  ?>

    </main>
</body>
</html>

