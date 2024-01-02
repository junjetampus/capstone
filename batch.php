<?php 
session_start();
if(!isset($_SESSION['user'])) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Batch - <?php echo $_SESSION['user'];?></title>

    <style>
      .tables-scroll table, th, td, tr {
        border: 1px solid gray;
        border-collapse: collapse;
        font-size: 15px;
        margin-top: 0px;
        margin-left: 1px;
        text-align: center;
        padding: 2px;  
      }

      table td {
            background-color: white;
            
        }
        table th {
            background: #3A6050;
            color: white;
        }

        .tables-scroll {
            /* overflow-y: scroll; */
            height: 397px;
            width: 930px;
            position: relative;
            top: -30px;
            margin-top: 30px;
        }

        .tables-scroll table {
            width: 910px;
        }

        table tr {
          height: 30px;
        }
    </style>

<?php
require_once "db_connect.php";

if ($_GET) {
    $Batch = $_GET['batch'];
    $Daily = $_GET['daily'];
    $Amount = $_GET['amount'];
    $Date = $_GET['date'];

    // Check the current count of records in the 'batch' table
    $countSql = "SELECT COUNT(*) FROM batch";
    $countResult = $con->query($countSql);

    if ($countResult) {
        $currentCount = $countResult->fetch_row()[0];

        if ($currentCount >= 5) {
            // If there are already 5 records, show an alert and prevent insertion
            echo '<script language="javascript">';
            echo 'alert("You have already inserted the maximum of 5 batch."); location.href="batch.php"';
            echo '</script>';
        } else {
            // If less than 5 records, proceed with insertion
            $sql = "INSERT INTO batch (batch, daily, amount, date) VALUES ('$Batch', '$Daily', '$Amount', '$Date')";
            $insertResult = $con->query($sql);

            if ($insertResult) {
                echo '<script language="javascript">';
                echo 'alert("Details Successfully Inserted"); location.href="batch.php"';
                echo '</script>';
            } else {
                echo "Failed to insert data.";
            }
        }
    } else {
        echo "Error counting records.";
    }
}
?>



</head>
<body>

<div style="width: 0px; height: 0px; position: relative">
  <div style="width: 1374px; height: 650px; left: 0px; top: 0px; position: absolute">
    <div style="width: 1374px; height: 650px; left: 0px; top: 0px; position: absolute">
    <!-- background -->
      <div style="width: 1526px; height: 696px; left: -8px; top: -8px; position: absolute; background: #D9D9D9; border: none"></div>
      <!-- green -->
      <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
      <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
      <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
      <div class="admin" style="position: relative; top: 13px; left: 680px; display: flex;">
        <img src="admin_avatar.png" alt="" style="height: 40px; width: 40px; postion: absolute; background: white; border-radius: 50px">
        <div style="color: white; position: absolute; left: 55px; top: 8px; font-family: sans-serif; font-size: 20px"><?php echo $_SESSION['user'];?></div>
      </div>
      </div>
    </div>
    <!-- BATCH -->
    <div style="left: 700px; top: 106px; position: absolute; text-align: center; color: #3A6050; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">BATCH </div>
    <div style="width: 933px; height: 398px; left: 437px; top: 182px; position: absolute; background: #D9D9D9; border-radius: 0px; border: none">
    <div class="tables-scroll">
      <table>
        <tr>
          <th>Code</th>
          <th>Daily</th>
          <th>Payout</th>
          <th>Date</th>
          <th>Action</th>
        </tr>

        <?php
                    $sqlQuery = "SELECT * FROM batch";
                    $res = $con->query($sqlQuery);
                    while($row =mysqli_fetch_object($res)){
                    ?>
                    
                        <tr>
                            <td><?php echo $row->batch?></td>
                            <td>₱<?php echo $row->daily?></td>
                            <td>₱<?php echo $row->amount?></td>
                            <td><?php echo $row->date?></td>
                            <td>
                                <a href="batch_update.php?id=<?php echo $row->id?>" ><button class="btn btn-primary" style="background: ">Update</button></a>
                                <a href="#" onclick="return confirmDelete(<?php echo $row->id ?>)"><button style="background-color:red; height: 36px; width: 80px; position: relative; top: 3px; border-radius: 3px; color:white">Delete</button></a>
                            </td>
                        </tr>
                    
                    <?php
                    }   
                    ?>
      </table>
                        <script>
                            function confirmDelete(id) {
                                if (confirm("If you 'OK' this details will be surely deleted.")) {
                                    // If the user confirms, redirect to the delete URL
                                    window.location.href = "batch_delete.php?id=" + id;
                                } else {
                                    // If the user cancels, do nothing
                                    return false;
                                }
                            }
                        </script>
    </div>
    </div>

  

  </div>

  
  <div style="width: 264px; height: 398px; left: 161px; top: 182px; position: absolute; background: #3A6050; border-radius: 10px; border: none">
    <form action="" method="GET">

      <!-- Batch Code -->
      <div style="left: 50px; top: 20px; position: absolute">
        <div style="width: 200px; left: -73px; top: -5px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: 700; word-wrap: break-word">Code</div>
        <input type="text" name="batch" style="width: 162px; height: 40px; left: 0px; top: 24px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none" required>
      </div>

      <!-- Daily -->
        <div style="left: 50px; top: 108px; position: absolute">
          <div style="left: 0px; top: -20px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: 700; word-wrap: break-word">Daily</div>
          <input type="text" name="daily"  style="width: 162px; height: 40px; left: 0px; top: 10px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none" required>
        </div>

        <!-- Amount -->
        <div style="left: 50px; top: 110px; position: absolute">
          <div style="left: 0px; top: 50px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: 700; word-wrap: break-word">Amount</div>
          <input type="text" name="amount"  style="width: 162px; height: 40px; left: 0px; top: 79px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none" required>
        </div>

        <!-- Date -->
        <div style="left: 50px; top: 235px; position: relative">
          <div style="left: 0px; top: -5px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: 700; word-wrap: break-word">Date</div>
          <input type="date" name="date" style="width: 162px; height: 40px; left: 0px; top: 24px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none" required>
        </div> 
        
        <div style="left: 50px; top: 319px; position: absolute">
          <button type="submit" style="width: 161px; height: 56px; left: 0px; top: 0px; position: absolute; background: #304229; border-radius: 20px; border: none;">
            <div style="left: 45px; top: 6px; position: absolute; text-align: center; color: white; font-size: 32px; font-family: sans-serif; font-weight: 700; word-wrap: break-word">ADD</div>
          </button>   
        </div>

    </form>
  </div>


  <!-- LOG OUT -->
  <a href="logout.php">
      <!-- <img style="width: 42px; height: 40px; left: 1449px; top: 13px; position: absolute; border-radius: 50px" src="logoutpic.jpg" /> -->
      <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i>
    </a>
</div>
</body>
</html>

