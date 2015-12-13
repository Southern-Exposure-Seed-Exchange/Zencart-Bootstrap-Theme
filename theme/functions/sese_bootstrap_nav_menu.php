<?php
/* Menu Functions for the SESE Bootstrap Theme */
class BootstrapNavMenu
{
  /** Generate a list of root Categories.
  *
  * The categories contain an ID, name, the active status, and a single level of
  * sub-categories. If the category/sub-category is in the path of the current
  * page, it will have an `active` value of true.
  */
  public static function root_and_child_categories() {
    global $cPath_array, $db;
    $root_categories_query = "SELECT * FROM " . TABLE_CATEGORIES . " AS cats" .
      " INNER JOIN " . TABLE_CATEGORIES_DESCRIPTION . " AS descs" .
        " ON cats.categories_id=descs.categories_id" .
      " WHERE categories_status=1 AND parent_id=0 ORDER BY sort_order";
    $root_result = $db->Execute($root_categories_query);
    $root_categories = array();
    while (!$root_result->EOF) {
      $root_category = $root_result->fields;
      $category_id = $root_category['categories_id'];
      $root_categories[] = array(
        'id' => $category_id,
        'name' => $root_category['categories_name'],
        'active' => in_array($category_id, $cPath_array),
        'children' => BootstrapNavMenu::get_child_categories($category_id),
      );
      $root_result->MoveNext();
    }
    return $root_categories;
  }

  /** Generate a list of direct children of the Category with $parent_id.
   *
   * Each category contains an ID, name and the active status.
   */
  private static function get_child_categories($parent_id) {
    global $cPath_array, $db;
    $children = array();
    $child_query = "SELECT * FROM " . TABLE_CATEGORIES . " AS cats" .
      " INNER JOIN " . TABLE_CATEGORIES_DESCRIPTION . " AS descs" .
        " ON cats.categories_id=descs.categories_id" .
        " WHERE categories_status=1 AND parent_id=:parentID:" .
        " ORDER BY sort_order";
    $child_query = $db->bindVars($child_query, ':parentID:', $parent_id, 'integer');
    $result = $db->Execute($child_query);
    while (!$result->EOF) {
      $child = $result->fields;
      $child_id = $child['categories_id'];
      $children[] = array(
        'id' => $child_id,
        'name' => $child['categories_name'],
        'active' => in_array($child_id, $cPath_array),
      );
      $result->MoveNext();
    }
    return $children;
  }
}
?>
