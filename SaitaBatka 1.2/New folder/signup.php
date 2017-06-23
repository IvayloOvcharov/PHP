<?php

session_start();
$conn = mysqli_connect("localhost", "root", "","saitabatka");



$name = $_POST['name'];
$username = $_POST['username'];
$password = $_POST['pass'];
$password2 = $_POST['pass2'];
$email = $_POST['email'];

if(empty($name)){
    header("Location: SAITA BATKA.php");
    exit();
}
if(empty($username)){
    header("Location: SAITA BATKA.php");
    exit();
}
if(empty($password)){
    header("Location: SAITA BATKA.php");
    exit();
}
if($password2!=$password){
    header("Location: SAITA BATKA.php");
    exit();
}
if(empty($password2)){
    header("Location: SAITA BATKA.php");
    exit();
}
if(empty($email)){
     echo "<script type='text/javascript'>alert('imeto se povtarq');</script>";
    header("Location: SAITA BATKA.php");
    exit();
}


else{
$sql = "Select username from register where username = '$username'";
$result = $conn->query($sql);
$check = mysqli_num_rows($result);
if($check > 0)
{ 
   //alert("Hello World");
  // echo "<script type='text/javascript'>alert('imeto se povtarq');</script>";
   header("Location: SAITA BATKA.php");
  
}
else{
$sql = "INSERT INTO Register(name, username , password , email) 
VALUES ('$name','$username','$password','$email')";
$result = $conn->query($sql);
header("Location: SAITA BATKA.php");
}
}


 //header("Location: SAITA BATKA.php"); 