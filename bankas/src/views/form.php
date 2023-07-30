<?php

require __DIR__.'/top.php';
?>

<h1>Here's my FORM</h1>
<h1>Hi, <?= $user ?>!</h1>

<fieldset>
  <legend>Enter</legend>
  <form action="" method="post">
  <input type="text" name="form">
  <button type="submit">GO!</button>
  </form>
</fieldset>

<?php
require __DIR__.'/bottom.php';