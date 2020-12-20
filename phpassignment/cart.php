<?php include 'common.php' ?>
<?php
if (!isset($_SESSION['email'])) {
    header('location:login.php');
}
$user_id = $_SESSION['id'];
$select_query = "SELECT p.id, p.name, p.price FROM products p INNER JOIN user_items ui ON ui.products_id = p.id WHERE ui.user_id = '$user_id' AND ui.status = 'Added to cart'";

$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
if (mysqli_num_rows($select_query_result) == 0) {
    echo '<h4 class="container panel-margin">Add products to cart first. Goto <a href="postlogin.php">Products</a> page.</h4>';
} else {
    $total = 0;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cart | Life Style Store</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/index.css" type="text/css">
        <style>
            .row-style {
                padding: 290px;
            }
        </style>
    </head>

    <body>
        <div class="container-fluid" id="content">
            <div class="row row-style">
                <?php include 'header.php' ?>
                <div class="row decor_bg">
                    <div class="col-md-6 col-md-offset-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Item Number</th>
                                    <th>Item Name</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                                <?php while ($row = mysqli_fetch_array($select_query_result)) { ?>
                                    <tr>
                                        <td><?php echo $row["id"] ?></td>
                                        <td><?php echo $row["name"] ?></td>
                                        <td><?php $total += $row["price"];
                                            echo $row["price"] ?></td>
                                        <td><a href="cart-remove.php?id=<?php echo $row["id"]; ?>">Remove</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td>Total</td>
                                    <td>Rs </td>
                                    <td><a href='success.php' class='btn btn-primary'>Confirm Order</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
include 'footer.php' ?>
    </body>

    </html>