<?php
    require_once "db_connect.php";
    $delete_id = $_GET['id'];

    $sql = "delete from members where id = $delete_id";
    $result = $con->query($sql);

    if($result) {
        header('Location:members_data.php');  
    }
    else
    {
        echo "Failed";
    }
?>
