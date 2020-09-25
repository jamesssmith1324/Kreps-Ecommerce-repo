<?php

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

include("details.php");



if(isset($_POST['submit'])){
    $productID = $_POST['productID'];
    $productName = $_POST['name'];
    $productBrand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $des = $_POST['description'];
    $table = $_POST['whatTable'];
    $size = $_FILES['image']['size'];
    // console_log($table);
    //if($size < 100000){
    //$sizePass = false;

    $image_base64 = base64_encode(file_get_contents($_FILES['image']['tmp_name']));
    $imageHover_base64 = base64_encode(file_get_contents($_FILES['hoverImage']['tmp_name']));
    $displayImg1_base64 = base64_encode(file_get_contents($_FILES['displayImg1']['tmp_name']));
    $displayImg2_base64 = base64_encode(file_get_contents($_FILES['displayImg2']['tmp_name']));
    //console_log($image_base64);
    $image = 'data:image/'.';base64,'.$image_base64;
    $imageHover = 'data:image/'.';base64,'.$imageHover_base64;
    $imageDisplay1 = 'data:image/'.';base64,'.$displayImg1_base64;
    $imageDisplay2 = 'data:image/'.';base64,'.$displayImg2_base64;

    //console_log($image);
    console_log($table);
    $checkIfThere = "select 1 from ".$table." where productID = '".$productID."'";
    $q = mysqli_query($conn,$checkIfThere);
    console_log("q");
    console_log($q);
    $row = mysqli_fetch_row($q);
    // console_log($row);
    if($row){
        echo("ALREADY IN DATABASE");
    }
    else{
        $query = "insert into ".$table."(productID,productName,productBrand,productPrice,stock,productImg,productImgHover,imageDisplay1,imageDisplay2,description) value('".$productID."','".$productName."','".$productBrand."','".$price."','".$stock."','".$image."','".$imageHover."','".$imageDisplay1."','".$imageDisplay2."','".$des."')";
        // $sql = "INSERT INTO allProductImgs (productID,image1,image2,image3,image4) VALUES('".$productID."','".$image."','".$imageHover."','".$imageDisplay1."','".$imageDisplay2."')";
        console_log(mysqli_query($conn,$query));
        // console_log(mysqli_query($conn,$sql));
    }
    
        
    

}

?>