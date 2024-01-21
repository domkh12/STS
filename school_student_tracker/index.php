<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.ico" type="image/x-icon">
    <title>STS NPIC</title>
    <script src="jquery-3.7.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Login UI Start -->
    
    <div class="container">
       <div class="big_box">
            <div class="box_login">
            <div class="box_login_header">
                    <p>LOG IN</p>
                </div>
                <form action="admin/Login/db_login.php?op=in" method="post" name="frm_login">
                        <label class="lab_log">Username</label><br>
                        <input type="text" name="txt_username" class="txt"><br>
                        <label class="lab_log">Password</label><br>
                        <input type="password" name="txt_pwd" class="txt"><br>
                        <a href="" class="for_pwd">Forgot Password?</a><br>
                        <input type="submit" value="Log In" name="btn_login" class="btn_login">
                </form>
            </div>
            <img src="images/banner2.png" alt="">
       </div>
    </div>
    <div id="toast_box"></div>

    <!-- Login UI End -->

    <?php
    // Check if there is an error flag set (you may set this flag in your login logic)
    if (isset($_SESSION['login_error'])) {
    ?>
        <script>
            let toastBox = document.getElementById('toast_box');
            let successMsg = '<i class="fa-solid fa-circle-check"></i> Successfully Submitted';
            let errorMsg = '<i class="fa-solid fa-circle-xmark"></i> Username and Password are Incorrect!';
            let invalidMsg = '<i class="fa-solid fa-circle-exclamation"></i> Invalid input, check again';
            function showToast(msg){
                let toast = document.createElement('div');
                toast.classList.add('toast');
                toast.innerHTML = msg;
                toastBox.appendChild(toast);

                if(msg.includes('Incorrect')){
                    toast.classList.add('error');
                }

                if(msg.includes('Invalid')){
                    toast.classList.add('invalid');
                }

                setTimeout(()=>{
                    toast.remove();
                },6000)
            }
            window.onload(showToast(errorMsg));
    </script>
    <?php
    // Clear the error flag to prevent displaying the alert on subsequent page loads
    unset($_SESSION['login_error']);
    }
    ?>  
</body>
</html>
