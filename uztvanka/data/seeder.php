<?php

$users = [
  ['id' => 1, 'name' => 'Petras', 'email' => 'petras@petras.com', 'pass' => md5('123')],
  ['id' => 2, 'name' => 'Ona', 'email' => 'ona@ona.com', 'pass' => md5('321')],
  ['id' => 3, 'name' => 'Jonas', 'email' => 'jonas@jonas.com', 'pass' => md5('456')]
];
$users = json_encode($users);
  file_put_contents(__DIR__.'/users.json', $users);