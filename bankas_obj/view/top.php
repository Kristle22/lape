<!-- <?php ob_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../public/css/app.css">
  <title>BANKAS</title>
</head>
<body class="account">
<ul class="meniu">
  <li class="<?= ROUTE[0] == '' ? 'active' : '' ?>"><a href="<?= URL ?>">BANKAS</a></li>
  <li class="<?= ROUTE[0] == 'convert' ? 'active' : '' ?>"><a href="<?= URL ?>convert">VALIUTOS KONVERTERIS</a></li>

  <?php if (isLogged()): ?>
    <li class="<?= ROUTE[0] == 'list' ? 'active' : '' ?>"><a href="<?= URL ?>list">SĄSKAITŲ SĄRAŠAS</a></li>
    <li class="<?= ROUTE[0] == 'new' ? 'active' : '' ?>"><a href="<?= URL ?>new">NAUJA SĄSKAITA</a></li>
    
   <li><form class="logout" action="<?= URL ?>logout" method="post">
      <button type="submit">ATSIJUNGTI, <?= $_SESSION['name'] ?? '' ?></button>
    </form></li>
    
<?php else: ?>
    <li class="<?= ROUTE[0] == 'login' ? 'active' : '' ?>"><a href="<?= URL ?>login">PRISIJUNGTI</a></li>
<?php endif; ?>
</ul>

<?php showMessages(); ?>