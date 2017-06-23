<?php
session_start();
$conn =  mysqli_connect("localhost", "root", "","saitabatka");

$to = $_SESSION['To'];
$User = $_SESSION['From'];
$About1 = $_POST['AboutText'];

$sql = "UPDATE Register
SET About = '$About1'
WHERE ID  = $User ";
$result = $conn->query($sql);




  header("Location: HOME PAGE.php");
?>