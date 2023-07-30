<?php

require __DIR__.'/top.php';
?>

<h1>HOME! Sweet HOME!</h1>
<h1>Hi, <?= $user ?>!</h1>

<ul>
<?php foreach($list as $val) : ?>
  <li><?= $val ?></li>
<?php endforeach ?>
</ul>

<?php
require __DIR__.'/bottom.php';