<?php

/**
* Company Sidebar
*/
$company_id = get_the_ID();
$stock = new Stock();
$stocks = new WP_Query(array(
  'post_type' => 'stock',
  'posts_per_page' => '-1',
  'order' => 'DESC',
));
if($stocks->have_posts()) :
  while ($stocks->have_posts()) : $stocks->the_post();
    $associated_company = get_field('associated_company');
    if( $associated_company == $company_id ):
      $ticker_symbol = get_field('ticker_symbol');
      $company_code = substr($ticker_symbol, strpos($ticker_symbol, ":") + 1);
      ?>
      <div class="sidebar">
        <p class='title'><?php echo $ticker_symbol; ?> Stock Profile</p>
        <?php echo $stock->get_stock_info($company_code); ?>
      </div>
    <?php endif;
  endwhile;
  wp_reset_query();
endif;
?>
