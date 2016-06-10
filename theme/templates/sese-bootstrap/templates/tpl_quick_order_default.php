<?php
/*
  Quick Orders for Zen Cart - Add products to cart by inserting model number and quantity

  This program is subject to the Gnu General Public License version 2 (dated June 1991)

  A copy of the license should have been included with this package; see license.txt
  The license is also available at: http://www.gnu.org/copyleft/gpl.html
*/

?>


<table>
  <tr>
    <td colspan="2" class="pageHeading"><h1><?php echo HEADING_TITLE; ?></h1></td>
  </tr>
  <tr>
    <td class="main">
  <?php
  if ($messageStack->size('quick_order') > 0) {
?>
  <?php echo $messageStack->output('quick_order'); ?><br />
<?php
  }
?>
  <?php echo zen_draw_form('quick_order', zen_href_link(FILENAME_QUICK_ORDER, '', 'NONSSL', false), 'get') . zen_hide_session_id(); ?>
<?php echo zen_draw_hidden_field('main_page', FILENAME_QUICK_ORDER); ?>
<?php echo zen_draw_hidden_field('action', 'add_products'); ?>
<table id="quick-order" class='table table-condensed table-striped'>
<tr class="table-header"><th><?php echo TEXT_QO_NAME_MODEL; ?></th><th><?php echo TEXT_QO_QTY; ?></th></tr>
<?php

  // display rows for all the pre-selected model numbers and the set number of  extra rows
  for($i = 1, $array_index = 0, $c = $qo_products_count + (int)QO_INPUT_ROWS; $i <= $c; $i++, $array_index++) {
    if ($alt_table_row === 1) {
      $alt_table_row = 2;
    }
    else {
      $alt_table_row = 1;
    }

    if($quick_order_errors[$i]) {
      echo '<tr><td class="qo_error" colspan="2">' . $quick_order_errors[$i] . '</td></tr>' . "\n";
    }

    if(isset($alternate_skus[$i])){
      echo '<tr><td colspan="2">';
      for($j = 0, $k = count($alternate_skus[$i]); $j < $k; $j++) {
        echo '<strong>' . $alternate_skus[$i][$j]['name'] . '</strong><br />' . TEXT_QO_MODEL . ' ' . $alternate_skus[$i][$j]['sku'] . "<br />\n";
      }
      echo '</td></tr>';
    }
    if ($product_list_result !== false && isset($product_list_models[$array_index]) && $product_list_models[$array_index] != '') {
?>
    <tr class="row-<?php echo $alt_table_row; ?>"><td class="column-1"><?php echo '<input type="hidden" name="model_' . $i . '" value="' . $product_list_models[$array_index] . '" />' . $product_list_array[$product_list_models[$array_index]] . '</td><td class="column-2"><input type="text" name="qty_' . $i . '" value="' . $items[$i]['qty'] . '" size="5" />'; ?></td></tr>

<?php
    }
    else {
?>
    <tr class="row-<?php echo $alt_table_row; ?>"><td class="column-1"><?php echo TEXT_QO_MODEL . ' ' . zen_draw_input_field('model_' . $i, $items[$i]['model']) . '</td><td class="column-2"><input type="text" name="qty_' . $i . '" value="' . $items[$i]['qty'] . '" size="5" />'; ?></td></tr>

<?php
    }

  } ?>
</table>

  <p><button class="btn btn-primary" type="submit">Add to Cart</button></p>
  </form>
    </td>
    <td valign="top">
    <p>&nbsp;</p>
    <h2>Instructions:</h2>
    <ul style="font-size:16px">
  <li>Press <code>Tab</code> to move between cells.</li>
  <li>To move  the items into your shopping cart,  press <code>Enter</code> or click <code>Add to Cart</code> at the bottom of the page. You will be able to review the items and quantities once they have been moved to your shopping cart.</li>
  <li>5-digit catalog numbers can be found at the end of each item description. A letter at the end of a catalog number indicates a bulk size. Enter the letter if you would like to purchase the bulk size.</li>
  <li>To use the Quick Order form multiple times in one order,  simply return to this page and use the form to add aditional items to your shopping cart. You can also add additional items by browsing the store's individual products.</li>
</ul>
    </td>
  </tr>
</table>
