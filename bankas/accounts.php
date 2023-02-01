<?php
session_start();
require __DIR__.'/functions.php';
require __DIR__.'/view/curr_list.php';

define('URL', 'http://localhost:81/lape/bankas/accounts.php');

router();