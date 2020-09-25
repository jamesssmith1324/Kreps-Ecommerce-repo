<?php
function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

include("details.php");


$productID = $_GET['productID'];
$productSize = $_GET['productSize'];



$grapItemToRemove = "select * from basket where productID = '".$productID."' and productSize = '".$productSize."' ";
$result = mysqli_query($conn,$grapItemToRemove);


$row = mysqli_fetch_array($result);
// console_log($row[count]);
if($row[count] > 1){
    $updatecountSQL = "UPDATE `basket` SET `count`= `count` - 1 WHERE `productID` = '".$productID."' and productSize = '".$productSize."'";
    mysqli_query($conn,$updatecountSQL);
}else{
    $deleteRowSQL = "DELETE FROM basket where productID = '".$productID."' and productSize = '".$productSize."'";
    mysqli_query($conn,$deleteRowSQL);
    
}

header('Location:http://localhost/ecommerce%20website/basket.php')

?>