<?php
/**
 * Page Template
 *
 * @package templateSystem
 * @copyright Copyright 2003-2005 Zen Cart Development Team
 * @copyright Portions Copyright 2003 osCommerce
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: tpl_discount_coupon_default.php 3464 2006-04-19 00:07:26Z ajeh $
 */
?>
<div class="centerColumn" id="discountcouponInfo">
<h1 id="discountcouponInfoHeading"><?php echo HEADING_TITLE; ?></h1>

<div id="discountcouponInfoMainContent" class="content">
<?php if ((DEFINE_DISCOUNT_COUPON_STATUS >= 1 and DEFINE_DISCOUNT_COUPON_STATUS <= 2) && $text_coupon_help == '') {
  require($define_page);
 } else {
  echo $text_coupon_help;
} ?>
</div>

<form action="<?php echo zen_href_link(FILENAME_DISCOUNT_COUPON, 'action=lookup', 'NONSSL', false); ?>" method="post">
<fieldset>
<legend><?php echo TEXT_DISCOUNT_COUPON_ID_INFO; ?></legend>
<div class='form-group'>
<label for="lookup-discount-coupon"><?php echo TEXT_DISCOUNT_COUPON_ID; ?></label>
<?php echo zen_draw_input_field('lookup_discount_coupon', $_POST['lookup_discount_coupon'], 'size="40" id="lookup-discount-coupon" class="form-control"');?>
</div>
</fieldset>

<p class='clearfix'>
<?php if ($text_coupon_help == '') { ?>
<button type='submit' class='btn btn-primary pull-right'><?php echo BUTTON_SEND_ALT; ?></button>
<?php } else { ?>
<div class="pull-right"><?php echo '<a class="btn btn-default" href="' . zen_href_link(FILENAME_DISCOUNT_COUPON) . '">' . BUTTON_CANCEL_ALT . '</a>&nbsp;&nbsp;<button type="submit" class="btn btn-primary">' . BUTTON_SEND_ALT . "</button>"; ?></div>
<?php } ?>
<?php echo BootstrapUtils::back_link(); ?>
</p>
</form>
</div>
