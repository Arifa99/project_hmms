<?php
    if (isset($_POST['submitted']))
    {
        $target = "images/".basename($_FILES['photo']['name']);
        include("dbconn.php");

        $name = $_POST['name'];
        $course = $_POST['course'];
        $enroll = $_POST['enroll'];
        $room = $_POST['room'];
        $block = $_POST['block'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $image = $_FILES['photo']['name'];
        $sqlinsert = "INSERT INTO student (name, course, enroll, room, block, email, password, photo) VALUES('$name','$course','$enroll','$room', '$block','$email','$password', '$image')";
    
        if(mysqli_query($dbconn, $sqlinsert))
        {
            move_uploaded_file($_FILES['photo']['tmp_name'], $target);
            echo "<script>alert('Successfully registered');</script>";
        }
        else{
            echo "<script>alert('Error Could't registered');</script>";
            }

        mysqli_close($dbconn);      
    }
?>

<!DOCTYPE html>
<html lang="en">
                                    <!-- HEAD SECTION Start -->
<head>
        <title>Registration::</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link type="text/css" rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
             body{
            background-color: whitesmoke;
            background-image: url(../img/fi.png);
            background-size: cover;
            }
            form{
                background-color: rgb(0,0,0,0.5);
                width: 30%;
                margin-left: 400px;
                margin-top: 30px;
                margin-right: 40%;
                padding: 10px;
                border-radius: 5px;
                }
            legend{
                color:orange;
                }              
            input[type=text], input[type=password], input[type=email], input[type=file] {
                width: 85%;
                padding: 5px;
                margin-left: 25px;
                color: white;
                background-color: rgb(0,0,0,0.1);
                margin-top: 5px;
                margin-bottom: 5px;
                display: inline-block;
                border: 1px solid grey;
                box-sizing: border-box;  
                }
            lable {  
                color: lightgray;
                margin-left: 28px;
                text-decoration-style: solid;
                font-size: 20px;
                text-shadow: 1px 1px 1px gray;
                }       
            .button {
                display: inline-block;
                background-color: cadetblue;
                border: none;
                color: #FFFFFF;
                text-align: center;
                font-size: 15px;
                padding: 12px 20px;
                width: 200px;
                transition: all 0.5s;
                cursor: pointer;
                margin-right: 5%;
                margin-top: 20px;
                float: right;
                border-radius: 3px;
                box-shadow: 3px 3px #CCD6DD;
                }
            .button span {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
                }

            .button span:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                top: 0;
                right: -20px;
                transition: 0.5s;
                }
            .button:hover span {
                padding-right: 25px;
                }
            .button:hover span:after {
                opacity: 1;
                right: 0;
                }
            .navbar{
            margin-top:-18px;
            width:100%;
            position: sticky;
            top: 0px;
            }
        </style>
</head>                          <!-- HEAD SECTION END -->
    
                                 <!-- BODY SECTION START -->
<body>
    <?php include 'header.php'; ?>
    
                                 <!-- Navigation Bar Start -->
     <div class="navbar">
        <ul>
            <a href="../index.php">Home</a>
            
            <div class="dropdown">
                <button class="dropbtn">Registration 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="adminregistration.php">Admin</a>
                    <a href="#">Student</a>
                </div>
            </div>
            
            <div class="dropdown">
                <button class="dropbtn">Login
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="adminlogin.php">Admin</a>
                    <a href="studentlogin.php">Student</a>
                </div> 
            </div>
            
            <a href="facilities.php">Facilities</a>
            <a href="help.php">Help</a>
           
        </ul>
    </div>                  <!-- Navigation Bar Ends -->
   
                             <!-- Student Registration Form Start-->
    <div id="content">   
        <form action="#" method="post" enctype="multipart/form-data">
            <input type=hidden name="submitted" value="true" />
            
            <fieldset>
            <legend><b>CONTACT FORM</b></legend>
                
            <lable>Name:</lable><br>
            <input type="text" name="name" required><br>
            
            <lable>Course:</lable><br>
            <input type="text" name="course" required><br>
            
            <lable>Enrollment no:</lable><br>
            <input type="text" name="enroll" required><br>
            
            <lable style="">Room no:</lable> 
            <input type="number" name="room" required style="width: 53px; margin-left: 1px; padding: 5px; margin-top: 10px;color:white;background-color: rgb(0,0,0,0.1); ">
            
            <lable style="margin-left: 2px;">Block:</lable>
            <select name="block" style="padding: 5px; margin-top: 10px;color:white;background-color: rgb(0,0,0,0.1);">
                <option value="A">A</option>
                <option value="B">B</option>
                </select><br/>
            
            <lable>E-mail:</lable><br>
            <input type="email" name="email" required><br>
            
            <lable>Password:</lable><br>
            <input type="password" name="password" required><br>
            
            <lable>Upload Photo:</lable>
            <input  type="file" name="photo" required>  
            
            <button class="button" style="vertical-align:middle"><span>Register</span></button>
            
            </fieldset>
        </form>
    </div>                      <!-- Student Registration Form End-->
    
    <?php include 'footer.php' ?>
    
    
</body>
</html>