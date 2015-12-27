<?php
/* Utility functions for the SESE Bootstrap Theme */
class BootstrapUtils
{
  /** Return the URL of the category page, given an array of category ids */
  public static function category_url($category_ids) {
    $cPath = implode($category_ids, '_');
    return zen_href_link(FILENAME_DEFAULT, "cPath=$cPath");
  }

  /** Return an array of SESE Product Icon arrays containing the title and image */
  public static function sese_product_icons($template, $current_page) {
    $template_image_folder = $template->get_template_dir(
      '', DIR_WS_TEMPLATE, $current_page, 'img/icons/'
    );
    $icons = array(
      'organic' =>
        array('title' => 'Certified Organic',
              'image' => "$template_image_folder/organic-certified.png"),
      'heirloom' =>
        array('title' => 'Heirloom',
              'image' => "$template_image_folder/heirloom.png"),
      'southeast' =>
        array('title' => 'Especially well-suited to the Southeast',
              'image' => "$template_image_folder/southeast.png"),
      'eco' =>
        array('title' => 'Ecologically Grown',
              'image' => "$template_image_folder/ecologically-grown.png"),
    );
    return $icons;
  }
}
?>
