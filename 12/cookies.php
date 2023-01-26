<?php

echo $_COOKIE['bananas'] ?? '';

echo '<br>' .date('h:i:s, j-m-y', time() - 60);

setcookie('bananas', 'raudonas', time() + 60, '/');
