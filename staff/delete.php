<?php
include '../config.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    // Prepare and execute the delete query using prepared statements
    $sql = "DELETE FROM staff_requests WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect to display.php after successful deletion
        header('location: staff_display.php');
        exit(); // Terminate script after redirection
    } else {
        die("Error: Unable to delete record");
    }
}
?>
