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
    <title>Update 12th Payment Record</title>

    <style>
        select {
            height: 40px;
            width: 150px;
            text-align: center;
        }
    </style>

    <?php
    require_once "db_connect.php";
    // session_start();
    $catID = $_GET['id']; 

    $sqlQuery = "SELECT * from records1 where id = $catID ";
    $res3 = $con->query($sqlQuery);

    $row3 = $res3->fetch_assoc();

    if($_POST) {
        var_dump($_POST);
        $Batch = $_POST['code'];
        $Name = $_POST['name'];
        $Day1 = $_POST['day1'];
        $Day2 = $_POST['day2'];
        $Day3 = $_POST['day3'];
        $Day4 = $_POST['day4'];
        $Day5 = $_POST['day5'];
        $Day6 = $_POST['day6'];
        $Day7 = $_POST['day7'];
        $Day8 = $_POST['day8'];
        $Day9 = $_POST['day9'];
        $Day10 = $_POST['day10'];
        $Day11 = $_POST['day11'];
        $Day12 = $_POST['day12'];
        $Day13 = $_POST['day13'];
        $Day14 = $_POST['day14'];
        $Day15 = $_POST['day15'];
        $Day16 = $_POST['day16'];
        $Day17 = $_POST['day17'];
        $Day18 = $_POST['day18'];
        $Day19 = $_POST['day19'];
        $Day20 = $_POST['day20'];
        $Day21 = $_POST['day21'];
        $Day22 = $_POST['day22'];
        $Day23 = $_POST['day23'];
        $Day24 = $_POST['day24'];
        $Day25 = $_POST['day25'];
        $Day26 = $_POST['day26'];
        $Day27 = $_POST['day27'];
        $Day28 = $_POST['day28'];
        $Day29 = $_POST['day29'];
        $Day30 = $_POST['day30'];
        
        
        $sqlQuery = "update records1 set code = '$Batch', name = '$Name', day1 = '$Day1', day2 = '$Day2', day3 = '$Day3', day4 = '$Day4', day5 = '$Day5', day6 = '$Day6', day7 = '$Day7', day8 = '$Day8', day9 = '$Day9', day10 = '$Day10', day11 = '$Day11', day12 = '$Day13', day13 = '$Day13', day14 = '$Day14', day15 = '$Day15', day16 = '$Day16', day17 = '$Day17', day18 = '$Day18', day19 = '$Day19', day20 = '$Day20', day21 = '$Day21', day22 = '$Day22', day23 = '$Day23', day24 = '$Day24', day25 = '$Day25', day26 = '$Day26', day27 = '$Day27', day28 = '$Day28', day29 = '$Day29', day30 = '$Day30' where id = $catID ";
        $res3 = $con->query($sqlQuery);

        if($res3)
        echo '<script language="javascript">';
        echo 'alert("Details Successfully Updated"); location.href="payment12_30.php"';
        echo '</script>';
    }
    ?>
</head>
<body style="background: #D9D9D9">

<div style="width: 1374px; height: 659px; position: relative">
  <div style="width: 1374px; height: 659px; left: 0px; top: 0px; position: absolute">
  <!-- background -->
    <!-- <div style="width: 1529px; height: 755px; left: -8px; top: -8px; position: absolute; background: #D9D9D9; border: 0.50px black solid"></div> -->
    <!-- green -->
    <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
  <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
  <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
  
    <div style="left: 580px; top: 95px; position: absolute; text-align: center; color: #3A6050; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">Update 12th PAYMENT</div>
  </div>

  <a href="login.php"><i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i></a>
</div>

