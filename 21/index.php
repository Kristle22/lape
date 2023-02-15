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

// TRYNIMAS
// DELETE FROM table_name
// WHERE some_column = some_value

$sql = "DELETE FROM trees
WHERE title = 'Slyva';
";

$pdo->query($sql);

// RASYMAS
// INSERT INTO table_name (column1, column2, column3,...)
// VALUES (value1, value2, value3,...)

$height = rand(1, 1000)/100;

$sql = "INSERT INTO trees
(title, height, `type`)
VALUES ('Slyva', $height, 1) 
";

$pdo->query($sql);

// REDAGAVIMAS
// UPDATE table_name
// SET column1=value, column2=value2,...
// WHERE some_column=some_value 

$sql = "UPDATE trees
SET height = 15
WHERE height < 10
";

$pdo->query($sql);

// SKAITYMAS
// SELECT column_name(s) FROM table_name

$sql = "SELECT id, title, height, `type` FROM trees
WHERE `type` <> 2
ORDER BY height
LIMIT 10
";

$stmt = $pdo->query($sql); //steitmento objektas
echo '<ul>';
while ($row = $stmt->fetch())
{
    echo '<li><b>ID:'.$row['id'].'</b> '.$row['title'].' '.$row['height'].'metrai '.['Lapuotis', 'Spygliuotis', 'Palme'][$row['type']-1].'</li>';
}
echo '</ul>';