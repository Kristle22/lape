<?php

class JsonDb {

private $data, $file;

public function __construct($file) {
  $this->file = $file;
  if (!file_exists(__DIR__."/data/$file.json")) {
    file_put_contents(__DIR__."/data/$file.json", json_encode([]));
    file_put_contents(__DIR__.'/data/'.$file.'_id.json', 0);
  }
  $this->data = json_decode(file_get_contents(__DIR__."/data/$file.json"), 1);
}

public function __destruct() {
  file_put_contents(__DIR__."/data/$this->file.json", json_encode($this->data));
}

private function getId() {
  $id = (int)file_get_contents(__DIR__.'/data/'.$this->file.'_id.json');
  $id++;
  file_put_contents(__DIR__.'/data/'.$this->file.'_id.json', $id);
  return $id;
}

public function create(array $data) : void {
  $data['id'] = $this->getId();
  $this->data[] = $data;
}

public function showAll() : array {
  return $this->data;
}

public function show(int
$id) : array {
  foreach($this->data as $user) {
    if ($user['id'] == $id) {
      return $user;
    }
  }
  echo "<div>Vartotojas su ID $id nera sukurtas!</div>";
  return [];
}

public function delete(int
$id) : void {
  foreach($this->data as $key => $user) {
    if ($user['id'] == $id) {
      unset($this->data[$key]);
      $this->data = array_values($this->data);
      break;
    }
  }
}

public function update(int
 $id, array $data) : void {
  foreach($this->data as $key => $user) {
    if ($user['id'] == $id) {
      $data['id'] = $id;
      $this->data[$key] = $data;
      break;
    }
  }
}

}