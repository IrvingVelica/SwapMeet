<?php
include("conexiondb.php");
$actions = $_POST['actions'];


if($actions == 'insert') {
	$user_name = $_POST['user_name'];
	$user_lastname = $_POST['user_lastname'];
	$user_password =  $_POST['user_password'];
	$user_age =  $_POST['user_age'];
	$user_email =  $_POST['user_email'];
	$user_address =  $_POST['user_address'];

	$sql_request = 'INSERT INTO users_data (user_id, first_name, last_name, password, age, email, address) 
	VALUES(NULL, "'.$user_name.'", "'.$user_lastname.'", "'.$user_password.'",'.$user_age.',"'.$user_email.'","'.$user_address.'" )';

	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}
}
if($actions == 'login'){
	$email_log = $_POST['email_log'];
	$password_log = $_POST['password_log'];

    $sql_request = 'SELECT * FROM users_data where email="'.$email_log.'" AND password="'.$password_log.'"';
	$execute=mysqli_query($conexion, $sql_request);
	$row=mysqli_fetch_assoc($execute);

	if(mysqli_num_rows($execute)){
		session_start();
        $_SESSION["user_id"] = $row['user_id'];
		echo json_encode($row);
	}else{
		echo json_encode(2);
	}
}

if($actions == 'update'){
	session_start();
	$user_name = $_POST['user_name'];
	$user_lastname = $_POST['user_lastname'];
	$user_password =  $_POST['user_password'];
	$user_age =  $_POST['user_age'];
	$user_address =  $_POST['user_address'];
	$phone =  $_POST['phone'];
	$social_network =  $_POST['social_network'];
	print_r($_POST);
	//echo $_SESSION['user_id'];

	$updateUser = 'UPDATE users_data SET first_name="'.$user_name.'", last_name="'.$user_lastname.'", password="'.$user_password.'",age= "'.$user_age.'",address="'.$user_address.'",phone="'.$phone.'",social_network="'.$social_network.'" WHERE user_id='.$_SESSION['user_id'];
		mysqli_query($conexion, $updateUser);

}

?>