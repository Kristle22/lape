<?php
$host = '127.0.0.1';
$db   = 'lama';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $user, $pass, $options); // pdo objektas

// Naujas 
if (isset($_POST['new'])) {
  $name = $_POST['name'];
  $height = $_POST['height'];
  $type = $_POST['type'];

  $sql = "INSERT INTO trees
  (title, height, `type`)
  VALUES ('$name', '$height', '$type') 
  ";

  $pdo->query($sql);
  header('Location: http://localhost/lape/21/form.php');
  exit;
}

// Trinti
if (isset($_POST['del'])) {
  $id = $_POST['id'];

  $sql = "DELETE FROM trees
  WHERE id = 8 OR 1
  ";

  $pdo->query($sql);
  header('Location: http://localhost/lape/21/form.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    form {
      margin: 20px;
      padding: 10px;
      border: 1px solid black;
    }
    form button {
      display: block;
    }
    form div {
      margin: 10px;
      width: 250px;
      text-align: right;
    }
  </style>
  <title>FORM</title>
</head>
<body>
  <form action="" method="post">
    <div>NAME: <input type="text" name="name"></div>
    <div>HEIGHT: <input type="text" name="height"></div>
    <div>TYPE:
    <select name="type">
      <option value="1">Lapuotis</option>
      <option value="2">Spygliuotis</option>
      <option value="3">Palme</option>
    </select>
    <button type="submit" name="new">Naujas medis</button>
    </div>
  </form>

  <form action="" method="post">
    <div>ID: <input type="text" name="id"></div>
    <button type="submit" name="del">Trinti</button>
    </div>
  </form>

<?php
// Skaityti
$sql = "SELECT id, title, height, `type` FROM trees
WHERE `type` <> 2
ORDER BY height
";

$stmt = $pdo->query($sql); //steitmento objektas
echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li><b>ID:'.$row['id'].'</b> '.$row['title'].' '.$row['height'].'metrai '.['Lapuotis', 'Spygliuotis', 'Palme'][$row['type']-1].'</li>';
}
echo '</ul>';
?>
</body>
</html>