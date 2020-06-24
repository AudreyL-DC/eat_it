
<?php

/**
 * Template part for displaying spot content in single spots
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

$infos = get_field_object ('horaires_douverture');
/* On doit créer une variable et on lui demande d'aller récupérer tout ce qu'il peut sur le champ information. get_field_object est spécifique à ACF. On va récupérer le titre du champ et le contenu*/
$adress = get_field_object('adresse');
$notes = get_field_object('notes');
$menu1 = get_field_object('menu_1');
$menu2 = get_field_object('menu_2');



?>

<pre>
<?php  var_dump($notes); ?>
</pre>

<!-- Permet de voir le contenu de cette variable et ainsi voir les informations qu'il va récupérer. On va utiliser les noms entre crochets pour appeler la variable et afficher les infos que nous avons besoin -->

<article <?php post_class(); ?>>

    <header class="entry-header main-header py-5" style="background-image: url(<?php the_post_thumbnail_url(); ?>);">
        <!-- Permet de générer en image background l'image mise en avant -->

        <div class="container">
      
            <h1 class="page-title entry-title"><?php the_title(); ?></h1>

        </div>

    </header>

  <div class="restaurant-content bg-light py-5">

        <div class="container">

            <div class="row">

                <div class="entry-content col-md-8 col-lg-10">
                    <?php the_content(); ?>
                </div>

                <div class="restaurant-niveau bg-white p-4 text-center">

                    <h3><?= $notes['label'] ?></h3>

                    <?php foreach( $notes['choices'] as $key => $choice ) : ?>
                   
                 <?php 
                    if($key <= $notes['value']) $img_class = 'level'; 
                    else $img_class = 'over-level'; 
                    ?> 

<!-- On va faire une boucle dans le tableau "notes" puis on compare les valeurs  -->

                    <img src="<?= get_template_directory_uri(); ?>/dist/images/notation.svg" alt="<?= $choice ?>" title="<?= $choice ?>" class="etoile <?= $img_class ?>">
                 <?php endforeach; ?>


                </div>

             </div><!-- .row -->

        </div><!-- .container -->

    </div><!-- .restaurant-content -->

  <div class="restaurant-acf container">
              <!-- On va faire apparaître les infos extra (horaires, adresse, notes) mises dans ACF (WP) -->

        <div class="restaurant-infos my-5">
    
            <h2><?= $infos['label']; ?></h2> <!-- On récupère le label et la valeur dans ACF -->
             <?= $infos['value']; ?>

        </div> <!-- restaurant-infos -->

        <div class="restaurant-adresse my-5">
    
            <h2><?= $adress['label']; ?></h2> <!-- On récupère le label et l'adresse dans ACF -->
            <?= $adress['value']; ?>

        </div> <!-- restaurant-adresse -->

        <div class="restaurant-menus my-5">

            <h2><?= $menu1['label']; ?></h2> <!-- On récupère le label et l'adresse dans ACF -->
            <?= $menu1['value']; ?>

            <h2><?= $menu2['label']; ?></h2> <!-- On récupère le label et l'adresse dans ACF -->
            <?= $menu2['value']; ?>

        </div> <!-- .restaurant-menus -->

    </div><!-- .restaurant-acf -->

</article>