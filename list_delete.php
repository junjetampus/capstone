<?php
    require_once "db_connect.php";
    $delete_id = $_GET['id'];

    $sql = "delete from list where id = $delete_id";
    $result = $con->query($sql);

    if($result) {
        header('Location:list.php');  
    }
    else
    {
        echo "Failed";
    }
?>
