<?php
require __DIR__.'/Cache.php';

session_start();
$cache = new Cache;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $_SESSION['visual'] = 'CACHE';
  $data = $cache->get();
  if (null == $data) {
    $_SESSION['visual'] = 'LIVE';

    $curl = curl_init();
  
    curl_setopt($curl, CURLOPT_URL,'https://api.distancematrix.ai/maps/api/distancematrix/json?origins='.$_POST['from'].'&destinations='.$_POST['to'].'&key=GGWlT6t6UU3Eu8cB69iYo3FMqsLAF');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  
    $answer = curl_exec($curl);  //siuncia, laukiam, gaunam
  
    curl_close($curl);
  
    $data = json_decode($answer);
    $cache->set($data);
  }

  
  $_SESSION['dist'] = $data->rows[0]->elements[0]->distance->text;
  $_SESSION['dur_time'] = $data->rows[0]->elements[0]->duration->text;
  $_SESSION['cities'] = [$_POST['from'], $_POST['to']];
  $_SESSION['img1'] = $data->stops[0]->wikipedia->image;

 header('Location: http://localhost/lape/24/');
 die;

}
if ($_SERVER['REQUEST_METHOD']  == 'GET') {

  $dist = $_SESSION['dist'] ?? '';
  $dur_time = $_SESSION['dur_time'] ?? '';
  $img1 = $_SESSION['img1'] ?? '';
  $cities = [$_SESSION['cities'][0], $_SESSION['cities'][1]];
  $visual = $_SESSION['visual'] ?? 'Duomenys dar nebuvo nusiusti.';
  unset($_SESSION['dist'], $_SESSION['dur_time'], $_SESSION['img1'], $_SESSION['visual']);
  ?>
  <h1 style="color: red"><?= $visual ?></h1>
  <h2>Atstumas tarp miestu <span style="font-size: 30px"><?= $cities[0].' - '.$cities[1] ?></span>: <?= $dist ?></h2>
  <h2>Tiksla pasieksite per: <?= $dur_time ?></h2>

<form action="" method="post">
Nuo: <input type="text" name="from">
Iki: <input type="text" name="to">
<button type="submit">SKAICIUOTI</button>
</form>

<img style="width: 100%; max-width: 900px; height: auto" src="https://source.unsplash.com/random/800x600?<?= $cities[1] ?>" alt="city">

<?php
}



