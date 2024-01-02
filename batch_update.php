<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Batch</title>

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
            background-color: #3A6050;
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
    // session_start();
    $catID = $_GET['id']; 

    $sqlQuery = "SELECT * from batch where id = $catID ";
    $res = $con->query($sqlQuery);

    $row2 = $res->fetch_assoc();

    if($_POST) {
        var_dump($_POST);
        $Batch = $_POST['batch'];
        $Daily = $_POST['daily'];
        $Amount = $_POST['amount'];
        $Date = $_POST['date'];
        
        $sqlQuery = "update batch set batch = '$Batch', daily = '$Daily', amount = '$Amount', date = '$Date' where id = $catID ";
        $res = $con->query($sqlQuery);

        if($res)
            header("Location: batch.php");
    }
?>


</head>
<body>
<div style="width: 1374px; height: 660px; position: relative">
  <div style="width: 1374px; height: 660px; left: 0px; top: 0px; position: absolute">
    <div style="width: 1374px; height: 660px; left: 0px; top: 0px; position: absolute">
    <!-- background -->
      <div style="width: 1525.5px; height: 682px; left: -8px; top: -8px; position: absolute; background: #D9D9D9; border: 0.50px black solid"></div>
      <!-- green -->
      <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
      <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
      <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
      <div class="admin" style="position: relative; top: 13px; left: 680px; display: flex;">
        
  </div>
    </div>
    <div style="left: 650px; top: 106px; position: absolute; text-align: center; color: #3A6050; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">UPDATE BATCH </div>
    <div style="width: 933px; height: 398px; left: 437px; top: 182px; position: absolute; background: #D9D9D9; border-radius: 0px; border: none">
    <div class="tables-scroll">
      <table>
        <tr>
          <th>Code</th>
          <th>Date</th>
          <th>Daily</th>
          <th>Amount</th>
          <th>Action</th>
        </tr>

        <?php
                    $sqlQuery = "SELECT * FROM batch";
                    $res = $con->query($sqlQuery);
                    while($row =mysqli_fetch_object($res)){
                    ?>
                    
                        <tr>
                            <td><?php echo $row->batch?></td>
                            <td><?php echo $row->daily?></td>
                            <td><?php echo $row->amount?></td>
                            <td><?php echo $row->date?></td>
                            
                            <td>
                                <!-- <a href="batch_update.php?id=<?php echo $row->id?>"><button class="btn btn-primary">Update</button></a> -->
                                <a href="batch_delete.php?id=<?php echo $row->id?>" ><button style="background-color:red; height: 36px; width: 80px; position: relative; top: 3px; border-radius: 3px; color:white; margin-bottom: 5px;">Delete</button></a>
                            </td>
                        </tr>
                    
                    <?php
                    }   
                    ?>
      </table>
    </div>
    </div>

    <!-- <img style="width: 42px; height: 42px; left: 1433px; top: 8px; position: absolute; border-radius: 50px" src="logoutpic.jpg" /> -->
    <a href="logout.php">
      <button> <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i></button>
    </a>


  </div>
  <div style="width: 264px; height: 398px; left: 161px; top: 182px; position: absolute; background: #3A6050; border-radius: 10px; border: 1px black solid">
    <form action="" method="POST">

      <!-- Batch Code -->
      <div style="left: 50px; top: 20px; position: absolute">
        <div style="width: 200px; left: -45px; top: -5px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">Batch Code</div>
        <input value="<?php echo $row2['batch']?>" type="text" name="batch" style="width: 162px; height: 40px; left: 0px; top: 22px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none">
      </div>

      <!-- Daily -->
        <div style="left: 50px; top: 108px; position: absolute">
          <div style="left: 0px; top: -20px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">Daily</div>
          <input value="<?php echo $row2['daily']?>" type="text" name="daily"  style="width: 162px; height: 40px; left: 0px; top: 10px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none">
        </div>

        <!-- Amount -->
        <div style="left: 50px; top: 110px; position: absolute">
          <div style="left: 0px; top: 50px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">Amount</div>
          <input value="<?php echo $row2['amount']?>" type="text" name="amount"  style="width: 162px; height: 40px; left: 0px; top: 79px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none">
        </div>

        <!-- Date -->
        <div style="left: 50px; top: 235px; position: relative">
          <div style="left: 0px; top: -5px; position: absolute; text-align: center; color: white; font-size: 20px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">Date</div>
          <input value="<?php echo $row2['date']?>" type="date" name="date" style="width: 162px; height: 40px; left: 0px; top: 24px; position: absolute; background: #D9D9D9; border-radius: 10px; border: none">
        </div> 
        
        <div style="left: 50px; top: 319px; position: absolute">
          <button type="submit" style="width: 161px; height: 56px; left: 0px; top: 0px; position: absolute; background: #304229; border-radius: 10px; border: none">
            <div style="left: 16px; top: 5px; position: absolute; text-align: center; color: white; font-size: 30px; font-family: sans-serif; font-weight: bold; word-wrap: break-word;">UPDATE</div>
          </button>   
        </div>

    </form>
  </div>
</div>
</body>
</html>