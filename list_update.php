    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update List</title>
    </head>
    <body>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        

    <?php
        require_once "db_connect.php";
        // session_start();
        $catID = $_GET['id']; 

        $sqlQuery = "SELECT * from list where id = $catID ";
        $res3 = $con->query($sqlQuery);

        $row2 = $res3->fetch_assoc();

        if($_POST) {
            var_dump($_POST);
            $Batch = $_POST['batch'];
            $one = $_POST['1st'];
            $two = $_POST['2nd'];
            $three = $_POST['3rd'];
            $four = $_POST['4th'];
            $five = $_POST['5th'];
            $six = $_POST['6th'];
            $seven = $_POST['7th'];
            $eigth = $_POST['8th'];
            $nine = $_POST['9th'];
            $ten = $_POST['10th'];
            $eleven = $_POST['11th'];
            $twelve = $_POST['12th'];
            $thirthen = $_POST['13th'];
            $fourthen = $_POST['14th'];
            $fifthen = $_POST['15th'];
            
            $sqlQuery = "update list set batch = '$Batch', oneth = '$one', twoth = '$two', threeth = '$three', fourth = '$four', fiveth = '$five', sixth = '$six', seventh = '$seven', eigthth = '$eigth', nineth = '$nine', tenth = '$ten', eleventh= '$eleven', twelveth = '$twelve', thirtenth = '$thirthen', fourthenth = '$fourthen', fifthenth = '$fifthen' where id = $catID ";
            $res3 = $con->query($sqlQuery);

            if($res3)
                header("Location: list.php");
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

    <div style="width: 1374px; height: 655px; position: relative">
    <div style="width: 1374px; height: 655px; left: 0px; top: 0px; position: absolute">
        <!-- background -->
        <div style="width: 1525px; height: 674px; left: 0px; top: 0px; position: absolute; background: #D9D9D9; border: 0.50px black solid"></div>
        <!-- green -->
        <div style="width: 1525.5px; height: 73.55px; left: -8px; top: -8px; position: absolute; background: #3A6050"></div>
  <a href="home.php"><img src="home_icon.png" alt="" style="height: 40px; width: 40px; left: 20px; top: 13px; position: absolute; background: white; border-radius: 50px"></a>
  <div style="width: 110px; left: 60px; top: 8px; position: absolute; text-align: center; color: white; font-size: 36px; font-family: Inter; font-weight: 700; word-wrap: break-word">e-PaL</div>
  
        <div style="width: 443px; height: 80px; left: 550px; top: 86px; position: absolute; text-align: center; color: #3A6050; font-size: 54px; font-family: sans-serif; font-weight: bold; word-wrap: break-word">UPDATE LIST</div>
    </div>
    <a href="login.php">
    <!-- <img style="width: 42px; height: 42px; left: 1433px; top: 8px; position: absolute; border-radius: 50px" src="logoutpic.jpg" /> -->
        <i class="fa fa-sign-out" style="font-size:40px;color:white;  left: 1440px; top: 13px; position: absolute;"></i>
    </a>

    <div style="position: relative; left: 500px; top: 220px; width: 500px" >
    <div style="">
            <div style="position: relative; left: 35px" >
                <form class="w3-container" method="POST">

    <div style="position: relative; bottom: 50px">
        <br><center><label for="batchess" style="font-size: 20px; position: relative; right: 15px">Batch #</label></center>
        <input value="<?php echo $row2['batch']?>" name="batch" id="batches" style="height: 40px; width: 435px; border-radius: 10px; text-align: center" readonly>
    </div>  

    <div style="position: relative; bottom: 50px; right:500px">
                <br><label for="1st" style="font-size: 20px">1st</label><br>
                <select name="1st" id="firstSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define the options fetched from PHP
                    const options = <?php echo json_encode($options); ?>;

                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateFirstSelect() {
                        const batches = document.getElementById("batches");
                        const firstSelect = document.getElementById("firstSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        firstSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['oneth']?>") {
                                    optionElement.selected = true;
                                }
                                firstSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateFirstSelect);

                    // Initial update when the page loads
                    updateFirstSelect();
                </script>
    </div>
                
    <div style="position: relative; bottom: 150px; right:200px">
                <br><label for="secondSelect" style="font-size: 20px">2nd</label><br>
                <select name="2nd" id="secondSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define the options fetched from PHP
                    

                    // Define a function to update the "2nd" select options based on the selected "Batch #"
                    function updateSecondSelect() {
                        const batches = document.getElementById("batches"); // Assuming you have an element with id "batches" for Batch #
                        const secondSelect = document.getElementById("secondSelect");
                        const selectedBatch = batches.value; // Changed variable name for clarity

                        // Clear existing options
                        secondSelect.innerHTML = "";

                        // Populate options in the "2nd" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedBatch) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['twoth']?>") {
                                    optionElement.selected = true;
                                }
                                secondSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateSecondSelect);
                    
                    // Initial update when the page loads
                    updateSecondSelect();
                </script>
    </div>
    <div style="position: relative; bottom: 250px; left: 95px">
                <br><label for="thirdthSelect" style="font-size: 20px">3rd</label><br>
                <select name="3rd" id="thirdthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "3rd" select options based on the selected "Batch #"
                    function updateThirdthSelect() {
                        const batches = document.getElementById("batches");
                        const thirdthSelect = document.getElementById("thirdthSelect"); // Corrected ID
                        const selectedBatch = batches.value;

                        // Clear existing options
                        thirdthSelect.innerHTML = "";

                        // Populate options in the "3rd" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedBatch) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['threeth']?>") {
                                    optionElement.selected = true;
                                }
                                thirdthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateThirdthSelect);

                    // Initial update when the page loads
                    updateThirdthSelect();
                </script>
    </div>
    <div style="position: absolute; bottom: 287px; left: 400px">
                <br><label for="fourthSelect" style="font-size: 20px">4th</label><br>
                <select name="4th" id="fourthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "3rd" select options based on the selected "Batch #"
                    function updateFourthSelect() {
                        const batches = document.getElementById("batches");
                        const fourthSelect = document.getElementById("fourthSelect"); // Corrected ID
                        const selectedBatch = batches.value;

                        // Clear existing options
                        fourthSelect.innerHTML = "";

                        // Populate options in the "3rd" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedBatch) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['fourth']?>") {
                                    optionElement.selected = true;
                                }
                                fourthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateFourthSelect);

                    // Initial update when the page loads
                    updateFourthSelect();
                </script>
    </div>
    <div style="position: absolute; bottom: 287px; left: 688px">
                <br><label for="fifthSelect" style="font-size: 20px">5th</label><br>
                <select name="5th" id="fifthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "3rd" select options based on the selected "Batch #"
                    function updateFifthSelect() {
                        const batches = document.getElementById("batches");
                        const fifthSelect = document.getElementById("fifthSelect"); // Corrected ID
                        const selectedBatch = batches.value;

                        // Clear existing options
                        fifthSelect.innerHTML = "";

                        // Populate options in the "3rd" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedBatch) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['fiveth']?>") {
                                    optionElement.selected = true;
                                }
                                fifthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateFifthSelect);

                    // Initial update when the page loads
                    updateFifthSelect();
                </script>
    </div>
    <div style="position: absolute; bottom: 190px; right:730px">
                <br><label for="6th" style="font-size: 20px">6th</label><br>
                <select name="6th" id="sixthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateSixthSelect() {
                        const batches = document.getElementById("batches");
                        const sixthSelect = document.getElementById("sixthSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        sixthSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['sixth']?>") {
                                    optionElement.selected = true;
                                }
                                sixthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateSixthSelect);

                    // Initial update when the page loads
                    updateSixthSelect();
                </script>
    </div>
