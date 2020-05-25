<?php
include("conexiondb.php");
session_start();


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
$product_idEdit = $_POST['product_idEdit'];
echo $product_idEdit;

$img = '';
$imagen = $_POST['imagen'];
//print_r($_POST);



$uploadFolder = 'products';
$temp_name = $_FILES["file"]["tmp_name"];
$nameSeed = rand(1,1000000); 
$name = strtolower(str_replace(array(':', '', '/', '*', '[', ']', '(', ')', '{', '}', ' '), '',$nameSeed.$_FILES["file"]["name"]));
move_uploaded_file($temp_name, "$uploadFolder/$name"); 
  

  if($_FILES["file"]["name"]){
  	 $img = $uploadFolder.'/'.$name;
  }else{
  	$img=$imagen;
  }

	 $updateUser = 'UPDATE products_data SET name="'.$product_name.'", product_description="'.$product_description.'", change_description="'.$change_description.'",status= "'.$status.'",price_sale="'.$price_sale.'",price_rental="'.$price_rental.'",time_rental="'.$time_rental.'",sale_type="'.$sale_type.'",product_category="'.$product_category.'",change_category="'.$change_category.'",img="'.$img.'" WHERE product_id='.$product_idEdit;
		mysqli_query($conexion, $updateUser);
?>