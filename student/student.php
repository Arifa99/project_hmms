<?php 
session_start();
include("studentdbconn.php");
    if(isset($_POST['submit']))
    { 
        include("studentdbconn.php");
        
        //data take from form
        $enr=$_SESSION['enroll'];
        $status=$_POST['status'];
        $foodtype=$_POST['foodtype'];
        $currentdate = date('Y-m-d');
        //echo $currentdate; 
        //echo "<br>";
        $d = date_parse_from_format("Y-m-d", $currentdate);
        $currentmonth = $d["month"];
        //echo $currentmonth;
        $sql = "SELECT * FROM dinningstatus WHERE studentid='$enr' and
        month='$currentmonth'";
        $sqldata = mysqli_query($dbconn, $sql) or die('error getting');
        while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) 
        {
        //previous data i.e date when the student update his status is taken from database  
        $previousdate = $row['updated_on'];
        $previousstatus = $row['current_status'];
           
        // the date is in timestamp formate so we convert it into only date
        $timestamp = strtotime($previousdate);
           
        //current date when student update his status
        $newpreviousdate =  date('Y-m-d', $timestamp);
        //echo $newpreviousdate;
        //echo "<br>";
        //echo $currentdate;
        //$days=date_diff($currentdate,$newpreviousdate);
        //echo $days;
        
        //echo "<br>"; 
        //create two object of date for calculating the date difference.
        $date = new DateTime($newpreviousdate);
        $now = new DateTime($currentdate);
        //calculate no. of days difference b/w two dates
        $month = $date->diff($now)->format("%d");
            //echo "hey date";
        //echo $month;
        }
        
        //print the current month
        $d = date_parse_from_format("Y-m-d", $currentdate);
        $currentmonth = $d["month"];
         //echo "hey month";
        //echo $currentmonth;

        $result = mysqli_query($dbconn, $sql);
        if((mysqli_num_rows($result)>0)&&($newpreviousdate!=$currentdate)){
            
         $sqlinsert = "UPDATE dinningstatus SET current_status = '$status', current_status = '$status', updated_on = '$currentdate', month = '$currentmonth', foodtype = '$foodtype' WHERE studentid='$enr' and
        month='$currentmonth' ";
        $run =mysqli_query($dbconn, $sqlinsert);
        
        $sql = "SELECT * FROM dinningstatus WHERE studentid='$enr'and
        month='$currentmonth'";
        $sqldata = mysqli_query($dbconn, $sql) or die('error getting');
        while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) 
        {
        //fetch the current status of student
        $currentstatus = $row['current_status'];
        //echo $currentstatus;
        //check condition and calculate no of absent days or present days
        if(($currentstatus=="on" && $previousstatus=="off")||($currentstatus=="off" && $previousstatus=="off"))
        {
        $sqlinsert = "UPDATE dinningstatus SET no_of_days_absent = no_of_days_absent + '$month' WHERE studentid='$enr'and
        month='$currentmonth'";
        mysqli_query($dbconn, $sqlinsert);
        }else if(($currentstatus=="off" && $previousstatus=="on")||($currentstatus=="on" && $previousstatus=="on") )
        {
          $sqlinsert = "UPDATE dinningstatus SET no_of_days_present = no_of_days_present + '$month' WHERE studentid='$enr'and
        month='$currentmonth'";
        mysqli_query($dbconn, $sqlinsert);   
            
        }
        }
        }
        //if the record is not present in the database then insert record in the table
        else if(mysqli_num_rows($result)==0){
             $sqlinsert = "INSERT INTO dinningstatus (studentid, current_status, updated_on, month, no_of_days_absent, no_of_days_present, foodtype) VALUES('$enr','$status', '$currentdate', '$currentmonth', 0, 0, '$foodtype')";
            echo "new user";
            mysqli_query($dbconn, $sqlinsert);
        }
            else
            {
                echo "<script>alert('You have already updated your status today. Update it tomorrow!')</script>";
                
            }
            
           

    /*$sqlinsert = "INSERT INTO dinningstatus (studentid, dinstatus) VALUES('$enr','$status')";
    if(mysqli_query($dbconn, $sqlinsert))
    {
        echo "yes";
    }*/
}

