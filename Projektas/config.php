<?php
	define('DB_HOST', 'localhost');
    define('DB_USER', 'msndys_admin');
    define('DB_PASSWORD', 'Mindaugas123');
    define('DB_DATABASE', 'msndys_mstundys');
	$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or mysqli(mysql_error());
	mysqli_query($link, 'SET NAMES utf8') or die(mysql_error());
?>