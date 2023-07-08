<?php

// 5. Sukurkite du atskirus puslapius blue.php ir red.php Juose sukurkite linkus į pačius save (abu į save ne į kitą puslapį!). Padarykite taip, kad paspaudus ant  linko puslapis ne tiesiog persikrautų, o PHP kodas (ne tiesiogiai html tagas!) naršyklę peradresuotų į kitą puslapį (iš raudono į mėlyną ir atvirkščiai).

if (isset($_GET['name'])) {
  header('Location: http://localhost/lape/hwWeb/red.php');
die();
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLUE</title>
  <style>
    body {
      background-color: blue; 
      font-size: 30px;
    }
    a {
      color: crimson;
      cursor: pointer
    }
  </style>
</head>
<body>
<a href="http://localhost/lape/hwWeb/blue.php?name=red">RED</a>
</body>
</html>