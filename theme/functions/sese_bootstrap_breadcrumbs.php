<?php
/* Breadcrumb Functions for the SESE Bootstrap Theme */
class BootstrapBreadcrumbs
{
  /** Generate the Breadcrumbs HTML for the current page.
    *
    * @param array $breadcrumbs The global breadcrumbs array for the page.
    * @return string The HTML representing the breadcrumbs.
    */
  public static function render($breadcrumbs) {
    $content = "<ol class='breadcrumb'>\n";
    $crumb_length = count($breadcrumbs->_trail);
    foreach ($breadcrumbs->_trail as $index => $breadcrumb) {
      $is_last_crumb = $index == $crumb_length - 1;
      if ($is_last_crumb) {
        $content .= "<li class='active'>{$breadcrumb['title']}</li>";
      } else {
        $content .= "<li><a href='{$breadcrumb['link']}'>" .
          "{$breadcrumb['title']}</a></li>";
      }
    }
    $content .= '</ol>';
    return $content;
  }
}
?>
