<?php get_header(); ?>
<section class="companies_index">
  <div class="container">
    <h1>Companies:</h1>
    <div class='post_wrap'>
      <?php while (have_posts()) : the_post(); ?>
        <div class='post'>
          <a href='<?php the_permalink(); ?>'>
            <img src='<?php echo get_the_post_thumbnail_url(get_the_ID(), "article_thumbnail"); ?>' />
            <span>
              <?php the_title(); ?>
            </span>
          </a>
        </div>
      <?php endwhile; wp_reset_query(); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>
