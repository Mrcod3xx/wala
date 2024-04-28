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
        document.getElementById('InputLrn').value = cells[0].innerText;
        document.getElementById('Firstname').value = cells[1].innerText;
        document.getElementById('Lastname').value = cells[2].innerText;
        document.getElementById('Section').value = cells[3].innerText;
        document.getElementById('Gradelevel').value = cells[4].innerText;
        document.getElementById('Number').value = cells[5].innerText;
    }

    function populateInput(row) {
        // Get table row data
        let cells = row.cells;

        // Populate input fields with row data
        document.getElementById('inputLRN').value = cells[0].innerText;
        document.getElementById('FirstName').value = cells[1].innerText;
        document.getElementById('LastName').value = cells[2].innerText;
        document.getElementById('SecTion').value = cells[3].innerText;
        document.getElementById('GradeLevel').value = cells[4].innerText;
        document.getElementById('NumBer').value = cells[5].innerText;
    }
    </script>
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
                                <p>Student</p>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="LRN:" required name="lrn"
                                    class="form-control rounded-pill" id="InputLRN">
                                <label for="InputLRN">LRN</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="First Name" required name="firstname"
                                    class="form-control rounded-pill" id="firstname">
                                <label for="firstname">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Last Name" required name="lastname"
                                    class="form-control rounded-pill" id="lastname">
                                <label for="lastname">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Section" required name="section"
                                    class="form-control rounded-pill" id="section">
                                <label for="section">Section</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="date" placeholder="Birthday" required name="birthday"
                                    class="form-control rounded-pill" id="birthday">
                                <label for="birthday">Birthday</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Grade Level" required name="gradelevel"
                                    class="form-control rounded-pill" id="gradelevel">
                                <label for="gradelevel">Grade Level</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Phone Number:" required name="number"
                                    class="form-control rounded-pill" id="number">
                                <label for="number">Phone Number</label>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="closemodalbtn">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table bg-white table-striped" width="100%" id="myTable">
            <thead>
                <tr class="header">
                    <th>LRN</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Section</th>
                    <th>Birthday</th>
                    <th>Grade Level</th>
                    <th>Contact Number</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
   include('../PHP/insert.php');
   $query = ("SELECT * from user");
   $result = mysqli_query($con,$query);
   if($result){
    while($row = mysqli_fetch_assoc($result)){
        $LRN = $row['LRN'];
        $FirstName = $row['FirstName'];
        $LastName = $row['LastName'];
        $Section = $row['Section'];
        $Birthday = $row['Birthday'];
        $GradeLevel = $row['GradeLevel'];
        $ContactNumber = $row['ContactNumber'];
        echo '<tr>
        <th scope="row">'.$LRN.'</th>
        <td>'.$FirstName.'</td>
        <td>'.$LastName.'</td>
        <td>'.$Section.'</td>
        <td>'.$Birthday.'</td>
        <td>'.$GradeLevel.'</td>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../PHP/SQLupdateInfo.php" method="POST" class="needs-validation row" novalidate>
                            <div class="form-floating mb-3">
                                <input type="number" placeholder="LRN:" required name="LRN"
                                    class="form-control rounded-pill" id="InputLrn">
                                <label for="InputLRN">LRN</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="First Name" required name="FIRSTNAME"
                                    class="form-control rounded-pill" id="Firstname">
                                <label for="firstname">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Last Name" required name="LASTNAME"
                                    class="form-control rounded-pill" id="Lastname">
                                <label for="lastname">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Section" required name="SECTION"
                                    class="form-control rounded-pill" id="Section">
                                <label for="section">Section</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Grade Level" required name="GRADELEVEL"
                                    class="form-control rounded-pill" id="Gradelevel">
                                <label for="gradelevel">Grade Level</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Phone Number:" required name="NUMBER"
                                    class="form-control rounded-pill" id="Number">
                                <label for="number">Phone Number</label>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="SAVE">Save changes</button>
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
                    <form action="../PHP/SQLdeleteInfo.php" method="POST" class="needs-validation row"
                                    novalidate>
                            <div class="form-floating mb-3">
                                <input type="number" placeholder="LRN:" required name="LrN"
                                    class="form-control rounded-pill" id="inputLRN" readonly>
                                <label for="InputLRN">LRN</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="First Name" required name="FIRSTNAME"
                                    class="form-control rounded-pill" id="FirstName"readonly>
                                <label for="firstname">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Last Name" required name="LASTNAME"
                                    class="form-control rounded-pill" id="LastName" readonly>
                                <label for="lastname">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" placeholder="Section" required name="SECTION"
                                    class="form-control rounded-pill" id="SecTion" readonly>
                                <label for="section">Section</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Grade Level" required name="GRADELEVEL"
                                    class="form-control rounded-pill" id="GradeLevel" readonly>
                                <label for="gradelevel">Grade Level</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" placeholder="Phone Number:" required name="NUMBER"
                                    class="form-control rounded-pill" id="NumBer" readonly>
                                <label for="number">Phone Number</label>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="delete">Delete</button>
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