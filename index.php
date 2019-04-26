<!DOCTYPE html>
<html lang="en">
    
                                        <!-- HEAD SECTION  -->
<head>
    <title>Home::</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="css/nav.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
      .mySlider{
                width: 87%;
                height: 300px;
                margin-left: 90px;
                margin-top: 0px;
                margin-right: 90px;
                }
        #button-display-left{
                position:absolute;
                top: 400px; margin-top: -19px; 
                left: 150px;
                width: 30px;
                height: 30px;
                } 
        #button-display-right{
                position:absolute;
                top: 400px;
                margin-top: -19px; 
                right: 150px;
                width: 30px;
                height: 30px;
                } 
        #content{
                width: 55%;
                height: 300px;
                border: 2px black;
                margin-top: 50px;
                margin-left: 90px;    
                }    
        #content1{
                width: auto;
                height: auto;
                float: right;
                margin-top: -300px;
                margin-right: 200px;
                }  
        h3{
           color: black;
           margin-top: 100px; 
           margin: 10px; 
           }
        p{
            text-align: justify;
            margin: 10px;
            font-size: 17px;
            font-family: serif;
            }
        .navbar{
            margin-top:-18px;
            width:100%;
            position: -webkit-sticky;
            position: sticky;
            top: 0px;
            box-shadow:2px 2px 2px lightgray;
        }
     </style>    
</head>
                                        <!--  BODY SECTION START -->
<body>
                                        <!-- Header Start -->   
    <div id="header" style="background-color: whitesmoke;margin-top: -4px;">    
        <img src="img/Capture.PNG"  width="195px" height="183px" style="z-index:1000; position: fixed;top: 0px;box-shadow: 0 0 20px grey; margin-left: 98px;position:fixed">            
        <img src="img/logo.png" alt="" class="logo_def" style="margin-left: 310px; height:150px; width:77%;   box-shadow: 1px 2px 1px grey;">
    </div>                              <!--Header Ends-->
    
                                        <!-- Navigation Bar Start -->
    
    <div class="navbar" style="">
        <ul>
            <a href="#">Home</a>
            
            <!-- Dropdown Menu for Registration  -->
            <div class="dropdown">
                <button class="dropbtn">Registration 
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="html/adminregistration.php">Admin</a>
                    <a href="html/studentregistration.php">Student</a>
                </div>
            </div>
                  
                 <!-- Dropdown Menu for Login  -->
            <div class="dropdown">
                <button class="dropbtn">Login
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="html/adminlogin.php">Admin</a>
                    <a href="html/studentlogin.php">Student</a>
                </div> 
            </div>
                      
            <a href="html/facilities.php">Facilities</a>
            <a href="html/help.php">Help</a>
                      
        </ul>
     </div>              <!-- Navigation Bar Ends-->                  

                        <!-- Image Slider--> 
    
     <img class="mySlider" src="img/sarojini.jpg">
     <img class="mySlider" src="img/s.n-hall.jpg">
     <img class="mySlider" src="img/IMG_20171017_191905.jpg">

                        <!--button on slider-->
     <button id="button-display-left" onclick="plusDivs(-1)">&#10094;</button>
     <button id="button-display-right" onclick="plusDivs(+1)">&#10095;</button>
    
                     <!-- Manual Image Slider Script-->     
     <script>
         var slideIndex = 1;
         showDivs(slideIndex);
         
         function plusDivs(n) {
             showDivs(slideIndex += n);
             }
         
         function showDivs(n) {
             var i;
             var x = document.getElementsByClassName("mySlider");
             if (n > x.length) { slideIndex = 1 }    
             if (n < 1) {slideIndex = x.length}
             for (i = 0; i < x.length; i++)
                {
                 x[i].style.display = "none"; 
                }
             x[slideIndex-1].style.display = "block";  
            }
     </script>
    
                        <!-- Automatic Image Slider Script-->    
     <script>
         var myIndex = 0;
         carousel();
         function carousel() 
         {
             var i;
             var x = document.getElementsByClassName("mySlider");
             for (i = 0; i < x.length; i++) 
             {
                 x[i].style.display = "none";  
             }
             myIndex++;
             if (myIndex > x.length) {myIndex = 1}    
             x[myIndex-1].style.display = "block";  
             setTimeout(carousel, 5000); // Change image every 5 seconds
         }                                 
     </script>              <!-- Automatic Image Slider Script Ends-->
    
                            <!--  Main Content  -->
     <div id="content">
        <h3> <b> About Sarojini Naidu Hall </b> </h3>
        <p>The Hall was named after the well-known freedom fighter and first lady Governor of a state in Independence India, Mrs. Sarojini Naidu. After her name Sarojini Naidu Hall was established in 1970, with the aim of providing accommodation to the girls studying in Aligarh Muslim University.</p>
        <p style="text-align: justify; margin: 10px; font-size: 17px; font-family: serif;" >Around 657 girls of different courses i.e. MBBS, BDS, MD, MS, P.G. Diploma Medical/M.Ch.Plastic Surgery, M.Sc. (Industrual Chemistry), M.Sc. (Polymer Science & Technology), Professional Courses, Diploma in Nursing, Diploma Courses (Women's and Boy's Polytechnic), B.P.Ed, M.P.Ed, M.Sc. (Biotechnology), Ph.D, M.Phil,  are staying in S.N. Hall and its Annexes. Due to increase in intake in different course, there is accommodation crises.</p>
     </div> 
    
     <div id="content1" >
         <img src="img/provost.PNG" width="200px" height="250px" style="border: 5px black;">
         <p style="text-align: center;"> <b> Provost: </b> Prof. Seema Hakim<br />
                                         <b> Telephone: </b> 6723415907 <br/>
                                         <b> E-mail: </b> abc@gmail.com 
         </p>   
     </div>
                        
                                <!-- Footer-->   
   <div id="footer" style="width:100%;margin-left:-1px; padding-bottom:20px;"><br>
        <center><p style="color: white; font-family: cursive; margin-top: 10px; font-size: 15px; margin-left:40%">SAROJINI NAIDU HALL<br> A.M.U, Aligarh , 202002</p></center>
        <p style="margin-left: 50px; color: white;">Copyright &copy; 2017 -All Rights Reserved</p>
    </div> 
</body>
</html>