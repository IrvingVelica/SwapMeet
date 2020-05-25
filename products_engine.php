<?php
include("conexiondb.php");
if($_POST['action'] == 'delete'){
	$product_idDelete = $_POST['product_idDelete'];

	$sql_request = 'DELETE FROM products_data WHERE product_id='.$product_idDelete;// se cumplen las 2 condiciones
	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}

}else{
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
$user_id = $_POST['user_id'];
$img = '';


$uploadFolder = 'products';
$temp_name = $_FILES["file"]["tmp_name"];
$nameSeed = rand(1,1000000); 
$name = strtolower(str_replace(array(':', '', '/', '*', '[', ']', '(', ')', '{', '}', ' '), '',$nameSeed.$_FILES["file"]["name"]));
if (!file_exists($uploadFolder)) { mkdir($uploadFolder, 0777);
  chmod($uploadFolder, 0777); 
  } move_uploaded_file($temp_name, "$uploadFolder/$name"); 
  chmod("$uploadFolder/$name", 0777);

  if($_FILES["file"]["name"]){
  	 $img = $uploadFolder.'/'.$name;
  }

$sql_request = 'INSERT INTO products_data (product_id,user_id, name, product_description, change_description, status, price_sale, price_rental, img, time_rental, sale_type, product_category, change_category) 
	VALUES(NULL, "'.$user_id.'","'.$product_name.'", "'.$product_description.'", "'.$change_description.'","'.$status.'","'.$price_sale.'","'.$price_rental.'","'.$img.'","'.$time_rental.'","'.$sale_type.'","'.$product_category.'","'.$change_category.'")';

	if(mysqli_query($conexion, $sql_request)){
		echo json_encode(1);
	}else{
		echo json_encode(2);
	}
}


?>
