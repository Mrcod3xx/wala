<?php
$conn = mysqli_connect("localhost", "root", "", "dbshssched");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT COUNT(*) as total FROM user";
$result = $conn->query($sql);
$data = $result->fetch_assoc();

$totalUsers = $data['total'];

$conn->close();

echo json_encode(['totalUsers' => $totalUsers]);
?>
