<?php
/** Set the Content of the contact_us Sidebox */
$name = CONTACT_US_SIDEBOX_NAME;
$address1 = CONTACT_US_SIDEBOX_ADDRESS1;
$address2 = CONTACT_US_SIDEBOX_ADDRESS2;
$city_state_zip = CONTACT_US_SIDEBOX_CITY_STATE_ZIP;
$email = CONTACT_US_SIDEBOX_EMAIL;
$email_subject = CONTACT_US_SIDEBOX_EMAIL_SUBJECT;
$phone = CONTACT_US_SIDEBOX_PHONE;
$fax = CONTACT_US_SIDEBOX_FAX;

$address2 = $address2 !== '' ? $address2 . '<br />' : '';

$content = <<<HTML
<address>
  <strong>${name}</strong><br />
  ${address1}<br />
  ${address2}
  ${city_state_zip}<br />
  <a href="mailto:${email}?subject=${email_subject}">${email}</a><br />
  <abbr title="Phone">P:</abbr> ${phone}<br />
  <abbr title="Fax">F:</abbr> ${fax}<br />
</address>
HTML;
?>
