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
    <title>Home - <?php echo $_SESSION['user'];?></title>
    
</head>
<body style="background: #D9D9D9 ">
<div style="width: 0px; height: 0px; position: relative; left:-5px">


<!-- green -->
  <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
  <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 10px; position: absolute; background: white; border-radius: 50px"></a>
  <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
  <div class="admin" style="position: relative; top: 10px; left: 680px; display: flex;">
    <img src="admin_avatar.png" alt="" style="height: 40px; width: 40px; postion: absolute; background: white; border-radius: 50px">
    <div style="color: white; position: absolute; left: 55px; top: 8px; font-family: sans-serif; font-size: 20px"><?php echo $_SESSION['user'];?></div>
  </div>

  <a href="list.php">
  <div style="width: 305px; height: 164px; left: 804px; top: 402px; position: absolute">
    <button style="border: none; cursor: pointer; width: 305px; height: 164px; left: 0px; top: 0px; position: absolute; background: #3A6050; border-radius: 10px">
    <div style="width: 276.41px; height: 138.27px; left: 15px; top: 53px; position: absolute; text-align: center; color: white; font-size: 40px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">LIST</div>
    <div style="width: 305px; height: 30px; color: white; background: #6FA15F; position: relative; left: -6px; top: 70px; border-radius: 0px 0px 10px 10px;"><span style="font-size: 20px; position: relative; top: 4px; font-family: sans-serif">Click Button</span></div>
    </button>
  </div>
  </a>

  <a href="batch.php">
  <div style="width: 305px; height: 164px; left: 370px; top: 402px; position: absolute">
    <button style="border: none; cursor: pointer; width: 305px; height: 164px; left: 0px; top: 0px; position: absolute; background: #3A6050; border-radius: 10px">
    <div style="width: 233px; height: 104px; left: 37px; top: 53px; position: absolute; text-align: center; color: white; font-size: 40px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">BATCH</div>
    <div style="width: 305px; height: 30px; color: white; background: #6FA15F; position: relative; left: -6px; top: 70px; border-radius: 0px 0px 10px 10px;"><span style="font-size: 20px; position: relative; top: 4px; font-family: sans-serif">Click Button</span></div>
    </button>  
  </div>
  </a>
  
  <a href="members_data.php">
  <div style="width: 305px; height: 164px; left: 370px; top: 156px; position: absolute">
    <button style="border: none; cursor: pointer; width: 305px; height: 157px; left: 0px; top: 0px; position: absolute; background: #3A6050; border-radius: 10px">
    <div style="width: 309px; height: 49px; left: 0px; top: 53px; position: absolute; text-align: center; color: white; font-size: 40px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">MEMBERS</div>
    <div style="width: 305px; height: 30px; color: white; background: #6FA15F; position: relative; left: -6px; top: 70px; border-radius: 0px 0px 10px 10px;"><span style="font-size: 20px; position: relative; top: 4px; font-family: sans-serif">Click Button</span></div>
    </button>
  </div>
  </a>

  <a href="schedule.php">
  <div style="width: 305px; height: 164px; left: 804px; top: 156px; position: absolute">
    <button style="border: none; cursor: pointer; width: 305px; height: 164px; left: 0px; top: 0px; position: absolute; background: #3A6050; border-radius: 10px">
    <div style="width: 276.41px; height: 104px; left: 15px; top: 53px; position: absolute; text-align: center; color: white; font-size: 40px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">PAYMENTS</div>
    <div style="width: 305px; height: 30px; color: white; background: #6FA15F; position: relative; left: -6px; top: 70px; border-radius: 0px 0px 10px 10px;"><span style="font-size: 20px; position: relative; top: 4px; font-family: sans-serif">Click Button</span></div>
    </button>
  </div>
  </a>

 

  <a href="logout.php">
    <button> <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 10px; position: absolute;"></i></button>
  </a>
</div>
</body>
</html>