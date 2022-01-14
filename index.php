<?php
$route = explode('/', $_GET['url'] ?? '');

if ($route[0] == '') include 'pages\home.php';
elseif ($route[0] == 'criar-usuario') include 'pages\criar-usuario.php';
else include '404.php';
