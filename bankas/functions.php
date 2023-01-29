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
  session_start();
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
    } else {
      if (checkId($_POST['id']) == 'OK') {
      $data[] = $new;
      setData($data);
      } else {
        $_SESSION['errors']['id_unique'] = checkId($_POST['id']); 
        header('Location: '.URL.'?route=new');
      }
    }
  }
  return $_SESSION['errors'];
}

function router() {
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
    elseif ('POST' == $_SERVER['REQUEST_METHOD'] && 'new' == $route) {
      createNewAcc();
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
    $succMsg = 'Nauja sąskaita sėkmingai sukurta.';
  } else {
    header('Location: '.URL.'?route=new');
  };
  return $succMsg;
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
  $data = json_encode($data);
  file_put_contents(__DIR__.'/accInfo.json', $data);
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
      $msg = 'Sąskaita su tokiu asmens kodu jau atidaryta.';
      break;
    } else $msg = 'OK';
  }
  return $msg;
}
