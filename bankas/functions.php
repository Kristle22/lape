<?php
// $id = rand(32000000000, 60999999999);
// $nr = 'LT'.rand(100000000000000000, 999999999999999999);

function getData() : array {
  $nr = 'LT'.rand(100000000000000000, 999999999999999999);
  if (!file_exists(__DIR__.'/accInfo.json')) {
    $data = [];
    $data = json_encode($data);
    file_put_contents(__DIR__.'/accInfo.json', $data);
  }
  return json_decode(file_get_contents(__DIR__.'/accInfo.json'), 1);
}

function setData(array $data) : void {
  $data = json_encode($data);
  file_put_contents(__DIR__.'/accInfo.json', $data);
}

function setNew() {
  $data = json_decode(file_get_contents(__DIR__.'/accInfo.json'), 1);
  $errors = [];

  if (isset($_POST['submit'])) {
    $new = ['Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'ID' => $_POST['id'], 'likutis' => 0];

    $lenName = strlen($_POST['name']); 
    $lenSurname = strlen($_POST['surname']);
    $lenId = strlen($_POST['id']); 
    
    if (!preg_match ("/^[0-9]*$/", $_POST ['id'])) { 
      $_SESSION['errors']['id_nums'] = "Your Personal Code is not valid.";
    } elseif ($lenId != 11) {
      $_SESSION['errors']['id_len'] = "Your Personal Code's length is invalid." ;
    } elseif(empty($_POST['id'])) {
      $_SESSION['errors']['no_id'] = 'Personal code is required.';
    } elseif(empty($_POST['name'])) {
      $_SESSION['errors']['no_name'] = 'Name is required.';
    } elseif(empty($_POST['surname'])) {
      $_SESSION['errors']['no_surname'] = 'Surname is required.';
    } elseif($lenName < 3) {
      $_SESSION['errors']['name_len'] = 'Name must consist at least of 3 letters.';
    } elseif($lenSurname < 3) {
      $_SESSION['errors']['surname_len'] = 'Surname must consist at least of 3 letters.';
    } else if (checkId($_POST['id']) == 'NOT') {
      $_SESSION['errors']['id_unique'] = 'Sąskaita su tokiu asmens kodu jau atidaryta.';
      } else {
        $data[] = $new;
        setData($data);
      }
  }
}

function router() {
  session_start();
  $data = getData();
  $route = $_GET['route'] ?? '';

  if ('GET' == $_SERVER['REQUEST_METHOD'] && '' === $route) {
    firstPage();
  }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'new' == $route) {
      newPage();
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'add' == $route) {
      $data = getData();
      require __DIR__.'/view/add.php';
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'charge' == $route) {
      $data = getData();
      $nr = 'LT'.rand(100000000000000000, 999999999999999999);
      require __DIR__.'/view/charge.php';
    }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'convert' == $route) {
      require __DIR__.'/view/convert.php';
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'convert' == $route && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['amount'])) {
      request($_POST['from'], $_POST['to'], $_POST['amount']);
      header('Location: http://localhost:81/lape/bankas/accounts.php?route=convert');
      die;
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'new' == $route) {
      createNewAcc();
      $_SESSION['succ'] = 'Nauja sąskaita sėkmingai atidaryta.';
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'delete' == $route && isset($_GET['id'])) {
      deleteAcc($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'add' == $route && isset($_GET['id'])) {
      add($_GET['id']);
    }
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'charge' == $route && isset($_GET['id'])) {
      foreach ($data as $acc) {
        if ($_GET['id'] == $acc['ID'] && (int)$acc['likutis'] - (int) $_POST['minus'] >= 0) {
      setTransfer();
      charge($_GET['id']);
        }
      }
    } else {
      echo 'Page not found 404';
      die;
    }
}

function firstPage() {
  $data = getData();
    usort($data, function($a, $b) {
      return $a['pavarde'] <=> $b['pavarde'];
    });
  require __DIR__.'/view/first.php';
}

function newPage() {
  // $data = getData();
  $errors = setNew();
  require __DIR__.'/view/new.php';
}

function createNewAcc() {
  $errors = setNew();
  if ($errors == []) {
    header('Location: '.URL);
  } else {
    header('Location: '.URL.'?route=new');
  };
}

function deleteAcc(int $id) {
  $data = getData();
  foreach ($data as $key => $acc) {
    if($id == $acc['ID'] && $acc['likutis'] == 0) {
      unset($data[$key]);
      break;
    }
  }
  setData($data);
  header('Location: '.URL);
}

function add(int $id) {
  $data = getData();
  foreach ($data as &$acc) {
    if($id == $acc['ID']) {
      $acc['likutis'] += (int)$_POST['plus'];
      break;
    }
  }
  setData($data);
  header('Location: '.URL);
}

function setTransfer() : void {
  $data = json_decode(file_get_contents(__DIR__.'/accInfo.json'), 1);
  $id = rand(32000000000, 60999999999);
  // $nr = 'LT'.rand(100000000000000000, 999999999999999999);
  $new = ['Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'ID' => $id, 'likutis' => $_POST['minus']];
  $data[] = $new;
  setData($data);
}

function charge(int $id) {
  $data = getData();
  foreach ($data as &$acc) {
    if($id == $acc['ID']) {
      $acc['likutis'] -= (int)$_POST['minus'];
      break;
    }
  }
  setData($data);
  header('Location: '.URL);
}

function checkId(int $id) {
  $data = getData();
  foreach ($data as &$acc) {
    if($id == $acc['ID']) {
      $msg = 'NOT';
      break;
    } else $msg = 'OK';
  }
  return $msg;
}

// Currency API
function fromServer(string $from, string $to, $amount ) : array
{
    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL,'https://api.exchangerate.host/convert?from='.$from.'&to='.$to.'&amount='.$amount);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $answer = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($answer);
    
    $result = $data->result;
    $date = $data->date;
    $rate = $data->info->rate;

    return [$from, $to, $amount, $result, $date, $rate];
}

function request(string $from, string $to, $amount) : void {
  // $source = 'Cache'; 
  // $rez = fromCache($from, $to, $amount);
  // if (empty($rez)) {
    $source = 'Server';
    $rez = fromServer($from, $to, $amount);
    // addCache($rez);
  // }
// [$from, $to, $amount, $result, $date, $rate];
$_SESSION['from'] = $rez[0];
$_SESSION['to'] = $rez[1];
$_SESSION['amount'] = $rez[2];
$_SESSION['result'] = $rez[3];
$_SESSION['date'] = $rez[4];
$_SESSION['rate'] = $rez[5];
$_SESSION['src'] = $source;
}
