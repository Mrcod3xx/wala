<?php
include('../PHP/insert.php');
if(isset($_POST['delete'])){
    $LrN = $_POST['LrN'];

    $query = mysqli_query($con, "DELETE FROM user WHERE LRN = '$LrN'");
    if($query){
        header("Location: Admin.php");
    }else{
        header("Location: Admin.php");
    }

}

if(isset($_POST['Delete'])){
    $lrn = $_POST['LRN'];
    $query = mysqli_query($con, "UPDATE user SET ParentFirstName = NULL , ParentLastName = NULL, ParentContact = NULL WHERE LRN = '$lrn'");
if($query){
    echo "<script>alert('Update Success!'); window.location.href='Parent.php';</script>";
}else{
    echo "<script>alert('Update Failed!'); window.location.href='Admin.php';</script>";
}
}

if(isset($_POST['deLete'])){
    $lrn = $_POST['teacherID'];
    $query = mysqli_query($con, "DELETE FROM teacher WHERE TeacherID = '$lrn'");
if($query){
    echo "<script>alert('Update Success!'); window.location.href='Parent.php';</script>";
}else{
    echo "<script>alert('Update Failed!'); window.location.href='Admin.php';</script>";
}
}
?>