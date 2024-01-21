<?php
    session_start();
    include("../../config/conn.php");
    $sql = mysqli_query($conn, "SELECT * FROM `tbl_add_student`");
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
                <a href="page_student_info.php">
                    <li class="active"><i class="fa-solid fa-user-large"></i>Student Information</li>
                </a>
                <a href="../Insert/page_insert.php">
                    <li><i class="fa-solid fa-user-plus"></i>Add Student</li>
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

        <!-- Page Student Info Start -->

        <div class="std_info">
            <div class="list_student">
           <div class="all_f">
           
              <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
              
              <div class="filter">
              
            <div class="f_gender">
              <label for="">Gender</label>
              <select name="" id="myCbo_Gender" onchange="myFilter()">
                <option value="All">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>

            <div class="f_dob">
              <label for="">DOB</label>
              <select name="" id="myCbo_DOB" onchange="myFilter()">
              <option value="All">All</option>
                                  
              </select>
              </div>

              <div class="f_address">
              <label for="myCbo_Address">Address</label>
              <select name="" id="" onchange="myFilter()">
                <option value="All">All</option>
              </select>
              </div>

              <div class="f_years">
              <label for="">Years</label>
              <select name="" id="myCbo_years" onchange="myFilter()">
                <option value="All">All</option> 
                <option value="1">1</option> 
                <option value="2">2</option> 
                <option value="3">3</option> 
                <option value="4">4</option> 
               
              </select>
              </div>
              <div class="f_group">
              <label for="">Group</label>
              <select name="" id="myCbo_group"  onchange="myFilter()" >
                <option value="All">All</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                <option value="F">F</option>
              </select>
              </div>
              </div>
              </div>
                <table id="myTable">
                    <tr>
                        <th>No<i ></i></th>
                        <th><a  href="?orderBy=column2">ID<i id="ID" ></i></a></th>
                        <th>Photo</th>
                        <th><a id="myName" href="?orderBy=column3">Name<i id="name"></i></a></th>
                        <th><a href="?orderBy=column4">Gender<i id="gender"></i></a></th>
                        <th><a href="?orderBy=column5">DOB<i id="dob"></i></a></th>
                        <th><a href="?orderBy=column6">Address<i id="address"></i></a></th>
                        <th>Phone</th>
                        <th><a href="?orderBy=column7">Years<i id="years"></i></a></th>
                        <th><a href="?orderBy=column8">Group<i id="group"></i></a></th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $no = 1;
                    
                    $orBy = isset($_GET["orderBy"]) ? $_GET["orderBy"] : "default_order";

                    if($orBy == "column3"){
                    $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY Full_Name");
                    ?>
                    <script>
                        const name = document.getElementById("name");
                        name.classList.add("fa", "fa-long-arrow-down");
                        console.log(name);
                    </script>
                    <?php
                    }else if($orBy == "column2"){
                        $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY ID_Number");
                        ?>
                        <script>
                            const id = document.getElementById("ID");
                            id.classList.add("fa", "fa-long-arrow-down");
                            console.log(id);
                        </script>
                        <?php
                    }else if($orBy == "column4"){
                        $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY Gender");
                        ?>
                    <script>
                        const gender = document.getElementById("gender");
                        gender.classList.add("fa", "fa-long-arrow-down");
                        console.log(gender);
                    </script>
                    <?php

                    }else if($orBy == "column5"){
                        $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY DOB");
                        ?>
                        <script>
                            const dob = document.getElementById("dob");
                            dob.classList.add("fa", "fa-long-arrow-down");
                            console.log(dob);
                        </script>
                        <?php
                        }else if($orBy == "column6"){
                        $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY Address");
                        ?>
                        <script>
                            const address = document.getElementById("address");
                            address.classList.add("fa", "fa-long-arrow-down");
                            console.log(address);
                        </script>
                        <?php
                    }else if($orBy == "column7"){
                        $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY Year");
                        ?>
                        <script>
                            const years = document.getElementById("years");
                            years.classList.add("fa", "fa-long-arrow-down");
                            console.log(years);
                        </script>
                        <?php
                    }else if($orBy == "column8"){
                        $sql = mysqli_query($conn,"SELECT * FROM `tbl_add_student` ORDER BY `group`");
                        ?>
                        <script>
                            const group = document.getElementById("group");
                            group.classList.add("fa", "fa-long-arrow-down");
                            console.log(group);
                        </script>
                        <?php
                    }
                    while($data = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data["ID_Number"] ?></td>
                        <td><img src="../photo/<?php
                        if($data["Photo"]){
                            echo $data["Photo"]; 
                        }else echo "profile.png"  ?>"
                            style='max-width: 100%;width:60px; height:60px; border-radius: 50%; box-shadow: rgba(6, 24, 44, 0.4) 0px 0px 0px 2px, rgba(6, 24, 44, 0.65) 0px 4px 6px -1px, rgba(255, 255, 255, 0.08) 0px 1px 0px inset; margin-top: 8px;'></td>
                        <td><?php echo $data["Full_Name"] ?></td>
                        <td><?php echo $data["Gender"] ?></td>
                        <td><?php echo $data["DOB"] ?></td>
                        <td><?php echo $data["Address"] ?></td>
                        <td><?php echo $data["Phone"] ?></td>
                        <td><?php echo $data["Year"] ?></td>
                        <td><?php echo $data["Group"] ?></td>
                        
                        <td><a title="Edit" href="../Edit_Student/page_edit.php"><?php echo "<i style=\"font-size:20px;color:blue\" class=\"fas fa-edit\"></i>" ?></a>
                        
                        
                        <a title="Delete" href=""><?php echo "<i class=\"fa fa-trash\" style=\"font-size:20px;color:red\"></i>" ?></a></td>
                        
                    </tr>
                    <?php
                     $no++;
                    }
                   
                    ?>
                </table>
            </div>
        </div>
    <div id="toast_box"></div>

   <!-- Page Student Info End -->

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

    <!-- Code Search Name Start -->

        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[3];
                    if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                    }       
                }
                }

                function myFilter(){
                var cbo_gender, cbo_years, cbo_group, filterGender, filter ,filterG, table, tr, td, i ,txtGender, txtYears, txtGroup;
                cbo_gender = document.getElementById("myCbo_Gender");
                cbo_years = document.getElementById("myCbo_years");
                cbo_group = document.getElementById("myCbo_group");
                filter = cbo_years.value.toUpperCase();
                filterGender = cbo_gender.value.toUpperCase();
                filterG = cbo_group.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                if (filter === "ALL" && filterG === "ALL" && filterGender === "ALL") {
                    // If both "Years" and "Group" are set to "ALL", display all rows
                    for (i = 0; i < tr.length; i++) {
                        tr[i].style.display = "";
                    }
                    return;
                }
                    for (i = 0; i < tr.length; i++) {
                    td4 = tr[i].getElementsByTagName("td")[4];
                    td8 = tr[i].getElementsByTagName("td")[8];
                    td9 = tr[i].getElementsByTagName("td")[9];
                    
                    if (td4 && td8 && td9) {
                        txtGender = td4.textContent || td4.innerHTML;
                        txtYears = td8.textContent || td8.innerText;
                        txtGroup = td9.textContent || td9.innerText;

                        // Check if both "Years" and "Group" match the selected values
                        var genderMatch = filterGender === "ALL" || txtGender.toUpperCase().indexOf(filterGender) > -1;
                        var yearsMatch = filter === "ALL" || txtYears.toUpperCase().indexOf(filter) > -1;
                        var groupMatch = filterG === "ALL" || txtGroup.toUpperCase().indexOf(filterG) > -1;

                        // If both conditions are met, display the row; otherwise, hide the row
                        if (genderMatch && yearsMatch && groupMatch) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    } 
                 }
                }
        </script>

    <!-- Code Search Name Start -->

</body>
</html>
