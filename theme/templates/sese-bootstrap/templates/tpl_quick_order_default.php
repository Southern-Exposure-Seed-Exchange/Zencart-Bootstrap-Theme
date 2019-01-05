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

<!-- Modal to confirm addition of SKUs whose descriptions we accidentally swapped -->
<div id="qoModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Catalog Correction</h4>
      </div>
      <div class="modal-body">
        <p>
          In our 2019 print catalog, we mixed up the variety descriptions of
          Mountaineer Pride tomato and Mountaineer Delight tomato. We're sorry
          about the hassle but want to be sure you get the tomato variety you
          actually want. Both were released in 2017 by professors at WVU and
          have good resistance to diseases including Septoria Leaf Spot. The
          descriptions on our website are correct.
        </p>
        <p>Key differences are:<br/>
          <b>Mountaineer Pride, #49262</b>: 80 days. Medium slicers, good
          flavor. Firmer skins make this a good variety for market growers.
          <br />
          <b>Mountaineer Delight, #49264</b>: 77 days. Larger beefsteak,
          sweeter flavor than the original West Virginia 63 tomato.
        </p>
        <p>
          Please confirm that you'd like to add the entered items to your cart,
          or press Cancel to return to the Quick Order form.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button id='qo_modal_submit' type="submit" class="btn btn-primary">Add to Cart</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</form>

<script>
/* Our 2019 catalogs have the descriptions for 2 SKUs switched, so we want to
 * pop up a confirmation modal if a customer has entered one of these two SKUs.
 * If the modal's OK button is pressed, submit the form.
 */
jQuery(document).ready(function() {
    var $form = jQuery('form[name="quick_order"]');
    // When anything in the form is click, save the event target as data on the
    // form. We will use this to determine if the normal submit or modal submit
    // has been clicked.
    $form.click(function(e) {
        $(this).data('clicked', $(e.target));
    });

    // On submission, check if any of the SKUs were entered, showing the modal
    // if so & submitting the form otherwise.
    $form.submit(function(e) {
        var skus = [49262, 49264];
        var $skuInputs = jQuery('form .column-1 input');
        var skuMatch = $skuInputs.is(function(i, el) {
            return skus.indexOf(jQuery(el).val()) === -1;
        });
        var isModalSubmission = $form.data('clicked').is('[id="qo_modal_submit"]');
        if (skuMatch && !isModalSubmission) {
            jQuery('#qoModal').modal('show');
            return false;
        } else {
            return true;
        }
    });
});
</script>

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
