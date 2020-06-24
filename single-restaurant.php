<?php
/**
 * The template file for displaying single restaurant and pages
 *
 * ...
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

get_header();
?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>

    <?php endwhile; 
        endif; ?>

</main>

<?php get_sidebar('restaurant'); ?>

<!-- Permet d'afficher la partie sidebar qui affiche le bouton 'tous les restaurants' Voir sidebar-restaurant.php file -->

<?php get_footer() ?>