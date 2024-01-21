<?php
    session_start();
    include("../../config/conn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STS NPIC</title>
    <link rel="shortcut icon" href="../../images/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <div class="container_page">
        <!-- Menu Start -->
        <div class="menu">
            <div class="logo">
                <img src="../../images/logo.png" alt="" width="75" height="auto">
                <p>STS</p>
            </div>
            <ul>
                <a href="">
                    <li><i class="fa-solid fa-house"></i>Home</li>
                </a>
                <a href="../Student_Info/page_student_info.php?orderBy=column3">
                    <li><i class="fa-solid fa-user-large"></i>Student Information</li>
                </a>
                <a href="">
                    <li class="active"><i class="fa-solid fa-user-plus"></i>Add Student</li>
                </a>
                <a href="">
                    <li > <i class="fa-solid fa-user-pen"></i>Edit Student</li>
                </a>
                <a href="">
                    <li><i class="fas fa-list-alt"></i>Grades</li>
                </a>
                <a href="">
                    <li><i class="far fa-calendar-check"></i> Attendance</li>
                </a>
                <a href="">
                    <li><i class="fas fa-file"></i>Reports</li>
                </a>
                <a href="">
                    <li><i class="fa-solid fa-gear"></i>Settings</li>
                </a>
            </ul>
        </div>

        <!-- Menu End -->

        <div class="insert">
            <div class="box_insert">
                <p>Add Student</p>
                    <form action="db_insert.php" method="post" enctype="multipart/form-data" name="frm_insert">
                        <div class="item1">
                            <span>ID Number </span><br>
                            <input type="text" class="txt" name="txt_id" placeholder="Enter student id"><br>
                            <span>Full Name </span><br>
                            <input type="text" class="txt" name="txt_full_name" placeholder="Enter Student full name"><br>
                            <span>Date of Birth </span><br>
                            <div class="dob">
                                <span>Day</span>
                                <select name="cbo_day" class="cbo"> 
                                    <option style="color: red;" value="" selected disabled hidden>Select</option>
                                        <?php
                                            for ($i = 1; $i <= 31; $i++){
                                                $i = sprintf("%02d", $i);
                                                echo "<option value=\"$i\">$i</option>";
                                            }  
                                        ?>
                                </select>
                                <span>Month</span>
                                <select name="cbo_month" id="" class="cbo">
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="january">January</option>
                                        <option value="february">February</option>
                                        <option value="march">March</option>
                                        <option value="april">April</option>
                                        <option value="may">May</option>
                                        <option value="june">June</option>
                                        <option value="july">July</option>
                                        <option value="august">August</option>
                                        <option value="september">September</option>
                                        <option value="october">October</option>
                                        <option value="november">November</option>
                                        <option value="december">December</option>
                                </select>
                                <span>Year</span>
                                <select name="cbo_year" id="" class="cbo">
                                    <option value="" selected disabled hidden>Select</option>
                                        <?php
                                            for ($i = 1950; $i <= 2100; $i++){
                                                echo "<option value=\"$i\">$i</option>";
                                            }  
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="item2">
                            <span>Address </span><br>
                            <input type="text" class="txt" name="txt_address" placeholder="Enter student address"><br>
                            <span>Phone </span><br>
                            <input type="text" class="txt" name="phone" placeholder="Enter student phone"><br>
                            <span>Years </span><br>
                            <select name="cbo_years" class="cbo cbo_years">
                                <option value="" selected disabled hidden>Select</option>
                                    <?php
                                        for ($i = 1; $i <= 4; $i++){
                                            echo "<option value=\"$i\">Year $i</option>";
                                        }  
                                    ?>
                            </select>
                        </div>
                        <div class="item3">
                        <span>Group </span><br>
                            <select name="cbo_group" class="cbo cbo_years">
                                <option value="" selected disabled hidden>Select</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                            </select>
                        </div>
                        <div class="item6">
                            <img id="chosen-image">
                        <label style="text-align: center;" class="custom-file-upload">
                                <input type="file" name="photo" id="upload-button"/>
                                <span class="text-photo">4x6 Photo <br>
                                <i class="fas fa-cloud-upload-alt"></i>
                                </span>
                            </label>
                            
                           
                        </div>
                        
                        <div class="gender item4">
                            <span style="margin-top: 20px;">Gender</span>
                            <div class="choose_gender">
                                <input type="radio" name="gender_r" value="Male" id="">
                                <span>Male</span>
                                <input type="radio" name="gender_r" value="Female" id="">
                                <span>Female</span>
                            </div>
                        </div>
                        <input type="submit" value="Add Student" class="button-36 item5" name="btn_submit">
                    </form>
            </div>
        </div>
    </div>
    <div id="toast_box"></div>

   <!-- Form Insert End -->

   <!-- Code Notify Start -->

    <script>
        let toastBox = document.getElementById('toast_box');
        let successMsg = '<i class="fa-solid fa-circle-check"></i> Login Successfully';
        let insertMsg = '<i class="fa-solid fa-circle-check"></i> Add Student Successfully';
        let errorMsg = '<i class="fa-solid fa-circle-xmark"></i> error Please enter info';
        let invalidMsg = '<i class="fa-solid fa-circle-exclamation"></i> Invalid input, check again';
        function showToast(msg){
            let toast = document.createElement('div');
            toast.classList.add('toast');
            toast.innerHTML = msg;
            toastBox.appendChild(toast);

            if(msg.includes('error')){
                toast.classList.add('error');
            }

            if(msg.includes('Invalid')){
                toast.classList.add('invalid');
            }
            setTimeout(()=>{
                toast.remove();
            },6000)
        }
        <?php
    if (isset($_SESSION['login_success'])) {
        ?>
        window.onload(showToast(successMsg));
        <?php
        unset($_SESSION["login_success"]);
        }else if (isset($_SESSION['insert_success'])){
        ?>
           window.onload (showToast(insertMsg));
        <?php
        unset($_SESSION["insert_success"]);
        }else if (isset($_SESSION['insert_fail'])){
        ?>
            window.onload (showToast(errorMsg));
        <?php
        unset($_SESSION["insert_fail"]);
        }
        ?>
    </script>

    <!-- Code Notify End -->

    <!-- Code Upload Photo Start -->

    <script>
        let uploadButton = document.getElementById("upload-button");
        let customI = document.querySelector(".custom-file-upload");
        let textPhoto = document.querySelector(".text-photo");
        uploadButton.onchange = () => {
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton.files[0]);
            reader.onload = () => {
                
                customI.style.backgroundImage = "url('" + reader.result + "')";
                textPhoto.style.opacity = 0;
                // customI.setAttribute("background-image",reader.result);
                console.log(textPhoto);
            }
          
        }
     
    </script>

    <!-- Code Upload Photo Start -->

</body>
</html>
