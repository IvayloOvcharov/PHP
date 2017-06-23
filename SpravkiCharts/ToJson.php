<?php 
include 'Connection.php';
 $JsonArray   = array();   

 $stmt = $dbh->prepare('SELECT * FROM public."Testing"');
 $stmt->execute();

while ($row = $stmt->fetch()){    
           $JsonArray[] = $row;
        }
     
        print json_encode($JsonArray);        
?>