<?php
// session_start();
$from = $_SESSION['from'] ?? '';
$to = $_SESSION['to'] ?? '';
$amount = $_SESSION['amount'] ?? '';
$result = $_SESSION['result'] ?? '';
$date = $_SESSION['date'] ?? '';
$rate = $_SESSION['rate'] ?? '';
$source = $_SESSION['src'] ?? '';
unset($_SESSION['from'], $_SESSION['to'], $_SESSION['amount'], $_SESSION['date'],  $_SESSION['result'], $_SESSION['rate'], $_SESSION['src']);

require __DIR__.'/top.php'; 
?>
<h2 class="title">Valiutos konverteris</h2>

<?php if ($result) :?>
<span class="error"><?= $source ?></span>
<h1 class="title info"><?= $amount.' '.$from.' <span>santykis su </span>'.$to ?></h1>
<?php endif; ?>

  <form action="<?= URL ?>?route=convert" method="post" class="new convert">
  <div>
    <label for="">Įveskite sumą:</label>
    <input type="text" name="amount" placeholder="Suma" value="1">
  </div>
  <div>
    <label for="">Konvertuoti iš:</label>
    <select name="from">
      <?= CURR_LIST ?>
    </select>
  </div>
  <div>
    <label for="">Konvertuoti į:</label>
    <select name="to" selected="EUR">
      <?= CURR_LIST ?>
    </select>
  </div>
  <button class="transfer" type="submit" name="submit">Konvertuoti</button>
  <div class="title">
    <h2 class="title info"><span>Rezultatas: </span><?= $result.' '.$to ?></h2>
    <div>
      <h2>Valiutos kursas: <?= $rate ?></h>
      <h2>Kurso data:<?= $date ?></h2>
    </div>
  </div>
</form>

<?php require __DIR__.'/bottom.php'; ?>