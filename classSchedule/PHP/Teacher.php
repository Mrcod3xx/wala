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
    <script>
    function populateInputs(row) {
        // Get table row data
        let cells = row.cells;

        // Populate input fields with row data
        document.getElementById('teacherID').value = cells[0].innerText;
        document.getElementById('firstname').value = cells[1].innerText;
        document.getElementById('lastname').value = cells[2].innerText;
        document.getElementById('Number').value = cells[3].innerText;
    }

    function populateInput(row) {
        // Get table row data
        let cells = row.cells;

        // Populate input fields with row data
        document.getElementById('teacher').value = cells[0].innerText;
        document.getElementById('first').value = cells[1].innerText;
        document.getElementById('last').value = cells[2].innerText;
        document.getElementById('num').value = cells[3].innerText;
    }
    </script>
</head>

<body>
    <header class="header-nav">
        <h1>Teacher Informations</h1>
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
                    Add Teacher
                </button>
            </div>

            <div>
                <input type="text" id="myInput" class="form-control mt-2" onkeyup="myFunction()"
                    placeholder="Search for names..">
            </div>

        </nav>

        <div class="modal fade" id="TeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="closemodalbtn1"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../PHP/SQLInsertInfo.php" method="POST" class="needs-validation" novalidate>

                            <div class="text-center">
                                <img src="../IMAGE/download-modified.png">
                                <p>Teacher</p>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="First Name" required name="Firstname"
                                    class="form-control rounded-pill" id="Firstname">
                                <label for="firstname">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Last Name" required name="Lastname"
                                    class="form-control rounded-pill" id="Lastname">
                                <label for="lastname">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Section" required name="Contact"
                                    class="form-control rounded-pill" id="Contact">
                                <label for="section">Contact Number</label>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="closemodalbtn">Close</button>
                        <button type="submit" class="btn btn-primary" name="suBmit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table bg-white table-striped" width="100%" id="myTable">
            <thead>
                <tr class="header">
                    <th>TeacherID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
   include('../PHP/insert.php');
   $query = ("SELECT * from teacher");
   $result = mysqli_query($con,$query);
   if($result){
    while($row = mysqli_fetch_assoc($result)){
        $ID = $row['TeacherID'];
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $ContactNumber = $row['ContactNumber'];
        echo '<tr>
        <td>'.$ID.'</td>
        <td>'.$FirstName.'</td>
        <td>'.$LastName.'</td>
        <td>'.$ContactNumber.'</td>
        <td>
        <button type="button" id="nameInput" onclick="populateInputs(this.parentElement.parentElement)" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#EditModal">
  Edit
</button>
<button type="button" id="nameInput" onclick="populateInput(this.parentElement.parentElement)" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#DeleteModal">
Delete
</button>
        </td>
    </tr>';
    }
   }

    ?>
            </tbody>
        </table>
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Teacher</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../PHP/SQLupdateInfo.php" method="POST" class="needs-validation row" novalidate>
                            <input type="text" placeholder="First Name" name="teacherID"
                                class="form-control rounded-pill" id="teacherID" hidden>
                            <div class="form-floating mb-3">
                                <input type="text" placeholder="First Name" required name="FIRSTNAME"
                                    class="form-control rounded-pill" id="firstname">
                                <label for="firstname">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Last Name" required name="LASTNAME"
                                    class="form-control rounded-pill" id="lastname">
                                <label for="lastname">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Phone Number:" required name="NUMBER"
                                    class="form-control rounded-pill" id="Number">
                                <label for="number">Phone Number</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="saVe">Save changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Student</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../PHP/SQLdeleteInfo.php" method="POST" class="needs-validation row" novalidate>
                    <input type="text" placeholder="First Name" name="teacherID"
                                class="form-control rounded-pill" id="teacher" hidden>
                            <div class="form-floating mb-3">
                                <input type="text" placeholder="First Name" required name="FIRSTNAME"
                                    class="form-control rounded-pill" id="first" readonly>
                                <label for="firstname">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Last Name" required name="LASTNAME"
                                    class="form-control rounded-pill" id="last" readonly>
                                <label for="lastname">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Phone Number:" required name="NUMBER"
                                    class="form-control rounded-pill" id="num" readonly>
                                <label for="number">Phone Number</label>
                            </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="deLete">Delete</button>
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
            td = tr[i].getElementsByTagName("td")[0];
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