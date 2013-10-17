<?php 
/**
 * Template Name: Page Aleatoire
 */

get_header(); ?>
<div class="main">
  <?php query_posts( 
    array( 
    'post_type' => 'predictions',
    'orderby' => 'rand'
      ) 
    ) ?>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="post">
        <h1 class="post-title"><?php the_author(); ?></h1>
        <div class="post-content">
          <?php 
              $custom_fields = get_post_custom(get_the_ID());

              echo("Le " .strtolower(mysql2date( 'l j F Y',$custom_fields['date_de_la_prediction'][0])).", ");
              the_content();
          ?>
        </div>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>