<?php
/** Set the Content of the SESE Product Icons Sidebox */
$blank_icon = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mNgYAAAAAMAASsJTYQAAAAASUVORK5CYII=";
$product_icons = BootstrapUtils::sese_product_icons($template, $current_page_base);
$content = <<<HTML
<ul class='media-list'>
<!-- All -->
<li class='media'>
  <a href="index.php?main_page=products_all">
    <div class='media-left media-middle'>
      <img class='media-object' src="{$blank_icon}" width="32" height="26" />
    </div>
    <div class='media-body'>
      <h5 class='media-heading'>All Products</h5>
    </div>
  </a>
</li>

<!-- Bulk -->
<li class='media'>
  <a href="index.php?main_page=products_all&bulk=1">
    <div class='media-left media-middle'>
      <img class='media-object' src="{$blank_icon}" width="32" height="26" />
    </div>
    <div class='media-body'>
      <h5 class='media-heading'>Bulk Products</h5>
    </div>
  </a>
</li>

<!-- Organic -->
<li class='media'>
  <a href="index.php?main_page=products_all&organic=1">
    <div class='media-left media-middle'>
      <img class='media-object' src="{$product_icons['organic']['image']}"
           alt="{$product_icons['organic']['title']}" />
    </div>
    <div class='media-body'>
      <h5 class='media-heading'>{$product_icons['organic']['title']}</h5>
    </div>
  </a>
</li>

<!-- Heirloom -->
<li class='media'>
  <a href="index.php?main_page=products_all&heirloom=1">
    <div class='media-left media-middle'>
      <img class='media-object' src="{$product_icons['heirloom']['image']}"
           alt="{$product_icons['heirloom']['title']}" />
    </div>
    <div class='media-body'>
      <h5 class='media-heading'>{$product_icons['heirloom']['title']}</h5>
    </div>
  </a>
</li>

<!-- South-East -->
<li class='media'>
  <a href="index.php?main_page=products_all&southern=1">
    <div class='media-left media-middle'>
      <img class='media-object' src="{$product_icons['southeast']['image']}"
           alt="{$product_icons['southeast']['title']}" />
    </div>
    <div class='media-body'>
      <h5 class='media-heading'>{$product_icons['southeast']['title']}</h5>
    </div>
  </a>
</li>

<!-- Eco -->
<li class='media'>
  <a href="index.php?main_page=products_all&eco=1">
    <div class='media-left media-middle'>
      <img class='media-object' src="{$product_icons['eco']['image']}"
           alt="{$product_icons['eco']['title']}" />
    </div>
    <div class='media-body'>
      <h5 class='media-heading'>{$product_icons['eco']['title']}</h5>
    </div>
  </a>
</li>

</ul>
HTML;
?>
