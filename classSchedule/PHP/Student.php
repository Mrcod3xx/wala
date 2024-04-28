<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/GeneralDesign.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/navBar.css">
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <!-- Button trigger modal -->
                <button type="button" class="border-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <img src="../IMAGE/icons8-user-30.png" alt="" width="30" height="24">
                    Profile
                </button>
        </div>

        <div class="top text-center">
            <img src="../IMAGE/download-modified.png" class="d-inline-block align-text-top" id="logo">
            <p>Camarines Sur National High School</p>
        </div>
    </nav>
            <?php
              echo"<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
              echo"<div class='modal-dialog'>";
                  echo"<div class='modal-content'>";
                     echo" <div class='modal-header'>";
                        echo"  <h5 class='modal-title' id='exampleModalLabel'>Personal Information</h5>";
                          echo"<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
                      echo"</div>";
                      echo"<div class='modal-body'>";
session_start();

if (!isset($_SESSION['LRN'])) {
    header("Location: StudentLog.html");
    exit;
}

// Database connection
$conn = mysqli_connect("localhost", "root", "", "dbshssched");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve username from session
$username = $_SESSION['LRN'];

// Query to retrieve user info
$sql = "SELECT * FROM user WHERE LRN ='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If user found, display user info
    while($row = $result->fetch_assoc()) {
        $Section = $row['Section'];
        echo "<h2 class='text-center'>Welcome " . $row["LRN"]. "!</h2>";
        echo "<div id='user-info'>";
        echo "Your info:<br>";
        echo "FirstName: " . $row["FirstName"] . "<br>";
        echo "LastName: " . $row["LastName"] . "<br>";
        echo "Birthday: " . $row["Birthday"] . "<br>";
        echo "Section: " . $row["Section"] . "<br>";
        echo "Grade Level: " . $row["GradeLevel"] . "<br>";
        echo "Contact Number: " . $row["ContactNumber"] . "<br>";
        // Add more fields as needed
        echo "</div>";
    }
} else {
    // If no user found, display error message
    echo "User not found";
}

$conn->close();

echo"</div>";
echo"<div class='modal-footer'>";
   echo" <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";

echo"<table class='table bg-white table-striped mt-3' width='100%' id='myTable'>";
echo"<thead>";
    echo"<tr class='header'>";
        echo"<th>Section</th>";
        echo"<th>Adviser</th>";
        echo"<th>Schedule</th>";
        echo"<th></th>";

   echo" </tr>";
echo"</thead>";
echo"<tbody id='bodIMG'>";

include('../PHP/insert.php');
$query = ("SELECT * from section WHERE SectionName ='$Section'");
$result = mysqli_query($con,$query);
if($result){
while($row = mysqli_fetch_assoc($result)){
$FirstName = $row['SectionName'];
$Adviser = $row['Adviser'];
$Schedule = $row['SchedPicture'];
echo "<tr>";
echo"<td>$FirstName</td>";
echo"<td>$Adviser</td>";
echo"<td>";
echo"<img src='../Store_Img/".$Schedule."' width='100px'>";
echo"</td>";
echo"<td>";
echo" <button type='button' class='btn bg-primary' data-bs-toggle='modal' data-bs-target='#Model'>
        View
    </button>";
    echo"</td>";
echo"</tr>";
}
}

echo"</tbody>";

echo"<div class='modal fade' id='Model' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
echo"<div class='modal-dialog modal-xl'>";
    echo"<div class='modal-content'>";
       echo" <div class='modal-header'>";
          echo"  <h5 class='modal-title' id='exampleModalLabel'>Class Schedule</h5>";
            echo"<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo"</div>";
        echo"<div class='modal-body'>";
        echo"<img src='../Store_Img/".$Schedule."' width='100%'>";
        echo"</div>";
echo"<div class='modal-footer'>";
   echo" <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
echo"</div>";
echo"</div>";
echo"</div>";
echo"</div>";
?>
      
    <script src="../JS/nav.js"></script>
    <script src="../JS/displayImage.js"></script>
    <script src="../JS/bootstrap.bundle.min.js"></script>
    <script src="../JS/jquery-min.js"></script>
    <script src="../JS/jquery-confirm.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../JS/bootstrap.min.js"></script>
    <script src="../JS/form-validate.js"></script>
    <script src="../JS/getData.js"></script>
</body>

</html>