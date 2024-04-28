<?php
$conn = mysqli_connect("localhost", "root", "", "dbshssched");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to count users having the same section
$sql = "SELECT Section, COUNT(*) as Count FROM user GROUP BY Section";

$result = $conn->query($sql);

$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'Section' => $row['Section'],
            'Count' => $row['Count']
        ];
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($data);
?>
