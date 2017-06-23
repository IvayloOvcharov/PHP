<?php
session_start();
 
$conn = mysqli_connect("localhost", "root", "","saitabatka");
if(!$conn)
{
    die("connection faile");
}
//echo 'asdasd';
header("Location: AccountPage.php");
    $flik = $_SESSION['From'];
    $tolik = $_SESSION['To'];



        $delete ="DELETE  FROM alik WHERE Fromlik = '$flik' and tolik='$tolik'" ;
     $lik = true;
      $sql = "INSERT INTO alik(Fromlik,tolik,lik) 
        values ('$flik','$tolik','$lik')";
        $result = $conn->query($delete);
         $result = $conn->query($sql); 
   



$to = $_SESSION['To'];
$sql = "SELECT SUM(lik) AS total FROM alik where tolik = '$to'";
    $result = $conn->query($sql);          
     while($row = $result->fetch_assoc())
  {
     $_SESSION['likes'] =  $row['total'];
 }




//echo $flik;
   
 // print_r($row['fromlik'])

?>