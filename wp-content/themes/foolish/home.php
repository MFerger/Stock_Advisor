<?php
get_header();
?>
<section class="recommended_articles">
  <div class="container">
    <?php $recommendations = new WP_Query(array(
      'post_type' => 'recommendation',
      'posts_per_page' => '10',
      'order' => 'DESC',
    ));
    if($recommendations->have_posts()) :
      echo "<h1>Recommended Articles:</h1><div class='post_wrap'>";
      while ($recommendations->have_posts()) : $recommendations->the_post();
      $associated_stock = get_field('associated_stock');
      $title = get_the_title();
      $post_id = get_the_ID();
      $link = get_the_permalink();
      $author_id = get_the_author_meta( 'ID' );
      if( $associated_stock ):
        $post = $associated_stock;
        setup_postdata( $post );
        $ticker_symbol = get_field('ticker_symbol');
        wp_reset_postdata();
      endif;
      ?>
        <div class="post">
          <a href="<?php echo $link; ?>">
            <img src="<?php echo get_the_post_thumbnail_url($post_id, "article_thumbnail"); ?>" alt="">
          </a>
          <div class="details">
            <a href="<?php echo $link; ?>"><?php echo $title." (".$ticker_symbol.")"; ?></a>
            <p class='article_info'>Author: <?php echo get_the_author_meta( 'user_firstname', $author_id ) . " " . get_the_author_meta( 'user_lastname', $author_id ) ?></p>
            <p class='article_info'>Date Published: <?php echo get_the_date( 'l, F j, Y' ) ?></p>
          </div>
        </div>
        <?php
      endwhile;
      echo "</div>";
      wp_reset_query();
    endif;
    ?>
  </div>
</section>
<?php get_footer(); ?>
