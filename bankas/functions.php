<?php

function getData() : array {
  $nr = 'LT'.rand(100000000000000000, 999999999999999999);
  if (!file_exists(__DIR__.'/accInfo.json')) {
    $data = ['Nr' => $nr];
    $data = json_encode($data);
    file_put_contents(__DIR__.'/accInfo.json', $data);
  }
  return json_decode(file_get_contents(__DIR__.'/accInfo.json'), 1);
}

function setData(array $data) : void {
  $data = json_encode($data);
  file_put_contents(__DIR__.'/accInfo.json', $data);
}

function setNew() : void {
  $data = json_decode(file_get_contents(__DIR__.'/accInfo.json'), 1);
  // $id = rand(32000000000, 60999999999);
  // $nr = 'LT'.rand(100000000000000000, 999999999999999999);
  $new = ['Nr' => $_POST['nr'], 'vardas' => $_POST['name'], 'pavarde' => $_POST['surname'], 'ID' => $_POST['id'], 'likutis' => 0];
  $data[] = $new;
  $data = json_encode($data);
  file_put_contents(__DIR__.'/accInfo.json', $data);
}

function router() {
  $route = $_GET['route'] ?? '';
  if ('GET' == $_SERVER['REQUEST_METHOD'] && '' === $route) {
    firstPage();
  }
    elseif ('GET' == $_SERVER['REQUEST_METHOD'] && 'new' == $route) {
      newPage();
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
      charge($_GET['id']);
    } else {
      echo 'Page not found 404';
      die;
    }
}

function firstPage() {
  $data = getData();
  require __DIR__.'/view/first.php';
}

function newPage() {
  // $data = getData();
  require __DIR__.'/view/new.php';
}

function createNewAcc() {
  setNew();
  header('Location: '.URL);
}

function deleteAcc(int $id) {
  $data = getData();
  foreach ($data as $key => $acc) {
    if($id == $acc['ID']) {
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
      $data['likutis'] += (int)$_POST['plus'];
      break;
    }
  }
  setData($data);
  header('Location: '.URL);
}

function charge(int $id) {
  $data = setData();
  foreach ($data as &$acc) {
    if($id == $acc['ID']) {
      $acc['likutis'] -= (int)$_POST['minus'];
      break;
    }
  }
  setData($data);
  header('Location: '.URL);
}