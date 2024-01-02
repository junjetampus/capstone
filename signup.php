<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>SIGNUP</title>
</head>

<?php
    require_once "db_connect.php";
    if($_GET){
        
        $User = $_GET['user'];
        $Pass = $_GET['pass'];
        $Pass2 = $_GET['pass2'];

        if ($Pass !== $Pass2) {
            echo '<script>alert("Passwords do not match!");</script>';
            // header('location: signup.php'); // Redirect back to signup page if passwords don't match
        } else {
            $sql = "insert into signup (user, pass, pass2) values ('$User', '$Pass', '$Pass2')";
            $result = $con->query($sql);

            if($result) {
                echo '<script>alert("Successfully Signup");</script>';
                header('location: login.php'); // Redirect to login page after successful signup
            } else {
                header('location: signup.php'); // Redirect back to signup page if signup fails for any reason
            }
        }
    }
?>



<body>
<div style="width: 1280px; height: 600px; position: relative">
  <div style="width: 1374px; height: 659px; left: 0px; top: 0px; position: absolute; background: #D9D9D9"></div>
  <!-- background-image -->
  <img style="width: 1519.5px; height: 687.5px; left: -10px; top: -8px; position: absolute" src="background.jpg" />
  
  <div style="width: 528px; height: 226px; left: 238px; top: 265px; position: absolute">
  <!-- epal image -->
    <img src="epal_logo.png" alt="" style="border-radius: 20px; height: 440px; width: 670px; position: absolute; top: -130px; left:12px">
  </div>

  <div style="width: 359.30px; height: 376.99px; left:920px; top: 147px; position: absolute">
    <div style="width: 359.30px; height: 376.99px; left: 0px; top: 0px; position: absolute">

      <form action="" method="GET">
        <!-- background color gray sa login -->
      <div style="width: 370px; height: 438px; left: -25px; top: -10px; position: absolute; background: #D9D9D9; border-radius: 10px;"></div>  
      
      <div style="width: 167px; height: 36px; left: -25px; top: 30px; position: absolute; text-align: center; color: #3A6050; font-size: 25px; font-family: sans-serif; font-weight: 400; word-wrap: break-word">Username</div>
      <div style="position: relative; width: 359.30px; left: 27.71px; top: 60px;">
        <input type="text" name="user" placeholder="Username" class="form-control" style="font-size: 15px; width: 67%; height: 45.36px; background: white; border-radius: 20px; padding-left: 60px; border: none; position: relative; right: 25px;" required>
        <i class="fa fa-user" style="position: absolute; left: -5px; top: 15px; font-size: 24px;"></i>
      </div>

      
      <div style="width: 164px; height: 36px; left: -25px; top: 115px; position: absolute; text-align: center; color: #3A6050; font-size: 25px; font-family: sans-serif; font-weight: 400; word-wrap: break-word">Password</div>
      <div style="position: relative; width: 359.30px; left: 27.71px; top: 95px;">
        <input type="password" name="pass" placeholder="Password" class="form-control" style="font-size: 15px; width: 67%; height: 45.36px; background: white; border-radius: 20px; padding-left: 60px; border: none; position: relative; right: 25px;" required>
        <i class="fa fa-key" style="position: absolute; left: -5px; top: 15px; font-size: 24px;"></i>
      </div>

      <div style="width: 300px; height: 36px; left: -38px; top: 200px; position: absolute; text-align: center; color: #3A6050; font-size: 25px; font-family: sans-serif; font-weight: 400; word-wrap: break-word">Re-enter Password</div>
      <div style="position: relative; width: 359.30px; left: 27.71px; top: 135px;">
        <input type="password" name="pass2" placeholder="Re-Password" class="form-control" style="font-size: 15px; width: 67%; height: 45.36px; background: white; border-radius: 20px; padding-left: 60px; border: none; position: relative; right: 25px;" required>
        <i class="fa fa-key" style="position: absolute; left: -5px; top: 15px; font-size: 24px;"></i>
      </div>
    </div>
    
    <button type="submit" style="cursor: pointer; width: 301.89px; height: 47.36px; left: 7px; top: 300px; position: absolute; background: #3A6050; border-radius: 20px; border: none">
      <div style=" position: relative; left: 70px; width: 150px; height: 27px; font-family: Zilla Slab;  color: white; font-size: 28px; font-weight: bold; word-wrap: break-word; font-family: sans-serif; ">SIGNUP</div>
    </button>
    <div class="or" style="left: 9px; top: 360px; position: absolute; color: #3A6050; font-weight: bold;" >------------------------- or -------------------------</div>
      </form>
    
      <div class="signup" style="left: 25px; top: 390px; position: absolute; color: #3A6050; font-family: sans-serif ">Already have an account? <a href="login.php" style="color: #3A6050">Login here</a></div>

  </div>
</div>
</body>
</html>