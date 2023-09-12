<?php

require __DIR__.'/top.php';
?>

<h1>HOME! Sweet HOME!</h1>
<h2>Hi, <?= $user ?>!</h2>

<div class="home">
  Home
  <div class="home__bin">
    Bin
    <div class="home__bin__content">
      Content
    </div>
  </div>
</div>

<ul>
<?php foreach($list as $val) : ?>
  <li><?= $val ?></li>
<?php endforeach ?>
</ul>

<?php
require __DIR__.'/bottom.php';