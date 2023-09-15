<?php

$users = [
  ['id' => 1, 'name' => 'Bebras', 'psw' => md5('123'), 'full_name' => 'Bebras Upinis'],
  ['id' => 2, 'name' => 'Kristina', 'psw' => md5('123'), 'full_name' => 'Kristina Leonaviciute'],
  ['id' => 3, 'name' => 'Petras', 'psw' => md5('123'), 'full_name' => 'Peter Johanson']
];

file_put_contents(__DIR__.'/users.json', json_encode($users));