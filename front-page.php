<?php
/**
 * The template file for displaying single posts and pages
 *
 * ...
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

$lastposts = get_posts( array(
  'numberposts' => 3,
  'post_type' => 'restaurant', /* Restaurant = slug du CPT UI */
  'orderby' => 'rand',
));
/* On défini la variable et le nombre de restaurants qui seront affichés dans un ordre random */

get_header();
?>

<main>



  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part( 'template-parts/content', get_post_type() ); ?>
    <!-- On lui dit d'aller chercher le contenu dans le template part/content/archive (qui est la page restaurant où tous les restaurants sont listés) -->

    <?php endwhile; 
        endif; ?>

</main>

<section class="front-restaurant container text-center">

<div class="restau-infos my-5 ">
                <h1 class="title-entry">Qu'est-ce-qui vous ferait plaisir ?</h1>

        <?php 
            $specialites = get_terms('specialites');
            if ( ! is_wp_error( $specialites ) && ! empty( $specialites ) ) : 
        ?>

     <!-- On défini la variable $specialites et on lui dit d'aller chercher la taxonomie 'Spécialité' -->


  <div class="restaurant-option">     
    <?php foreach ($specialites as $specialite) : ?>
    
        <a class="btn btn-restaurant btn-primary btn-lg" href="<?= get_term_link($specialite->slug, 'specialites') ?>">
        <?= $specialite->name ?>
        <!-- get_term_link permet de générer un permalien vers une taxonomie d'archive (Indien, Italien ...) -->
        </a>
    
    <?php endforeach; ?>
  </div>
  <?php endif; ?>

</div>


<!-- Taxonomie localisation-->

<div class="restaurant-filtre">

  <?php $localisations = get_terms("localisation");
    if ( !empty( $localisations ) && !is_wp_error( $localisations ) ) :
     
     foreach ( $localisations as $localisation ) : ?>
       <a class="btn btn-localisation btn-secondary btn-lg" href="<?= get_term_link($localisation->slug, 'localisation') ?>">
        <?= $localisation->name ?></a>
    
      <?php endforeach; ?>

    <?php endif; ?>

</div>

<!-- Taxonomie localisation -->


<div class="front-restaurant_grid">
<h1 class="title-entry text-center my-5"> Quelques unes de nos sélections</h1>

<?php 
    if ( $lastposts ) : 
      foreach ( $lastposts as $post ) :
        setup_postdata( $post ); ?>	

        <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>

        <?php
        endforeach; 
        wp_reset_postdata();
    endif;
    ?>
    <!-- Ici grâce à la loop, ça nous permet d'afficher sur la page d'accueil, le contenu de la page restaurant (la variable a été défini plus haut: je veux trois restaurants affichés et je les affiche randomly) -->

</div> <!-- Fermeture restaurant-spot-grid -->

<div class="text-center my-5">
<a href="<?= get_post_type_archive_link('restaurant'); ?>" class="btn btn-outline-primary"><?php _e('Tous les restaurants', 'startheme'); ?></a>
<!-- Ce bouton nous amène vers la page restaurant (archive_link) -->

</div>
</section> <!-- Fin restaurant spot -->

<?php get_footer() ?>