<?php
/**
 * Single view for recommendations
 */

get_header();
$author_id = get_the_author_meta( 'ID' );
while ( have_posts() ) : the_post(); ?>
  <div class="hero" style='background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0, 0, 0, 0.75) 100%), url(<?php echo get_the_post_thumbnail_url(); ?>)'>
    <div class="container">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
  <section class='recommendation_article'>
    <div class="container">
      <div class="info">
        <p class='article_info'>Author: <?php echo get_the_author_meta( 'user_firstname', $author_id ) . " " . get_the_author_meta( 'user_lastname', $author_id ) ?></p>
        <p class='article_info'>Date Published: <?php echo get_the_date( 'l, F j, Y' ) ?></p>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
        <div class="col-4">
          <?php get_sidebar('recommendation'); ?>
        </div>
      </div>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();
