
<?php
include 'InsertConn.php';
$json =  file_get_contents("Test.json");
$json =   json_decode($json, true);
$Array = $json['test'];

$date =  $Array[1]['DocData'];
$Num = 0;


 for($i = 0; $i < 1500; $i++){
   $date = new DateTime($date);
 $Num++;
$date->modify("+1 day");
$date = $date->format('d-m-Y');
  $TankNum = '"TankNum"';
  $DocDate = '"DocDate"';
  $DocTime = '"DocTime"';
  $Provider = '"Provider"';
  $DocVolume = '"DocVolume"';
  $table = 'public."Add"'; 

$stmt = $dbh->prepare("INSERT INTO $table ($TankNum, $DocDate, $DocTime, $Provider, $DocVolume) VALUES ('$Num','$date','22:11:11','Ivo','12')");
$stmt->execute();
 }

//  /INSERT INTO public."Add"("TankNum", "DocDate", "DocTime", "Provider", "DocVolume") VALUES ('1','10-10-2017','10:10:10','ivo','15');
      // $table = 'public."Add"';
      // $var = '"DocDate"';
      // $fromdate = $_POST["from_date"];
      // $todate = $_POST["to_date"];

      // $stmt = $dbh->prepare("SELECT * FROM $table WHERE $var BETWEEN '$fromdate' AND '$todate' "); 

            // for($i = 0; $i < count($Array); $i++){
            //         $stmt = $dbh->prepare('INSERT INTO public."Add"("TankNum", "DocDate", "DocTime", "Provider", "DocVolume") VALUES (:TankNum,:DocData,:DocTime,:Provider,:DocVolume);');  
            //         $stmt->bindParam(':TankNum', $Array[$i]['TankNum']);
            //         $stmt->bindParam(':DocData', $Array[$i]['DocData']);
            //         $stmt->bindParam(':DocTime', $Array[$i]['DocTime']);
            //         $stmt->bindParam(':Provider', $Array[$i]['Provider']);
            //         $stmt->bindParam(':DocVolume', $Array[$i]['DocVolume']);
            //         $stmt->execute();
            //     }
                    

            //   for($i = 0; $i < count($Array); $i++){
            //     $stmt = $dbh->prepare('INSERT INTO public."LevelМeter"("TankDate", "TankStartTime", "TankEndTime", "TankVolume15C", "Temp", "VMPNum", "TankNum") VALUES (:TankData,:TankStartTime,:TankEndTime,:TankVolume15C,:Temp,:VMPNum,:TankNum);');  

            //     $stmt->bindParam(':TankData', $Array[$i]['TankData']);
            //     $stmt->bindParam(':TankStartTime', $Array[$i]['TankStartTime']);
            //     $stmt->bindParam(':TankEndTime', $Array[$i]['TankEndTime']);
            //     $stmt->bindParam(':TankVolume15C', $Array[$i]['TankVolume15C']);
            //     $stmt->bindParam(':Temp', $Array[$i]['temp']);
            //     $stmt->bindParam(':VMPNum', $Array[$i]['VMPNum']);
            //     $stmt->bindParam(':TankNum', $Array[$i]['TankNum']);
            //     $stmt->execute();
            // }




?>