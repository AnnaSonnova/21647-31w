<?php
/**
* Template Name: Evenement
*
* @package WordPress
* @subpackage igc_31w
*/
?>
 
<?php get_header() ?>
<main>
 

   <?php if (have_posts()): the_post(); ?>
        <?php the_title() ?>
        <?php the_content() ?> 
        <p> venez nous joindre au <?php the_field('adresse'); the_field('date-heure') ; ?> </p>       
   <?php endif ?>
</main>
<?php get_footer() ?>