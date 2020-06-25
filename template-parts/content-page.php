
<?php

/**
 * Template part for displaying posts
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 */

$lastposts = get_posts( array(
  'numberposts' => 5,
  'post_type' => 'restaurant',
  'orderby' => 'rand',
));
/* On défini la variable et le nombre de restaurant qui seront affichés dans un ordre random */

?>

<article <?php post_class(); ?>>

  <header class="entry-header main-header py-5">

    <div class="container">
      
      <h1 class="page-title entry-title"><?php the_title(); ?></h1>


<?php if (is_front_page ()) : ?>
<?php endif; ?>
<a href="<?= get_post_type_archive_link('restaurant'); ?>" class="btn btn-outline-light mt-4"><?php _e('voir nos restaurants', 'startheme'); ?></a>

<!-- Nous permet de mettre le bouton 'tous les restaurant' sur la page d'accueil.Is_front_page permet de rajouter du contenu uniquement sur la page d'accueil. -->
    </div>

  </header>

 
