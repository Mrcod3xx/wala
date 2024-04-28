<?php
include('../PHP/insert.php');
if(isset($_POST['SAVE'])){
    $LRN = $_POST['LRN'];
    $FIRSTNAME = $_POST['FIRSTNAME'];
    $LASTNAME = $_POST['LASTNAME'];
    $SECTION = $_POST['SECTION'];
    $GRADELEVEL = $_POST['GRADELEVEL'];
    $NUMBER = $_POST['NUMBER'];

    $query = mysqli_query($con, "UPDATE user SET FirstName = '$FIRSTNAME', LastName = '$LASTNAME', Section = '$SECTION', GradeLevel = '$GRADELEVEL', ContactNumber = '$NUMBER' WHERE LRN = '$LRN'");
    if($query){
        header("Location: Admin.php");
    }else{
        header("Location: login.php");
    }

}
if(isset($_POST['Save'])){
    $lrn = $_POST['LRN'];
    $first = $_POST['FIRSTNAME'];
    $second = $_POST['LASTNAME'];
    $third = $_POST['CONTACT'];
    $query = mysqli_query($con, "UPDATE user SET ParentFirstName = '$first', ParentLastName = '$second', ParentContact = '$third' WHERE LRN = '$lrn'");
if($query){
    echo "<script>alert('Update Success!'); window.location.href='Parent.php';</script>";
}else{
    echo "<script>alert('Update Failed!'); window.location.href='Admin.php';</script>";
}
}

if(isset($_POST['saVe'])){
    $lrn = $_POST['teacherID'];
    $first = $_POST['FIRSTNAME'];
    $second = $_POST['LASTNAME'];
    $third = $_POST['NUMBER'];
    $query = mysqli_query($con, "UPDATE teacher SET FirstName = '$first', LastName = '$second', ContactNumber = '$third' WHERE TeacherID = '$lrn'");
if($query){
    echo "<script>alert('Update Success!'); window.location.href='Parent.php';</script>";
}else{
    echo "<script>alert('Update Failed!'); window.location.href='Admin.php';</script>";
}
}
?>