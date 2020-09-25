<?php
include("php/details.php");

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

$grapAllSQL = 'select * from featureProducts';
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
    <title>Kreps</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css"/>
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
            <li><a href="products.php">Products</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="http://localhost/ecommerce%20website/account.php">Account</a></li>
        </ul>
    </nav>


    <div class="slideshow">
        <div class="slide">
            <div class="imageHolder">
                <img src="images/imageHolderSlide1 1.jpg" alt="">
                <img src="images/imageHolderSlide1 2.jpg" alt="">
                <img src="images/imageHolderSlide1 3.jpg" alt="">
            </div>
        </div>
        <div class="slide">
            <div class="imageHolder">
                <img src="images/imageHolderSlide2 1.jpg" alt="">
                <img src="images/imageHolderSlide2 2.jpg" alt="">
                <img src="images/imageHolderSlide2 3.jpg" alt="">
            </div>
        </div>
        <div class="slide">
            <div class="imageHolder">
                <img src="images/imageHolderSlide3 1.jpg" alt="">
                <img src="images/imageHolderSlide3 2.jpg" alt="">
                <img src="images/imageHolderSlide3 3.jpg" alt="">
            </div>
        </div>
        <!-- <div class="slide2">
            <img id="slide2" src="images/slide2.jpg" alt="">
        </div>
        <div class="slide3">
            <img id="slide3" src="images/slide3.jpg" alt="">
        </div> -->
    </div>

    <div class="featureProductTitle">
        <h1>Feature Products</h1>
    </div>

    <div class="products"></div>

    <!-- <div class="squareHoverSlider">
        <div class="square showOnScroll" id="square1">
            <img src="images/square1.jpg" alt="">
        </div>
        <div class="square showOnScroll" id="square2">
            <img src="images/square2.jpg" alt="">
        </div>
    </div> -->
 
    <div class="indexText about showOnScroll">
        <h1>What We Sell</h1>
        <hr>
        <p>The shoe that will define your look, we sell it. We sell only the best shoes that are trending. On the products page you will find all the brands that you will ever need, like Nike, Adidas and New Balance. We base our choice of shoes around the street style.</p>
    </div>

    <div class="banner showOnScroll">
        <a href="products.php?">Find Your Brand</a>
        <img src="images/bannerImg1.jpg" alt="">
        <img src="images/bannerImg2.jpg" alt="">
        <img src="images/bannerImg3.jpg" alt="">
    </div>


    <div class="indexText followUs showOnScroll">
        <h1>Follow Us</h1>
        <hr>
        <p>Do you want to know about the latest stock before anyone else, ask us questions about our products or find out more infomation. The just follow us on social media <span style="color: #008cff;">@KrepsInc</span>.</p>
        <div class="socialMedia">
            <span><i class="fa fa-facebook-square" aria-hidden="true"></i></span>
            <span><i class="fa fa-twitter-square" aria-hidden="true"></i></span>
            <span><i class="fa fa-instagram" aria-hidden="true"></i></span>
        </div>
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
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="slick/slick/slick.min.js"></script>
<script>
    let products = <?php echo json_encode($products)?>; 
    let basket = false;
</script>
<script src="js/main.js"></script>
<script src="js/allFunction.js"></script>
<script src="js/products.js"></script>
</html>

