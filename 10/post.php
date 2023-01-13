<?php
// echo '<pre>';
// print_r($_GET);
// print_r($_POST);
session_start();

// Skaiciavimo scenarijus
if ('POST' == $_SERVER['REQUEST_METHOD']) {
  echo '<h2>POST</h2>';
  $rez = (int)($_POST['x'] ?? 0) + (int)($_POST['y'] ?? 0);
  $_SESSION['rrr'] = $rez;
  $_SESSION['x'] =  (int)($_POST['x'] ?? 0);
  $_SESSION['y'] = (int)($_POST['y'] ?? 0);
  header('Location: http://localhost:81/lape/10/post.php');
  die;
}
// Formos ir rezultato rodymo scenarijus
  
if (isset($_SESSION['rrr'])) {
  $rez = $_SESSION['rrr'];
  $x = $_SESSION['x'];
  $y = $_SESSION['y'];
  unset($_SESSION['rrr'], $_SESSION['x'], $_SESSION['y']);
}

  // Tuscios formos rodymo scenarijus
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>POST</title>
</head>
<body>
  <h1><?= $rez ?? '---' ?></h1>
  <form action="" method="post">
    X: <input type="text" name="x" value="<?= $x ?? '' ?>" style="margin: 0 3px 3px 1.5px;"><br>
    Y: <input type="text" name="y" value="<?= $y ?? '' ?>" style="margin: 3px;"><br>
    <button type="submit" style="margin: 10px;">SUMUOTI</button>
  </form>
</body>
</html>