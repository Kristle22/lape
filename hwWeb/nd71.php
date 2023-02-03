<?php
$c = ($_GET['color'] ?? false) ? 'red' : 'black';

// $_GET['color'] ?? false
// jeigu kintamasis color yra tai grazinam 1, kuris virsta true
// tenaris grazina $c = 'red
// jeigu kintamojo color nera tai ?? sintakse grazina false tenario salyga
// tenaris grazina $c = 'black'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WEB mechanika 1 užd.</title>
  <style>
    body {
      background-color: <?= $c ?>; /*php ech0 ==> = */
    }
    a {
      font-size: 30px;
      display: flex;
      justify-content: center;
      color: pink;
    }
    </style>
</head>
<body>
  <a href='http://localhost/lape/hwWeb/nd71.php'>BE kintamojo color</a>
  <a href='http://localhost/lape/hwWeb/nd71.php?color=1'>SU kintamuoju color</a>
</body>
</html>