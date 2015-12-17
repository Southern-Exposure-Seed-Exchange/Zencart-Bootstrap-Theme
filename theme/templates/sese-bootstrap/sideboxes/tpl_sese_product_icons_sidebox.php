<?php
/** Set the Content of the SESE Product Icons Sidebox */
$template_image_folder = $template->get_template_dir(
  '', DIR_WS_TEMPLATE, $current_page_base, 'img/icons/'
);
$content = <<<HTML
<ul class='media-list'>
<!-- Organic -->
<li class='media'>
  <div class='media-left media-middle'>
    <a href="index.php?main_page=products_all&organic=1">
      <img class='media-object' src="$template_image_folder/organic-certified.png"
           alt='Certified Organic' />
    </a>
  </div>
  <div class='media-body'>
    <h5 class='media-heading'>Certified Organic</h5>
  </div>
</li>

<!-- Heirloom -->
<li class='media'>
  <div class='media-left media-middle'>
    <a href="index.php?main_page=products_all&heirloom=1">
      <img class='media-object' src="$template_image_folder/heirloom.png"
           alt='Heirloom' />
    </a>
  </div>
  <div class='media-body'>
    <h5 class='media-heading'>Heirloom</h5>
  </div>
</li>

<!-- South-East -->
<li class='media'>
  <div class='media-left media-middle'>
    <a href="index.php?main_page=products_all&southern=1">
      <img class='media-object' src="$template_image_folder/southeast.png"
           alt='Well-suited to Southeast' />
    </a>
  </div>
  <div class='media-body'>
    <h5 class='media-heading'>Especially well-suited to the Southeast</h5>
  </div>
</li>

<!-- Eco -->
<li class='media'>
  <div class='media-left media-middle'>
    <a href="index.php?main_page=products_all&eco=1">
      <img class='media-object' src="$template_image_folder/ecologically-grown.png"
           alt='Ecologically Grown' />
    </a>
  </div>
  <div class='media-body'>
    <h5 class='media-heading'>Ecologically Grown</h5>
  </div>
</li>

</ul>
HTML;
?>
