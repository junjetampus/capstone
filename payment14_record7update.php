<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Update 14th Payment Record</title>

    <?php
    require_once "db_connect.php";
    // session_start();
    $catID = $_GET['id']; 

    $sqlQuery = "SELECT * from record7 where id = $catID ";
    $res3 = $con->query($sqlQuery);

    $row3 = $res3->fetch_assoc();

    if($_POST) {
        var_dump($_POST);
        $Batch = $_POST['batch'];
        $Name = $_POST['name'];
        $Day1 = $_POST['day1'];
        $Day2 = $_POST['day2'];
        $Day3 = $_POST['day3'];
        $Day4 = $_POST['day4'];
        $Day5 = $_POST['day5'];
        $Day6 = $_POST['day6'];
        $Day7 = $_POST['day7'];
        
        
        $sqlQuery = "update record7 set batch = '$Batch', name = '$Name', day1 = '$Day1', day2 = '$Day2', day3 = '$Day3', day4 = '$Day4', day5 = '$Day5', day6 = '$Day6', day7 = '$Day7' where id = $catID ";
        $res3 = $con->query($sqlQuery);

        if($res3)
        echo '<script language="javascript">';
        echo 'alert("Details Successfully Updated"); location.href="payment14_record7.php"';
        echo '</script>';
    }
    ?>
</head>
<body style="background: #D9D9D9">

<div style="width: 1374px; height: 659px; position: relative">
  <div style="width: 1374px; height: 659px; left: 0px; top: 0px; position: absolute">
  <!-- background -->
    <!-- <div style="width: 1529px; height: 695px; left: -8px; top: -8px; position: absolute; background: #D9D9D9; border: 0.50px black solid"></div> -->
    <!-- green -->
    <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
  <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
  <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
 
    <div style="left: 580px; top: 95px; position: absolute; text-align: center; color: #3A6050; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">Update 14th PAYMENT</div>
  </div>

  <a href="login.php"><i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i></a>
</div>

<div style=" height: 300px; width: 900px; position: absolute; bottom: 150px; left: 280px">
        <form class="w3-container" method="POST">
      
        <div style=""><br>
        <div style="position: relative; left: 110px; font-size: 20px"><b>Batch #</b>
          <input name="batch" id="firstSelect" style="position: relative; left: 0px; width: 220px; height: 40px" value="<?php echo $row3['batch']?>" readonly>
              
          <div style="font-size: 20px; position: relative; bottom: 40px; left: 420px">
          <label for="name" style="font-size: 20px">Name :</label>
          <input name="name" id="secondSelect" style="height: 40px; width: 220px" value="<?php echo $row3['name']?>" readonly>
          </div>

          <div>
              <div style="position:relative; left: 75px">
                  <label for="day1">Day 1</label>
                  <select name="day1" id="" style="height: 40px; width: 120px; text-align:center" >
                    <option value="---" <?php if ($row3['day1'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day1'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day2">Day 2</label>
                  <select name="day2" id="" style="height: 40px; width: 120px; text-align:center">
                    <option value="---" <?php if ($row3['day2'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day2'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day3">Day 3</label>
                  <select name="day3" id="" style="height: 40px; width: 120px; text-align:center">
                  <option value="---" <?php if ($row3['day3'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day3'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  </select><br><br>
                  <label for="day4">Day 4</label>
                  <select name="day4" id="" style="height: 40px; width: 120px; text-align:center">
                  <option value="---" <?php if ($row3['day4'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day4'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day5">Day 5</label>
                  <select name="day5" id="" style="height: 40px; width: 120px; text-align:center">
                  <option value="---" <?php if ($row3['day5'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day5'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day6">Day 6</label>
                  <select name="day6" id="" style="height: 40px; width: 120px; text-align:center">
                  <option value="---" <?php if ($row3['day6'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day6'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select> <br><br>
                  <div style="position: relative; left: 160px" >
                     <label for="day7">Day 7</label>
                      <select name="day7" id="" style="height: 40px; width: 120px; text-align:center">
                      <option value="---" <?php if ($row3['day7'] === '---') echo 'selected'; ?>>UNPAID</option>
                        <option value="PAID" <?php if ($row3['day7'] === 'PAID') echo 'selected'; ?>>PAID</option>
                      </select>
                  </div>
          </div>
                  
        </div>
        <br>
        <center style="position: relative; right:80px" >
          <button type="submit" class="btn btn-success" style=" width: 100px; height: 50px"><b>SAVE</b></button>
          <a href="payment14_record7.php" style="width: 100px; height: 50px" class="btn btn-danger" ><b style="position: relative; top: 7px" >CANCEL</b></a>
        </center>
        </form>     
      </div>

    </div>
</body>
</html>


