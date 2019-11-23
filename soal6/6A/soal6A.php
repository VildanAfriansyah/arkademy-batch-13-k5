<?php
	$host = "localhost";
	$username = "root";
	$password = "";
	$db = "arkademy";

	$connection = mysqli_connect($host,$username,$password,$db);
    $sql = mysqli_query($connection,"SELECT * FROM product INNER JOIN cashier ON product.id_cashier = cashier.id_cashier INNER JOIN category on product.id_category = category.id_category ");
?>
               