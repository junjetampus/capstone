<?php
include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch data from the current database based on the ID
    $query = "SELECT * FROM status WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Insert data into the other database
    $queryInsert = "INSERT INTO members (batch, name, age, gender, image, cellphone, location, work) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtInsert = $con->prepare($queryInsert);
    $stmtInsert->bind_param("ssssssss", $row['batch'], $row['name'], $row['age'], $row['gender'], $row['image'], $row['cellphone'], $row['location'], $row['work']);
    
    if ($stmtInsert->execute()) {
        // Data inserted successfully, now delete from the current database
        $queryDelete = "DELETE FROM status WHERE id = ?";
        $stmtDelete = $con->prepare($queryDelete);
        $stmtDelete->bind_param("i", $id);

        if ($stmtDelete->execute()) {
            // Record deleted successfully
            header("Location: members_data_notify.php"); // Redirect to members_data.php after successful confirmation
            exit;
        } else {
            // Error deleting record
            echo "Error deleting record from the current database";
        }
    } else {
        // Error inserting data into the other database
        echo "Error inserting data into the other database";
    }

    $stmt->close();
    $stmtInsert->close();
    $stmtDelete->close();
    $con->close();
} else {
    // Invalid request
    echo "Invalid request";
}
?>

