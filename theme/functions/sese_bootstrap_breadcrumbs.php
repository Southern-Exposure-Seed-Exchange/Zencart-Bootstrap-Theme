<?php
/* Breadcrumb Functions for the SESE Bootstrap Theme */
class BootstrapBreadcrumbs
{
  /** Generate the Breadcrumbs HTML for the current page.
    *
    * Removes any crumbs with an empty `title` field.
    *
    * @param array $breadcrumbs The global breadcrumbs array for the page.
    * @return string The HTML representing the breadcrumbs.
    */
  public static function render($breadcrumbs) {
    $filtered_breadcrumbs = array();
    foreach ($breadcrumbs->_trail as $breadcrumb) {
      if ($breadcrumb['title'] !== '') {
        array_push($filtered_breadcrumbs, $breadcrumb);
      }
    }
    $breadcrumbs->_trail = $filtered_breadcrumbs;

    $content = "<ol class='breadcrumb' vocab='http://schema.org' typeof='BreadcrumbList'>\n";
    $crumb_length = count($breadcrumbs->_trail);
    foreach ($breadcrumbs->_trail as $index => $breadcrumb) {
      $is_last_crumb = $index == $crumb_length - 1;
      if ($is_last_crumb) {
        $content .= "<li class='active' property='itemListElement' typeof='ListItem'>{$breadcrumb['title']}";
      } else {
        $content .= "<li property='itemListElement' typeof='ListItem'><a href='{$breadcrumb['link']}' property='item' typeof='WebPage'>" .
          "{$breadcrumb['title']}</a>";
      }
      $index1 = $index + 1;
      $content .= "<meta property='position' content='{$index1}' /></li>";
    }
    $content .= '</ol>';
    return $content;
  }
}
?>
