<?php
session_start();
    include("../../config/conn.php");
    $op = $_GET["op"];
    $btn = $_POST["btn_login"];
    if($op == "in"){
        if(isset($btn)){
            $username = $_POST["txt_username"];
            $password = $_POST["txt_pwd"];
            $sql = mysqli_query($conn,"SELECT * FROM tbl_login WHERE Username = '$username' AND Password = '$password'");
            if(mysqli_num_rows($sql) == 1){
                $_SESSION['login_success'] = true;
                echo "<script>
                document.location = \"../Insert/page_insert.php\";
                </script>";
            }else {
                $_SESSION['login_error'] = true;
                echo "<script>
                        document.location = \"../../index.php\";
                    </script>";
            }
            }
    }
?>



