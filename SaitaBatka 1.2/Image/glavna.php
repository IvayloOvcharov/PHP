<?php 





  $host = "localhost";
 $username = "root";
 $password = "";
 $db_name  = "saitabatka";

  mysqli_connect($host,$username,$password,$db_name) or die("Database not connect");

 

  class Image{

   var 
   $image_id,
   $image_name,
   $image;
  
  function Insert_into_image(){
   if(isset($_FILES['txt_image']))
   {
        $tempname = $_FILES['txt_image']['tmp_name'];
        $originalname =$_FILES['txt_image']['name'];
        $size =($_FILES['txt_image']['size']/5242888). "MB<br>";
        $type=$_FILES['txt_image']['type'];
        $image=$_FILES['txt_image']['name'];
        move_uploaded_file($_FILES['txt_image']['tmp_name'],"image/".$_FILES['txt_image']['name']);
      }
  

    $query = "Insert into images
    (
     img_path,
     img_type
    )
    values
    (
     '$this->image_name',
     '$image'
    )";
   
  }

   function get_all_image_list(){
   $query = "select * from images";

   $result = mysql_query($query);
   return $result;
  }

}



$obj_image = new Image();
if(@$_POST['Submit'])
{
 $obj_image->image_name=str_replace("'", "''", $_POST['txt_image_name']);
 $obj_image->image=str_replace("'", "''", $_POST['txt_image']);

  $obj_image->Insert_into_image();

  $data_image=$obj_image->get_all_image_list();
 $row=mysql_num_rows($data_image);
}

?>

<!DOCTYPE html>
<html>
<head>
 <title>NOvaeye </title>
</head>
<body>
 <CENTER><H1>Novaeyewear</H1></CENTER>
 <CENTER><H2>Sunglass</H2></CENTER>

  <CENTER>
  <form method="post" enctype="multipart/form-data">
   <table border="1" width="80%">
    <tr>
     <th width="50%">IMage NAme</th>
     <td width="50%"><input type="text" name="txt_image_name"></input></td>
    </tr>
    <tr>
     <th width="50%">Upload IMage</th>
     <td width="50%"><input type="file" name="txt_image"></input></td>
    </tr>
    <tr>
     <td></td>
     <td width="50%"><input type="submit" name="Submit" value="Submit"></input></td>
    </tr>
   </table>
  </form>
 </CENTER>

  <?php 
  if(!$row=0)
  {
  ?>
  <center>
   <table width="80%" border="1"> 
   <?php
    $icount = 1;
    while($data= mysql_fetch_assoc($data_image))
    {$count++;
     }
     ?>
     <tr>
      <td><?php echo $icount; ?></td>
      <td><?php echo $data['image_name']?></td>
      <td><img src="images/<?php echo $data['image']; ?>" width="400px" height="200px"></td>
     </tr>
     
   </table>
  </center>
  <?php
 }

  ?>
</body>
</html>