<div style=" height: 300px; width: 1200px; position: absolute; bottom: 230px; left: 280px">
        <form class="w3-container" method="POST">
      
        <div style=""><br>
        <div style="position: relative; left: 110px; font-size: 20px"><b>Batch #</b>
          <input name="code" id="firstSelect" style="position: relative; left: 0px; width: 220px; height: 40px" value="<?php echo $row3['code']?>" readonly>
              
          <div style="font-size: 20px; position: relative; bottom: 40px; left: 420px">
          <label for="name" style="font-size: 20px">Name :</label>
          <input name="name" id="secondSelect" style="height: 40px; width: 220px" value="<?php echo $row3['name']?>" readonly>
          </div>

          <div style="position:relative; right: 170px">
              
              <label for="day1">Day 1</label>
                  <select name="day1" id="">
                    <option value="---" <?php if ($row3['day1'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day1'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day2">Day 2</label>
                  <select name="day2" id="">
                    <option value="---" <?php if ($row3['day2'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day2'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day3">Day 3</label>
                  <select name="day3" id="">
                    <option value="---" <?php if ($row3['day3'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day3'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day4">Day 4</label>
                  <select name="day4" id="">
                    <option value="---" <?php if ($row3['day4'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day4'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day5">Day 5</label>
                  <select name="day5" id="">
                    <option value="---" <?php if ($row3['day5'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day5'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <br><br><label for="day6">Day 6</label>
                  <select name="day6" id="">
                    <option value="---" <?php if ($row3['day6'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day6'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day7">Day 7</label>
                  <select name="day7" id="">
                    <option value="---" <?php if ($row3['day7'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day7'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day8">Day 8</label>
                  <select name="day8" id="">
                    <option value="---" <?php if ($row3['day8'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day8'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day9">Day 9</label>
                  <select name="day9" id="">
                    <option value="---" <?php if ($row3['day9'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day9'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day10">Day 10</label>
                  <select name="day10" id="">
                    <option value="---" <?php if ($row3['day10'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day10'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select><br>
            <div style="position: relative; right: 38px">
                <br><label for="day11">Day 11</label>
                  <select name="day11" id="">
                    <option value="---" <?php if ($row3['day11'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day11'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day12">Day 12</label>
                  <select name="day12" id="">
                    <option value="---" <?php if ($row3['day12'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day12'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day13">Day 13</label>
                  <select name="day13" id="">
                    <option value="---" <?php if ($row3['day13'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day13'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day14">Day 14</label>
                  <select name="day14" id="">
                    <option value="---" <?php if ($row3['day14'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day14'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day15">Day 15</label>
                  <select name="day15" id="">
                  <option value="---" <?php if ($row3['day15'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day15'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <br><br><label for="day16">Day 16</label>
                  <select name="day16" id="">
                  <option value="---" <?php if ($row3['day16'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day16'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day17">Day 17</label>
                  <select name="day17" id="">
                  <option value="---" <?php if ($row3['day17'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day17'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day18">Day 18</label>
                  <select name="day18" id="">
                  <option value="---" <?php if ($row3['day18'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day18'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day19">Day 19</label>
                  <select name="day19" id="">
                  <option value="---" <?php if ($row3['day19'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day19'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day20">Day 20</label>
                  <select name="day20" id="">
                    <option value="---" <?php if ($row3['day20'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day20'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <br><br><label for="day21">Day 21</label>
                  <select name="day21" id="">
                    <option value="---" <?php if ($row3['day21'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day21'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day22">Day 22</label>
                  <select name="day22" id="">
                    <option value="---" <?php if ($row3['day22'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day22'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day23">Day 23</label>
                  <select name="day23" id="">
                  <option value="---" <?php if ($row3['day23'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day23'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day24">Day 24</label>
                  <select name="day24" id="">
                  <option value="---" <?php if ($row3['day24'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day24'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day25">Day 25</label>
                  <select name="day25" id="">
                    <option value="---" <?php if ($row3['day25'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day25'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <br><br></b><label for="day26">Day 26</label>
                  <select name="day26" id="">
                  <option value="---" <?php if ($row3['day26'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day26'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day27">Day 27</label>
                  <select name="day27" id="">
                  <option value="---" <?php if ($row3['day27'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day27'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day28">Day 28</label>
                  <select name="day28" id="">
                  <option value="---" <?php if ($row3['day28'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day28'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day29">Day 29</label>
                  <select name="day29" id="">
                    <option value="---" <?php if ($row3['day29'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day29'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
                  <label for="day30">Day 30</label>
                  <select name="day30" id="">
                    option value="---" <?php if ($row3['day30'] === '---') echo 'selected'; ?>>UNPAID</option>
                    <option value="PAID" <?php if ($row3['day30'] === 'PAID') echo 'selected'; ?>>PAID</option>
                  </select>
            </div>
          </div>
                  
        </div>
        <br>
        <center style="position: relative; right:80px" >
          <button type="submit" class="btn btn-success" style=" width: 100px; height: 50px"><b>SAVE</b></button>
          <a href="payment12_30.php" style="width: 100px; height: 50px" class="btn btn-danger" ><b style="position: relative; top: 7px" >CANCEL</b></a>
        </center>
        </form>     
      </div>

    </div>
</body>
</html>


