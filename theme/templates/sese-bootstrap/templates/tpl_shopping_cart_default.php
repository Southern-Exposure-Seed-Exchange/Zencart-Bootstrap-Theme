<?php
/**
 * Page Template
 *
 * Loaded automatically by index.php?main_page=shopping_cart.<br />
 * Displays shopping-cart contents
 *
 * @package templateSystem
 * @copyright Copyright 2003-2007 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_shopping_cart_default.php 5554 2007-01-07 02:45:29Z drbyte $
 */

echo '<div class="centerColumn" id="shoppingCartDefault">';

if ($flagHasCartContents) {
  echo BootstrapShoppingCart::page_header();

  if ($messageStack->size('shopping_cart') > 0) {
    echo $messageStack->output('shopping_cart');
  }

  echo zen_draw_form(
    'cart_quantity', zen_href_link(FILENAME_SHOPPING_CART, 'action=update_product'));

  echo "<div>" . TEXT_INFORMATION . "</div>\n";

  if (!empty($totalsDisplay)) {
    echo "<p class='text-center'><strong>{$totalsDisplay}</strong></p>\n";
  }

  if ($flagAnyOutOfStock) { echo BootstrapShoppingCart::out_of_stock_message(); }

  echo BootstrapShoppingCart::cart_contents_table($productArray);

  echo BootstrapShoppingCart::buttons();

  echo "</form>";

  /** load the shipping estimator code if needed */
  if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '2') {
    require(DIR_WS_MODULES . zen_get_module_directory('shipping_estimator.php'));
  }
} else {
  echo "<div class='page-header'><h1>" . TEXT_CART_EMPTY . "</h1></div>";
  foreach (BootstrapShoppingCart::empty_cart_boxes() as $box) {
    echo "<div class='clearfix'>";
    include($box);
    echo "</div>";
  }
}

echo '</div>';


/* Utility Functions for the Shopping Cart Page */
class BootstrapShoppingCart
{
  /** Render the page header for non-empty carts */
  public static function page_header() {
    global $_SESSION;
    $title = HEADING_TITLE;
    if ($_SESSION['cart']->count_contents() > 0) {
      $title .= " <div class='pull-right'><small>" . TEXT_VISITORS_CART .
        "</small></div>";
    }
    return "<div class='page-header'><h1 class='clearfix'>{$title}</h1></div>";
  }

  /** Render the appropriate out of stock message  */
  public static function out_of_stock_message() {
    if (STOCK_ALLOW_CHECKOUT == 'true') {
      $content = OUT_OF_STOCK_CAN_CHECKOUT;
    } else {
      $content = OUT_OF_STOCK_CANT_CHECKOUT;
    }
    return "<div>{$content}</div>";
  }

  /** Render the cart table */
  public static function cart_contents_table(&$products) {
    global $cartShowTotal;
    $table_heading = self::cart_table_header();
    $table_rows = join("\n", array_map(array(self, 'cart_table_row'), $products));
    $table_body = "<tbody>{$table_rows}</tbody>";
    $table_footer = "<tfoot><tr><th colspan='5' class='text-right'>" .
      SUB_TITLE_SUB_TOTAL . " $cartShowTotal</th><th></th></tr></tfoot>";

    return "<table class='table table-striped table-condensed'>\n" .
      "{$table_heading}{$table_body}{$table_footer}</table>";

  }

  /** Render the cart table's header columns */
  private static function cart_table_header() {
    $headings = array(
      array('align' => 'center', 'text' => TABLE_HEADING_QUANTITY),
      array('align' => '', 'text' => TABLE_HEADING_IMAGE),
      array('align' => '', 'text' => TABLE_HEADING_PRODUCTS),
      array('align' => 'right', 'text' => TABLE_HEADING_PRICE),
      array('align' => 'right', 'text' => TABLE_HEADING_TOTAL),
      array('align' => 'center', 'text' => TABLE_HEADING_REMOVE),
    );
    $content = self::make_row_from_columns($headings, 'th', 'scope="col"');
    return "<thead><tr>{$content}</tr></thead>\n";
  }

  /** Create the contents of a table row from an array of columns */
  private static function make_row_from_columns($columns, $element, $params='') {
    $content = '';
    foreach ($columns as $column) {
      $class = '';
      if ($column['align'] !== '') {
        $class = "class='text-{$column['align']}'";
      }
      $content .= "<{$element} {$params} {$class}>{$column['text']}</{$element}>\n";
    }
    return $content;
  }

  /** Render a single product row of the cart table */
  private static function cart_table_row(&$product) {
    $columns = array(
      array('align' => 'center', 'text' => self::cart_product_quantity($product)),
      array('align' => '', 'text' => "<a href='{$product['linkProductsName']}'>" .
        "{$product['productsImage']}</a>"),
      array('align' => '', 'text' => self::cart_product_name($product)),
      array('align' => 'right', 'text' => $product['productsPriceEach']),
      array('align' => 'right', 'text' => $product['productsPrice']),
      array('align' => 'center', 'text' => self::cart_product_remove($product)),
    );

    $content = self::make_row_from_columns($columns, 'td', '');
    return "<tr class='{$product['rowClass']}'>{$content}</tr>";
  }

