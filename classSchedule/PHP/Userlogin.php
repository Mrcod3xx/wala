<?php
session_start();
// Database connection
$conn = mysqli_connect("localhost", "root", "", "dbshssched");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username and password from form
$username = $_POST['LRN'];
$password = $_POST['Birthday'];

// Query to check if the username and password match
$sql = "SELECT * FROM user WHERE LRN='$username' AND Birthday='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If match found, redirect to dashboard page with user info
    $_SESSION['LRN'] = $username;
    echo "<script>alert('LogIn Success!'); window.location.href='Student.php';</script>";
} else {
    // If no match found, display error message
    echo "<script> window.location.href='StudentLog.php';alert('User Not Foundd!');</script>";
}

$conn->close();
?>
