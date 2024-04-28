<?php
include("insert.php");
if(isset($_POST['submit_image']) && (isset($_FILES['Input_image']))){
    
    $img_name = $_FILES['Input_image']['name'];
    $img_size = $_FILES['Input_image']['size'];
    $tmp_name = $_FILES['Input_image']['tmp_name'];
    $error = $_FILES['Input_image']['error'];
    
    if($error === 0){
        if($img_size > 500000){
            $em = "Sorry, your file is too large";
            header("Location: EditSched.php?error=$em");
        }else{
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
    
            $allowed_exs = array("jpg", "png", "jpeg");
    
            if(in_array($img_ex_lc, $allowed_exs)){
                $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                // where to store
                $img_upload_path = '../Store_Img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);
    
                //Store to database
                $query = ("INSERT INTO section (SchedPicture) VALUES('$new_img_name')");
                mysqli_query($con,$query);
                // View Picture
                echo "<script>alert('Adding Success!'); window.location.href='EditSched.php';</script>";
    
    
            }else{
                $em = "You can't upload files of this type";
        header("Location: EditSched.php?error=$em");
            }
        }
    
    }else{
        $em = "An error has occured!";
        header("Location: EditSched.php?error=$em");
    }
    }else{
        echo "<script>alert('Adding Success!'); window.location.href='EditSched.php';</script>";
    }
?>