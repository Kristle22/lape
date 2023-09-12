<?php

$users = [
  ['id' => 1, 'name' => 'Bebras', 'psw' => md5('123'), 'full-name' => 'Bebras Upinis'],
  ['id' => 2, 'name' => 'Lina', 'psw' => md5('123'), 'full-name' => 'Lina Linovaite'],
  ['id' => 3, 'name' => 'Petras', 'psw' => md5('123'), 'full-name' => 'Peter Johanson']
];

file_put_contents(__DIR__.'/users.json', json_encode($users));