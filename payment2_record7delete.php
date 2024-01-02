<?php
    require_once "db_connect.php";
    $delete_id = $_GET['id'];

    $sql = "delete from record7 where id = $delete_id";
    $result = $con->query($sql);

    if($result) {
        echo '<script language="javascript">';
        echo 'alert("Details Successfully Deleted"); location.href="payment2_record7.php"';
        echo '</script>';
    }
    else
    {
        echo "Failed";
    }
?>
