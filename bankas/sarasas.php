<?php
$link = $_GET['link'] ?? '';
if ($link == 'list') {
  header('Location: http://localhost:81/lape/bankas/sarasas.php');
  die;
}
if ($link == 'add') {
  header('Location: http://localhost:81/lape/bankas/prideti.php');
  die;
}
if ($link == 'charge') {
  header('Location: http://localhost:81/lape/bankas/atimti.php');
  die;
}
if ($link == 'newAcc') {
  header('Location: http://localhost:81/lape/bankas/naujaSask.php');
  die;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>SĄSKAITŲ SĄRAŠAS</title>
</head>
<body class="account">
  <ul class="meniu">
    <li class="active"><a  href="?link=list">SĄSKAITŲ SĄRAŠAS</a></li>
    <li><a href="?link=newAcc">NAUJA SĄSKAITA</a></li>
  </ul>
  <h2 class="title">VISOS SĄSKAITOS</h2>
  <div class="table">
    <div class="row">
      <ul class="cap">
        <li>Nr.</li>
        <li>Account</li>
        <li>Name</li>
        <li>Amount</li>
        <li>Date Created</li>
      </ul>
      <ul>
        <li>1</li>
        <li>6231415</li>
        <li>Smith, John</li>
        <li>1,000.00</li>
        <li>2021-17-14 15:56:12</li>
      </ul>
    </div>
    <div class="links">
      <a href="?link=add">Pridėti lėšų</a>
      <a href="?link=charge">Nuskaičiuoti lėšas</a>
      <button type="submit">Ištrinti</button>
    </div>
  </div>
</body>
</html>