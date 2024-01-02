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
    <title>List - <?php echo $_SESSION['user'];?></title>
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
            overflow-x: scroll;
            height: 448px;
            width: 1290px;
            position: relative;
            top: -30px;
            margin-top: 30px;
        }

        .tables-scroll table {
            width: 2070px;
        }

        label {
            position: relative;
            top: 10px;
            color: white;
        }
        
        
    </style>

    <?php 
    include "db_connect.php";
    if($_GET){

      $Batches = $_GET['batch'];
      $One = $_GET['1st'];
      $Two = $_GET['2nd'];
      $Three = $_GET['3rd'];
      $Four = $_GET['4th'];
      $Five = $_GET['5th'];
      $Six = $_GET['6th'];
      $Seven = $_GET['7th'];
      $Eigth = $_GET['8th'];
      $Nine = $_GET['9th'];
      $Ten = $_GET['10th'];
      $Eleven = $_GET['11th'];
      $Twelve = $_GET['12th'];
      $Thirthen = $_GET['13th'];
      $Fourthen = $_GET['14th'];
      $Fifthen = $_GET['15th'];
      
      
      $sql = "insert into list (batch, oneth, twoth, threeth, fourth, fiveth, sixth, seventh, eigthth, nineth, tenth, eleventh, twelveth, thirtenth, fourthenth, fifthenth) values ('$Batches' , '$One' , '$Two' , '$Three' , '$Four' , '$Five' , '$Six' , '$Seven' , '$Eigth' , '$Nine' , '$Ten' , '$Eleven' , '$Twelve' , '$Thirthen' , '$Fourthen' , '$Fifthen')";
      $result = $con->query($sql);
  
      if($result) {
        header('location:list.php');
      }
      else {
        echo "Failed";
      }
          
  }
  ?>

<?php
      // Database connection parameters
      include "db_connect.php";

      // Fetch options from the database
      $options = array();
      $query = "SELECT batch, name FROM members"; // Remove DISTINCT to get all data
      $result = $con->query($query);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $options[] = $row;
          }
      }

      // Close the database connection
      $con->close();

      // Create an array to store unique batch values for option1
      $uniqueBatches = array();
      foreach ($options as $option) {
          if (!in_array($option["batch"], $uniqueBatches)) {
              $uniqueBatches[] = $option["batch"];
          }
      }
?>

</head>
<body>

<!-- mao ni ang POP UP nga para ADD -->

<div class="w3-container">
  <div id="id02" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:500px">
      <br>
      <div class="w3-center" style="font-size: 20px; font-family: sans-serif; font-weight: bold">
        <span>ADD TO LIST</span>
      </div>

      <div style="background-color: #3A6050; margin-bottom: 40px;" class="w3-container w3-border-top w3-padding-5">
        <form class="w3-container" method="GET">
          <br><label for="batches" style="font-size: 20px">Batch Code</label<br>
          <!-- <input type="text" name="batch" style="height: 40px; width: 435px; border-radius: 10px"> -->
          <select name="batch" id="batches" style="height: 40px; width: 435px; border-radius: 10px; text-align: center" required>
                  <?php
                  foreach ($uniqueBatches as $batch) {
                      echo '<option value="' . $batch . '">' . $batch . '</option>';
                  }
                  ?>
          </select>
<br><label for="first" style="font-size: 20px">1st Payout</label><br>
<!-- <input type="text" name="name" style="height: 40px; width: 435px; border-radius: 10px"> -->
<select name="1st" id="firstSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">
    <!-- Options will be populated dynamically using JavaScript -->
