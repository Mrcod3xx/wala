<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/GeneralDesign.css">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>

<body>

    <nav>
        <div class="top text-center">
            <img src="../IMAGE/download-modified.png" class="d-inline-block align-text-top" id="logo">
            <p>Camarines Sur National High School</p>
        </div>
    </nav>

    <div class="contain">
        <div class="wrapper m-3">
            <form action="../PHP/SQLinsertInfo.php" method="POST" class="needs-validation" novalidate>


                        <form action="../PHP/SQLInsertInfo.php" method="POST" class="needs-validation" novalidate>

<div class="text-center">
    <img src="../IMAGE/download-modified.png" style="width:30%">
    <p>Parent</p>
</div>

<div class="form-floating mb-3">
    <input type="text" placeholder="LRN:" required name="lrn"
        class="form-control rounded-pill" id="InputLRN">
    <label for="InputLRN">LRN of child</label>
</div>

<div class="form-floating mb-3">
    <input type="number" placeholder="FirstName" required name="firstname"
        class="form-control rounded-pill" id="firstname">
    <label for="firstname">First Name</label>
</div>

<div class="form-floating mb-3">
    <input type="text" placeholder="Last Name" required name="lastname"
        class="form-control rounded-pill" id="firstname">
    <label for="firstname">Last Name</label>
</div>

<div class="form-floating mb-3">
    <input type="text" placeholder="Contact Nmber" required name="contact"
        class="form-control rounded-pill" id="lastname">
    <label for="lastname">Contact Number</label>
</div>
                        <button type="submit" class="btn" name='SuBmit'>Submit</button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/form-validate.js"></script>
</body>

</html>