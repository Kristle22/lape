<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Bebru Uztvanka</title>
  <style>
      label {
      display: inline-block;
      width: 140px;
    }
    nav {
      background: gray;
      margin: 10px 5px;
      padding: 5px;
    }
    nav a.btn {
      display: inline-block;
      margin: 4px;
      font-size: 26px;
      text-decoration: none;
      color: black;
    }
    nav a.btn:hover {
      color: black;
    }
    .uztvanka {
      border: 2px solid black;
    }
    .uztvanka h1 {
      margin: 5px 5px 5px 0;
      padding: 5px;
      font-size: 22px;
    }

    .login-form {
      margin: 5px;
      padding: 17px;
      border: 1px solid #ccc;
    }
    .logout-form {
      display: inline-block;
    }
    .logout-form button {
      margin: 4px;
      font-size: 26px;
      text-decoration: none;
      color: black;
    }
    .logout-form button:hover {
      color: black;
    }
    .form-bebrai {
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }
    .form-bebrai button {
      min-width: 38px;
      margin-left: 4px;
      text-align: center;
    }
  </style>
</head>
<body>
  <nav>
    <a class="btn btn-link" href="<?= URL ?>?route=home">Pradžia</a>
    <?php if (isLogged()) : ?>
    <a class="btn btn-link" href="<?= URL ?>">Sąrašas</a>
    <a class="btn btn-link" href="<?= URL ?>?route=nauja">Nauja užtvanka</a>
    <form class="logout-form" action="<?= URL ?>?route=logout" method="post">
      <button type="submit" class="btn btn-link">Atsijungti, <b><?= $_SESSION['name'] ?></b></button>
    </form>
    <?php else : ?>
      <a class="btn btn-link" href="<?= URL ?>?route=login">Prisijungti</a>
      <?php endif; ?>
    </nav>

    <?php showMessages() ?>