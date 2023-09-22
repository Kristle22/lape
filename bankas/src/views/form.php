<?php

require __DIR__.'/top.php';

use Bankas\App;
?>

<h1>Here's my FORM</h1>
<h1>Hi, <?= $user ?>!</h1>

<fieldset>
  <legend>Enter</legend>
  <form action="" method="post">
  <input type="text" name="form">
  <button type="submit">GO!</button>
  <input type="hidden" name="csrf" value="<?= App::csrf() ?>">
  </form>
</fieldset>

<?php
require __DIR__.'/bottom.php';