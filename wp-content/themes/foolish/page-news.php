<?php
 // Template Name: News Articles
get_header();
?>
<section class="news_articles">
  <div class="container">
    <div class="row">
      <div class="col-8">
        <?php $news_articles = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => '10',
          'order' => 'DESC',
        ));
        if($news_articles->have_posts()) :
          echo "<h1>News Articles:</h1>"; 
          while ($news_articles->have_posts()) : $news_articles->the_post();
          ?>
            <div class="post">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </div>
            <?php
          endwhile;
          wp_reset_query();
        endif;
        ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
