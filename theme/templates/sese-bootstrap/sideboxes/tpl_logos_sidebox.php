<?php
/** Set the Content of the logos Sidebox */
$logo_image_folder = $template->get_template_dir(
  '', DIR_WS_TEMPLATE, $current_page_base, 'img/logos/'
);
$content = <<<HTML
<div class='text-center'>
  <script type="text/javascript" language="javascript">var ANS_customer_id="7ea8129e-b54b-494c-9def-27cfc6d5499b";</script>
  <script type="text/javascript" language="javascript" src="//verify.authorize.net/anetseal/seal.js" ></script>
</div><br />
<a href="//www.facebook.com/pages/Southern-Exposure-Seed-Exchange/353814746253?ref=ts" target='_blank'>
  <img class='img-center img-responsive' src="{$logo_image_folder}/facebook-big-icon.png" alt="Visit Facebook Page" />
</a>
<hr />
<div class='text-center'><b>Our Partners</b></div>
<a href="http://www.smartgardener.com/" target='_blank'>
  <img class='img-center img-responsive' src="{$logo_image_folder}/smart-gardener.jpg" alt="Smart Gardener" />
</a><br />
<a href="http://www.localharvest.org/" target='_blank'>
  <img class='img-center img-responsive' src="{$logo_image_folder}/local-harvest.jpg" alt="Local Harvest" />
</a>
HTML;
?>
