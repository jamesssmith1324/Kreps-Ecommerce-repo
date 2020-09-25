<?php
function console_log( $i ){
    echo '<script>';
    echo 'console.log('. json_encode( $i ) .')';
    echo '</script>';
}

include("details.php");




if(isset($_POST['submit'])){
    $newUsername = $_POST['newusername'];
    $newEmail = $_POST['newemail'];
    $newPassword = $_POST['newpassword'];
    $passwordHash = password_hash($newPassword,PASSWORD_DEFAULT);
    $checkIfThere = "select 1 from users where username = '".$newUsername."'";
    $q = mysqli_query($conn,$checkIfThere);
    $row = mysqli_fetch_row($q);
    if($row){
        echo("ALREADY IN DATABASE");
    }
    else{
        $query = "INSERT INTO `users`(`username`, `email`, `password`) VALUES('".$newUsername."','".$newEmail."','".$passwordHash."')";
        console_log(mysqli_query($conn,$query));
    }
}



?>