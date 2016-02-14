<?php /* Utility funtions related to Forms and Inputs */
class BootstrapForms
{
  /* Render the given text with markup indicating a required field */
  public static function required_text($text) {
    if (zen_not_null($text)) {
      return "<span class='text-danger'><strong>{$text}</strong></span>";
    }
    return '';
  }

  /** Echoes out a complete address form, returns nothing.
   *
   * You are required to manually put the `form-horizontal` class in the
   * surrounding `<form>` element.
   */
  public static function echo_shipping_address_form() {
    global $zone_name, $zone_id, $flag_show_pulldown_states, $selected_country; ?>
    <p class="text-danger"><strong><?php echo FORM_REQUIRED_INFORMATION; ?></strong></p>
    <?php
      if (ACCOUNT_GENDER == 'true') {
        echo
          '<label class="radio-inline">' .
            zen_draw_radio_field('gender', 'm', '', 'id="gender-male"') . MALE .
          '</label>' .
          '<label class="radio-inline">' .
            zen_draw_radio_field('gender', 'f', '', 'id="gender-female"') . FEMALE .
          '</label>' .
          self::required_text(ENTRY_GENDER_TEXT);
      } ?>

    <div class='form-group'>
    <label class="control-label col-sm-4" for="firstname"><?php echo self::required_text(ENTRY_FIRST_NAME_TEXT) . ENTRY_FIRST_NAME; ?></label>
    <div class='col-sm-8'>
      <?php echo zen_draw_input_field('firstname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_firstname', '40') . ' class="form-control" id="firstname"'); ?>
    </div>
    </div>

    <div class='form-group'>
    <label class="control-label col-sm-4" for="lastname"><?php echo self::required_text(ENTRY_LAST_NAME_TEXT) . ENTRY_LAST_NAME; ?></label>
    <div class='col-sm-8'>
    <?php echo zen_draw_input_field('lastname', '', zen_set_field_length(TABLE_CUSTOMERS, 'customers_lastname', '40') . ' class="form-control" id="lastname"'); ?>
    </div>
    </div>

    <div class='form-group'>
    <label class="control-label col-sm-4" for="street-address"><?php echo self::required_text(ENTRY_STREET_ADDRESS_TEXT) . ENTRY_STREET_ADDRESS; ?></label>
    <div class='col-sm-8'>
    <?php echo zen_draw_input_field('street_address', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_street_address', '40') . ' class="form-control" id="street-address"'); ?>
    </div>
    </div>

    <?php
      if (ACCOUNT_SUBURB == 'true') {
    ?>
    <div class='form-group'>
    <label class="control-label col-sm-4" for="suburb"><?php echo self::required_text(ENTRY_SUBURB_TEXT). ENTRY_SUBURB; ?></label>
    <div class='col-sm-8'>
    <?php echo zen_draw_input_field('suburb', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_suburb', '40') . ' class="form-control" id="suburb"'); ?>
    </div>
    </div>
    <?php
      }
    ?>

    <div class='form-group'>
    <label class="control-label col-sm-4" for="city"><?php echo self::required_text(ENTRY_CITY_TEXT). ENTRY_CITY; ?></label>
    <div class='col-sm-8'>
    <?php echo zen_draw_input_field('city', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_city', '40') . ' class="form-control" id="city"'); ?>
    </div></div>

    <?php
      if (ACCOUNT_STATE == 'true') {
        if ($flag_show_pulldown_states == true) { ?>
          <div class='form-group'>
          <label class="control-label col-sm-4" for="stateZone" class="form-control" id="zoneLabel">
            <?php echo self::required_text(ENTRY_STATE_TEXT) . ENTRY_STATE; ?>
          </label>
          <div class='col-sm-8'>
    <?php echo zen_draw_pull_down_menu('zone_id', zen_prepare_country_zones_pull_down($selected_country), $zone_id, 'class="form-control" id="stateZone"');
          echo '</div></div>';
        } ?>

    <div class='form-group' id='stateLabel'>
    <label class="control-label col-sm-4" for="state"><?php echo self::required_text(ENTRY_STATE_TEXT) . ENTRY_STATE; ?></label>
    <div class='col-sm-8'>
    <?php
        echo zen_draw_input_field('state', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_state', '40') . ' class="form-control" id="state"');
        if ($flag_show_pulldown_states == false) {
          echo zen_draw_hidden_field('zone_id', $zone_name, ' ');
        }
    ?>
    </div></div>
    <?php
      } ?>

    <div class='form-group'>
    <label class="control-label col-sm-4" for="postcode"><?php echo self::required_text(ENTRY_POST_CODE_TEXT). ENTRY_POST_CODE; ?></label>
    <div class='col-sm-8'>
    <?php echo zen_draw_input_field('postcode', '', zen_set_field_length(TABLE_ADDRESS_BOOK, 'entry_postcode', '40') . ' class="form-control" id="postcode"'); ?>
    </div></div>

    <div class='form-group'>
    <label class="control-label col-sm-4" for="country"><?php echo self::required_text(ENTRY_COUNTRY_TEXT). ENTRY_COUNTRY; ?></label>
    <div class='col-sm-8'>
    <?php echo zen_get_country_list('zone_country_id', $selected_country, 'class="form-control" id="country" ' . ($flag_show_pulldown_states == true ? 'onchange="update_zone(this.form);"' : '')); ?>
    </div></div><?php
  }
}
?>
