<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>АПТЕКИ СПРАВКА</title>
<link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<style type="text/css">
.tb {
    visibility: hidden;
}
    .bs-example{
        margin: 20px;
    }
    h3,th,tr{
        text-align: center;
        padding:20px;
    }
    .final{
        text-align: center;
		font-family: Comic Sans MS", cursive, sans-serif;
	font-size: 24px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;;
    }
    .dos {
        display:inline-block;    
        }
</style>
</head>
<?php


session_start();

echo "<h3></h3>";

include 'Connection.php';





echo "<h3><h3>";

$data = array();
$Product = array();
$Price   = array();
$pr      = 0;
$pri     = 0;
$br      = 0;

$username = $_SESSION['user'];
$pharmacy = $_SESSION['Pharmacy'];

$user  = $username;
$pharm = $pharmacy;

include 'Connection.php';
//-> за добавяне в базата данни

$stmt = $conn->query("SELECT  a.art ,
      ISNULL(b.qty1, ' ') AS qty ,
      ISNULL(bonus, ' ') AS bonus
FROM    artbonus a
        LEFT JOIN articles b ON a.art = b.art
                                AND user_legacy_code = $user
                                AND AptN = $pharm
 ");

echo "<body>";
echo '<div class="final">';
echo '<div class="bs-example">';
echo '<table class="table table-hover">';
echo "<thead>";
echo '<tr><th>Наблюдавани артикули</th><th>Количество</th><th>Обща оценка</th></tr>';
echo "</thead>";
echo '<tbody>';

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	

    echo "<tr>";
    echo "<td>";
    echo $row['art'];
    echo "</td>";
    echo "<td>";
    echo round($row['qty'],2);
    echo "</td>";
    echo "<td>";
    echo round($row['bonus'],2);
    echo "т.";
    echo "</td>";
    echo '</tr>';
	
	    
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo "</body>";
echo "<h3></h3>";




echo '<div class="final">';
echo '<form class="dos" method="get" action="Page1.php">';
echo '<div class="tb">';
    echo '<input type="text" class="form-control" name="User" placeholder="Код на потребителя" required="" autofocus="" value="';
	echo $username;
	echo '"/>';
     echo '<input type="text" class="form-control" name="Pharmacy" placeholder="Код на аптеката" required="" value="';
	 echo $pharmacy;
	 echo '"/>' ;
	 echo '</div>';
echo ' <button class="btn btn-default" type="submit">Страница 1</button>';
echo ' </form>' ; 


echo '</div>';
?>