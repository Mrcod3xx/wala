    <?php
    include('../PHP/insert.php');
        if(isset($_POST['update']) && (isset($_FILES['input_image']))){
           $old_image = $_POST['old_image'];
           $new_image = $_FILES['input_image']['name'];
$img_size = $_FILES['input_image']['size'];
$tmp_name = $_FILES['input_image']['tmp_name'];
$error = $_FILES['input_image']['error'];
           $Section = $_POST['Section'];

        if($error === 0){
           if($new_image !=""){
            $new_img_name = $new_image;
            
           }else{
            $new_img_name = $old_image;
           }

            if($new_image !=''){
                $img_ex = pathinfo($new_image, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
        
                $allowed_exs = array("jpg", "png", "jpeg");
        
                if(in_array($img_ex_lc, $allowed_exs)){
                    $new_img_name = uniqid("IMG-",true).'.'.$img_ex_lc;
                    // where to store
                    $img_upload_path = '../Store_Img/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
                    unlink("../Store_Img/".$old_image);

                    //store to database
                     $query = ("UPDATE section SET SchedPicture = '$new_img_name' WHERE SectionName = '$Section' ");
                     mysqli_query($con,$query);
        
                    // View Picture
                    header('location:EditSched.php');
                }
           }else{
            header('location:Admin.php');
           }
            }else{
            echo"error";
         }
     }else{
        echo"error";
    }
        ?>