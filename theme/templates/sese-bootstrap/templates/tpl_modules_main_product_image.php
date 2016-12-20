<?php
/**
 * Module Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_modules_main_product_image.php 3208 2006-03-19 16:48:57Z birdbrain $
 */
require(DIR_WS_MODULES . zen_get_module_directory(FILENAME_MAIN_PRODUCT_IMAGE));

$thumbnail = zen_image($products_image_medium, addslashes($products_name),
  0, 0, 'class="img-responsive img-center" itemprop="thumbnailUrl"');
?>
<div id="productMainImage" class="text-center" itemscope itemtype="http://schema.org/ImageObject" itemprop="image">
  <a href="<?php echo $products_image_large; ?>" data-lightbox="product_main_image"
     data-title="<?php echo $products_name; ?>" class='thumbnail' itemprop="contentUrl">
     <meta property="representativeOfPage" content="True" />
    <?php echo $thumbnail; ?>
    <small><?php echo TEXT_CLICK_TO_ENLARGE; ?></small>
  </a>
</div>
