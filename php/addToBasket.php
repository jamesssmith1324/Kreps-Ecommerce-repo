<?php
function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

include("details.php");


if(isset($_POST['addToCart'])){
    $size = $_POST['whatSize'];
    $productID = $_POST['productID'];
    $checkIfThere = "select 2 from basket where productID = '".$productID."' and productSize = '".$size."'";
    $q = mysqli_query($conn,$checkIfThere);
    console_log($q);
    $row = mysqli_fetch_row($q);
    if($row){
        $updatecountSQL = "UPDATE `basket` SET `count`= `count` + 1 WHERE `productID` = '".$productID."'";
        mysqli_query($conn,$updatecountSQL);
    }else{
        $sql = "select productName,productPrice,productImg,productImgHover from products where productID = '".$productID."'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
        $insertToBasketSQL = "INSERT INTO `basket`(`productID`, `productName`, `productPrice`, `productSize`, `productImg`, `productImgHover`,`count`) VALUES ('".$productID."','".$row[0]."','".$row[1]."','".$size."','".$row[2]."','".$row[3]."',1)";
        mysqli_query($conn,$insertToBasketSQL);
    }
    
}

header('Location:http://localhost/ecommerce%20website/productPage.php?productID=' . $productID)



?>