<?php

// 1. Sukurti puslapį su juodu fonu ir su dviem linkais (nuorodom) į save. Viena nuoroda su failo vardu, o kita nuoroda su failo vardu ir GET duomenų  perdavimo metodu perduodamu kintamuoju color=1. Padaryti taip, kad paspaudus ant nuorodos su perduodamu kintamuoju fonas nusidažytų raudonai, o paspaudus ant nuorodos be perduodamo kintamojo, vėl pasidarytų juodas.

// echo "<body style='background-color: black;'>""
echo "<h4 style='color: gray;'>1. uždavinys</h4>";
echo "<a href='http://localhost/lape/hwWeb/color.php?color=1' style='color: white; font-size: 30px;'>Pirma nuoroda su perduodamu kintamuoju!</a>";
echo "<br><br><a href='http://localhost/lape/hwWeb/color.php' style='color: yellow; font-size: 30px;'>Antra nuoroda be perduodamo kintamojo!</a>";

if (1 == ($_GET['color'] ?? '')):
echo "<body style='background-color: red;'></body>";
elseif(!$_GET['hex']):
  echo "<body style='background-color: black;'></body>";
endif;
// echo '</body>';

// 2. Sukurti puslapį panašų į 1 uždavinį, tiktai antro linko su perduodamu kintamuoju nedarykite, o vietoj to padarykite, URL eilutėje ranka įvedus GET kintamąjį color su RGB spalvos kodu (pvz color=ff1234) puslapio fono spalva pasidarytų tokios spalvos.

// 3. Perdarykite 2 uždavinį taip, kad spalvą būtų galimą įrašyti į laukelį ir ją išsiųsti mygtuku GET metodu formoje.

$hex = $_GET['hex'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2 ir 3 užd.</title>
  <style>
    body {
      background-color: <?= $hex ? '#'.$hex : '' ?>;
    }
  </style>
</head>
<body>
<h4 style='color: gray;'>2. uždavinys</h4>

<form action='http://localhost/lape/hwWeb/color.php' method="get">
  <h2 style="color: orange;">HEX: <?= $hex ?></h2>
  <label>Background hex color:</label>
  <input type='text' name='hex' value='<?=$hex?>'></input>
  <button type="submit" style="cursor: pointer">SEND</button>
</form>
</body>
</html>
 

