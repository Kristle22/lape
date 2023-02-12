<?php
session_start();

define('INSTALL', '/lape/uztvanka/public/');
define('DIR', __DIR__.'/');
define('URL', 'http://localhost/lape/uztvanka/public/');

require DIR.'vendor/autoload.php';

function showMessages() {
  return Bebru\Uztvanka\App::showMessages();
}

function isLogged() {
  return Bebru\Uztvanka\App::isLogged();
}