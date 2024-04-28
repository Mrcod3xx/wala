<?php
include('../PHP/insert.php');
if(isset($_POST['submit'])){
    $lrn = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $section = $_POST['section'];
    $birthday = $_POST['birthday'];
    $gradelevel = $_POST['gradelevel'];
    $number = $_POST['number'];

    $query = mysqli_query($con, "INSERT INTO user (LRN,FirstName,LastName,Section,Birthday,GradeLevel,ContactNumber) VALUES ('$lrn','$firstname','$lastname','$section','$birthday','$gradelevel','$number')");
    if($query){
        header("Location: User.php");
    }else{
        header("Location: createAcc.php");
    }
    
}

if(isset($_POST['submiT'])){
    $lrn = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $section = $_POST['section'];
    $birthday = $_POST['birthday'];
    $gradelevel = $_POST['gradelevel'];
    $number = $_POST['number'];

    $query = mysqli_query($con, "INSERT INTO user (LRN,FirstName,LastName,Section,Birthday,GradeLevel,ContactNumber) VALUES ('$lrn','$firstname','$lastname','$section','$birthday','$gradelevel','$number')");
    if($query){
        header("Location: StudentLog.php");
    }else{
        header("Location: createAcc.php");
    }
    
}

if(isset($_POST['Submit'])){
    $lrn = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $number = $_POST['contact'];

    $sql = "UPDATE user SET ParentFirstName = '$firstname', ParentLastName = '$lastname', ParentContact = '$number' WHERE LRN = '$lrn'";
    $result = $con->query($sql);
    
    if ($result->num_rows > 0) {
        header("Location: Admin.php");
    }else{
        header("Location: Parent.php");
    }
    }   

if(isset($_POST['suBmit'])){
    $firstname = $_POST['Firstname'];
    $lastname = $_POST['Lastname'];
    $number = $_POST['Contact'];

    $query = mysqli_query($con, "INSERT INTO teacher (FirstName,LastName,ContactNumber) VALUES ('$firstname','$lastname','$number')");
    if($query){
        header("Location: Admin.php");
    }else{
        header("Location: Parent.php");
    }
}

if(isset($_POST['SuBmit'])){
    $lrn = $_POST['lrn'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $number = $_POST['contact'];

    $query = mysqli_query($con, "UPDATE user SET ParentFirstName = '$firstname', ParentLastName = '$lastname', ParentContact = '$number' WHERE LRN = '$lrn'");
    if($query == 0){
        header("Location: ParentLog.php");
    }else{
        header("Location: parentCreateAcc.php");
    }
    
}
?>