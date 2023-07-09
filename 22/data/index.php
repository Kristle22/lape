<?php
echo '<pre>';
$cats = ['Pilkis', 'Murkis'];

if(!file_exists(__DIR__.'./cats.json')) {
  file_put_contents(__DIR__.'./cats.json', json_encode([]));
}

// file_put_contents(__DIR__.'./cats.json', json_encode($cats));

$nowCats = json_decode(file_get_contents(__DIR__.'./cats.json'));

// $nowCats[] = 'Micius';
$nowCats[0] = 'Plikis';

file_put_contents(__DIR__.'./cats.json', json_encode($nowCats));

print_r($nowCats);