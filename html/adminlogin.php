<?php 
    session_start();
    include("dbconn.php");
    mysqli_select_db($dbconn , $dbName);
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $myusername = ($_POST['email']);
        $mypassword = ($_POST['password']);
        $sql = "SELECT id FROM admin WHERE email = '$myusername' and password = '$mypassword'";
        $result=mysqli_query($dbconn, $sql);
        if(mysqli_num_rows($result)==1){
            $_SESSION["email"] = $myusername;
            header( "Location:../admin/home.php");
            }
        else{
            echo "<script>alert('Incorrect Username or Password');</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
                                        <!-- HEAD SECTION -->
<head>
    <title>Login::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
   body{
            background-color: whitesmoke;
        background-image: url(../img/IMG-20150820-WA0074.jpg);
            background-size: cover;
            }
        form{
            background-color: rgb(0,0,0,0.5);
            width: 30%; 
            margin-left: 30%;
            margin-top: 30px;
            margin-right: 40%;
            padding: 10px;
            border-radius: 5px;
            }
        legend{
             color: darkorange;
            }
        input[type=text], input[type=password] {
            width: 85%;
            background-color: rgb(0,0,0,0.1);
            color:white;
            padding: 5px;
            margin-left: 25px;
            margin-top: 5px;
            margin-bottom: 5px;
            display: inline-block;
            border: 1px solid grey;
            box-sizing: border-box;  
            }
        lable{  
            color:white;
            margin-left: 28px;
            text-decoration-style: solid;
            font-size: 20px;
            text-shadow: 1px 1px 1px gray
            }

        .submitbtn {
            background-color: #4CAF50;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            cursor: pointer;
            width: 86%;
            margin-left: 24px;
            }
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: lightgreen;
            margin-left: 25px;
            margin-top: 5px;
            cursor: pointer;
            color:white;
            }
        .psw{
            margin-right: 30px;
            float: right;
            margin-top: 10px;
            }
        .button {
            display: inline-block;
            background-color: cadetblue;
            border: none;
            color: #FFFFFF;
            text-align: center;
            font-size: 15px;
            padding: 12px 20px;
            width:120px;
            transition: all 0.5s;
            cursor: pointer;
            margin-right: 7%;
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
            position: -webkit-sticky;
            position: sticky;
            }
    </style>
</head>
                            <!--  BODY SECTION  -->
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
                    <a href="studentregistration.php">Student</a>
                </div>
            </div>
            
            <div class="dropdown">
                <button class="dropbtn">Login
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="#">Admin</a>
                    <a href="studentlogin.php">Student</a>
                </div> 
            </div>
            
            <a href="facilities.php">Facilities</a>
            <a href="help.php">Help</a>
           
        </ul>
    </div>                  <!-- Navigation Bar Ends -->
    
    
                            <!--  Login Form  -->
    <form action="../html/adminlogin.php" method="POST">
        <fieldset>
            <legend><b>LOGIN</b></legend>
            
            <lable>Username</lable><br/>
            <input id="name" name="email" type="text" placeholder="Enter email" required><br/>
            
            <lable>Password<br /></lable>
            <input id="password" name="password" type="password" placeholder="Enter Password"><br/>
            
            <button class="button" style="vertical-align:middle"><span>Submit</span></button>
                   
        </fieldset>
    </form>
   
    <?php include 'footer.php'; ?>  
</body>
</html>
    