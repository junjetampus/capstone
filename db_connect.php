<?php 
    $Hostname = 'localhost';
    $Username = 'root';
    $Password = '';
    $Database = 'capstone';

    $con = mysqli_connect($Hostname,$Username,$Password,$Database);

    if(!$con) {
        die(mysqli_error($con));
    }
?>