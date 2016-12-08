<?php
/** Set the Content of the contact_us Sidebox */
$name = CONTACT_US_SIDEBOX_NAME;
$address1 = CONTACT_US_SIDEBOX_ADDRESS1;
$address2 = CONTACT_US_SIDEBOX_ADDRESS2;
$city = CONTACT_US_SIDEBOX_CITY;
$state = CONTACT_US_SIDEBOX_STATE;
$zip = CONTACT_US_SIDEBOX_ZIP;
$email = CONTACT_US_SIDEBOX_EMAIL;
$email_subject = CONTACT_US_SIDEBOX_EMAIL_SUBJECT;
$phone = CONTACT_US_SIDEBOX_PHONE;
$fax = CONTACT_US_SIDEBOX_FAX;

$address2 = $address2 !== '' ? $address2 . '<br />' : '';

$website = HTTP_SERVER;
$logo = HTTP_SERVER . '/' . DIR_WS_TEMPLATE . "/img/logos/sese.png";
$facebook = "https://www.facebook.com/pages/Southern-Exposure-Seed-Exchange/353814746253/";
$twitter = "https://twitter.com/se_seedexchange/";
$instagram = "https://www.instagram.com/southernexposure/";

$content = <<<HTML
<address vocab="http://schema.org/" typeof="Organization">
  <meta property="url" content="${website}" />
  <meta property="logo" content="${logo}" />
  <meta property="sameAs" content="${facebook}" />
  <meta property="sameAs" content="${twitter}" />
  <meta property="sameAs" content="${instagram}" />
  <strong property="name">${name}</strong><br />
  <span property="address" typeof="PostalAddress">
    <span property="streetAddress">${address1}</span><br />
    ${address2}

    <span property="addressLocality">${city}</span>,
    <span property="addressRegion">${state}</span>
    <span property="postalCode">${zip}</span><br />
  </span>
  <a href="mailto:${email}?subject=${email_subject}" property="email" content="${email}">${email}</a><br />
  <abbr title="Phone">P:</abbr> <span property="telephone">${phone}</span><br />
  <abbr title="Fax">F:</abbr> <span property="faxNumber">${fax}</span><br />
</address>
HTML;
?>
