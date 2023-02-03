<?php
session_start();
require __DIR__.'/functions.php';
if ('POST' == $_SERVER['REQUEST_METHOD']) {
  $from = $_POST['from'] ?? '';
  $to = $_POST['to'] ?? '';

  request($from, $to);

header('Location: http://localhost:81/lape/13/dis.php');
die;
}
$distance = $_SESSION['dist'] ?? '';
$from = $_SESSION['from'] ?? '';
$to = $_SESSION['to'] ?? '';
$images = $_SESSION['img'] ?? [];
$desc = $_SESSION['desc'] ?? [];
$source = $_SESSION['src'] ?? '';
unset($_SESSION['dist'], $_SESSION['from'], $_SESSION['to'], $_SESSION['img'], $_SESSION['desc'], $_SESSION['src']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Distance24</title>
</head>
<body>
  <?php if ($distance) : ?>
<div class="container">
  <div class="row">
    <div class="col-9">
    <h1>Distance from <span class="badge badge-info"><?= $from ?></span> to <span class="badge badge-info"><?= $to ?></span> is <span class="badge badge-pill badge-warning"><?= $distance ?> Km</span>
  </h1>
  <span class="badge badge-info mb-2"><?= $source ?></span>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
      <div class="card col-6">
      <h5 class="card-title" style="text-align: center; margin-top: 8px;"><?= $from ?></h5>
        <img class="card-img-top" src="<?= $images[0] ?>" alt="from">
        <div class="card-body">
          <h5 class="card-title"><?= $desc[0] ? $desc[0] : 'no description provided' ?></h5>
        </div>
      </div>
      <div class="card col-6">
      <h5 class="card-title" style="text-align: center; margin-top: 8px;"><?= $to ?></h5>
        <img class="card-img-top" src="<?= $images[1] ?>" alt="to">
        <div class="card-body">
          <h5 class="card-title"><?= $desc[1] ? $desc[1] : 'no description provided' ?></h5>
        </div>
      </div>
  </div>
</div>
<?php endif ?>
  <div class="container">
    <div class="row">
      <div class="col-5 m-4">
        <form action="http://localhost/lape/13/dis.php" method="post">
          <div class="form-group">
            <label>From</label>
            <input type="text" class="form-control" placeholder="From" name="from">
            <small id="emailHelp" class="form-text text-muted">Enter town or city name.</small>
          </div>
          <div class="form-group">
            <label>To</label>
            <input type="text" class="form-control" placeholder="To" name="to">
            <small id="emailHelp" class="form-text text-muted">Enter town or city name.</small>
          </div>
          <button type="submit" class="btn btn-warning">Get info</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>