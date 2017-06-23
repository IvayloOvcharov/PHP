<!Doctype html>
<html>
<head>
<meta charset="windows-1251">
<meta http-equiv="Content-Type" content="text/xml; charset=iso-8859-1">
</head>

<body>
<?php
include 'conn.php';

header("Content-Type: text/html; utf-8");

$date=new DateTime();
$date = date_format($date, 'd.m.Y');
$NextDay = date('d.m.Y', strtotime(' - 1 days'));



$params = array('username' => '----',
                'password' => '---',
                'fromdate' => "18.06.2017",
                  'todate' => "23.06.2017",
                'fromtime' => '00:00:00',
                  'totime' => '00:00:00',
               'USER.code' => '9---4');

$query = http_build_query($params);

//echo $query;

$contextData = array(
    'method' => 'POST',
    'header' => "Content-Type: application/x-www-form-urlencoded\r\n".
    "Content-Length: ".strlen($query)."\r\n".
    "User-Agent:MyAgent/1.0\r\n",
    'content' => $query);

//var_dump($contextData);

$context = stream_context_create(array('http' => $contextData));

//var_dump($context);
//echo $context;

$result = file_get_contents("http://web.nsys-bg.com/-----.php" , false, $context);
$convert = explode("\n", $result);

$fp = fopen("Saved\ $NextDay.xml","wb");


for ($i=0;$i<count($convert);$i++)  
{
    fwrite($fp,mb_convert_encoding($convert[$i], "utf-8", "windows-1251"));
}
fclose($fp);


$xml = simplexml_load_file("Saved\ $NextDay.xml");
//var_dump($xml);

$some = json_encode($xml, JSON_UNESCAPED_UNICODE);

$arr = json_decode($some,true);

 $arr = $arr['Transaction'];
//echo ($arr[50]['ObectName']);

for($i = 0; $i <=count($arr) - 1; $i++){

    $DHstart = explode(" ", $arr[$i]['DocDateTime']); 
    $THS = explode(" ", $arr[$i]['StartDateTime']); 
    $TDE = explode(" ", $arr[$i]['EndDateTime']); 
  //Doc
    $TankNumS = $arr[$i]['TankNum'];
    $DocDateS = $DHstart[0];
    $DocTimeS = $DHstart[1];
    $ProviderS = $arr[$i]['Provider'];
    $DocVolumeS = str_replace(' ', '',$arr[$i]['DocVolume15C']);
    //Tank
    $TankDateS = $THS[0];
    $TankStartTimeS = $THS[1];
    $TankEndTimeS = $TDE[1];
    $TankVolume15CS = str_replace(' ', '',$arr[$i]['TankVolume15C']);
    $TempS = $arr[$i]['Temp'];
    $VMPNumS = $arr[$i]['ObectCode'];
    $TankNumS = $arr[$i]['TankNum'];

     echo $TankDateS;
     echo '<br>';
    
    echo $TankStartTimeS;
    echo '<br>';
    
    echo $TankEndTimeS;
    echo '<br>';
    
    echo $TankVolume15CS;
    echo '<br>';
        
    echo $TempS;
    echo '<br>';
    echo $VMPNumS;
    echo '<br>';
        
    echo $TankNumS;
    echo '<br>';

  $TankNum = '"TankNum"';
  $DocDate = '"DocDate"';
  $DocTime = '"DocTime"';
  $Provider = '"Provider"';
  $DocVolume = '"DocVolume"';
  
  $tableDoc = 'public."Add"'; 
  $tableTank = 'public."LevelМeter"'; 

  $TankDate = '"TankDate"';
  $TankStartTime = '"TankStartTime"';
  $TankEndTime = '"TankEndTime"';
  $TankVolume15C = '"TankVolume15C"';
  $Temp = '"Temp"';
  $VMPNum = '"VMPNum"';
  $TankNum = '"TankNum"';

 //$stmt = $dbh->prepare("INSERT INTO $tableDoc ($TankNum, $DocDate, $DocTime, $Provider, $DocVolume) VALUES ('$TankNumS','$DocDateS',' $DocTimeS',' $ProviderS','$DocVolumeS')");
 //$stmt->execute();
// INSERT INTO public."LevelМeter"(
//             "TankDate", "TankStartTime", "TankEndTime", "TankVolume15C", 
//             "Temp", "VMPNum", "TankNum")
//     VALUES (?, ?, ?, ?, 
//             ?, ?, ?);

//  $stmt = $dbh->prepare("INSERT INTO $tableTank ($TankDate, $TankStartTime, $TankEndTime, $TankVolume15C, $Temp, $VMPNum, $TankNum) VALUES ('$TankDateS','$TankStartTimeS',' $TankEndTimeS',' $TankVolume15CS','$TempS',' $VMPNumS','$TankNumS')");
//  $stmt->execute();
  }