<div style="position: absolute; bottom: 190px; right:431px">
                <br><label for="7th" style="font-size: 20px">7th</label><br>
                <select name="7th" id="seventhSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateSeventhSelect() {
                        const batches = document.getElementById("batches");
                        const seventhSelect = document.getElementById("seventhSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        seventhSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['seventh']?>") {
                                    optionElement.selected = true;
                                }
                                seventhSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateSeventhSelect);

                    // Initial update when the page loads
                    updateSeventhSelect();
                </script>
</div>
<div style="position: absolute; bottom: 190px; right:139px">
                <br><label for="8th" style="font-size: 20px">8th</label><br>
                <select name="8th" id="eigththSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateEigththSelect() {
                        const batches = document.getElementById("batches");
                        const eigththSelect = document.getElementById("eigththSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        eigththSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['eigthth']?>") {
                                    optionElement.selected = true;
                                }
                                eigththSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateEigththSelect);

                    // Initial update when the page loads
                    updateEigththSelect();
                </script>
</div>
<div style="position: absolute; bottom: 190px; left: 405px">
                <br><label for="9th" style="font-size: 20px">9th</label><br>
                <select name="9th" id="ninethSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateNinethSelect() {
                        const batches = document.getElementById("batches");
                        const ninethSelect = document.getElementById("ninethSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        ninethSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['nineth']?>") {
                                    optionElement.selected = true;
                                }
                                ninethSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateNinethSelect);

                    // Initial update when the page loads
                    updateNinethSelect();
                </script>