?>

<!DOCTYPE html>
<html>
    <head> 

            <title>index::</title>
            <link rel="stylesheet" href="../css/nav.css">
             <link rel="stylesheet" href="../css/icon.css">

        <style>
            body{
                
                   background-color: whitesmoke;
        background-image: url(../img/salad-2068220_960_720.jpg);
        background-size: cover;
    
            }
            table {
                border-collapse: collapse;
                width: 500px;
                float: right;
                margin-right: 2px;
                margin-top: 0px; 
                background-color: rgb(0,0,0,0.0);
                
                }

            th, td {
                text-align: center;
                padding: 8px;
                width: auto;
                background-color: rgb(0,0,0,0.0); 
                color:white;
                }

           tr:nth-child(even){background-color: rgb(0,0,0,0.0); color:white;}
         tr:nth-child(odd){background-color: rgb(0,0,0,0.0); color:white;}
           
             th {
           background-color: rgb(0,0,0,0.0);;
           color: darkorange;
          width: auto;
        }
 .button {
            display: inline-block;
            background-color: darkorange;
            border: none;
            color: #CC4700;
            text-align: center;
            font-size: 15px;
            padding: 10px 18px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin-top: 30px;
            
             margin-right: 20px;
             box-shadow: 3px 3px #FF9F6B;
             border-radius: 10px;
             height: 40px;
 
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
    
            .legend{
                color: darkorange;
                }
             .i img{
        width:180px; 
        height:200px;
        margin-top: 50px; 
     
        border: 2px solid black;
           }
            #profile{
        width:22%; 
        height:585px; 
        background-color: rgb(0,0,0,0.5); 
        
        margin-bottom:12px; 
        float:left;
        margin-left: 7%;
        margin-top: 50px;
        color: white;
        
    }
            .ima{
                background-color: white;
            }
           
        </style>  
                 <script type="text/javascript">
function status()
{
if(document.getElementById('check').checked)
    {
        alert('hello');
    }
   
}
        </script>  
</head>
    
