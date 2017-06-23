<?php
session_start();

?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.container1{
    width: 450px;
    height: 560px;
    text-align: center;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-left: 112px;
    margin-top:40px;
    border-radius: 8px;
    color: white;
}
.container2{
    width: 450px;
    height: 560px;
    text-align: left;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    margin-left: 112px;
    margin-top:40px;
    border-radius: 8px;
    color: white;}
body{
   background-attachment: fixed;
    background-size: cover;
    background-position: fixed;
    margin: 0 auto;
    background-image: url(bg2.jpg);
    background-repeat: no-repeat;
    
    background-position: fixed;
}
</style>
<body>
    



<div class="row">
    <div class="col-sm-6">
        <div class="container1">
            <h2 style="text-align:left; margin-left:50px;">Register</h2>
        <form action="signup.php" method="POST">
            <div class="form-group" style="width: 200px;">
                <label for="name">Name:</label>
                 <input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
             <div class="form-group">
                 <label for="username">Username:</label>
                 <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control"  id="pwd"name="pass" placeholder="Enter password">
            </div>
            <div class="form-group">
                 <label for="inputsm">Repeat Password:</label>
                 <input type="password" class="form-control" name="pass2" id="inputsm" placeholder="Repeat Password">
            </div>
            <div class="form-group">
                <label for"email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
       <button type="submit" class="btn btn-default">Register</button>
       </form>

      


       
      </div>
      </div>
    </div>
    <div class="col-sm-6">
        <div class="container2">
            <h2 style="text-align: left; margin-left: 60px">Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group" style="width: 200px;">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="form-group" style="width: 200px;">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="password" name="pass" placeholder="Enter Password">
            </div>
            <div class="checkbox" style="float: left;">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default"style="margin-top:35px; float:left;">Login</button>
            
        </form>

        </div>
    </div>
</div>

        
</body> 
</html>