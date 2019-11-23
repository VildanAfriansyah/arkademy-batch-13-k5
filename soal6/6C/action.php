<?php
	$host = "localhost";
    $username = "root";
    $password = "";
    $db = "arkademy";

    $connection = mysqli_connect($host,$username,$password,$db);
	if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $product = $_POST['product'];
    $cashier = $_POST['cashier'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $sql = mysqli_query($connection,"UPDATE product
        SET product = '$product', price = '$price', id_category='$category',id_cashier='$cashier' WHERE id_product='$id'");
	} 
	header("location:index.php");
?>