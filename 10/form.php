  <?php
  // Scenarijus POST
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['kint'] = $_POST['tek'];

    header('Location: http://localhost/lape/10/form.php');
    die;
  }

  // Scenarijus GET
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORM</title>
</head>
<body>
  <?php echo $_SESSION['kint'] ?>
<form action="" method="post">

Tavo tekstas: <input type="text" name="tek">

<button type="submit">GO!</button>

</form>

</body>
</html>