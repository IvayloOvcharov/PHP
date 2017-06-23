<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>АПТЕКИ СПРАВКА</title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
    .bs-example{
        margin: 20px;
    }
    h3,th,tr{
        text-align: center;
        padding:20px;
    }
    .final{
    text-align: center;
		font-family: Tahoma, Geneva, sans-serif;
		padding : 1px;
	font-size: 30px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;;
    }
    .dos {
       display:inline-block;    
    }
	.top{
		text-align: left;
	}
	.mess{
		text-align: center;
	}
	footer{
		float:bottom;
		padding:0px;
		margin :0 0 0px;
	}
	p{
		margin :0 0 0px;
	}
</style>
</head>
<body>

<?php

session_start();

echo "<h3></h3>";


include 'Connection.php';

    $_SESSION['user']     = $_GET['User'];
    $_SESSION['Pharmacy'] = $_GET['Pharmacy'];   


	$USERRR =  $_SESSION['user'];
	$pharmm = $_SESSION['Pharmacy'];

$messege = array("Съобщения:");
$TopTown = array();
$TopCode = array();
$TopPoints = array();
//array_push($messege,"blue","yellow");
$check = 0;
$bonusMan      = 0;
$bonusPharmacy = 0;
$quanityMan = 0;
$quanityPharmacy = 0;

include 'Connection.php';

$stmt = $conn->query('SELECT Communication FROM Communication;');
while ($row = $stmt->fetch()) {  
		array_push($messege, $row['Communication']);
    }



$stmt = $conn->query('SELECT * FROM pharmacist;');

while ($row = $stmt->fetch()) {
    if ($row['User_Legacy_Code'] == $USERRR && $row['AptN'] == $pharmm) {
        $Store = $row['ParmacyName'];
        $userr  = $row['Pharmacevt'];
        $check = 1 ;
    }
}
if($check == 0){
     header("Location: index.php");
}


$stmt = $conn->query("SELECT  [ParmacyName] ,
        [Pharmacevt] ,
        [User_Legacy_Code] ,
        [BONUS]
FROM    pharmacist
WHERE   [AptN] = $pharmm
        AND [User_Legacy_Code] = $USERRR");

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $userr = $row['Pharmacevt'];
   $bonusMan = $row['BONUS'];
   $Store = $row['ParmacyName'];
}

$stmt = $conn->query("SELECT  p.ParmacyName ,
        p.BONUS
FROM    Pharmacy p
        INNER JOIN ( SELECT DISTINCT
                            AptN ,
                            ParmacyName
                     FROM   pharmacist
                   ) AS ph ON p.ParmacyName = ph.ParmacyName
WHERE   ph.aptn = $pharmm");

 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   $bonusPharmacy = $row['BONUS'];
}

$stmt = $conn->query("SELECT TOP 6

        [PhatmacyTown] ,

        [User_Legacy_Code] ,

        SUM([bonus]) AS bonus

FROM    [Pharmacy].[dbo].[Articles]

GROUP BY [PhatmacyTown] ,

        [User_Legacy_Code]

ORDER BY SUM([bonus]) DESC");


 while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   array_push($TopTown, $row['PhatmacyTown']);
   array_push($TopCode, $row['User_Legacy_Code']);
   array_push($TopPoints, $row['bonus']);
}



$user = $_SESSION['user'];
echo '<div class="bs-example">';

echo '<div class="final">';
echo "Здравей, ";
echo $userr;
echo "<br>";
echo "<br>";
echo "Код на потребител: ";
echo $user;
echo "<br>";
echo "<br>";
echo "Резултат: ";
echo '<b>';
echo $bonusMan;
echo "т.";
echo '</b>';
echo "<br>";
echo "<br>";
echo "Резултат на ";
echo $Store;
echo ": ";
echo $bonusPharmacy;
echo "т.";
echo "<br>";
echo "<br>";
echo "<br>";
echo '<div class="top">';
echo 'Топ служители:';
echo "<br>";
echo "<br>";
echo '<ul>';
for ($i = 1; $i <= 5; $i++) {
	echo '<li>';
	echo 'Град:';
    echo $TopTown[$i] . ' ';
	echo ', код на потребител:';
	echo $TopCode[$i] . ' ';
	echo ', точки:';
	echo round($TopPoints[$i], 2);
	echo 'т';
	echo '</li>';
	echo '</br>';
	
}
echo '</ul>';
echo '</div>';
echo "<br>";
echo "<br>";
echo '<div class="mess">';
foreach($messege as $messeges) {
	echo '</br>';
  print $messeges;
}
echo '</div>';

echo "<h3><h3>";


?>

<form class="dos" method="post" action="Page2.php">
<button class="btn btn-default" type="submit">Страница 2</button>
</form>

</div>
</body>
<footer>
<p> Посочените данни са част от мониторингова система за наблюдение и оценка на ефективността на работата на всяка аптека и служителите, като същите са ориентировъчни за целите на управлението и не могат да служат за ангажиране на отговорността на дружеството.</p>
<p> Окончателните данни за някои наблюдавани продукти, се изчисляват съобразно съотношението на продажбите им към продажбите на други продукти в края на месеца.  Текущите данни към даден ден от месеца са точни, спрямо валидното съотношението към този ден.</p>
</footer>