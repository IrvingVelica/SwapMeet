<?php
include("conexiondb.php");
session_start();
//print_r($_POST);
$action = $_POST['action'];
$user_id = $_SESSION['user_id'];
if($action == 'evaluation'){
	$evaluation = $_POST['stars'];
	$suggestion = $_POST['suggestion']; 

	$sql_request = 'INSERT INTO help_support (support_id, user_id, evaluation, suggestion) 
	VALUES(NULL, "'.$user_id.'","'.$evaluation.'","'.$suggestion.'")';

	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}


}
if($action == 'support'){
	$description = $_POST['description_support'];
	$support = $_POST['support_area'];

	$sql_request = 'INSERT INTO help_support (support_id, user_id, support, description) 
	VALUES(NULL, "'.$user_id.'", "'.$support.'", "'.$description.'")';

	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}

}




?>