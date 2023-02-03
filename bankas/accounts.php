<?php
session_start();
require __DIR__.'/functions.php';
require __DIR__.'/view/curr_list.php';

define('URL', 'http://localhost/lape/bankas/accounts.php');
echo __DIR__;
router();