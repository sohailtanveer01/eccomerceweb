<?php require 'common.php'; ?>
<?php
$user_id = $_SESSION['id'];
$products_id = $_GET['id'];
$query = "DELETE FROM user_items WHERE user_id = '$user_id' AND products_id = '$products_id'";

$query_result = mysqli_query($con, $query) or die(mysqli_error($con));

header("location: cart.php");
?>