<?php
/**
 * The restaurants posts sidebar displayed before single restaurant spot footer
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

$lastposts = get_posts( array(
    'numberposts' => 3,
    'post_type' => 'restaurant',
    'orderby' => 'rand',
    'post__not_in' => array(get_the_ID() )
  ));
/* Permet de récupérer les articles existants de la page restaurant. On y mettra différents arguments: nombres d'articles à afficher et le type de post qu'on veut afficher. On prendra le slug de la catégorie "restaurant". Order_by: rand = génère les articles aléatoirement. Post_not_in: va exclure le post actuel de la catégorie "autres restaurant. Get ID va automatiquement récupérer l'iD de l'élément, on ne met rien dedans.*/
?>



<section class="sidebar-lastrestaurant bg-light py-5">
    <!-- Permet de mettre un gris léger -->

  <div class="container">

    <header class="sidebar-header d-flex flex-wrap justify-content-between align-items-start">
      <h2 class="sidebar-title"> <?php _e('Autres restaurants', 'starttheme'); ?> </h2> <!-- _e ('on y insère le titre' et 'le thème actuel') permet la traduction du site. En multilangue, on écrirait normalement en anglais. -->
      <a href="<?= get_post_type_archive_link('restaurant'); ?>" class="btn btn-outline-primary"><?php _e('Tous les restaurants', 'startheme'); ?></a>
    </header>
<!-- Le flex permet d'aligner le titre et le bouton (Autres restaurants) sur la même ligne. Le get_post_archive_link + nom de la catégorie = récupère l'url de la page archive (restaurant). En cliquant sur "tous les restaurants" on arrivera sur la page. -->


  <div class="row no-gutters">

<?php 
if ( $lastposts ) : 
  foreach ( $lastposts as $post ) :
    setup_postdata( $post ); ?>	

    <div class="col-md-6 col-lg-4">

      <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>

    </div>

    <?php
    endforeach; 
    wp_reset_postdata();
endif;
?>

</div><!-- .row -->

</div><!-- .container -->
</section>