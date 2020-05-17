<?php
include("conexiondb.php");
$product_name = $_POST['product_name'];
$product_description = $_POST['product_description'];
$change_description = $_POST['change_description'];
$status = $_POST['product_status'];
$price_sale = $_POST['price_sale'];
$price_rental = $_POST['price_rental'];
$time_rental = $_POST['time_rental'];
$sale_type = $_POST['sale_type'];
$product_category=$_POST['product_category'];
$change_category = $_POST['change_category'];
$img = $_FILES['file']['tmp_name'];

//print_r($_POST);
//print_r($_FILES);


//inserytar usuario

$sql_request = 'INSERT INTO products_data (product_id,user_id, name, product_description, change_description, status, price_sale, price_rental, img, time_rental, sale_type, product_category, change_category) 
	VALUES(NULL, NULL,"'.$product_name.'", "'.$product_description.'", "'.$change_description.'","'.$status.'","'.$price_sale.'","'.$price_rental.'","'.$img.'","'.$time_rental.'","'.$sale_type.'","'.$product_category.'","'.$change_category.'")';
	mysqli_query($conexion, $sql_request);

?>
