<?php
 // Template Name: News Articles
get_header();
?>
<section class="news_articles">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <?php $news_articles = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => '10',
          'order' => 'DESC',
          'paged' => $paged
        ));
        if($news_articles->have_posts()) :
          echo "<h1>News Articles:</h1><div class='post_wrap'>";
          while ($news_articles->have_posts()) : $news_articles->the_post();
          $author_id = get_the_author_meta( 'ID' );
          ?>
            <div class="post">
              <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), "article_thumbnail"); ?>" alt="">
              </a>
              <div class="details">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                <p class='article_info'>Author: <?php echo get_the_author_meta( 'user_firstname', $author_id ) . " " . get_the_author_meta( 'user_lastname', $author_id ) ?></p>
                <p class='article_info'>Date Published: <?php echo get_the_date( 'l, F j, Y' ) ?></p>
              </div>
            </div>
            <?php
          endwhile;
          wp_reset_query();
          echo "</div>";
        endif;
        if (function_exists(custom_pagination)) {
          custom_pagination($news_articles->max_num_pages,"",$paged);
        }
        ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
