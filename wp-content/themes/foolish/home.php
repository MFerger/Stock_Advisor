<?php
get_header();
?>
<section class="recommended_articles">
  <div class="container">
    <div class="row">
      <div class="col-8">
        <?php $recommendations = new WP_Query(array(
          'post_type' => 'recommendation',
          'posts_per_page' => '10',
          'order' => 'DESC',
        ));
        if($recommendations->have_posts()) :
          echo "<h1>Recommended Articles:</h1>";
          while ($recommendations->have_posts()) : $recommendations->the_post();
          $associated_stock = get_field('associated_stock');
          $title = get_the_title();
          if( $associated_stock ):
            $post = $associated_stock;
            setup_postdata( $post );
            $ticker_symbol = get_field('ticker_symbol');
            wp_reset_postdata();
          endif;
          ?>
            <div class="post">
              <a href="<?php the_permalink(); ?>"><?php echo $title." (".$ticker_symbol.")"; ?></a>
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
