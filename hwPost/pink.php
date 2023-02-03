<?php
// 8. Sukurkite du puslapius pink.php ir rose.php. Nuspalvinkite juos atitinkamo spalvom. Į pink.php puslapį įdėkite formą su POST metodu ir mygtuku “GO TO ROSE”. Formą nukreipkite, kad ji atsidarinėtų rose.php puslapyje. Padarykite taip, kad surinkus naršyklėje tiesiogiai adresą į rose.php puslapį, naršyklė būtų peradresuojama į pink.php puslapį. 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  header('Location: http://localhost/lape/hwPost/rose.php');
  die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PINK</title>
</head>
<body style="background-color: #FFC0CB;">
  <form action="http://localhost/lape/hwPost/rose.php" method="post">
    <button type="submit">GO TO ROSE</button>
  </form>
</body>
</html>