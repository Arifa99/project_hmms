<?php
$host='localhost';
$user='root';
$pass='arifa';
$dbname='hmms';
$dbconn=mysqli_connect($host,$user,$pass,$dbname);
$id=$_GET['id'];

$currentdate = date('Y-m-d');
$d = date_parse_from_format("Y-m-d", $currentdate);
$currentmonth = $d["month"];
$previousmonth= $currentmonth -1 ;
//echo $previousmonth;

    
    if (isset($_POST['submitted']))
{
     $enroll = $_POST['enroll'];
     $pdays=$_POST['pdays'];
     $pdcost=$_POST['pdcost'];
     $adfees = $_POST['addcharge'];
     $fees = $_POST['total'];
     $feespaid = $_POST['feespaid'];
        
        
        $new = $adfees+$fees;
        //echo $new;
         
        $sql = "SELECT * FROM fees WHERE enrollno ='$id' and month ='$currentmonth'";
        $sqldata = mysqli_query($dbconn, $sql) or die('error getting');
       
        if(mysqli_num_rows($sqldata)>0){
            
            
        $sqlnew = "SELECT * FROM fees WHERE enrollno ='$id' and month ='$currentmonth'";
        $sqldatanew = mysqli_query($dbconn, $sqlnew) or die('error getting');
        while($row = mysqli_fetch_array($sqldatanew, MYSQLI_ASSOC)) 
        {
        $additional = $row['additional_charges'];
        $prefeespaid = $row['fees_paid'];
            //echo "<br>";
            //echo $additional;
            //echo "<br>";
        $fi = $additional + $new;
            //echo $fi;
            //echo "<br>";
        $prepaid = $row['fees_paid'];
            //echo $prepaid;
            
            $dues=$prepaid-$fi+$feespaid;
            //echo $dues;
        $sqlinsert = "UPDATE fees SET dues ='$dues', no_of_days_present ='$pdays', fees_paid = fees_paid + '$feespaid', total_fees = '$fees', additional_charges = additional_charges + '$adfees', final_fees = '$fi' WHERE enrollno='$id' and month='$currentmonth'";
        $run =mysqli_query($dbconn, $sqlinsert) or die('error getting');
         
        
        }}else{
          
            $sqlnew = "SELECT * FROM fees WHERE enrollno ='$id' and month ='$previousmonth'";
            $sqldata= mysqli_query($dbconn, $sqlnew);
            if(mysqli_num_rows($sqldata)>0){
             while($row=mysqli_fetch_array($sqldata, MYSQLI_ASSOC))
             {
            $predues = $row['dues'];
            
            $newdues=$new-$feespaid+$predues;
    
$sqlinsert = "INSERT INTO fees (enrollno, no_of_days_present, per_day_cost, additional_charges, month, total_fees, fees_paid, final_fees, dues) VALUES('$enroll','$pdays','$pdcost','$adfees','$currentmonth','$fees','$feespaid','$new','$newdues')";
$sqldata = mysqli_query($dbconn, $sqlinsert) or die('error getting');
 }          
}else
            {
                $dues=$new-$feespaid;
              $sqlinsert = "INSERT INTO fees (enrollno, no_of_days_present, per_day_cost, additional_charges, month, total_fees, fees_paid, final_fees, dues) VALUES('$enroll','$pdays','$pdcost','$adfees','$currentmonth','$fees','$feespaid','$new','$dues')";
$sqldata = mysqli_query($dbconn, $sqlinsert) or die('error getting');  
            }
        }

    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
            <link type="text/css" rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
                    background-image: url(../img/salad-2068220_960_720.jpg);
                    background-size:cover;
        }
        #info{
           
            margin-left: 10%;
            padding: 10px;
            width:400px;
            color:white;
            margin-top: 7%;
            text-align: left;
            background-color:rgb(0,0,0,0.5);
        }
    
        </style>
        <script>
                    function multiply(){
                a = Number(document.getElementById('pdays').value);
                b = Number(document.getElementById('pdcost').value);
                //d = Number(document.getElementById('adchrg').value);
                c =a*b;
               // c = e+d;        
                document.getElementById('total').value = c;
                }
        
         </script>
</head>
<body>
 <?php include('../html/header.php'); ?>
<div class="navbar"  style="margin-top:-18px; width:100%; position: -webkit-sticky;position: sticky; top: 0px;">
 <ul>
  <a href="../admin/home.php">Dashboard</a>

  <div class="dropdown">
    <button class="dropbtn">Inventory 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../admin/purchase.php">Purchase Item</a>
      <a href="../admin/issue.php">Issued Item</a>
       <a href="#">Stock</a>
    </div>
    </div>
     <a href="../admin/purchaserecord.php">Purchase Item Record</a>
     <a href="../admin/issuerecord.php">Issue Item Record</a>
     <a href="../admin/studentrecord.php">Student Record</a>
     <a href="../admin/logout.php" style="float: right; margin-right: 20px;">Log out</a>
           
    </ul>
  </div>
 <div id="info">
  <form action="#" method="post" style="">
     <fieldset>
                <legend style="color:orange"><b>UPDATE FEES AND DUES</b></legend>
     <input type=hidden name="submitted" value="true" /> 
   
     
  Enrollment No.:<br>
  <input type="textbox" name="enroll"  value= "<?php echo $id ?>" readonly><br> 
  <?php 
             
            
                $host="localhost";
                $user="root";
                $password="arifa";
                $db="hmms";
                $dbconn=mysqli_connect($host,$user,$password,$db);
                $currentdate = date('Y-m-d');
                $d = date_parse_from_format("Y-m-d", $currentdate);
                $currentmonth = $d["month"];
        
                $sqlget = "SELECT * FROM dinningstatus WHERE studentid = '$id'and month='$currentmonth'";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
         
            ?>
        <?php 
                while($row = mysqli_fetch_array($sqldata)) { ?>
                <br>
                <table>
                    <tr> 
                        <td>Month :</td>
                    <td><input type="text" name="month" value="<?php echo $row['month']; ?>"></td>
                    </tr>
                
                  <tr>
                      <td>Total Days Present:</td> 
                      <td><input type="textbox" name="pdays" id="pdays" value="<?php echo $row['no_of_days_present']; ?>"></td>
                    </tr>
                           <?php } ?>
  <tr>
      <td>Per Day Cost:</td>
      <td><input type="textbox" name="pdcost"  id="pdcost" onkeyup="multiply();"></td>
                    </tr>
  <tr>
      <td>Additional Charges:</td>
      <td><input type="textbox" name="addcharge" id="adchrg" required></td>
                    </tr>
                    <tr>
                        <td>Total Charges:</td>
                        <td><input type="textbox" name="total" id="total"></td>
                    </tr>
   <tr>
       <td>Amount Submitted:</td>
       <td><input type="textbox" name="feespaid" id="feespaid"></td>
                    </tr>
                    
      
      </table><br>
    <button style="width:60px;">submit</button>
      </fieldset>
    </form>
    </div>
    <div id="footer" style="width:100%;margin-left:-1px; padding-bottom:20px;"><br>
        <center><p style="color: white; font-family: cursive; margin-top: 10px; font-size: 15px; margin-left:40%">SAROJINI NAIDU HALL<br> A.M.U, Aligarh , 202002</p></center>
        <p style="margin-left: 50px; color: white;">Copyright &copy; 2017 -All Rights Reserved</p>
    </div>
</body>
</html>