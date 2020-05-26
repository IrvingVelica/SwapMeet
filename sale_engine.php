<?php
include("conexiondb.php");
//print_r($_POST);
$saller_id = $_POST['saller_id'];
$buyer_id = $_POST['buyer_id'];
$product_id = $_POST['product_id'];
$delivery = $_POST['delivery'];
$delivery_time = $_POST['delivery_time'];
$type_sale = $_POST['type_sale'];
$type_delivery = $_POST['type_delivery'];

if($type_delivery == 'Domicilio'){
	$sql_request = 'INSERT INTO sales_data (sale_id,buyer_id, saller_id, product_id, type_delivery, delivery_time, type_sale) 
	VALUES(NULL, "'.$buyer_id.'","'.$saller_id.'", "'.$product_id.'", "'.$type_delivery.'","'.$delivery_time.'","'.$type_sale.'")';

	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}
}
if($type_delivery == 'Reunion'){
	$sql_request = 'INSERT INTO sales_data (sale_id,buyer_id, saller_id, product_id, delivery, type_delivery, delivery_time, type_sale) 
	VALUES(NULL, "'.$buyer_id.'","'.$saller_id.'", "'.$product_id.'", "'.$delivery.'", "'.$type_delivery.'","'.$delivery_time.'","'.$type_sale.'")';

	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}
}



?>