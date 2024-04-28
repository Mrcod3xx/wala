<?php
include("../PHP/connect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../CSS/GeneralDesign.css>
</head>

<body>
    <nav>
        <div class="top text-center">
            <img src="../IMAGE/download-modified.png" class="d-inline-block align-text-top" id="logo">
            <p>Camarines Sur National High School</p>
        </div>
    </nav>

    <div class="contain">
        <div class="wrapper mt-3">
            <form action="../PHP/login.php" method="post" class="needs-validation" novalidate>

                <img src="../IMAGE/download-modified.png">
                <p>Senior Highschool Class Schedule</p>

                <div class="input-box form-floating mb-3">
                    <input type="text" placeholder="LRN:" required name="LRN" id="LRN"
                        class="form-control rounded-pill">
                    <label for="LRN">LRN</label>
                </div>

                <div class="input-box form-floating mb-3">
                    <input type="password" placeholder="BIRTHDAY:" required name="password" id="password"
                        class="form-control rounded-pill">
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="btn">Login</button>

                <p class="mb-0">No Account?</p>

                <div class="text-center mt-0">
                    <a href="../PHP/createAcc.php">Create an Account</a>
                </div>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/form-validate.js"></script>
</body>

</html>