<?php
require 'common.php';

$products_id = $_GET['id'];
$user_id = $_SESSION['id'];

$select_query = "INSERT INTO user_items (user_id, products_id, status) VALUES ('$user_id','$products_id','Added to cart')";
$select_query_result = mysqli_query($con, $select_query);
header('location:postlogin.php');
