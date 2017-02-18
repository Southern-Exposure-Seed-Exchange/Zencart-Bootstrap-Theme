<?php
/*
  Quick Orders for Zen Cart - Add products to cart by inserting model number and quantity

  This program is subject to the Gnu General Public License version 2 (dated June 1991)

  A copy of the license should have been included with this package; see license.txt
  The license is also available at: http://www.gnu.org/copyleft/gpl.html
*/

?>
<h1><?php echo HEADING_TITLE; ?></h1>
<h2>Instructions:</h2>
<ul style="font-size:16px">
  <li>5-digit item numbers can be found at the end of each item description. A letter at the end of a item number indicates a bulk size. Enter the letter if you would like to purchase the bulk size.</li>
  <li>Press <code>Tab</code> to move between cells.</li>
  <li>To move the items into your shopping cart, press <code>Enter</code> or click <code>Add to Cart</code> at the bottom of the page. You will be able to review the items and quantities once they have been moved to your shopping cart.</li>
</ul>

<?php
if (sizeof($quick_order_errors) > 0) {
  echo "<div class='alert alert-danger'>". TEXT_QO_FORM_ERRORS . "</div>";
}
?>

<?php echo zen_draw_form('quick_order', zen_href_link(FILENAME_QUICK_ORDER, '', 'NONSSL', false), 'get') . zen_hide_session_id(); ?>
<table>
<tr>
<td><?php
  if ($messageStack->size('quick_order') > 0) {
    echo $messageStack->output('quick_order'); ?><br /><?php
  }

  echo zen_draw_hidden_field('main_page', FILENAME_QUICK_ORDER);
  echo zen_draw_hidden_field('action', 'add_products');

  echo BootstrapQuickOrder::table_start();

  $c = $qo_products_count + (int)QO_INPUT_ROWS;
  if ($c % 2 == 1) { $c += 1; }

  // display rows for all the pre-selected model numbers and the set number of extra rows
  for($i = 1, $array_index = 0; $i <= $c; $i++, $array_index++) {
    if ($alt_table_row === 1) {
      $alt_table_row = 2;
    }
    else {
      $alt_table_row = 1;
    }

    if($quick_order_errors[$i]) {
      echo '<tr class="danger"><td colspan="2"><b>' . $quick_order_errors[$i] . '</b></td></tr>' . "\n";
    }

    if(isset($alternate_skus[$i])){
      echo '<tr><td colspan="2">';
      for($j = 0, $k = count($alternate_skus[$i]); $j < $k; $j++) {
        echo '<strong>' . $alternate_skus[$i][$j]['name'] . '</strong><br />' . TEXT_QO_MODEL . ' ' . $alternate_skus[$i][$j]['sku'] . "<br />\n";
      }
      echo '</td></tr>';
    }
    $qty_value = $items[$i]['qty'] == '' ? '1' : $items[$i]['qty'];
    $row_class = $quick_order_errors[$i] ? ' danger' : '';
    if ($product_list_result !== false && isset($product_list_models[$array_index]) && $product_list_models[$array_index] != '') { ?>
      <tr class="row-<?php echo $alt_table_row . $row_class; ?>"><td class="column-1"><?php echo '<input class="form-control" type="hidden" name="model_' . $i . '" value="' . $product_list_models[$array_index] . '" />' . $product_list_array[$product_list_models[$array_index]] . '</td><td class="column-2"><input class="form-control" type="text" name="qty_' . $i . '" value="' . $qty_value . '" size="5" />'; ?></td></tr><?php
    } else { ?>
      <tr class="row-<?php echo $alt_table_row . $row_class; ?>"><td class="column-1"><?php echo TEXT_QO_MODEL . ' ' . zen_draw_input_field('model_' . $i, $items[$i]['model'], $i == 1 ? 'autofocus="autofocus" class="form-control"' : 'class="form-control"') . '</td><td class="column-2"><input class="form-control" type="text" name="qty_' . $i . '" value="' . $qty_value . '" size="5" />'; ?></td></tr><?php
    }

    if ($i == round($c / 2)) {
      echo BootstrapQuickOrder::table_end() . "</td><td>" . BootstrapQuickOrder::table_start();
    }

  }

  echo BootstrapQuickOrder::table_end();
?>

</td></tr></table>
<p><button class="btn btn-primary" type="submit">Add to Cart</button></p>
</form>

<?php
class BootstrapQuickOrder
{
  public static function table_start() {
    return "<table class='table table-condensed table-striped'>\n<tr class='table-header'>" .
      "<th>" . TEXT_QO_NAME_MODEL . "</th><th>" . TEXT_QO_QTY . "</th></tr>";
  }
  public static function table_end() {
    return "</table>";
  }

}
?>