</select>

              <script>
                  // Define the options fetched from PHP
                  const options = <?php echo json_encode($options); ?>;

                  // Define a function to update the second select options based on the first select
                  function updateFirstSelect() {
                      const batches = document.getElementById("batches");
                      const firstSelect = document.getElementById("firstSelect");
                      const selectedOption1 = batches.value;

                      // Clear existing options
                      firstSelect.innerHTML = "";

                      // Populate options in the second select based on the selected option in the first select
                      options.forEach((option) => {
                          if (option["batch"] === selectedOption1) {
                              const optionElement = document.createElement("option");
                              optionElement.value = option["name"];
                              optionElement.text = option["name"];
                              firstSelect.appendChild(optionElement);
                          }
                      });
                  }

                  // Add an event listener to the first select to trigger the update when it changes
                  document.getElementById("batches").addEventListener("change", updateFirstSelect);

                  // Initial update when the page loads
                  updateFirstSelect();
              </script>

<br><label for="second" style="font-size: 20px">2nd Payout</label><br>
<select name="2nd" id="secondSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">
    <!-- Options will be populated dynamically using JavaScript -->
</select>

              <script>
              // Define a function to update the third select options based on the first select
              function updateSecondSelect() {
                  const batches = document.getElementById("batches");
                  const secondSelect = document.getElementById("secondSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  secondSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          secondSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateSecondSelect);

              // Initial update when the page loads
              updateSecondSelect();
          </script>


<br><label for="3rd" style="font-size: 20px">3rd Payout</label><br>
<select name="3rd" id="thirdSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
          <script>
              // Define a function to update the third select options based on the first select
              function updateThirdSelect() {
                  const batches = document.getElementById("batches");
                  const thirdSelect = document.getElementById("thirdSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  thirdSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          thirdSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateThirdSelect);

              // Initial update when the page loads
              updateThirdSelect();
          </script>

          

<br><label for="4th" style="font-size: 20px">4th Payout</label><br>
<select name="4th" id="fourthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
          <script>
              // Define a function to update the third select options based on the first select
              function updateFourthSelect() {
                  const batches = document.getElementById("batches");
                  const fourthSelect = document.getElementById("fourthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  fourthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          fourthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateFourthSelect);

              // Initial update when the page loads
              updateFourthSelect();
          </script>

<br><label for="5th" style="font-size: 20px">5th Payout</label><br>
<select name="5th" id="fifthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateFifthSelect() {
                  const batches = document.getElementById("batches");
                  const fifthSelect = document.getElementById("fifthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  fifthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          fifthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateFifthSelect);

              // Initial update when the page loads
              updateFifthSelect();
          </script>

<br><label for="6th" style="font-size: 20px">6th Payout</label><br>
<select name="6th" id="sixthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateSixthSelect() {
                  const batches = document.getElementById("batches");
                  const sixthSelect = document.getElementById("sixthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  sixthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          sixthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateSixthSelect);

              // Initial update when the page loads
              updateSixthSelect();
          </script>

<br><label for="7th" style="font-size: 20px">7th Payout</label><br>
<select name="7th" id="seventhSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateSeventhSelect() {
                  const batches = document.getElementById("batches");
                  const seventhSelect = document.getElementById("seventhSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  seventhSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          seventhSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateSeventhSelect);

              // Initial update when the page loads
              updateSeventhSelect();
          </script>

<br><label for="8th" style="font-size: 20px">8th Payout</label><br>
<select name="8th" id="eighthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateEighthSelect() {
                  const batches = document.getElementById("batches");
                  const eighthSelect = document.getElementById("eighthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  eighthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          eighthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateEighthSelect);

              // Initial update when the page loads
              updateEighthSelect();
          </script>

<br><label for="9th" style="font-size: 20px">9th Payout</label><br>
<select name="9th" id="ninethSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateNinethSelect() {
                  const batches = document.getElementById("batches");
                  const ninethSelect = document.getElementById("ninethSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  ninethSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          ninethSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateNinethSelect);

              // Initial update when the page loads
              updateNinethSelect();
          </script>

<br><label for="10th" style="font-size: 20px">10th Payout</label><br>
<select name="10th" id="tenthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
          <script>
              // Define a function to update the third select options based on the first select
              function updateTenthSelect() {
                  const batches = document.getElementById("batches");
                  const tenthSelect = document.getElementById("tenthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  tenthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          tenthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateTenthSelect);

              // Initial update when the page loads
              updateTenthSelect();
          </script>

<br><label for="11th" style="font-size: 20px">11th Payout</label><br>
<select name="11th" id="eleventhSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateEleventhSelect() {
                  const batches = document.getElementById("batches");
                  const eleventhSelect = document.getElementById("eleventhSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  eleventhSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          eleventhSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateEleventhSelect);

              // Initial update when the page loads
              updateEleventhSelect();
          </script>

<br><label for="12th" style="font-size: 20px">12th Payout</label><br>
<select name="12th" id="twelvethSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
          <script>
              // Define a function to update the third select options based on the first select
              function updateTwelvethSelect() {
                  const batches = document.getElementById("batches");
                  const twelvethSelect = document.getElementById("twelvethSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  twelvethSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          twelvethSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateTwelvethSelect);

              // Initial update when the page loads
              updateTwelvethSelect();
          </script>

<br><label for="13th" style="font-size: 20px">13th Payout</label><br>
<select name="13th" id="thirtenthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
          <script>
              // Define a function to update the third select options based on the first select
              function updateThirtenthSelect() {
                  const batches = document.getElementById("batches");
                  const thirtenthSelect = document.getElementById("thirtenthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  thirtenthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          thirtenthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateThirtenthSelect);

              // Initial update when the page loads
              updateThirtenthSelect();
          </script>

<br><label for="14th" style="font-size: 20px">14th Payout</label><br>
<select name="14th" id="fourthenthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
            <script>
              // Define a function to update the third select options based on the first select
              function updateFourthenthSelect() {
                  const batches = document.getElementById("batches");
                  const fourthenthSelect = document.getElementById("fourthenthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  fourthenthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          fourthenthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateFourthenthSelect);

              // Initial update when the page loads
              updateFourthenthSelect();
          </script>

<br><label for="15th" style="font-size: 20px">15th Payout</label><br>
<select name="15th" id="fifthenthSelect" style="height: 40px; width: 435px; border-radius: 10px; text-align: center">    
    <!-- Options will be populated dynamically using JavaScript -->
</select>
          <script>
              // Define a function to update the third select options based on the first select
              function updateFifthenthSelect() {
                  const batches = document.getElementById("batches");
                  const fifthenthSelect = document.getElementById("fifthenthSelect");
                  const selectedOption1 = batches.value;

                  // Clear existing options
                  fifthenthSelect.innerHTML = "";

                  // Populate options in the third select based on the selected option in the first select
                  options.forEach((option) => {
                      if (option["batch"] === selectedOption1) {
                          const optionElement = document.createElement("option");
                          optionElement.value = option["name"];
                          optionElement.text = option["name"];
                          fifthenthSelect.appendChild(optionElement);
                      }
                  });
              }

              // Add an event listener to the first select to trigger the update when it changes
              document.getElementById("batches").addEventListener("change", updateFifthenthSelect);

              // Initial update when the page loads
              updateFifthenthSelect();
          </script>

          


          <br>
          <br>
        <center style="margin-bottom: 20px;">
          <button type="submit" onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-green" style="border-radius: 10px">Save</button>
          <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-red" style="border-radius: 10px">Cancel</button>
        </center>
        </form>      
      </div>

    </div>
  </div>
</div>  


<div style="width: 1374px; height: 655px; position: relative">
  <div style="width: 1374px; height: 655px; left: 0px; top: 0px; position: absolute">
    <!-- background -->
    <div style="width: 1525px; height: 687px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border: none"></div>
    <!-- green -->
    <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
  <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
  <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
  <div class="admin" style="position: relative; top: 13px; left: 680px; display: flex;">
    <img src="admin_avatar.png" alt="" style="height: 40px; width: 40px; postion: absolute; background: white; border-radius: 50px">
    <div style="color: white; position: absolute; left: 55px; top: 8px; font-family: sans-serif; font-size: 20px"><?php echo $_SESSION['user'];?></div>
  </div>
    
    <div style="width: 700px; height: 76px; left: 400px; top: 100px; position: absolute; text-align: center; color: #3A6050; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">LIST OF PAYOUT</div>
  </div>

 

  <div style="width: 1294px; height: 450px; left:115px; bottom: 0px; position: absolute; background: #D9D9D9; border-radius: 0px; border: 1px black solid;">
  <div class="tables-scroll">
      <table>
        <tr>
            <th>Actions</th>
          <th>Batch</th>
          <th>1st</th>
          <th>2nd</th>
          <th>3rd</th>
          <th>4th</th>
          <th>5th</th>
          <th>6th</th>
          <th>7th</th>
          <th>8th</th>
          <th>9th</th>
          <th>10th</th>
          <th>11th</th>
          <th>12th</th>
          <th>13th</th>
          <th>14th</th>
          <th>15th</th>
          
          
        </tr>
        <tr>
        <?php
                    include "db_connect.php";
                    $sqlQuery = "SELECT * FROM list";
                    $res = $con->query($sqlQuery);
                    while($row =mysqli_fetch_object($res)){
                    ?>
                    
                        <tr>
                            <td>
                                <a href="list_update.php?id=<?php echo $row->id?>"><button class="btn btn-primary">Update</button></a>
                                <!-- <button style="background:red; height: 35px; width: 70px; position: relative; top: 2px; color: white; border-radius: 4px;" onclick="confirmDelete(<?php echo $row->id?>)">Delete</button> -->
                            </td>
                            <td><?php echo $row->batch?></td>
                            <td><?php echo $row->oneth?></td>
                            <td><?php echo $row->twoth?></td>
                            <td><?php echo $row->threeth?></td>
                            <td><?php echo $row->fourth?></td>
                            <td><?php echo $row->fiveth?></td>
                            <td><?php echo $row->sixth?></td>
                            <td><?php echo $row->seventh?></td>
                            <td><?php echo $row->eigthth?></td>
                            <td><?php echo $row->nineth?></td>
                            <td><?php echo $row->tenth?></td>
                            <td><?php echo $row->eleventh?></td>
                            <td><?php echo $row->twelveth?></td>
                            <td><?php echo $row->thirtenth?></td>
                            <td><?php echo $row->fourthenth?></td>
                            <td><?php echo $row->fifthenth?></td>
                            
                            
                        </tr>
                    
                    <?php
                    }   
                    ?>
        </tr>
      </table>
                      <script>
                              function confirmDelete(id) {
                                  var result = confirm("If you 'OK' this details will be surely deleted.");
                                  if (result) {
                                      // If the user clicks "OK" in the confirmation dialog, proceed with the deletion
                                      window.location.href = "list_delete.php?id=" + id;
                                  } else {
                                      // If the user clicks "Cancel" in the confirmation dialog, do nothing
                                  }
                              }
                    </script>
    </div>
  </div>
  <div style="width: 216px; height: 51.68px; left: 1165px; top: 145.11px; position: absolute">

  <a href="https://wheelofnames.com/" target="_blank-">
  <button style="width: 216px; height: 51.68px; left: 28px; top: 0px; position: absolute; background: #3A6050; border-radius: 10px; border: none;">
    <div style="width: 166px; height: 38.76px; left: 25px; top: 10px; position: absolute; text-align: center; color: white; font-size: 25px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">ROULETTE</div>
    </button> 
  </a>
  
    <button onclick="document.getElementById('id02').style.display='block'"  style="width: 216px; height: 51.68px; right:1050px; top: 0px; position: absolute; background: #3A6050; border-radius: 10px; border: none;">
    <div style="width: 166px; height: 38.76px; left: 25px; top: 10px; position: absolute; text-align: center; color: white; font-size: 25px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">ADD</div>
    </button>
  </div> 

  <a href="logout.php">
   <button> <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i></button>
  </a>
 
</body>

</html>