<body>
     <?php include '../html/header.php'; ?> 
    
    <!-- navigation bar -->
    
    <div class="navbar">
        <ul>
            <a href="#">Dashboard</a>
            <a href="logout.php" style="float: right; margin-right: 20px;">Log out</a>      
        </ul>
    </div>
    
    <div id="profile">
       
            <?php 
                $enr=$_SESSION['enroll'];
                $sqlget = "SELECT * FROM student WHERE enroll = '$enr'";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
            ?>
        <?php 
                while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                ?>
           <div class="i">    
     <center><?php echo "<img src='../html/images/".$row['photo']."' class='ima'/>" ?></center>
     </div>
        
        <div id="record" style= "margin-top: 30px; margin-left: 30px; height:auto">
                    
                
                       <b> <i> <font size="+2"> <p>Name:
                           <?php echo  ucfirst($row['name']);?> </p></font>
                        <p>Enrollment Number:
                            <?php echo strtoupper($row['enroll']);?></p>
                        <p>Course:
                            <?php echo strtoupper($row['course']); ?> </p>
                        <p>Room No:
                            <?php echo $row['room'];?> -
                            <?php echo $row['block'];?></p>
                        <p>E-mail:
                            <?php echo $row['email'];?></p> </i> </b>
                         <button class="button"><a href="student_profile.php?id=<?php echo $row['id']; ?>" style="text-decoration:none; color:white; text-align:center"><i class="material-icons">edit</i></a></button>
                         
                        
                        <?php 
                        } ?>
        </div> 
       
    </div>
   
                    
    
    <div id="status"  style="width:400px; margin-left:35%; margin-top:50px ;background-color:rgb(0,0,0,0.5);color:white;padding:10px;">
           <form action="#" method="post">
               <fieldset><legend class="legend"><b>DINNING STATUS</b></legend>
        <!-- label class="switch">
           
          <input type="checkbox" id="check" name="status" onclick="OnChangeCheckbox (this)" id="myCheckbox">
          <span class="slider round"></span>
        </label -->
                <div style=" margin-left:30px;">

                <b><i>Your Status:</i></b><br>
          ON<input type="radio" name="status" value="on" required>     
          OFF<input type="radio" name="status" value="off" required> <br>
                </div>
               <div style="float:right; margin-top:-35px; margin-right:30px;">
                <b><i>Preference Food Type:</i></b><br>
          VEG<input type="radio" name="foodtype" value="veg" required>     
          Non-VEG<input type="radio" name="foodtype" value="nonveg" required> <br>
                </div><br>
          
          <input type="submit" name="submit" value="SUBMIT" style="float:right; margin-right:10px;">
        </fieldset>       </form>
    </div>
    
    

       
        
    
    
    <div id="menu" style="margin-left:35%; width:40%;margin-top:10px; height:auto; padding:10px; background-color:rgb(0,0,0,0.5);">
       <?php 

        $today= date('l');
        //echo "$today";
        
        
        $select_q = "SELECT * FROM menu WHERE day = '$today'";
     
        
        
        $q=mysqli_query($dbconn, $select_q);
        
         
        ?>
       
        
      
        <fieldset><legend class="legend"><b>TODAY'S MENU</b></legend>
                 
                    
                <table>

                        
                        <tr>
                            <th>Day</th>
                            <th>Breakfast</th>
                            <th>Lunch</th>
                            <th>Dinner</th> 
                        </tr>
                         <tr>
                            <th></th>
                            <th>7:30 A.M  - 9:30 A.M</th>
                            <th>1:00 P.M - 3:30 P.M </th>
                            <th>8:00 P.M - 9:00 P.M</th>
                        </tr>
                          <?php while($r=mysqli_fetch_array($q)) { ?>
							<tr>
								<td> <?php echo $r['day']; ?></td>	<td> <?php echo $r['breakfast']; ?></td> <td> <?php echo $r['lunch']; ?></td><td> <?php echo $r['dinner']; ?></td>
                        </tr>
								<?php } ?>
       
							
                    </table>
            </fieldset>
        
    </div>

    
    <form style="margin-left:35%; width:40%;margin-top:10px;padding:10px;background-color:rgb(0,0,0,0.5);height:auto;  ">
        
         <fieldset>
             <legend class="legend"><b>FEES & DUES</b></legend>
             
              <?php 
                $enr=$_SESSION['enroll'];
                $sqlget = "SELECT * FROM fees WHERE enrollno = '$enr'";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
            ?>
       
                
                <table>
                        <tr>
                            <th>Month</th>
                            <th>No. Of Present Days</th>
                            <th>Fees</th>
                            <th>Additional Charges</th>
                            <th>Total Fees<br>(Additional Charges+Fees)</th>
                            <th>Fees Paid</th>
                            <th>Dues</th>
                            
                        </tr>
                         
                        <?php  while($row = mysqli_fetch_array($sqldata)) { ?><br>
							<tr>
                    
                           <td> <?php echo $row['month']; ?></td>
                           <td> <?php echo $row['no_of_days_present']; ?></td>
                           <td> <?php echo $row['total_fees']; ?></td>
                           <td> <?php echo $row['additional_charges']; ?></td>
                           <td> <?php echo $row['final_fees']; ?></td>
                           <td> <?php echo $row['fees_paid']; ?></td>
                           <td> <?php echo $row['dues']; ?></td>
                           
                            </tr>
								<?php } ?>
  
                  				
                    </table>
  
        </fieldset>
    </form>
        
  
<div style="margin-top:200px">
<?php include('../html/footer.php'); ?>
    </div>
</body>
</html>