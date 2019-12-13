<?php
 // Template Name: Companies
get_header();
?>
<section class="companies_index">
  <div class="container">
    <div class="row">
      <div class="col-8">
        <?php $companies = new WP_Query(array(
          'post_type' => 'company',
          'posts_per_page' => '10',
          'order' => 'DESC',
        ));
        if($companies->have_posts()) :
          echo "<h1>Companies:</h1>";
          while ($companies->have_posts()) : $companies->the_post();
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
