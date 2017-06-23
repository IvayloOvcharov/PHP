<?php
session_start();

$conn =  mysqli_connect("localhost", "root", "","saitabatka");

$to = $_SESSION['To'];
$sql = "SELECT * FROM comment where to1 ='$to' ";
 $result = $conn->query($sql);          
     while($row = $result->fetch_assoc())
  {
      $_SESSION['About'] = $row['About'];
  }
?>