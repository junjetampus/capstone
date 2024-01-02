<?php
// Database connection settings
include "db_connect.php";

if (isset($_POST['search'])) {
    $searchText = $_POST['search'];

    // Query the database to fetch filtered table names
    $query = "SELECT * FROM record7 WHERE name LIKE '%$searchText%'";
    $result = $con->query($query);

    if ($result->num_rows > 0) {
        echo "<tr>";
        echo "<th>Code</th>";
        echo "<th>Name</th>";
        echo "<th>Day1</th>";
        echo "<th>Day2</th>";
        echo "<th>Day3</th>";
        echo "<th>Day4</th>";
        echo "<th>Day5</th>";
        echo "<th>Day6</th>";
        echo "<th>Day7</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['batch'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
          echo "<td>" . $row['day1'] . "</td>";
          echo "<td>" . $row['day2'] . "</td>";
          echo "<td>" . $row['day3'] . "</td>";
          echo "<td>" . $row['day4'] . "</td>";
          echo "<td>" . $row['day5'] . "</td>";
          echo "<td>" . $row['day6'] . "</td>";
          echo "<td>" . $row['day7'] . "</td>";
          echo "<td><a href='payment1_7update.php?id=" . $row['id'] . "'><i class='fas fa-edit'></i></a> | <a href='payment1_7delete.php?id=" . $row['id'] . "'><i class='fas fa-trash'></i></a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<th>Code</th>";
        echo "<th>Name</th>";
        echo "<th>Day1</th>";
        echo "<th>Day2</th>";
        echo "<th>Day3</th>";
        echo "<th>Day4</th>";
        echo "<th>Day5</th>";
        echo "<th>Day6</th>";
        echo "<th>Day7</th>";
        echo "<th>Action</th>";
        echo "</tr>";

        echo "<h1>No Name Found</h1>";
        
    }

    // Close the database connection
    $con->close();
}
?>

<style>
  h1 {
    position: absolute;
    left: 500px;
  }
</style>
