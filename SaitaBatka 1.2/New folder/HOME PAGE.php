<?php
session_start();





       ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>DALI BOLI</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
body{
    background-image: url(bg2.jpg);
    background-attachment: fixed;
    background-size:cover;    
}
footer{
    position:fixed;
    left:0px;
    bottom:0px;
    height:30px;
    width:100%;
    
}
.About
{
 
}
.container{
    text-align: center;
    color: black;
    margin-top: 250px;
}
.container-fluid{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    color: white;
    background-color:black; 
}
#picture{
  align-content: center;
  text-align: center;
}
.button {
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: white;
  background-color: blue;
  border: none;
  border-radius: 15px;
}
.Search {
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: white;
  background-color: blue;
  border: none;
  border-radius: 15px;
}

.button:hover {background-color: darkblue}

.button:active {
  background-color: blue;
  transform: translateY(1px);
}

  </style>



  <head>
    <div class="container-fluid">
  <div class="row">
      <div class="col-sm-4">


       
         <img src="logo.jpg " alt="logo" width="35px" style="margin-left: 60px"></div>
      <div class="col-sm-4"></div>
      <div class="col-sm-2">
         <img src="pic.jpg" alt="pic" width="50px" style="float: left">
          <label style="margin-top: 8px"><?php echo $_SESSION['name']; ?></label>
           </div>
      <div class="col-sm-2">
        <form action="logout.php" method="POST">
         <button class="button">Log Out</button></div>   
        
          </form>


<form method="POST" action="Search.php"> 
<textarea class="Search" name='Search'>Search </textarea> <br>     
         <button class="button">Find</button></div>   
</form>



  </div>
</div>
</head>
<body>
  <div id="picture">
  </div>
  

<?php
   echo " <div class = 'textbox'>";
echo "<form method='POST' action='About.php'>
<textarea name='AboutText'> </textarea> <br>
<button name='ABOUT' type='submit' >Comment</button>
</form>";
echo "</div>";
?>



<div class="container">
  <h2>My Page</h2>
  <div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="width:15%">
      <span class="sr-only">15% Complete</span>
    </div>
  </div>
</div>

</body>
<footer>
       <a target="blank" href="http://www.facebook.com">
       <img src="facebook-logo.png" alt="Twitter" style="height: 30px"> </a>
       <a target="blank" href="http://www.twitter.com">
       <img src="twitter-logo.png" alt="Twitter" style="height: 30px;"> </a>
       <a target="blank" href="http://www.instagram.com">
       <img src="instagram-logo.png" alt="Twitter" style="height: 30px;"></a>
</footer>
</html>