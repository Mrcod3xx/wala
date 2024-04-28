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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../CSS/all.min.css">
    <link rel="stylesheet" href="../CSS/navBar.css">
</head>

<body>
    <?php
include('../PHP/insert.php');
if(isset($_GET['EditID'])){
    $LRN = $_GET['EditID'];

    $query = ("SELECT * from user where LRN='$LRN'");
    $query_run = mysqli_query($con,$query);

    while($row = mysqli_fetch_array($query_run)){
        ?>

<header class="header-nav">
        <h1>Edit Student</h1>
</header>

    <div class="sidenav">
        <a href="#" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../PHP/Admin.php"><i class="fas fa-graduation-cap">  Students</i> </a>
        <a href="../PHP/Parent.php"><i class="fas fa-user"></i> Parents</a>
        <a href="#services"><i class="fas fa-book"></i>Teachers</a>
        <a href="#clients"><i class="fas fa-list-alt"></i> Clients</a>
        <a href="#contact"><i class="fas fa-cog"></i> Dashboard</a>
    </div>

    <div class="main">
    <span style="font-size:30px;cursor:pointer; position: absolute; top: 20px; left: 20px;" onclick="toggleNav()" id="burgerBtn">
            <i class="fas fa-bars"></i>
        </span>
        <p><nav class="nav"></p>
    <div class="contain">
        <div class="wrapper">
        <form action="../PHP/SQLupdateInfo.php" method="POST" class="needs-validation row" novalidate>
         <div class="sched">
            <p class="text-lg-center text-black-50 mt-2">Edit Student</p>
         </div>
        <div class="form-floating mb-3 mt-3 col-md-12">
            <input type="text" name="LRN" class="form-control rounded-pill" id="LRN" readonly
                value="<?php echo $row['LRN'] ?>">
            <label for="LRN">LRN</label>
        </div>

        <div class="form-floating mb-3 col-md-12">
            <input type="text" placeholder="First Name" required name="FIRSTNAME" class="form-control rounded-pill"
                id="firstname" value="<?php echo $row['FirstName'] ?>">
            <label for="firstname">First Name</label>
        </div>

        <div class="form-floating mb-3 col-md-12">
            <input type="text" placeholder="Last Name" required name="LASTNAME" class="form-control rounded-pill"
                id="lastname" value="<?php echo $row['LastName'] ?>">
            <label for="lastname">Last Name</label>
        </div>

        <div class="form-floating mb-3 col-md-12">
            <input type="text" placeholder="Section" required name="SECTION" class="form-control rounded-pill"
                id="section" value="<?php echo $row['Section'] ?>">
            <label for="section">Section</label>
        </div>

        <div class="form-floating mb-3 col-md-12">
            <input type="number" placeholder="Grade Level" required name="GRADELEVEL" class="form-control rounded-pill"
                id="gradelevel" value="<?php echo $row['GradeLevel'] ?>">
            <label for="gradelevel">Grade Level</label>
        </div>

        <div class="form-floating mb-3 col-md-12">
            <input type="number" placeholder="Phone Number:" required name="NUMBER" class="form-control rounded-pill"
                id="number" value="<?php echo $row['ContactNumber'] ?>">
            <label for="number">Phone Number</label>
        </div>


        <div class="text-center">
             <button type="submit" class="btn btn-primary mb-2" name="SAVE">Save</button>
        </div>
       

    </form>
    <div class="text-center">
         <a href="../PHP/Admin.php"><button class="btn btn-primary bg-primary">Back</button></a>
    </div>
        </div>
    </div>
    <?php
    }
}


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