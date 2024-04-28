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
    <header class="header-nav">
        <h1>Student Informations</h1>
    </header>

    <div class="sidenav">
        <a href="" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="../PHP/Admin.php"><i class="fas fa-graduation-cap"> Students</i> </a>
        <a href="../PHP/Parent.php"><i class="fas fa-user"></i> Parents</a>
        <a href="#services"><i class="fas fa-book"></i>Teachers</a>
        <a href="../PHP/EditSched.php"><i class="fas fa-list-alt"></i> Schedule</a>
        <a href="../PHP/dashboard.php"><i class="fas fa-cog"></i> Dashboard</a>
    </div>

    <div class="main">
        <span style="font-size:30px;cursor:pointer; position: absolute; top: 20px; left: 20px;" onclick="toggleNav()"
            id="burgerBtn">&#9776;</span>
        <p>
            <?php
     if(isset($_GET['SectionId'])){
        $connection = mysqli_connect("localhost","root","","dbshssched");
        $SectionID = $_GET['SectionId'];
        $fetch_image_query = "SELECT * FROM section where SectionID = '$SectionID'";
        $fetch_image_query_run = mysqli_query($connection,$fetch_image_query);
     if(mysqli_num_rows( $fetch_image_query_run) > 0){
        foreach( $fetch_image_query_run as $row){
         ?>
        <div class="containing">
            <div class="row text-center">
                <form action="../PHP/UpdateSched.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="SectionID" class="form-control rounded-pill" id="Section" readonly
                        value="<?php echo $row['SectionID'] ?>">
                    <div class="form-floating mb-3 mt-3 col-md-12">
                        <input type="text" name="Section" class="form-control rounded-pill" id="Section" readonly
                            value="<?php echo $row['SectionName'] ?>">
                        <label for="LRN">Section</label>
                    </div>

                    <div class="form-floating mb-3 mt-3 col-md-12">
                        <input type="text" placeholder="First Name" required name="FIRSTNAME"
                            class="form-control rounded-pill" id="firstname" readonly
                            value="<?php echo $row['Adviser'] ?>">
                        <label for="firstname">Adviser</label>
                    </div>

                    <div class="form-floating mb-3 col-md-12">
                        <input type="file" name="input_image" class="form-control rounded-pill mb-3">
                        <input type="hidden" name="old_image" value="<?php echo $row['SchedPicture']?>">
                        <img src="../Store_Img/<?php echo $row['SchedPicture']?>" width="100px">
                        <label for="lastname">Schedule</label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary bg-primary mb-2" name="update">Update</button>
                    </div>
                </form>
        </div>
        </div>
        <?php
        }
     }else{
        echo"Data not found :(";
     }
    }
    ?>
        </p>
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