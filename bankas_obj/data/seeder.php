<?php

use Bank\Login\Maria;

$users = [
  ['id' => 1, 'name' => 'Petras', 'email' => 'petras@petras.com', 'pass' => md5('123')],
  ['id' => 2, 'name' => 'Ona', 'email' => 'ona@ona.com', 'pass' => md5('321')],
  ['id' => 3, 'name' => 'Jonas', 'email' => 'jonas@jonas.com', 'pass' => md5('456')],  ['id' => 4, 'name' => 'Kristina', 'email' => 'crislayn@yahoo.com', 'pass' => md5('322')]
];

// $users = json_encode($users);
//   file_put_contents(__DIR__.'/users.json', $users);

// Maria::getMaria()->create($users);
