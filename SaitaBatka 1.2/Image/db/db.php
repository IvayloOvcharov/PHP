<?php   
 $host = "localhost";
 $username = "root";
 $password = "";
 $db_name  = "saitabatka";

  mysql_connect($host,$username,$password);
 mysql_select_db($db_name) ;
 error_reporting("E_ERROR_WORKING");
 ECHO "DAtabase connecet success";


?>