<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../CSS/Admin.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
include('../PHP/insert.php');
if(isset($_GET['DeleteID'])){
    $LrN = $_GET['DeleteID'];

    $query = ("SELECT * from user where LRN='$LrN'");
    $query_run = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($query_run)){
        ?>
    <nav class="nav justify-content-start">
        <div class="logs m-2">
            <img src="../IMAGE/download-modified.png" class="d-inline-block align-text-top" id="logo1">
            <p id="logoText">Camarines Sur National High School</p>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light justify-content-end nav bg-secondary navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand">Admin Panel</a>
            <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../PHP/Admin.php">Students Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/CheckSched.php">Check Class Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown link
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                </ul>
            </div>
        </div>
    </nav>
    <div>
          <form action="../PHP/SQLdeleteInfo.php" method="POST" class="needs-validation row" novalidate>
                <p class="text-lg-center text-black mt-3">Delete Schedule</p>
                <div class="form-floating mb-3 mt-3 col-md-6">
                    <input type="text" name="LrN" class="form-control rounded-pill" id="LrN" readonly
                        value="<?php echo $row['LRN'] ?>">
                    <label for="LRN">LRN</label>
                </div>

                <div class="form-floating mb-3 mt-3 col-md-6">
                    <input type="text" placeholder="First Name" required name="FIRSTNAME"
                        class="form-control rounded-pill" id="firstname" readonly value="<?php echo $row['FirstName'] ?>">
                    <label for="firstname">First Name</label>
                </div>

                <div class="form-floating mb-3 col-md-6">
                    <input type="text" placeholder="Last Name" required name="LASTNAME"
                        class="form-control rounded-pill" id="lastname" readonly value="<?php echo $row['LastName'] ?>">
                    <label for="lastname">Last Name</label>
                </div>

                <div class="form-floating mb-3 col-md-6">
                    <input type="text" placeholder="Section" required name="SECTION" class="form-control rounded-pill"
                        id="section" readonly value="<?php echo $row['Section'] ?>">
                    <label for="section">Section</label>
                </div>

                <div class="form-floating mb-3 col-md-6">
                    <input type="number" placeholder="Grade Level" required name="GRADELEVEL"
                        class="form-control rounded-pill" id="gradelevel" readonly value="<?php echo $row['GradeLevel'] ?>">
                    <label for="gradelevel">Grade Level</label>
                </div>

                <div class="form-floating mb-3 col-md-6">
                    <input type="number" placeholder="Phone Number:" required name="NUMBER"
                        class="form-control rounded-pill" id="number" readonly value="<?php echo $row['ContactNumber'] ?>">
                    <label for="number">Phone Number</label>
                </div>


                <div class="text-center">
                    <button type="submit" class="btn btn-primary bg-primary mb-2" name="delete">Delete</button>
                </div>
                

            </form>
            <div class="text-center">
                 <a href="../PHP/Admin.php"><button class="btn btn-primary bg-primary">Back</button></a>
            </div>
           
    </div>
          
    <?php
    }
}


?>

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