<?php

include("php/details.php");

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

$grapAllSQL = 'select * from products';
$result = mysqli_query($conn,$grapAllSQL);
// while($row = mysqli_fetch_array($result)){
//     console_log($row);
// }
// console_log($row);
$products = [];

while($row = mysqli_fetch_array($result)){
    for ($i=0; $i < 11; $i++) { 
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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kreps - Products</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/productPageStyles.css" type="text/css">
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
            <li><a href="http://localhost/ecommerce%20website/products.php?">Products</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="http://localhost/ecommerce%20website/account.php">Account</a></li>
        </ul>
    </nav>
    <div class="refine">
        <h2>Choose Your Brand</h2>
        <ul class="refineList">
            <li class="refineListItem active" data-filter="All">All</li>
            <li class="refineListItem" data-filter="Nike">Nike</li>
            <li class="refineListItem" data-filter="NewBalance">New Balance</li>
            <li class="refineListItem" data-filter="Adidas">Adidas</li>
            <li class="refineListItem" data-filter="Converse">Converse</li>
            <li class="refineListItem" data-filter="Reebok">Reebok</li>
            <li class="refineListItem" data-filter="FILA">FILA</li>
        </ul>
    </div>
    <div class="products"></div>
    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="js/allFunction.js"></script>
<script>
    let products = <?php echo json_encode($products)?>; 
    let basket = false;
</script>
<script src="js/products.js"></script>
<script src="js/mainProductPage.js"></script>
<script src="js/main.js"></script>
</html> 