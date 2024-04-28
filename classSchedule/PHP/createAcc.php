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
            <form action="../PHP/SQLInsertInfo.php" method="POST" class="needs-validation" novalidate>

                <a href="../PHP/User.php" class="align-self-end" id="arrow">
                    <- </a>

                        <img src="../IMAGE/download-modified.png">
                        <p>Student</p>

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
                            <select placeholder="Section" required name="section"
                                class="form-control rounded-pill" id="section">
                            <option value="Programming">Programming</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="CSS">CSS</option>
                            <option value="Animation">Animation</option>
                            </select>
                            <label for="section">Section</label>
                        </div>

                        <div class="form-floating mb-3">
                                <input type="date" placeholder="Birthday" required name="birthday"
                                    class="form-control rounded-pill" id="birthday">
                                <label for="birthday">Birthday</label>
                            </div>

                        <div class="form-floating mb-3">
                                <select placeholder="Grade Level" required name="gradelevel"
                                class="form-control rounded-pill" id="gradelevel">
                            <option value="12">12</option>
                            <option value="11">11</option>
                            </select>
                            <label for="gradelevel">Grade Level</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" placeholder="Phone Number:" required name="number"
                                class="form-control rounded-pill" id="number">
                            <label for="number">Phone Number</label>
                        </div>

                        <button type="submit" class="btn" name='submiT'>Submit</button>
            </form>
        </div>
    </div>

    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <script src="../JS/form-validate.js"></script>
</body>

</html>