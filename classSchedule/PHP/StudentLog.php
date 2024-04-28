<?php
include("../PHP/connect.php");
?>
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
</head>

<body>
    <nav>
        <div class="top text-center">
            <img src="../IMAGE/download-modified.png" class="d-inline-block align-text-top" id="logo">
            <p>Camarines Sur National High School</p>
        </div>
    </nav>

    <div class="contain">
        <div class="wrapper mt-3" id="firstcon">
            <form action="../PHP/Userlogin.php" method="POST" class="needs-validation" novalidate>

                <img src="../IMAGE/download-modified.png">
                <p>Senior Highschool Class Schedule</p>

                <div class="input-box form-floating mb-3">
                    <input type="text" placeholder="LRN:" required name="LRN" id="LRN"
                        class="form-control rounded-pill">
                    <label for="LRN">LRN</label>
                </div>

                <div class="input-box form-floating mb-3">
                    <input type="date" placeholder="BIRTHDAY:" required name="Birthday" id="password"
                        class="form-control rounded-pill">
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn" name="LOG">Login</button>

                <p class="mb-0">No Account?</p>

                <div class="text-center mt-0">
                    <a href="../PHP/createAcc.php?">Create an Account</a>
                </div>
            </form>
        </div>
    </div>


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