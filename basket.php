<?php

include("php/details.php");

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

$grapAllSQL = 'select * from basket';
$result = mysqli_query($conn,$grapAllSQL);
// while($row = mysqli_fetch_array($result)){
//     console_log($row);
// }
// console_log($row);
$products = [];
while($row = mysqli_fetch_array($result)){
    for ($i=0; $i < 7; $i++) { 
        unset($row[$i]);
    }
    array_push($products,$row);    
}

$numInBasket = 0;
$sql = 'select count from basket';
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    $numInBasket += $row[0];
}

$totalPrice = 0;
$sql = 'select productPrice, count from basket';
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result)){
    $totalPrice += $row[0] * $row[1];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kreps - Basket</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh4PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/productPageStyles.css" type="text/css">
    <link rel="stylesheet" href="css/basketStyles.css" type="text/css">
</head>
<body>
    <nav class="desktopNav">
        <ul>
            <li class="logo">
                <a href="http://localhost/ecommerce%20website/">
                    <img src="images/LOGO3.jpg" alt="">
                </a>
            </li>
            <li><a href="http://localhost/ecommerce%20website/products.php?">Products</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="http://localhost/ecommerce%20website/account.php">Account</a></li>
            <li><a href="http://localhost/ecommerce%20website/basket.php"><?php echo json_encode($numInBasket)?> <i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
            <li class="menu" onclick="showMenu()"><label for="check"><i class="fa fa-bars" aria-hidden="true"></i></label></li>
        </ul>
    </nav>
    <nav class="phoneNav">
        <ul>
            <li><a href="products.php">Products</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="http://localhost/ecommerce%20website/account.php">Account</a></li>
        </ul>
    </nav>

    <div class="title">
        <h1>Basket</h1>
    </div>

    <div class="container">
        <div class="products">
            
        </div>
        <div class="paymentSection">
            <div class="totalToPay">
                <p>Choose Available Delivery Method</p>
                <select name="delivery" id="selectDelivery ">
                    <option value="select" onclick="changeDelivery(this.value)">Select Delivery Type</option>
                    <option value="standard" onclick="changeDelivery(this.value)">UK Standard - FREE</option>
                    <option value="nextDay" onclick="changeDelivery(this.value)">Next Day - £4.99</option>
                </select>
                <!-- <input type="text" placeholder="Student Discount / Promo Code"> -->
                <div id="subtotal"><p>Subtotal</p><span>£<?php echo json_encode($totalPrice)?></span></div>
                <div id="deliveryTotal"><p>Delivery</p><span>FREE</span></div>
                <div id="total"><p>Total</p><span>£<?php echo json_encode($totalPrice)?></span></div>
                <button>Secure Checkout</button>
            </div>
        </div>
    </div>

</body>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="js/allFunction.js"></script>
<script>
    let products = <?php echo json_encode($products)?>; 
    let basket = true;
    let totalPrice = <?php echo json_encode($totalPrice)?>;
</script>
<script src="js/products.js"></script>
<script src="js/basket.js"></script>
</html>