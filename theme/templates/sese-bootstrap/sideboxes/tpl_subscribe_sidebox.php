<?php
/** Set the Content of the subscribe Sidebox */
$text = SUBSCRIBE_SIDEBOX_TEXT;
$button_text = BootstrapUtils::glyphicon('envelope') . " " .
  SUBSCRIBE_SIDEBOX_BUTTON_TEXT;
$content = <<<HTML
<p>{$text}</p>
<form action="https://sendy.southernexposure.com/subscribe" method="POST" accept-charset="utf-8" target="_blank">
  <input type="hidden" name="list" value="EXGP5iaxXvU4tH7fWWopIQ"/>
  <div class='form-group'>
    <input class='form-control' type="email" name="email" id="email" placeholder="Enter your email address" />
  </div>
  <div class='form-group'>
    <button class='form-control btn btn-primary' type="submit" name="submit" id="submit">
      {$button_text}
    </button>
  </div>
</form>
HTML;
?>
