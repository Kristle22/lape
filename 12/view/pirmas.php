<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bebru Uztvanka</title>
  <style>
    div, h2 {
      margin: 5px;
      padding: 7px;
      border: 1px solid #ccc;
      font-size: 12px;
    }
    label {
      display: inline-block;
      width: 140px;
    }
  </style>
</head>
<body>
  <h2>Juodieji: <?= getBebrai()['juodieji'] ?></h2>
  <h2>Rudieji: <?= getBebrai()['rudieji'] ?></h2>
  <form action="http://localhost:81/lape/12/bebruUztvanka.php?route=prideti-juodus" method="post">
    <div>
      <label>Prideti juodus: </label><input type="text" name="j_plus">
      <button type="submit">+</button>
    </div>
  </form>
  <form action="http://localhost:81/lape/12/bebruUztvanka.php?route=atimti-juodus" method="post">
    <div>
      <label>Atimti juodus: </label><input type="text" name="j_minus">
      <button type="submit">-</button>
    </div>
  </form>
  <form action="http://localhost:81/lape/12/bebruUztvanka.php?route=prideti-rudus" method="post">
    <div>
      <label>Prideti rudus: </label><input type="text" name="r_plus">
      <button type="submit">+</button>
    </div>
  </form>
  <form action="http://localhost:81/lape/12/bebruUztvanka.php?route=atimti-rudus" method="post">
    <div>
      <label>Atimti rudus: </label><input type="text" name="r_minus">
      <button type="submit">-</button>
    </div>
  </form>
</body>
</html>