</div>
<div style="position: absolute; bottom: 190px; left: 690px">
                <br><label for="10th" style="font-size: 20px">10th</label><br>
                <select name="10th" id="tenthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateTenthSelect() {
                        const batches = document.getElementById("batches");
                        const tenthSelect = document.getElementById("tenthSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        tenthSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['tenth']?>") {
                                    optionElement.selected = true;
                                }
                                tenthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateTenthSelect);

                    // Initial update when the page loads
                    updateTenthSelect();
                </script>
</div>
<div style="position: absolute; bottom: 90px; right: 730px">
                <br><label for="11th" style="font-size: 20px">11th</label><br>
                <select name="11th" id="eleventhSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateEleventhSelect() {
                        const batches = document.getElementById("batches");
                        const eleventhSelect = document.getElementById("eleventhSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        eleventhSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['eleventh']?>") {
                                    optionElement.selected = true;
                                }
                                eleventhSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateEleventhSelect);

                    // Initial update when the page loads
                    updateEleventhSelect();
                </script>
</div>
<div style="position: absolute; bottom: 90px; right: 430px">
                <br><label for="12th" style="font-size: 20px">12th</label><br>
                <select name="12th" id="twelveSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateTwelveSelect() {
                        const batches = document.getElementById("batches");
                        const twelveSelect = document.getElementById("twelveSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        twelveSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['twelveth']?>") {
                                    optionElement.selected = true;
                                }
                                twelveSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateTwelveSelect);

                    // Initial update when the page loads
                    updateTwelveSelect();
                </script>
</div>
<div style="position: absolute; bottom: 90px; right: 140px">
                <br><label for="13th" style="font-size: 20px">13th</label><br>
                <select name="13th" id="thirtenthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateThirtenthSelect() {
                        const batches = document.getElementById("batches");
                        const thirtenthSelect = document.getElementById("thirtenthSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        thirtenthSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['thirtenth']?>") {
                                    optionElement.selected = true;
                                }
                                thirtenthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateThirtenthSelect);

                    // Initial update when the page loads
                    updateThirtenthSelect();
                </script>
</div>
<div style="position: absolute; bottom: 90px; left: 407px">
                <br><label for="14th" style="font-size: 20px">14th</label><br>
                <select name="14th" id="fourthenthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateFourthenthSelect() {
                        const batches = document.getElementById("batches");
                        const fourthenthSelect = document.getElementById("fourthenthSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        fourthenthSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['fourthenth']?>") {
                                    optionElement.selected = true;
                                }
                                fourthenthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateFourthenthSelect);

                    // Initial update when the page loads
                    updateFourthenthSelect();
                </script>
</div>
<div style="position: absolute; bottom: 90px; left: 691px">
                <br><label for="15th" style="font-size: 20px">15th</label><br>
                <select name="15th" id="fifthenthSelect" style="height: 40px; width: 250px; border-radius: 10px; text-align: center">
                </select>

                <script>
                    // Define a function to update the "1st" select options based on the "Batch #"
                    function updateFifthenthSelect() {
                        const batches = document.getElementById("batches");
                        const fifthenthSelect = document.getElementById("fifthenthSelect");
                        const selectedOption1 = batches.value;

                        // Clear existing options
                        fifthenthSelect.innerHTML = "";

                        // Populate options in the "1st" select based on the selected "Batch #"
                        options.forEach((option) => {
                            if (option["batch"] === selectedOption1) {
                                const optionElement = document.createElement("option");
                                optionElement.value = option["name"];
                                optionElement.text = option["name"];
                                // Check if this option is the one that matches the stored value in PHP
                                if (option["name"] === "<?php echo $row2['fifthenth']?>") {
                                    optionElement.selected = true;
                                }
                                fifthenthSelect.appendChild(optionElement);
                            }
                        });
                    }

                    // Add an event listener to the "Batch #" input field to trigger the update
                    document.getElementById("batches").addEventListener("change", updateFifthenthSelect);

                    // Initial update when the page loads
                    updateFifthenthSelect();
                </script>
</div>


                    
                    <div style="position: relative; left: 125px" >
                        <button type="submit" class="btn btn-success" style="width: 85px">Save</button>
                        <a href="list.php" class="btn btn-danger" style="width: 85px">Cancel</a>
                    </div>
                    
                </form> 
            </div>     
        </div>
    </div>

    </body>
    </html> 