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
                        <a class="nav-link" href="../PHP/Admin.php">Students Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../PHP/showImg.php">Check Class Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active"  aria-current="page" href="../PHP/AddSched.php">Add Class Schedule</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="EditSched.php">Edit Class Schedule</a>
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
    <div class="contain">
        <div class="wrapper mt-3">
        </div>
    </div>
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