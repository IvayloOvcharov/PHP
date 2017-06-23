<?php
$server = 'DESKTOP-KTH2LI8';

$link = mssql_connect($server, 'SaitaBatka', '14077ivo');

if (!$link) {  
die('Something went wrong while connecting to MSSQL');  
}  
?>