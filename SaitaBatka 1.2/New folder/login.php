<?php
session_start();

$conn = mysqli_connect("localhost", "root", "","saitabatka");

if(!$conn)
{
    die("connection faile");
}
$username = $_POST['username'];
$password = $_POST['pass'];


$sql = "SELECT * FROM register WHERE username = '$username' AND password = '$password'";

$result = $conn->query($sql);

if(empty($username)){
    header("Location: SAITA BATKA.php");
    exit();
}
if(empty($password)){
    header("Location: SAITA BATKA.php");
    exit();
}
else{
if(!$roll = $result->fetch_assoc()){
    echo "Username or Password incorrect!";
}
else{   
     $_SESSION['name'] = $roll['username'];   
     $_SESSION['From'] = $roll['ID'];
    header("Location: HOME PAGE.php");
    
}

}
?>