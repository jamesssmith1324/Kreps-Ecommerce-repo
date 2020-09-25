<?php

function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

include("details.php");


if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $selectUserSQL = "select username,password from users where username = '".$username."'";
    $q = mysqli_query($conn,$selectUserSQL);
    $row = mysqli_fetch_row($q);
    if($row){
        $passwordHash = $row[1];
        if(password_verify($password,$passwordHash)){
            console_log('Correct');
            header("Location:http://localhost/ecommerce%20website/account.php?account=".$username."");
        }else{
            console_log('Wrong Username or Password');
        }
    }else{
        console_log('Wrong Username or Password');
    }
    

}




?>