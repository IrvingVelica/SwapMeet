<?php
include("conexiondb.php");
session_start();
	$user_name = $_POST['first_name'];
	$user_lastname = $_POST['last_name'];
	$user_password =  $_POST['password'];
	$user_age =  $_POST['age'];
	$user_address =  $_POST['address'];
	$phone =  $_POST['phone'];
	$social_network =  $_POST['social_network'];
	$img = '';
	$imagen = $_POST['imagen'];
	print_r($_POST);
	//echo $_SESSION['user_id'];


$uploadFolder = 'users';
$temp_name = $_FILES["file"]["tmp_name"];
$nameSeed = rand(1,1000000); 
$name = strtolower(str_replace(array(':', '', '/', '*', '[', ']', '(', ')', '{', '}', ' '), '',$nameSeed.$_FILES["file"]["name"]));
if (!file_exists($uploadFolder)) { mkdir($uploadFolder, 0777);
  chmod($uploadFolder, 0777); 
  } move_uploaded_file($temp_name, "$uploadFolder/$name"); 
  chmod("$uploadFolder/$name", 0777);

  if($_FILES["file"]["name"]){
  	 $img = $uploadFolder.'/'.$name;
  }else{
  	$img=$imagen;
  }

	$updateUser = 'UPDATE users_data SET first_name="'.$user_name.'", last_name="'.$user_lastname.'", password="'.$user_password.'",age= "'.$user_age.'",address="'.$user_address.'",phone="'.$phone.'",social_network="'.$social_network.'",img="'.$img.'" WHERE user_id='.$_SESSION['user_id'];
		mysqli_query($conexion, $updateUser);
?>