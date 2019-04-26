<?php
   if (isset($_POST['submitted']))
    {
        $host='localhost';
        $user='root';
        $pass='arifa';
        $dbname='hmms';
        $dbconn=mysqli_connect($host,$user,$pass,$dbname);

       
                    
       $options=$_POST['op'];
       $qun=$_POST['txt'];
       $size =count($options);
       for($i =0; $i<$size; $i++)
      { 
    $sql = "SELECT * FROM stock WHERE itemid='$options[$i]'";
    $sqldata = mysqli_query($dbconn, $sql) or die('error getting');
    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) 
    {
        $quantity = $row['quantity'];
        $qunit = $row['qunit'];
        if( $quantity >=$qun[$i])
        {
           
           $resultop="UPDATE stock SET quantity = quantity - '$qun[$i]' where itemid= '$options[$i]' AND quantity >= '$qun[$i]'";
           $myquery = mysqli_query($dbconn, $resultop);
            $sql = "insert into issueitem (itemid, quantity) values('$options[$i]','$qun[$i]')";
             mysqli_query($dbconn, $sql);
           
           }
        else{
            $sqlnew = "SELECT * FROM item WHERE id='$options[$i]'";
    $sqldata = mysqli_query($dbconn, $sqlnew) or die('error getting');
    while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) 
    {
        
        $linebreak = "<br>";
        $itemname = $row['itemname'];
        echo "<script>alert('$itemname , is not available in stock. Buy it!');</script>";
        }
        }
           
    }
    
   
   
    
    }
          
           
}
      
  
?>
   <html>
    <head><title>issue item</title>
      <link type="text/css" rel="stylesheet" href="../css/nav.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link type="text/css" rel="stylesheet" href="../css/sc.css">
      
      
      <!-- enable and disable textbox -->
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script> 
        <script type="text/javascript">
         
            $(document).on('click', 'input[name="op[]"]', function () {
                var checked = $(this).prop('checked');// true or false
                if (checked) {
                    $(this).parents('tr').find('td input[type="text"]').removeAttr('disabled');
                }
                else {
                    $(this).parents('tr').find('td input[type="text"]').attr('disabled', 'disabled');
                }
            });
            </script>
       
    </head>
    <style>
         body{
            background-color: whitesmoke;
            background-image: url(../img/salad-2068220_960_720.jpg);
            background-size: cover;
        }
        h1{
            text-align: center;
            color: darkorange;
            font-family: Old English Text MT;
             text-shadow: 2px 2px black;
            font-size: 300%;
        }    
        label{
            text-align: right;
            font-family: Times New Roman;
            font-size: 120%;
            
            display: inline-block;
             width: 30%;
        }
        input{
            width: 80px;
            padding: 10px 20px;
            display: inline-block;
           
        }
        form{
            height: auto;
            width: 500px;
            margin: 0 auto;
            background-color: rgb(0, 0 ,0 ,0.5);
            padding: 20px;
            padding-bottom: 100px;
            
        } 
    
         /* large margin-right to force the next element to the new-line
       and margin-left to create a gutter between the label and input */
        label + input {
            width: 35%;
            margin: 0 30% 0 4%;
}

         .button {
                display: inline-block;
                background-color: #CC4700;
                border: none;
                color: #FFFFFF;
                text-align: center;
                font-size: 15px;
                padding: 12px 20px;
                width: 120px;
                transition: all 0.5s;
                cursor: pointer;
                margin: 20px;
                float: right;
                border-radius: 10px;
                box-shadow: 3px 3px #FF9F6B;
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

       
 table {
    border-collapse: collapse;
    width: auto;
    background-color: rgb(0, 0 ,0 ,0.0);
    
}

 td {
    text-align: center;
    padding: 10px;
}

       tr:nth-child(even){background-color: rgb(0, 0, 0, 0.0); color:white}
       tr:nth-child(odd){background-color: rgb(0, 0, 0, 0.0); color:white}

     
th {
    text-align: center;
    color: orange;
    padding: 10px;
}
            
    </style>
    
<body>


    <?php include '../html/header.php'; ?> 
<div class="navbar"  style="margin-top:-18px; width:100%; position: -webkit-sticky;position: sticky; top: 0px;">
 <ul>
  <a href="../admin/home.php">Dashboard</a>

  <div class="dropdown">
    <button class="dropbtn">Inventory 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../admin/purchase.php">Purchase Item</a>
      <a href="#">Issued Item</a>
      <a href="../admin/stock.php">Stock</a>
    </div>
    </div>
     <a href="../admin/purchaserecord.php">Purchase Item Record</a>
     <a href="../admin/issuerecord.php">Issue Item Record</a>
     <a href="../admin/studentrecord.php">Student Record</a>
     <a href="../admin/logout.php" style="float: right; margin-right: 20px;">Log out</a>
           
    </ul>
  </div>
    
    
    
   <form action="#" method="post" style="margin-left:10%; margin-top:100px;">
   
    <input type=hidden name="submitted" value="true" />
     <table>
          <tr>
            <th>Select</th>
            <th>Item Name</th>
            <th>Item Id</th>
            <th>Quantity</th>
            
            <th>Issue Quantity</th>
          </tr>
 
    
         
    
   <?php 
                $host="localhost";
                $user="root";
                $password="arifa";
                $db="hmms";
                $dbconn=mysqli_connect($host,$user,$password,$db);
                $sqlget = "SELECT c . * , p . *
                
                FROM stock c, item p
                WHERE c.itemid = p.id";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
            ?>
   
    <?php 
                while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
            ?>    
            <tr>
                
                  <input type=hidden name="submitted" value="true" />
                 <td><input type="checkbox" name="op[]" value= "<?php echo $row['itemid'];?>" style="width:17px; height:17px;"></td>
                 <td><?php echo strtoupper($row['itemname']);?> </td>
                 <td><?php echo strtoupper($row['itemid']);?> </td>
                 <td><?php echo strtoupper($row['quantity']);?> <?php echo strtoupper($row['qunit']);?> </td>
                
                 <td><input type="text" disabled='disabled' name="txt[]"/></td>
               
               
            </tr>
                
            <?php
                  
                } ?>
                 
      
        </table>
       </div>
       <button class="button" style="vertical-align:middle;margin-left:10px" name="submit"><span>Submit</span></button>  
    </form>
  


        
            <?php include '../html/footer.php'; ?> 
      
    </body>
</html>