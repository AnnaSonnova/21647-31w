<?php
/**
 * Template pour les resultats de recherche
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package underscore
 */
?>
<!-- h1 class="trace">front-page.php</h1 -->
<?php get_header(); ?>

    <main class="site__main">
	<h1>Resultats de la recherche</h1>
<section class="liste__recherche">

    <?php if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); ?>
           
		   <article class="liste__cours">
		   <small> Element de recherche: <?php the_search_query();?></small>  
                <h2><a href="<?php the_permalink();
                ?>">
                <?php $titre = the_title('','',false);  echo substr($titre,8,-6)?></a></h2>
                
                <p>
                <?php
                //  the_content($more_link_text, true); 
                echo wp_trim_words(get_the_excerpt(),5,"&#9755;");
                ?>
                </p>
				</p>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
	
	<p>Nombre de resultats:<?php echo $wp_query->found_posts.' resultats trouvés.'; ?></p>
</section>
  
    </main>    
<?php get_footer(); ?>
</html>

