<?php 

$conn =  mysqli_connect("localhost", "root", "","saitabatka");
//var_dump($conn);
if(isset($_POST['btn_upload']))
{
	$filetmp = $_FILES["file_img"]["tmp_name"];
	$filename = $_FILES["file_img"]["name"];
	$filetype = $_FILES["file_img"]["type"];
	$filepath = "photo/".$filename;
	
	//move_uploaded_file($filetmp,$filepath);
	

    echo $filetmp;
    echo $filename;
    echo $filetype;
    echo $filepath;
	//$sql = "INSERT INTO upload_img (img_name,img_path,img_type) VALUES ('$filename','$filepath','$filetype')";
	
    $sql = "INSERT INTO images(img_name,img_path,img_type) 
VALUES ('$filename','$filepath','$filetype')";
//$result = mysql_query($sql);
$result = $conn->query($sql);
}
?>