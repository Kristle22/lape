<?php
require __DIR__.'/../JsonDb.php';

$db = new JsonDb('farm');

$list = ['cow', 'horse', 'sheep', 'pig', 'goat', 'lamb', 'chiken', 'goose', 'rabbit', 'duck', 'donkey'];

foreach (range(1, 11) as $_) {
  $animal = ['animal' => $list[rand(0, count($list)-1)], 'weight' => rand(1000, 10000) / 100];
  $db-> create($animal);
}