<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document 10</title>
</head>
<body>
  <h1>Hello, Kity!</h1>
  <a href="http://localhost/lape/10/?page=1">PAGE 1</a>
  <a href="http://localhost/lape/10/?page=2">PAGE 2</a>
  <a href="http://localhost/lape/10/?page=3">PAGE 3</a>

<?php
if($_GET['page'] == 1){
?>
<h2>PIRMASIS PUSLAPIUKAS</h2>
<?php
}
if($_GET['page'] == 2){
?>
<h2>ANTRASIS PUSLAPIUKAS</h2>
<?php
}
if($_GET['page'] == 3){
?>
<h2>PASKUTINIS PUSLAPIUKAS</h2>
<?php
}

?>
</body>
</html>