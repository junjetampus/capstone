<?php
    require_once "db_connect.php";
    $delete_id = $_GET['id'];

    $sql = "delete from batch where id = $delete_id";
    $result = $con->query($sql);

    if($result) {
        
        echo '<script language="javascript">';
                echo 'alert("Details Successfully Deleted"); location.href="batch.php"';
                echo '</script>';
    }
    else
    {
        echo "Failed";
    }
?>
