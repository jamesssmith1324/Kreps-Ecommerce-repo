<?php
include("php/details.php");

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
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
    <title>Kreps - Account</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <link rel="stylesheet" href="css/accountStyles.css" type="text/css">
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


    <section class="sec">
        <div class="container">
            <div class="user signinBox">
                <div class="imgBox">
                    <img src="images/accountImg.jpg">
                </div>
                <div class="formBox">
                    <form action="php/accountLogin.php" method="POST" enctype='multipart/form-data'>
                        <h2>Sign In</h2>
                        <hr>
                        <input type="text" name="username" placeholder="Username">
                        <input type="password" name="password" placeholder="Password">
                        <input type="submit" name="submit" value="Login">
                        <p class="signUp"> Don't have an account? <a href="#" onclick="toggleForm()">Sign Up</a></p>
                    </form>
                </div>
            </div>

            <div class="user signupBox">
                <div class="formBox">
                    <form action="php/createAccount.php" method="POST" enctype='multipart/form-data'>
                        <h2>Create an account</h2>
                        <hr>
                        <input type="text" name="newusername" placeholder="Username">
                        <input type="email" name="newemail" placeholder="Email Address">
                        <input type="password" name="newpassword" id="password" placeholder="Create Password" onkeyup = "check()">
                        <input type="password" name="confirmnewpassword" id="confirmPassword" placeholder="Confirm Password" onkeyup = "check()">
                        <input type="submit" name="submit" id="sub" value="Sign Up">
                        <p class="signUp"> Already have an account? <a href="#" onclick="toggleForm()">Sign In</a></p>
                    </form>
                </div>
                <div class="imgBox">
                    <img src="images/accountImg2.jpg">
                </div>
            </div>
        </div>
    </section>
</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/allFunction.js"></script>
    <script>
        let basket = false;
    </script>
    <script src="js/accountFunctions.js"></script>
    <script src="js/mainProductPage.js"></script>
</html>