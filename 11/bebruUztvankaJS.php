<?php

require __DIR__.'/functions.php';

// echo __DIR__;
// setBebrai(['juodieji' => 30, 'rudieji' => 120]);
// $bebrai = getBebrai();
// print_r($bebrai);

if ('POST' == $_SERVER['REQUEST_METHOD']) {
  $bebrai = getBebrai();

  // get the raw POST data
  $rawData = file_get_contents("php://input");
  // this returns null if not valid json
  $data = json_decode($rawData, 1);

  if ('prideti-juodus' == $data['ka_daryt']) {
    $bebrai['juodieji'] += (int)$data['kiek'];
  }
  elseif ('atimti-juodus' == $data['ka_daryt']) {
    $bebrai['juodieji'] -= (int)$data['kiek'];
  }
  elseif ('prideti-rudus' == $data['ka_daryt']) {
    $bebrai['rudieji'] += (int)$data['kiek'];
  }
  elseif ('atimti-rudus' == $data['ka_daryt']) {
    $bebrai['rudieji'] -= (int)$data['kiek'];
  }
  setBebrai($bebrai);
  header('Content-Type: aplicaton/json');
  echo json_encode($bebrai);
}

if ('GET' == $_SERVER['REQUEST_METHOD']) :
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="http://localhost:81/lape/11/bebrai.js" defer></script>
  <script>const postUrl = 'http://localhost:81/lape/11/bebruUztvankaJS.php';</script>
  <title>Bebru Uztvanka JS</title>
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
    <h2>Juodieji: <span id="juodi"><?= getBebrai()['juodieji'] ?></span></h2>
    <h2>Rudieji: <span id="rudi"><?= getBebrai()['rudieji'] ?></span></h2>
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
</body>
</html>
<?php endif;

