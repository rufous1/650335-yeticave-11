<?php
require_once('helpers.php');
$db = require_once('config/db.php');

$link = mysqli_connect($db['host'], $db['user'], $db['password'], $db['datebase']);
mysqli_set_charset($link, 'utf8');
?>
