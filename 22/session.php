<?php

session_start();

$_SESSION['meska'] = 'Barnis';
$_SESSION['cats'] = ['Pilkis', 'Murkis'];

echo $_SESSION['meska'];