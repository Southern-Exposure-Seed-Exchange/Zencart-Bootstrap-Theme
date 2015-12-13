<?php
/* Utility functions for the SESE Bootstrap Theme */
class BootstrapUtils
{
  /** Return the URL of the category page, given an array of category ids */
  public static function category_url($category_ids) {
    $cPath = implode($category_ids, '_');
    return zen_href_link(FILENAME_DEFAULT, "cPath=$cPath");
  }
}
?>
