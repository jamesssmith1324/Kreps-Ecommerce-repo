<?php

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

include('php/details.php');

$getProductID = $_GET['productID'];

$sql = "SELECT `productName`, `productBrand`, `productPrice`,`productImg`, `productImgHover`, `imageDisplay1`, `imageDisplay2`, `description` FROM `products` WHERE `productID` = '".$getProductID."'";
console_log($getProductID);
$q = mysqli_query($conn,$sql);
$imageList = mysqli_fetch_row($q);


if(isset($_POST['addToCart'])){
    console_log("hello");
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
    <title>Kreps - <?php echo $imageList[7]?></title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/singleProductStyle.css" type="text/css">
</head>
<body>
    <nav class="desktopNav">
        <ul>
            <li class="logo">
                <a href="http://localhost/ecommerce%20website/">
                    <img src="images/LOGO3.jpg" alt="">
                </a>
            </li>
            <li><a href="http://localhost/ecommerce%20website/products.php">Products</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="http://localhost/ecommerce%20website/account.php">Account</a></li>
            <li><a href="http://localhost/ecommerce%20website/basket.php"><?php echo json_encode($numInBasket)?> <i class="fa fa-shopping-basket" aria-hidden="true"></i></a></li>
            <li class="menu" onclick="showMenu()"><label for="check"><i class="fa fa-bars" aria-hidden="true"></i></label></li>
        </ul>
    </nav>
    <nav class="phoneNav">
        <ul>
            <li><a href="http://localhost/ecommerce%20website/products.php">Products</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="http://localhost/ecommerce%20website/account.php">Account</a></li>
        </ul>
    </nav>

    <div class="productInfoMain">
        <h1><?php echo $imageList[1]?></h1>
        <hr>
        <p><?php echo $imageList[7]?></p>
        <h2>£<?php echo $imageList[2]?></h2>
    </div>

    <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide"><img src="<?php echo $imageList[3]?>" alt="" onclick="inlargeImg(this)"></div>
          <div class="swiper-slide"><img src="<?php echo $imageList[4]?>" alt="" onclick="inlargeImg(this)"></div>
          <div class="swiper-slide"><img src="<?php echo $imageList[5]?>" alt="" onclick="inlargeImg(this)"></div>
          <div class="swiper-slide"><img src="<?php echo $imageList[6]?>" alt="" onclick="inlargeImg(this)"></div>
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="imageModal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modalContent" src="" alt="">
    </div>
    <div class="selection">
        <form action="php/addToBasket.php" method="POST">
            <input name="productID" value="<?php echo $getProductID?>" hidden>
            <div class="sizeSelect">
                <select name="whatSize" id="">
                    <option value="8">Size 8</option>
                    <option value="9">Size 9</option>
                    <option value="10">Size 10</option>
                    <option value="11">Size 11</option>
                </select>
            </div>
            <div class="addToCart">
                <input class="addCart" type="submit" value="Add To Cart" name="addToCart">
            </div>
        </form>
    </div>
    

    

    <div class="footer">
        <div class="fLists">
            <div class="footerList needHelp">
                <ul>
                    <li><h3>Need Help</h3></li>
                    <li><a href="">Customer Experience</a></li>
                    <li><a href="">Track Order</a></li>
                    <li><a href="">Delivery Info</a></li>
                    <li><a href="">Return Policy</a></li>
                </ul>
            </div>
            <div class="footerList followUs">
                <ul>
                    <li><h3>Follow Us</h3></li>
                    <li><a href="">Facebook</a></li>
                    <li><a href="">Instagram</a></li>
                    <li><a href="">Twitter</a></li>
                </ul>
            </div>
            <div class="footerList legal">
                <ul>
                    <li><h3>Legal</h3></li>
                    <li><a href="">Terms & Conditions</a></li>
                    <li><a href="">Privacy & Cookies</a></li>
                    <li><a href="">Accessibility</a></li>
                    <li><a href="">Site Map</a></li>
                </ul>
            </div>
        </div>
        <div class="payment">
            <img src="images/mastercard.svg" alt="">
            <img src="images/paypal.svg" alt="">
            <img src="images/visa.svg" alt="">
            <img src="images/american-express.svg" alt="">
        </div>
    </div>

    
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="js/allFunction.js"></script>
<script src="js/singleProductFunction.js"></script>
</html>
