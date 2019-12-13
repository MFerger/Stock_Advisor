<?php

/**
* Recommendation Article Sidebar
*/
$company = new Company();
$associated_stock = get_field('associated_stock');
if( $associated_stock ):
	$post = $associated_stock;
	setup_postdata( $post );
  $ticker_symbol = get_field('ticker_symbol');
  $company_code = substr($ticker_symbol, strpos($ticker_symbol, ":") + 1);
  wp_reset_postdata();
endif;
?>
<div class="sidebar">
  <p class='title'>Company Profile</p>
  <?php echo $company->get_company_info($company_code); ?>
</div>
