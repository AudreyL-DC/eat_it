<?php
/**
 * The template for displaying archive pages
 *
 *
 * @package WordPress
 * @subpackage Startheme
 * @since 1.0.0
 *
 */

$taxonomies = get_terms( array(
  'taxonomy' => 'specialites',
  'hide_empty' => false
) );

get_header();
?>

<main>


  <?php if (have_posts()) : ?>

    <section class="archive-section container py-5">


    <?php  if ( !empty($taxonomies) ) :
    $output = '<select>';
    foreach( $taxonomies as $category ) {
        if( $category->parent == 0 ) {
            $output.= '<optgroup label="'. esc_attr( $category->name ) .'">';
            foreach( $taxonomies as $subcategory ) {
                if($subcategory->parent == $category->term_id) {
                $output.= '<option value="'. esc_attr( $subcategory->term_id ) .'">
                    '. esc_html( $subcategory->name ) .'</option>';
                }
            }
            $output.='</optgroup>';
        }
    }
    $output.='</select>';
    echo $output;
endif; ?>

<!-- Affiche les différentes spécialités dans un menu déroulant. -->



      <h1 class="page-title"><?php the_archive_title(); ?></h1>
      <!-- Permet d'afficher le titre de l'archive: Restaurants. CPT UI créé dans WP -->

      <div class="row">

        <?php while (have_posts()) : the_post(); ?>

          <div class="col-md-6 col-lg-4 my-3">


            <?php get_template_part( 'template-parts/content-archive', get_post_type() ); ?>
            <!-- Permet d'afficher tous les restaurants crées dans WP -->

          </div>

        <?php endwhile; ?>

      </div><!-- .row -->

      <?php the_posts_pagination(); ?>
      <!-- Permet d'afficher la pagination -->
    
    </section>

  <?php else : ?>

    <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <!-- Permet d'afficher les images mises en avant. Ca a été défini dans content.php -->
    
  <?php endif; ?>

</main>

<?php get_footer() ?>