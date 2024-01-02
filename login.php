<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <title>LOGIN</title>
</head>

<?php 
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        require_once "db_connect.php";
        $username = $_POST['user'];
        $password = $_POST['pass'];
        

        $sql = "SELECT * FROM signup WHERE user = '$username' && pass = '$password' ";

        $result= mysqli_query($con,$sql);
        

        if($result) {
            $num=mysqli_num_rows($result);

            if($num>0) {
                $_SESSION['user']=$username;
                echo '<script language="javascript">';
                echo 'alert("Login Successfully"); location.href="home.php"';
                echo '</script>';
            }
            else {
              echo "<script>alert('This Account is Invalid')</script>";
        }
        }
        else {
          echo "<script>alert('This Account is Invalid')</script>";
    }
}
?>

<body>
  
<!-- <div style="width: 1374px; height: 659px; position: relative"> -->
<div style="width: 1280px; height: 600px; position: relative">
  <div style="width: 1374px; height: 659px; left: 0px; top: 0px; position: absolute; background: #D9D9D9"></div>
  <!-- image background -->
  <img class="image-background" style="width: 1519.5px; height: 687.5px; left: -10px; top: -8px; position: absolute" src="background.jpg" />
  
  <div style="width: 528px; height: 226px; left: 238px; top: 265px; position: absolute">
    <!-- picture nga epal -->
    <img src="epal_logo.png" alt="" style="border-radius: 20px; height: 392px; width: 650px; position: absolute; top: -120px; left:5px">
  </div>


  <div style="width: 359.30px; height: 376.99px; left:920px; top: 147px; position: absolute">

    <div style="width: 359.30px; height: 376.99px; left: 0px; top: 0px; position: absolute">
      <form action="login.php" method="POST">
        <!-- background nga gray sa login -->
      <div style="width: 370px; height: 390px; left: -50px; top: 0px; position: absolute; background: #D9D9D9; border-radius: 10px;"></div>  
      
      <div style="width: 167px; height: 36px; left: -35px; top: 45px; position: absolute; text-align: center; color: #3A6050; font-size: 25px; font-family: sans-serif; font-weight: 400; word-wrap: break-word">Username</div>
      <div style="position: relative; width: 359.30px; left: 27.71px; top: 75px;">
      
      <!-- input username -->
        <input type="text" name="user" placeholder="Username" class="form-control" style="font-size: 15px; width: 67%; height: 45.36px; background: white; border-radius: 20px; padding-left: 60px; position: relative; right: 45px; border: none" required>
        <i class="fa fa-user" style="position: absolute; left: -25px; top: 15px; font-size: 24px;"></i>
      </div>

      <div style="width: 164px; height: 36px; left: -35px; top: 135px; position: absolute; text-align: center; color: #3A6050; font-size: 25px; font-family: sans-serif; font-weight: 400; word-wrap: break-word">Password</div>
      <div style="position: relative; width: 359.30px; left: 27.71px; top: 115px;">
      
      <!-- input sa password -->
        <input type="password" name="pass" placeholder="Password" class="form-control" style="font-size: 15px; width: 67%; height: 45.36px; background: white; border-radius: 20px; padding-left: 60px; position: relative; right: 45px; border: none" required>
        <i class="fa fa-key" style="position: absolute; left: -25px; top: 15px; font-size: 24px;"></i>
      </div>
    </div>
    <!-- button sa login -->
    <button type="submit" style="cursor: pointer; width: 295px; height: 47.36px; left: -10px; top: 245px; position: absolute; background: #3A6050; border-radius: 20px; border: none">
      <div style="position: relative; left: 100px; width: 99px; height: 27px; font-family: Zilla Slab;  color: #D9D9D9; font-size: 28px; font-weight: bold; word-wrap: break-word; font-family: sans-serif; ">LOGIN</div>
    </button>
    <div class="or" style="left: -10px; top: 305px; position: absolute; color: #3A6050; font-weight: bold;" >------------------------- or -------------------------</div>
      </form>

      <div class="signup" style="left: 0px; top: 340px; position: absolute; color: #3A6050; font-family: sans-serif ">Do you have an Account? <a href="signup.php" style="color: #3A6050">Signup here</a></div>

  </div>
</div>
</body>
</html>