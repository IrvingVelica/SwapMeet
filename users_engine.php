<?php
include("conexiondb.php");

$user_name = $_POST['user_name'];
$user_lastname = $_POST['user_lastname'];
$user_password =  $_POST['user_password'];
$user_age =  $_POST['user_age'];
$user_email =  $_POST['user_email'];
$user_address =  $_POST['user_address'];


$insertUser = 'INSERT INTO users_data (user_id, first_name, last_name, password, age, email, address) 
	VALUES(NULL, "'.$user_name.'", "'.$user_lastname.'", "'.$user_password.'",'.$user_age.',"'.$user_email.'","'.$user_address.'" )';

if (mysqli_query($conexion, $insertUser)) {	
	echo json_encode(1);
} else {
	echo json_encode(0);
}

?>