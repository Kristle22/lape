<?php

// 4. Sukurkite du puslapius lemon.php ir orange.php. Jų fonus nuspalvinkite atitinkamom spalvom. Į lemon.php puslapį įdėkite kodą, kuris naršyklę visada peradresuotų į puslapį orange.php. Pademonstruokite veikimą.

header('Location: http://localhost:81/lape/hwWeb/orange.php');
// die;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LEMON</title>
  <style>
    body {
    background-color: #fff700; 
    display: flex; 
    height: 100vh;
    align-items: center; 
    justify-content: center
    }
  </style>
</head>
<body>
<h1>LEMON</h1>
</body>
</html>