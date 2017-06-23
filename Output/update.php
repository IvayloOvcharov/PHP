<?php
include 'conn.php';

if(isset($_POST["TankNum"],$_POST["DocDate"],$_POST["DocTime"],$_POST["Provider"],$_POST["DocVolume"]))  
 {      $TankNum = '"TankNum"';
		$Num = $_POST["TankNum"];
		$Date = $_POST["DocDate"];
		$Time = $_POST["DocTime"];
		$Provider = $_POST["Provider"];
		$Volume = $_POST["DocVolume"];
		
		
        $table = 'public."Add"'; 
		
		
		//$stmt = $dbh->prepare('UPDATE public."Add" ("TankNum") VALUES ('.$Num.','.$Date.','.$Time.','.$Provider.','.$Volume.')');
	  //  $stmt->execute();
		
		// SET "AddPrimery"=?, "TankNum"=?, "DocDate"=?, "Provider"=?, "DocVolume"=?, 
     //  "DocTime"=?
		//WHERE <condition>;
 }
?>