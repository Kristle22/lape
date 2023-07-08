<?php
// 6. Padarykite puslapį su dviem mygtukais. Mygtukus įdėkite į dvi skairtingas formas- vieną GET ir kitą POST. Nenaudodami jokių konkrečių $_GET ar $_POST reikšmių, nuspalvinkite foną žaliai, kai paspaustas mygtukas iš GET formos ir geltonai- kai iš POST.

// 7. Pakartokite 6 uždavinį. Papildykite jį kodu, kuris naršyklę po POST metodo peradresuotų tuo pačiu adresu (t.y. į patį save) jau GET metodu.

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 $color = 'green';
} else {
$color = 'yellow';

header('Location: http://localhost/lape/hwPost/paint.php');
die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GET&POST</title>
</head>
<style>
  body {
    background-color: <?= $color ?>;
  }
</style>
<body>
  <form action="" method="get">
    <button type="submit">GET GREEN</button>
  </form>
  <form action="" method="post">
    <button type="submit">POST YELLOW</button>
  </form>
</body>
</html>
