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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="icon.css">
    <title>Payment Record</title>

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
            overflow-y: scroll;
            height: 401px;
            width: 1355px;
            position: relative;
            top: -30px;
            margin-top: 30px;
        }

        .tables-scroll table {
            width: 960px;
        }

        .tables-scroll th {
          width: 1300px;
        }

        th {
          height: 40px;
        }

        label {
          font-size: 20px;
        }
        select {
          height: 40px;
          width: 90px;
        }
        option {
          text-align: center;
        }
    </style>
</head>

<?php
require_once "db_connect.php";

if ($_GET) {
    $Batch1 = $_GET['batch'];
    $Name = $_GET['name'];
    $Day1 = $_GET['day1'];
    $Day2 = $_GET['day2'];
    $Day3 = $_GET['day3'];
    $Day4 = $_GET['day4'];
    $Day5 = $_GET['day5'];
    $Day6 = $_GET['day6'];
    $Day7 = $_GET['day7'];

    // Check if the batch and details combination already exists
    $checkSql = "SELECT * FROM record7 WHERE batch = '$Batch1' AND name = '$Name' AND day1 = '$Day1' AND day2 = '$Day2' AND day3 = '$Day3' AND day4 = '$Day4' AND day5 = '$Day5' AND day6 = '$Day6' AND day7 = '$Day7'";
    $checkResult = $con->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // The batch and details combination already exists, show an alert
        echo '<script language="javascript">';
        echo 'alert("The batch and details you inserted is already existed."); location.href="payment4_record7.php"';
        echo '</script>';
    } else {
        // Batch and details combination doesn't exist, proceed with insertion
        $sql = "INSERT INTO record7 (batch, name, day1, day2, day3, day4, day5, day6, day7) 
                VALUES ('$Batch1', '$Name', '$Day1', '$Day2', '$Day3', '$Day4', '$Day5', '$Day6', '$Day7')";
        $result = $con->query($sql);

        if ($result) {
            echo '<script language="javascript">';
            echo 'alert("Data Successfully Inserted"); location.href="payment4_record7.php"';
            echo '</script>';
        } else {
            echo "Failed";
        }
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

<body style="background: #D9D9D9">

<div class="w3-container">
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:900px">

      <div class="w3-center" style="font-size: 15px"><br>
        <!-- <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> -->
        <b><h3 style="font-family: sans-serif; font-weight: bold">ADD to PAYMENT RECORD</h3></b>
      </div>

      <div class="w3-container w3-border-top w3-padding-16" style="background: #3A6050">
        <form class="w3-container" method="GET">
      
        <div style=""><br>
        <div style="position: relative; left: 110px; font-size: 20px">
        <label for="batch" style="color: white">Batch #</label>
          <select name="batch" id="firstSelect" style="position: relative; left: 0px; width: 220px; height: 40px" >
              <?php
                foreach ($uniqueBatches as $batch) {
                  echo '<option value="' . $batch . '">' . $batch . '</option>';
                }
              ?>
          </select></div>
          <div style="font-size: 20px; position: relative; bottom: 40px; left: 420px">
          <label for="name" style="font-size: 20px; color: white">Name :</label>
          <select name="name" id="secondSelect" style="height: 40px; width: 220px"></select>
          </div>

          <script>
              // Define the options fetched from PHP
              const options = <?php echo json_encode($options); ?>;

              // Define a function to update the second select options based on the first select
              function updateSecondSelect() {
                  const firstSelect = document.getElementById("firstSelect");
                  const secondSelect = document.getElementById("secondSelect");
                  const selectedOption1 = firstSelect.value;

                  // Clear existing options
                  secondSelect.innerHTML = "";

                  // Populate options in the second select based on the selected option in the first select
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
              document.getElementById("firstSelect").addEventListener("change", updateSecondSelect);

              // Initial update when the page loads
              updateSecondSelect();
        </script>

          <div hidden>
              <div style="position:relative; left: 25px">
                  <label for="day1">Day 1</label>
                  <select name="day1" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
                  <label for="day2">Day 2</label>
                  <select name="day2" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
                  <label for="day3">Day 3</label>
                  <select name="day3" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
                  <label for="day4">Day 4</label>
                  <select name="day4" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
                  <label for="day5">Day 5</label>
                  <select name="day5" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
                  <br><br><label for="day6">Day 6</label>
                  <select name="day6" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
                  <label for="day7">Day 7</label>
                  <select name="day7" id="">
                    <option value="---">UNPAID</option>
                    <option value="PAID">PAID</option>
                  </select>
          </div>
                  
        </div>
        <br>
        <center>
          <button type="submit" onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-green" style=" width: 100px; margin-left: 20px; font-family: sans-serif; font-weight: bold; height: 50px; border-radius: 10px;">Save</button>
          <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red" style="width: 100px; margin-left: 20px; font-family: sans-serif; font-weight: bold; height: 50px; border-radius: 10px">Cancel</button>
        </center>
        </form>     
      </div>

    </div>
  </div>
</div>

<div style="width: 1374px; height: 659px; position: relative">
  <div style="width: 1374px; height: 659px; left: 0px; top: 0px; position: absolute">
  <!-- background -->
    <!-- <div style="width: 1529px; height: 682px; left: -16px; top: -8px; position: absolute; background: #D9D9D9; border: 0.50px black solid"></div> -->
    <!-- green -->
    <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
    <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
    <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
    <div class="admin" style="position: relative; top: 13px; left: 680px; display: flex;">
      <img src="admin_avatar.png" alt="" style="height: 40px; width: 40px; postion: absolute; background: white; border-radius: 50px">
      <div style="color: white; position: absolute; left: 55px; top: 8px; font-family: sans-serif; font-size: 20px"><?php echo $_SESSION['user'];?></div>
    </div>

    <div style="left: 640px; top: 95px; position: absolute; text-align: center; color: #3A6050; font-size: 36px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">4th PAYMENT</div>
  </div>
  <div style="width: 1358px; height: 403px; left: 79px; top: 212px; position: absolute; background: #D9D9D9; border-radius: 0px; border: 1px black solid">
  <div class="tables-scroll">
      <table style="width: 2500px; overflow-x: scroll;">
        <tr>
          <th>Action</th>
          <th>Code</th>
          <th>Name</th>
          <th>Day 1</th>
          <th>Day 2</th>
          <th>Day 3</th>
          <th>Day 4</th>
          <th>Day 5</th>
          <th>Day 6</th>
          <th>Day 7</th>
          
        </tr>
        <tr>
        <?php
    // Database connection settings
    include "db_connect.php";

    // Check if the connection was successful

    // Initialize the SQL query
    $sql = "SELECT * FROM record7";

    // Check if a category is selected
    if (isset($_POST['fetch_batch']) && $_POST['fetch_batch'] != 'all') {
        $selectedCategory = $_POST['fetch_batch'];
        $sql .= " WHERE batch = '$selectedCategory'";
    }

    // Execute the query
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            // | <a href='#' onclick='confirmDelete(" . $row['id'] . ")'><i class='fas fa-trash' style='color: red;'></i></a>
            echo "<td><a href='payment4_record7update.php?id=" . $row['id'] . "'><i class='fas fa-edit'></i></a> </td>";
            echo "<td>" . $row['batch'] . "</td>";
            echo "<td style='width: 50rem'>" . $row['name'] . "</td>";
            echo "<td>" . $row['day1'] . "</td>";
            echo "<td>" . $row['day2'] . "</td>";
            echo "<td>" . $row['day3'] . "</td>";
            echo "<td>" . $row['day4'] . "</td>";
            echo "<td>" . $row['day5'] . "</td>";
            echo "<td>" . $row['day6'] . "</td>";
            echo "<td>" . $row['day7'] . "</td>";
           
            echo "</tr>";
        }

    } else {
        echo "<script>alert('NO RECORD FOUND !!')</script>";
    }

    // Close the database connection
    $con->close();
    ?>
        </tr>
      </table>
                          <script>
                              function confirmDelete(id) {
                                  if (confirm("If you 'OK' this details will be surely deleted.")) {
                                      // If user clicks "OK," redirect to the delete script with the record ID
                                      window.location.href = "payment4_record7delete.php?id=" + id;
                                  }
                              }
                          </script>
    </div>
  </div>
  
  <button onclick="document.getElementById('id01').style.display='block'"  style="width: 52px; height: 52px; left:79px; top: 151px; position: absolute; background: #3A6050; border-radius: 10px; border: none;">
    <div style="width: 52px; height: 52px; left: 0px; top: 6.96px; position: absolute; text-align: center; color: white; font-size: 25px; font-family: sans-serif; font-weight: bold; word-wrap: break-word"><b>+</b></div>
    </button>
    <div>
      <form action="payment4_record7.php" method="post">
          <input type="text" id="searchInput" name="table_search" placeholder="Enter Name" class="avail_input" style="text-align:center; color:black; width: 216px; height: 52px; left: 135px; top: 151px; position: absolute; background: #D9D9D9; border-radius: 10px;">
      </form>
    </div>

    <form method="post">
        <div style="width: 216px; height: 52px; left: 1161px; top: 151px; position: absolute">
            <label for="fetch_batch" hidden>Select Category:</label>
            <select name="fetch_batch" id="fetch_batch" style="width: 216px; height: 52px; left: 0px; top: 0px; position: absolute; border-radius: 10px; background: #3A6050; color: white">
                <?php
                // Database connection settings
                include "db_connect.php";

                // Fetch distinct batch values from the database
                $batchQuery = "SELECT DISTINCT batch FROM members";
                $batchResult = $con->query($batchQuery);

                // Check if the query was successful
                if ($batchResult->num_rows > 0) {
                    while ($batchRow = $batchResult->fetch_assoc()) {
                        $batchValue = $batchRow['batch'];
                        echo "<option style='text-align: center; font-size: 20px;' value='$batchValue'>$batchValue</option>";
                    }
                } else {
                    echo "<option style='text-align: center; font-size: 20px;' value=''>No batches available</option>";
                }

                // Close the database connection
                $con->close();
                ?>
            </select>

            <button type="submit" class="fa fa-search" style="width: 52px; height: 52px; left: 220px; top: 0px; position: absolute; border-radius: 10px; background: #3A6050; color: white; border: none;"></button>
        </div>
    </form>


  <div style="display: flex; position: relative; top: 617px; left: 705px">
    <a href="payment3_record7.php">
      <button style="width: 50px; font-size: 15px; background: #3A6050; color: white"><b><</b></button>
    </a>
    <label for="2" style="margin-left: 10px; margin-right: 10px">4</label>
    <a href="payment5_record7.php">
      <button style="width: 50px; font-size: 15px; background: #3A6050; color: white"><b>></b></button>
    </a>
  </div>

  <a href="logout.php">
    <!-- <img style="width: 42px; height: 42px; left: 1440px; top: 13px; position: absolute; border-radius: 50px; cursor: pointer" src="logoutpic.jpg" /> -->
    <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i>
  </a>
</div>
</body>
<script>
    // Get references to the search input field and the table
    const searchInput = document.getElementById('searchInput');
    const dataTable = document.querySelector('.tables-scroll table');

    // Add an input event listener to the search input
    searchInput.addEventListener('input', function () {
        const searchText = searchInput.value.trim().toLowerCase();

        // Send an AJAX request to fetch filtered table names
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'search_table_names.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the table with the filtered data
                dataTable.innerHTML = xhr.responseText;
            }
        };

        xhr.send(`search=${searchText}`);
    });
</script>
</html>


