<?php
/** Set the Content of the subscribe Sidebox */
$text = SUBSCRIBE_SIDEBOX_TEXT;
$content = <<<HTML
<div class='help-block'>${text}</div>
<form action="https://sendy.southernexposure.com/subscribe" method="POST" accept-charset="utf-8" target="_blank">
  <input type="hidden" name="list" value="EXGP5iaxXvU4tH7fWWopIQ"/>
  <div class='form-group'>
    <input class='form-control' type="email" name="email" id="email" placeholder="Enter your email address" />
  </div>
  <div class='form-group'>
    <button class='form-control btn btn-primary' type="submit" name="submit" id="submit">
      <span class='glyphicon glyphicon-envelope'></span> Subscribe
    </button>
  </div>
</form>
HTML;
?>
