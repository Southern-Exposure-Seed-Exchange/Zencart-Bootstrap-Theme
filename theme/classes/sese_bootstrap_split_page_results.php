<?php
/** Extend the splitPageResults class for the SESE Bootstrap Theme */
class BootstrapSplitPageResults extends splitPageResults
{
  /* Display the pagination links */
  function display_links($max_page_links, $parameters='') {
    global $request_type;
    // Display Nothing if Only 1 Page Exists
    if ($this->number_of_pages == 1) { return ''; }

    // Append a Trailing Ampersand to the Parameters if One Doesn't Exist
    if (zen_not_null($parameters) && (substr($parameters, -1) != '&')) {
      $parameters .= '&';
    }


    $content = "<nav><ul class='pagination pagination-sm'>\n";

    // Previous Button
    if ($this->current_page_number > 1) {
      $previous_link = zen_href_link(
        $_GET['main_page'],
        $parameters . $this->page_name . '=' . ($this->current_page_number - 1),
        $request_type);
      $previous_link_title = PREVNEXT_TITLE_PREVIOUS_PAGE;
      $content .= "<li><a href='{$previous_link}' title='{$previous_link_title}'>"
        . PREVNEXT_BUTTON_PREV . "</a></li>\n";
    } else {
      $content .= "<li class='disabled'><span>" . PREVNEXT_BUTTON_PREV .
        "</span></li>\n";
    }

    // Set Current Window of Pages and Maximum Window of Pages
    $cur_window_num = intval($this->current_page_number / $max_page_links);
    if ($this->current_page_number % $max_page_links != 0) $cur_window_num++;
    $max_window_num = intval($this->number_of_pages / $max_page_links);
    if ($this->number_of_pages % $max_page_links != 0) $max_window_num++;

    // Previous Window of Pages
    if ($cur_window_num > 1) {
      $previous_set_number = (($cur_window_num - 1) * $max_page_links);
      $previous_set_link = zen_href_link(
        $_GET['main_page'],
        "{$parameters}{$this->page_name}={$previous_set_number}",
        $request_type);
      $previous_set_title = sprintf(PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE, $max_page_links);
      $content .= "<li><a href='{$previous_set_link}' " .
        "title='{$previous_set_title}'>...</a></li>\n";
    }

    // Numbered Page Buttons
    for ($page_number = 1 + (($cur_window_num - 1) * $max_page_links);
         ($page_number <= $this->number_of_pages) &&
           ($page_number <= ($cur_window_num * $max_page_links)); $page_number++) {
      if ($page_number == $this->current_page_number) {
        $content .= "<li class='active'><span>{$page_number}</span></li>\n";
      } else {
        $page_link = zen_href_link(
          $_GET['main_page'], "${parameters}{$this->page_name}=${page_number}",
          $request_type);
        $page_title = sprintf(PREVNEXT_TITLE_PAGE_NO, $page_number);
        $content .= "<li><a href='{$page_link}' title='{$page_title}'>" .
          "{$page_number}</a></li>\n";
      }
    }

    // Next Window of Pages
    if ($cur_window_num < $max_window_num) {
      $next_set_number = $cur_window_num * $max_page_links + 1;
      $next_set_link = zen_href_link(
        $_GET['main_page'], "{$parameters}{$this->page_name}=$next_set_number",
        $request_type);
      $next_set_title = sprintf(PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE, $max_page_links);
      $content .= "<li><a href='{$next_set_link}' title='{$next_set_title}'>" .
        "...</a></li>\n";
    }

    // Next Button
    if (($this->current_page_number < $this->number_of_pages) &&
        ($this->number_of_pages != 1)) {
      $next_page_number = $this->current_page_number + 1;
      $next_link = zen_href_link(
        $_GET['main_page'], "{$parameters}{$this->page_name}={$next_page_number}",
        $request_type);
      $next_title = PREVNEXT_TITLE_NEXT_PAGE;
      $content .= "<li><a href='{$next_link}' title='{$next_title}'>" .
        PREVNEXT_BUTTON_NEXT . "</a></li>\n";
    } else {
      $content .= "<li class='disabled'><span>" . PREVNEXT_BUTTON_NEXT .
        "</span></li>\n";
    }

    $content .= "</ul></nav>\n";
    return $content;
  }
}

?>
