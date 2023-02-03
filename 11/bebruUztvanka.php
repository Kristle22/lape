<?php

require __DIR__.'/functions.php';

// echo __DIR__;
// setBebrai(['juodieji' => 30, 'rudieji' => 120]);
// $bebrai = getBebrai();
// print_r($bebrai);

if ('POST' == $_SERVER['REQUEST_METHOD']) {
  $bebrai = getBebrai();
  if ('prideti-juodus' == $_POST['ka_daryt']) {
    $bebrai['juodieji'] += (int)$_POST['j_plus'];
  }
  elseif ('atimti-juodus' == $_POST['ka_daryt']) {
    $bebrai['juodieji'] -= (int)$_POST['j_minus'];
  }
  elseif ('prideti-rudus' == $_POST['ka_daryt']) {
    $bebrai['rudieji'] += (int)$_POST['r_plus'];
  }
  elseif ('atimti-rudus' == $_POST['ka_daryt']) {
    $bebrai['rudieji'] -= (int)$_POST['r_minus'];
  }
  setBebrai($bebrai);
  header('Location: http://localhost:81/lape/11/bebruUztvanka.php');
  die;
}

if ('GET' == $_SERVER['REQUEST_METHOD']) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bebru Uztvanka</title>
  <style>
    div, h2 {
      margin: 15px;
      padding: 7px;
      border: 1px solid #ccc;
    }
    label {
      display: inline-block;
      width: 140px;
    }
  </style>
</head>
<body>
  <h2>Juodieji: <?= getBebrai()['juodieji'] ?></h2>
  <h2>Rudieji: <?= getBebrai()['rudieji'] ?></h2>
  <form action="http://localhost/lape/11/bebruUztvanka.php" method="post">
    <div>
      <label>Prideti juodus: </label><input type="text" name="j_plus">
      <button type="submit" name="ka_daryt" value="prideti-juodus">+</button>
    </div>
    <div>
      <label>Atimti juodus: </label><input type="text" name="j_minus">
      <button type="submit" name="ka_daryt" value="atimti-juodus">-</button>
    </div>
    <div>
      <label>Prideti rudus: </label><input type="text" name="r_plus">
      <button type="submit" name="ka_daryt" value="prideti-rudus">+</button>
    </div>
    <div>
      <label>Atimti rudus: </label><input type="text" name="r_minus">
      <button type="submit" name="ka_daryt" value="atimti-rudus">-</button>
    </div>
  </form>
</body>
</html>
<?php endif;

