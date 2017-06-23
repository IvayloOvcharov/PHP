<?php
session_start();
//header("Location: AccountPage.php");
header("Location: AccountPage.php");
$conn = mysqli_connect("localhost", "root", "","saitabatka");
if(!$conn)
{
    die("connection failed");
}
 
$sql = "SELECT SUM(lik) AS total FROM alik";
    $result = $conn->query($sql);          
     while($row = $result->fetch_assoc())
  {
     $_SESSION['likes'] =  $row['total'];
 }


?>