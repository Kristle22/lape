<?php

define('KYE', 1);
echo KYE;

echo '<br>Here some files are included:<br>';
echo __DIR__.'./kitas/vienas.php';

require __DIR__.'./kitas/vienas.php';
require __DIR__.'./kitas/vienas.php';
// include_once __DIR__.'./index.php';
require __DIR__.'./trecias/du.php';

$data = require __DIR__.'/data.php';

print_r($data);