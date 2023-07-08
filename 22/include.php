<?php

define('KYE', 1);
echo KYE;

echo '<br>Here some files are included:<br>';
echo __DIR__.'./kitas/vienas.php';

include __DIR__.'./kitas/vienas.php';
// include __DIR__.'./index.php';
include __DIR__.'./trecias/du.php';