<?php
//session_start();
//$uid = $_SESSION['id'];


 

$conn =  mysqli_connect("localhost", "root", "","saitabatka");

function setCom($conn){

if(isset($_POST['Commentsubmit'])){
 //$roll['username']
 $date = $_POST['date'];
 $messege = $_POST['messege'];
 $to = $_SESSION['To'];
 $From = $_SESSION['From'];
  $user = $_SESSION['name'];


$sql = "INSERT INTO comment(From1,FromN,to1,date1,comment) 
values ('$From','$user','$to','$date','$messege')";
$result = $conn->query($sql);

}
}

function getCom($conn){
$to = $_SESSION['To'];

$sql = "SELECT * FROM comment where to1 ='$to'  ";

    $result = $conn->query($sql);          
     while($row = $result->fetch_assoc())
  {
     echo " <div class = 'commentbox'>";
   //  echo "<div class = 'First'>";
      echo $row['FromN']."<br>";
   //   echo "</div>";
      echo $row['comment']."<br><br>  ";
    echo "<div> ";
 }
    }

 


//$sql = "INSERT INTO Userr(name, username , pass , email) 
//VALUES ('$name','$username','$password','$email')";

//$result = $conn->query($sql); order by id desc
