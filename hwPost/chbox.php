<?php
// 9. Padarykite juodą puslapį, kuriame būtų POST forma, mygtukas ir atsitiktinis kiekis (3-10) checkbox su raidėm A,B,C… Padarykite taip, kad paspaudus mygtuką, fono spalva pasikeistų į baltą, forma išnyktų ir atsirastų skaičius, rodantis kiek buvo pažymėta checkboksų (ne kurie, o kiek). 
// 10. Pakartokite 9 uždavinį. Padarykite taip, kad atsirastų du skaičiai. Vienas rodytų kiek buvo pažymėta, o kitas kiek iš vis buvo jų sugeneruota.

// session_start();
// if(isset($_SESSION['rand'])) {
//   $rand = $_SESSION['rand'];
//   unset($_SESSION['rand']);
// }

$backgr = 'black';
$color = 'gray';
$display = 'inline-block';
$letters = [];
foreach(range('A', 'Z') as $let) {
  $letters[] = $let;
}

// Skaiciavimo scenarijus
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $color = 'black';
  $backgr = 'white';
  $display = 'none';
  $count = count($_POST['letters']);
  $rand = $_POST['rand'] ?? '';

  // Rezultato rodymo scenarijus
  
  echo "<body style='color: $color; background-color: $backgr;'><h1>$count of $rand <span style='font-size: 18px;'>checkboxes are checked.</span></body><br>";
  
  foreach($_POST['letters'] as $val) {
    echo $val.' ';
  }
}
// Juodos formos rodymo scenrijus
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkboxes</title>
  </head>
  <body style="color: <?=$color?>; background-color: <?=$backgr?>">
    <form action="" style=" display: <?=$display?>" method="post">
      <div style="border: 2px solid gray; border-radius: 5px; margin: 15px; padding: 15px;">
        <?php
        $rand = rand(3, 10);
        // $_SESSION['rand'] = $rand;

    foreach(range(1, $rand) as $key => $el) {
      echo "<label for='$letters[$key]' style='width: 15px; display: $display'>$letters[$key]</label>
      <input type='checkbox' id='$letters[$key]' name='letters[]' value='$letters[$key]'></input>
      <input type='hidden' name='rand' value='$rand'></input><br>";
    }
    ?>
    </div>
    <button type="submit" style="float: right; margin-right: 15px;">Counting Checks <?= $rand ?></button>
  </form>
</body>
</html>