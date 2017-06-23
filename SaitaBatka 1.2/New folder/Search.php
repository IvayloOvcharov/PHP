<?php
session_start();

$conn = mysqli_connect("localhost", "root", "","saitabatka");

if(!$conn)
{
    die("connection faile");
}
$searchU = $_POST['Search'];



$sql = "SELECT * FROM register WHERE username = '$searchU'";
$result = $conn->query($sql);

if(empty($searchU)){
    header("Location: Home Page.php");
    exit();
}

else{
if(!$roll = $result->fetch_assoc()){
    echo "That account doesn't excist";
}
else{   
    header("Location: AccountPage.php");
     $_SESSION['user'] = $roll['username']; 
     $_SESSION['email'] = $roll['email']; 
     $_SESSION['To'] = $roll['ID'];
}


}
$to = $_SESSION['To'];
$sql = "SELECT SUM(lik) AS total FROM alik where tolik = '$to'";
    $result = $conn->query($sql);          
     while($row = $result->fetch_assoc())
  {
     $_SESSION['likes'] =  $row['total'];
 }


$sql = "SELECT * FROM register where id ='$to' ";
 $result = $conn->query($sql);          
     while($row = $result->fetch_assoc())
  {
      $_SESSION['About'] = $row['About'];
  }


?>