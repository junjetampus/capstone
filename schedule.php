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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Schedule - <?php echo $_SESSION['user'];?></title>
</head>

<body style="background: #D9D9D9">
<div style="width: 0px; height:0px; position: absolute; left:0px">

<!-- green -->    
<div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
  <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 10px; position: absolute; background: white; border-radius: 50px"></a>
  <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
  <div class="admin" style="position: relative; top: 10px; left: 680px; display: flex;">
    <img src="admin_avatar.png" alt="" style="height: 40px; width: 40px; postion: absolute; background: white; border-radius: 50px">
    <div style="color: white; position: absolute; left: 55px; top: 8px; font-family: sans-serif; font-size: 20px"><?php echo $_SESSION['user'];?></div>
  </div>


  <label for="" style="width: 700px; position: absolute; top: 120px; left: 580px; font-family: sans-serif; font-size: 36px; font-weight: bold; color: #3A6050;">Schedule of Payments</label>


  <a href="payment1_record7.php">
  <div style="width: 309px; height: 157px; left: 390px; top: 156px; position: absolute">
    <button style="border: none; cursor:pointer; width: 305px; height: 157px; left: 1px; top: 130px; position: absolute; background: #3A6050; border-radius: 10px">
    <div style="width: 309px; height: 49px; left: 0px; top: 50px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">WEEKLY</div>
    <div style="width: 305px; height: 30px; color: white; background: #6FA15F; position: relative; left: -6px; top: 70px; border-radius: 0px 0px 10px 10px;"><span style="font-size: 20px; position: relative; top: 4px; font-family: sans-serif">Click Button</span></div>
    </button>
  </div>
  </a>


  <a href="payment1_30.php">
  <div style="width: 305px; height: 164px; left: 830px; top: 156px; position: absolute">
    <button style="border: none; cursor: pointer; width: 305px; height: 164px; left: 0px; top: 130px; position: absolute; background: #3A6050; border-radius: 10px">
    <div style="width: 500px; height: 104px; left: -95px; top: 50px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">MONTHLY</div>
    <div style="width: 305px; height: 30px; color: white; background: #6FA15F; position: relative; left: -6px; top: 70px; border-radius: 0px 0px 10px 10px;"><span style="font-size: 20px; position: relative; top: 4px; font-family: sans-serif">Click Button</span></div>
    </button>
  </div>
  </a>


  <!-- LOG OUT -->
  <a href="logout.php">
   <!-- <button> <img style="width: 42px; height: 42px; left: 1453px; top: 9px; position: absolute; border-radius: 50px" src="logoutpic.jpg" /></button> -->
   <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 11px; position: absolute;"></i>
  </a>
  
</div>
</body>
</html>