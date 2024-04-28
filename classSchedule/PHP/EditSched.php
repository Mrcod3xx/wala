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
        <a href="../PHP/Teacher.php"><i class="fas fa-book"></i>Teachers</a>
        <a href="../PHP/EditSched.php"><i class="fas fa-users"></i> Section</a>
        <a href="../PHP/dashboard.php"><i class="fas fa-cog"></i> Dashboard</a>
    </div>

    <div class="main">
        <span style="font-size:30px;cursor:pointer; position: absolute; top: 20px; left: 20px;" onclick="toggleNav()"
            id="burgerBtn">&#9776;</span>
        <p>
    <nav class="nav">
    <div>
                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#exampleModal"
                    id="modalbtn">
                    Add Student
                </button>
            </div>
        <div>
        <input type="text" id="myInput" class="form-control m-2" onkeyup="myFunction()" placeholder="Search for section..">
        </div>
</nav>
    <table class="table bg-white table-striped" width="100%" id="myTable">
        <thead>
            <tr class="header">
                <th>SectionID</th>
                <th>SectionName</th>
                <th>Adviser</th>
                <th>SchedPicture</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
   include('../PHP/insert.php');
   $i=1;
   $rows = mysqli_query($con,"SELECT * from section");
   ?>
            <?php foreach($rows as $row):?>
            <tr>
                <td><?php echo $row['SectionID']?></td>
                <td><?php echo $row['SectionName']?></td>
                <td><?php echo $row['Adviser']?></td>
                <td><img src="../Store_Img/<?php echo $row['SchedPicture']?>" width="100px"></td>
                <td id="ImgTable"><a href="../PHP/EditSchedform.php?SectionId=<?php echo $row['SectionID']?>" class="btn btn-primary" name="update">Edit</a></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <div class="modal fade" id="TeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="closemodalbtn1"></button>
                    </div>
                    <div class="modal-body">
                    <?php if(isset($_GET['error'])): ?>
            <p class="text-center"><?php echo $_GET['error']; ?></p>
            <?php endif ?>
            <form action="../PHP/upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="Input_image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="closemodalbtn">Close</button>
                        <button type="submit" class="btn btn-primary"  name="submit_image" value="Upload">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
            </p>
    <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
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