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
        document.getElementById('LRN').value = cells[0].innerText;
        document.getElementById('FIRSTNAME').value = cells[1].innerText;
        document.getElementById('LASTNAME').value = cells[2].innerText;
        document.getElementById('CONTACT').value = cells[3].innerText;
    }

    function populateInput(row) {
        // Get table row data
        let cells = row.cells;

        // Populate input fields with row data
        document.getElementById('Lrn').value = cells[0].innerText;
        document.getElementById('Firstname').value = cells[1].innerText;
        document.getElementById('Lastname').value = cells[2].innerText;
        document.getElementById('contact').value = cells[3].innerText;
    }
    </script>
</head>

<body>
    <header class="header-nav">
        <h1>Parent Informations</h1>
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
                <button type="button" class="btn btn-primary m-2" data-bs-toggle="modal" data-bs-target="#TeacherModal"
                    id="modalbtn">
                    Add Parent
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
                        <h5 class="modal-title" id="exampleModalLabel">Add Parent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="closemodalbtn1"></button>
                    </div>
                    <div class="modal-body">
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
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="closemodalbtn">Close</button>
                        <button type="submit" class="btn btn-primary" name="Submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table class="table bg-white table-striped" width="100%" id="myTable">
            <thead>
                <tr class="header">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>ContactNumber</th>
                    <th>Children FirstName</th>
                    <th>Children LastName</th>
                    <th>Grade Level</th>
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
        $FirstName = $row['ParentFirstName'];
        $LastName = $row['ParentLastName'];
        $Contact = $row['ParentContact'];
        $StudFirst = $row['FirstName'];
        $StudLast = $row['LastName'];
        $GradeLevel = $row['GradeLevel'];
        if($FirstName !=''){
        echo '<tr>
        <td style="display:none;">'.$LRN.'</td>
        <td>'.$FirstName.'</td>
        <td>'. $LastName.'</td>
        <td>'.$Contact.'</td>
        <td>'. $StudFirst.'</td>
        <td>'.$StudLast.'</td>
        <td>'.$GradeLevel.'</td>
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
}
    ?>
            </tbody>
        </table>
        <div class="modal fade" id="EditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Parent</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                <form action="../PHP/SQLupdateInfo.php" method="POST" class="needs-validation row"
                                    novalidate>
                                    <div class="sched">
                                        <p class="text-lg-center text-black-50 mt-2">Current Information</p>
                                    </div>
                                    <input type="text" id="LRN" name="LRN" hidden>
                                    <div class="form-floating mb-3 mt-3 col-md-12">
                                        <input type="text" name="FIRSTNAME" class="form-control rounded-pill"
                                            id="FIRSTNAME">
                                        <label for="LRN">LRN</label>
                                    </div>

                                    <div class="form-floating mb-3 col-md-12">
                                        <input type="text" placeholder="First Name" required name="LASTNAME"
                                            class="form-control rounded-pill" id="LASTNAME">
                                        <label for="firstname">First Name</label>
                                    </div>

                                    <div class="form-floating mb-3 col-md-12">
                                        <input type="text" placeholder="Last Name" required name="CONTACT"
                                            class="form-control rounded-pill" id="CONTACT">
                                        <label for="lastname">Last Name</label>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="Save">Save changes</button>
                                </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Parent</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                                <form action="../PHP/SQLdeleteInfo.php" method="POST" class="needs-validation row"
                                    novalidate>
                                    <div class="sched">
                                        <p class="text-lg-center text-black-50 mt-2">Information Preview</p>
                                    </div>
                                    <input type="text" id="Lrn" name="LRN" hidden>
                                    <div class="form-floating mb-3 mt-3 col-md-12">
                                        <input type="text" name="FIRSTNAME" class="form-control rounded-pill"
                                            id="Firstname" readonly>
                                        <label for="LRN">FirstName</label>
                                    </div>

                                    <div class="form-floating mb-3 col-md-12">
                                        <input type="text" placeholder="First Name" required name="LASTNAME"
                                            class="form-control rounded-pill" id="Lastname" readonly>
                                        <label for="firstname">LastName</label>
                                    </div>

                                    <div class="form-floating mb-3 col-md-12">
                                        <input type="text" placeholder="Last Name" required name="CONTACT"
                                            class="form-control rounded-pill" id="contact" readonly>
                                        <label for="lastname">Contact</label>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="Delete">Delete</button>
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