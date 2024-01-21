<?php
    session_start();
    include("../../config/conn.php");
    $id = $_POST["txt_id"];
    $full_name = $_POST["txt_full_name"];
    $cbo_day = $_POST["cbo_day"];
    $cbo_month = $_POST["cbo_month"];
    $cbo_year = $_POST["cbo_year"];
    $dob = $cbo_day ."-". $cbo_month ."-". $cbo_year;
    $address = $_POST["txt_address"];
    $phone = $_POST["phone"];
    $years = $_POST["cbo_years"];
    $group = $_POST["cbo_group"];
    $gender = $_POST["gender_r"];
    $photo = $_FILES["photo"]["name"];
    $btn_submit = $_POST["btn_submit"];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $photo_dir = "../photo/";
    $photo_folder = $photo_dir . $photo;
    if(isset($btn_submit)){
       
        if(empty($id) || empty($full_name) || empty($cbo_day) 
        || empty($cbo_month) || empty($cbo_year) || empty($address)
        || empty($years) || empty($gender) || empty($group)){
            $_SESSION['insert_fail'] = true;
            echo "<script>
            document.location = \"page_insert.php\";
            </script>";
        }else{
            $sql = mysqli_query($conn, "INSERT INTO `tbl_add_student`(`ID`, `ID_Number`, `Full_Name`, `Gender`, `DOB`, `Address`, `Phone`, `Year`, `Group`, `Photo`) VALUES (NULL,'$id','$full_name','$gender','$dob','$address','$phone','$years', '$group' ,'$photo')");
            if($sql){
                move_uploaded_file($file_tmp,$photo_folder);
                $_SESSION['insert_success'] = true;
                echo "<script>
                document.location = \"page_insert.php\";
                </script>";
            }
        }
    }
?>

