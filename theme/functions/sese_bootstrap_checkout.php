<?php
/* Utility functions used throughout the Checkout process. */
class BootstrapCheckout
{
  /* Determine whether the User is currently in the Checkout Process */
  public static function user_in_checkout() {
    global $current_page_base;
    $checkout_pages = array(
      'no_account', 'checkout_shipping', 'checkout_payment',
      'checkout_confirmation', 'checkout_success'
    );
    return in_array($current_page_base, $checkout_pages);
  }

  /* Render the Checkout Progress HTML for the current step number.
   *
   * If the user is checking out without an account, the extra billing step is
   * added.
   *
   */
  public static function render_checkout_progress($step_number, $has_no_account) {
    $steps = array(TEXT_ORDER_STEPS_1, TEXT_ORDER_STEPS_2,
                   TEXT_ORDER_STEPS_3, TEXT_ORDER_STEPS_4);
    if ($has_no_account) {
      array_unshift($steps, TEXT_ORDER_STEPS_BILLING);
    }

    $output = "<div class='row text-center order-steps'>\n";
    foreach ($steps as $index => $step) {
      if ($index == 0 && $has_no_account) {
        $class = 'col-sm-2 col-sm-offset-1';
      } elseif ($has_no_account) {
        $class = 'col-sm-2';
      } else {
        $class = 'col-sm-3';
      }
      if ($step_number >= $index + 1) {
        $class .= ' text-primary';
      }
      $icon = '';
      if ($step_number == $index + 1) {
        $icon = BootstrapUtils::glyphicon('arrow-down');
      }

      $output .= "<div class='{$class}'>{$icon}<br />{$step}</div>\n";
    }
    $output .= "</div>\n";

    $class = $has_no_account ? 'col-sm-10 col-sm-offset-1' : 'col-sm-12';
    $completed = 100 / count($steps) * $step_number;
    $output .= "<div class='row'><div class='{$class}'><div class='progress'>\n" .
      "<div class='progress-bar' role='progressbar' aria-valuenow='{$completed}' " .
      "aria-valuemin='0' aria-valuemax='100' style='width:{$completed}%;'></div>\n" .
      "</div></div></div>";

    return $output;
  }

  /* Render the HTML for the "Continue Checkout" text & button row. */
  public static function render_continue_checkout($link_backwards=false, $submit_action=false) {
    $button_text = BUTTON_CONTINUE_ALT;
    $help_title = TITLE_CONTINUE_CHECKOUT_PROCEDURE;
    $help_text = TEXT_CONTINUE_CHECKOUT_PROCEDURE;
    $back_text = BUTTON_BACK_ALT;
    $back_link = $link_backwards ?
      "<a class='btn btn-default' href='{$link_backwards}'>{$back_text}</a>" : '';
    $action_field = $submit_action ?
      "<input type='hidden' name='action' value='submit' />" : '';
    return <<<HTML
      <div class='clearfix'>
        <p class="pull-right">
          {$action_field}
          <button type='submit' class='btn btn-primary'>{$button_text}</button>
        </p>
        <p class="pull-left"><strong>{$help_title}</strong> {$help_text}<br />{$back_link}</p>
      </div>
HTML;
  }

}
?>