  /** Render the quantity input for a product */
  private static function cart_product_quantity(&$product) {
    $content = '';
    if ($product['flagShowFixedQuantity']) {
      $content = $product['showFixedQuantityAmount'] .
        "<span class='alert bold'>{$product['flagStockCheck']}</span>" .
        $product['showMinUnits'];
    } else {
      $product['quantityField'] = preg_replace(
        '/size="4"/', 'size="4" class="input-sm form-control"',
        $product['quantityField']);
      $content = $product['quantityField'] . $product['showMinUnits'];
    }
    if ($product['buttonUpdate'] !== '' && SHOW_SHOPPING_CART_UPDATE != 2) {
      $product['buttonUpdate'] =
        "<button type='submit' class='btn btn-xs btn-default'>" .
        TEXT_UPDATE_QUANTITY .  "</button>" .
        zen_draw_hidden_field('products_id[]', $product['id']);
    }
    return $content . $product['buttonUpdate'] . $product['attributeHiddenField'];
  }

  /** Render the name/description column for a product */
  private static function cart_product_name($product) {
    $name = "<div><strong><a href='{$product['linkProductsName']}'>" .
      $product['productsName'] . "</a></strong></div>";
    $stock_check = $product['flagStockCheck'] != '' ?
      "<span class='alert bold'>{$product['flagStockCheck']}</span>" : '';
    $model = "<small>" . TABLE_HEADING_MODEL . " #" .
      zen_products_lookup($product['id'], 'products_model') . $stock_check .
      "</small>";
    $attributes = '';
    if (isset($product['attributes']) && is_array($product['attributes'])) {
      reset($product['attributes']);
      foreach ($product['attributes'] as $option => $value) {
        $attributes .= "<li>" . $value['products_options_name'] .
          TEXT_OPTION_DIVIDER . nl2br($value['products_options_values_name']) .
          "</li>";
      }
      if ($attributes !== '') { $attributes = "<ul>{$attributes}</ul>"; }
    }

    return "<div>{$name} {$model} {$attributes}</div>";
  }

  /** Render the remove link for a product */
  private static function cart_product_remove($product) {
    $content = '';
    if ($product['buttonDelete']) {
      $delete_link = zen_href_link(
        FILENAME_SHOPPING_CART, "action=remove_product&product_id={$product['id']}");
      $content .= "<div><a class='cart-remove-link' href='{$delete_link}'>" .
        BootstrapUtils::glyphicon('remove', ICON_TRASH_ALT) . "</a></div>";
    }
    if ($product['checkBoxDelete'] ) {
      $content .= zen_draw_checkbox_field(
        'cart_delete[]', $product['id'], false, 'class="form-control"');
    }
    return $content;
  }

  /** Render the row of buttons */
  public static function buttons() {
    $back_link = zen_back_link(true);
    $left_buttons = "<a href='{$back_link}' class='btn btn-success'>" .
      "&laquo; " . BUTTON_CONTINUE_SHOPPING_ALT . "</a>";
    if (SHOW_SHIPPING_ESTIMATOR_BUTTON == '1') {
      $shipping_link = zen_href_link(FILENAME_POPUP_SHIPPING_ESTIMATOR);
      $left_buttons .=
        " <a href=\"javascript:popupWindow('{$shipping_link}')\" class='btn btn-warning'>" .
        BootstrapUtils::glyphicon('globe') . " " . BUTTON_SHIPPING_ESTIMATOR_ALT . "</a>";
    }

    $checkout_link = zen_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL');
    $right_buttons = "<a href='{$checkout_link}' class='btn btn-primary'>" .
      BootstrapUtils::glyphicon('shopping-cart') . " " . BUTTON_CHECKOUT_ALT . "</a>";
    if (SHOW_SHOPPING_CART_UPDATE == 2 or SHOW_SHOPPING_CART_UPDATE == 3) {
      $right_buttons = "<button type='submit' class='btn btn-success'>" .
        BootstrapUtils::glyphicon('refresh') .  " " .BUTTON_UPDATE_ALT .
        "</button>\n" . $right_buttons;
    }

    return "<div class='clearfix'><div class='pull-left'>{$left_buttons}</div>" .
      "<div class='pull-right'>{$right_buttons}</div></div>";
  }

  /** Render the boxes to display on the empty cart page */
  public static function empty_cart_boxes() {
    global $db, $template, $current_page_base;
    $boxes = array(
      'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS' =>
        array('key' => 'SHOW_SHOPPING_CART_EMPTY_FEATURED_PRODUCTS',
              'get_template' => true,
              'template' => 'tpl_modules_featured_products'),
      'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS' =>
        array('key' => 'SHOW_SHOPPING_CART_EMPTY_SPECIALS_PRODUCTS',
              'get_template' => true,
              'template' => 'tpl_modules_specials_default'),
      'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS' =>
        array('key' => 'SHOW_SHOPPING_CART_EMPTY_NEW_PRODUCTS',
              'get_template' => true,
              'template' => 'tpl_modules_whats_new'),
      'SHOW_SHOPPING_CART_EMPTY_UPCOMING' =>
        array('key' => 'SHOW_SHOPPING_CART_EMPTY_UPCOMING',
              'get_template' => false,
              'template' => DIR_WS_MODULES .
                zen_get_module_directory(FILENAME_UPCOMING_PRODUCTS)),
    );

    $boxes_to_display = $db->Execute(SQL_SHOW_SHOPPING_CART_EMPTY);
    $cart_boxes = array();
    while (!$boxes_to_display->EOF) {
      $box_key = $boxes_to_display->fields['configuration_key'];
      if (array_key_exists($box_key, $boxes)) {
        $box = $boxes[$box_key];
        $template_file = $box['template'];
        if ($box['get_template']) {
          $template_file .= '.php';
          $template_file = $template->get_template_dir(
            $template_file, DIR_WS_TEMPLATE, $current_page_base, 'templates') .
            "/{$template_file}";
        }
        $cart_boxes[] = $template_file;
      }
      $boxes_to_display->MoveNext();
    }
    return $cart_boxes;
  }
}

?>
