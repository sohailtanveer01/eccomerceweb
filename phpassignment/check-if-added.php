<?php
function  check_if_added_to_cart($products_id)
{
    include 'common.php';
    $user_id = $_SESSION['id'];
    $select_query = "SELECT * FROM user_items WHERE user_id='$user_id' AND products_id='$products_id' and status='ADDED TO CART'";
    $select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
    if (mysqli_num_rows($select_query_result) >= 1) {
        return 1;
    } else {
        return 0;
    }
}
