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
    <?php
    wp_nav_menu(array(
        "menu"=>"evenement",
        "container"=>"nav",
        "container_class"=>"menu__evenement"
        
    ));?>
<section class="liste__recherche">

    <?php if ( have_posts() ) :
        while ( have_posts() ) :
            the_post(); ?>
           
            <article class="liste__recherche__cours">

                <?php
                $montableau = get_the_category();
                $boolGalerie = false;
                foreach($montableau as $cle){
                    if($cle->slug == "galerie"){
                        $boolGalerie = true;
                    } 
                }
                if ($boolGalerie == true) { ?>
                    <h1><a href="<?php the_permalink(); ?>">
                <?php  the_title(); ?></a></h1>
                 <?php   the_content();
                }else{?>
                    <h1><a href="<?php the_permalink(); ?>">
                    <?php $titre = the_title('','',false);  echo substr($titre,8,-6)?></a></h1> 
                    <?php 
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail("thumbnail");
                }
                    ?> 
                    <?= wp_trim_words(get_the_excerpt(),10, "...");?>
               <?php }
                ?>
                
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</section>
  
    </main>    
<?php get_footer(); ?>
</html>

