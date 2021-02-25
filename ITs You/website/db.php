<?php
	// By n5y
	ini_set("log_errors", 1);
	ini_set("error_log", "./errors/php-errors.log");
	$con = new mysqli("localhost","root","","itsyou");
	date_default_timezone_set("Asia/Riyadh");
	$con->query("SET NAMES 'utf8'");


?>