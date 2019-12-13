<?php
/**
 * The template for displaying all single posts
 */

get_header();
$author_id = get_the_author_meta( 'ID' );
$logo = get_field('logo');
$company_id = get_the_ID();
$recommended_articles_html = "";
while ( have_posts() ) : the_post();
  $description = get_the_content();
  $current_url = "$_SERVER[REQUEST_URI]";
  if (strpos($current_url, 'page') === false) {
    $paged = 1;
  } else {
    $paged = basename($current_url);
  } ?>
  <section class='company'>
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>">
      <div class="row">
        <div class="col-8">
            <?php
            if(strpos($current_url, 'page') === false) :
              $stock = new Stock();
              $stocks = new WP_Query(array(
                'post_type' => 'stock',
                'posts_per_page' => '-1',
                'order' => 'DESC',
              ));
              if($stocks->have_posts()) :
                while ($stocks->have_posts()) : $stocks->the_post();
                $associated_company_id = get_field('associated_company');
                $stock_id = get_the_ID();
                $ticker_symbol = get_field('ticker_symbol');
                if( $associated_company_id == $company_id ):
                  $recommended_articles = new WP_Query(array(
                    'post_type' => 'recommendation',
                    'posts_per_page' => '-1',
                    'order' => 'DESC',
                  ));
                  if($recommended_articles->have_posts()) :
                    while ($recommended_articles->have_posts()) : $recommended_articles->the_post();
                    $associated_stock = get_field('associated_stock');
                    $article_link = get_the_permalink();
                    $article_title = get_the_title();
                    if( $associated_stock ):
                      $post = $associated_stock;
                      setup_postdata( $post );
                      $associated_stock_id = get_the_ID();
                      if($stock_id == $associated_stock_id) :
                        $recommended_articles_html .= "
                        <div class='post'>
                          <a href='$article_link'>$article_title ($ticker_symbol)</a>
                        </div>
                        ";
                      endif;
                      wp_reset_postdata();
                    endif;
                  endwhile;
                endif;
              endif;
            endwhile;
            wp_reset_query();
          endif;
          ?>
          <?php if(!empty($recommended_articles_html)) : ?>
            <h2>Recommendations: </h2>
            <div class="recommended_articles">
              <div class="wrap">
                <?php echo $recommended_articles_html; ?>
              </div>
            </div>
          <?php endif; ?>
        <?php endif; ?>
          <?php
          $news = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => '10',
            'order' => 'DESC',
            'paged' => $paged
          ));
          if($news->have_posts()) : ?>
          <div class="news_articles">
            <h2>Other Coverage:</h2>
            <div class="wrap">
              <?php while ($news->have_posts()) : $news->the_post(); ?>
                <div class="post">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </div>
              <?php endwhile; wp_reset_query(); ?>
            </div>
          </div>
          <?php
          if (function_exists(custom_pagination)) {
            custom_pagination($news->max_num_pages,"",$paged);
          } ?>
          <?php endif; ?>
          </div>
          <div class="col-4">
            <?php get_sidebar('company'); ?>
          </div>
        </div>
      </div>
      <div class="container">
        <?php echo $description; ?>
      </div>
    </div>
  </section>
  <?php endwhile; ?>
<?php get_footer();
