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
$google_plus = "https://plus.google.com/107794281415580072161";

$content = <<<HTML
<address vocab="http://schema.org/" typeof="Organization">
  <link property="url" href="${website}" />
  <link property="logo" href="${logo}" />
  <link property="sameAs" href="${facebook}" />
  <link property="sameAs" href="${twitter}" />
  <link property="sameAs" href="${instagram}" />
  <link property="sameAs" href="${google_plus}" />
  <strong property="name">${name}</strong><br />
  <span property="address" typeof="PostalAddress">
    <span property="streetAddress">${address1}</span><br />
    ${address2}

    <span property="addressLocality">${city}</span>,
    <span property="addressRegion">${state}</span>
    <span property="postalCode">${zip}</span><br />
  </span>
  <a href="mailto:${email}?subject=${email_subject}" property="email" content="${email}">${email}</a><br />
  <abbr title="Phone">P:</abbr> <span vocab="http://schema.org" typeof="ContactPoint" property="contactPoint"><meta property="contactType" content="customer support" /><meta property="telephone" content="+1 ${phone}" />${phone}</span><br />
  <abbr title="Fax">F:</abbr> <span property="faxNumber">${fax}</span><br />
</address>
HTML;
?>
