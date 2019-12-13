<?php
/**
 * The template for displaying all single posts
 */

get_header();
$author_id = get_the_author_meta( 'ID' );
while ( have_posts() ) : the_post(); ?>
  <section class='news_article'>
    <div class="container">
      <div class="info">
        <h1><?php the_title(); ?></h1>
        <p class='article_info'>Author: <?php echo get_the_author_meta( 'user_firstname', $author_id ) . " " . get_the_author_meta( 'user_lastname', $author_id ) ?></p>
        <p class='article_info'>Date Published: <?php echo get_the_date( 'l, F j, Y' ) ?></p>
      </div>
      <?php the_content(); ?>
    </div>
  </section>
<?php endwhile; ?>
<?php get_footer();
