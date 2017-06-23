<?php

try {
	$us = "won't tell you";
	$ps =  "won't tell you";
	
		$conn = new PDO("sqlsrv:Server=192.168.---.-;Database=----", $us, $ps);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}






?>