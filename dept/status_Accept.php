<?php
session_start();
include '../config.php';

// Check if the user is logged in
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: dept_login.php");
    exit;
}

// Check if the request to confirm/reject has been sent
if (isset($_GET['action']) && isset($_GET['id'])) {
    $action = $_GET['action'];
    $id = $_GET['id'];

    // Update the status in the database based on the action
    if ($action === 'confirm') {
        $status = 'Confirmed';
    } elseif ($action === 'reject') {
        $status = 'Rejected';
    }

    // Update the status in the database
    $sql = "UPDATE staff_requests SET status = '$status' WHERE id = $id";

    if (mysqli_query($link, $sql)) {
        // Store the updated status in a session variable
        $_SESSION['updated_status'] = $status;
        // Redirect back to the page where the table is displayed
        header("location: dept.php");
        exit;
    } else {
        echo "Error updating record: " . mysqli_error($link);
    }
}
?>
