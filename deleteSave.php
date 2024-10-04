<?php
require_once('database/config.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Sanitize the ID parameter
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    // Prepare and execute the delete statement
    $stmt = $conn->prepare("DELETE FROM admissions WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Delete successful, redirect to the page where you list the records
        header("location: read.php");
        exit; // Ensure script execution stops here after redirection
    } else {
        // Delete failed, handle the error
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect to an error page or handle the case where ID is not provided
    header("location: error.php");
    exit;
}
?>
