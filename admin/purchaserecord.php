<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Stock</title>
        <link type="text/css" rel="stylesheet" href="../css/nav.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            body{
                    background-color: whitesmoke;
                    background-image: url(../img/salad-2068220_960_720.jpg);
                    background-size:cover;
                    }
            table {
                    border-collapse: collapse;
                    width: auto;
                    background-color: rgb(0, 0, 0, 0.6);
                    }

            th, td {
                    text-align: center;
                    padding: 8px;
                    width: 130px;
                    }
            tr:nth-child(even){background-color: rgb(0,0,0,0.0); color:white}
                tr:nth-child(odd){background-color:rgb(0,0,0,0.0); color:white ;}

                th {
                    background-color: rgb(0,0,0,0.0);
                    color: darkorange;
                    width: 114px;
                    
                    }
                 #scroll {
                    width:800px;
                    height:200px;
                    overflow-y:auto;
                    overflow-x:auto;
                    margin-top: 0px;
                    margin-left:10%;
                     
                    
        } 
            

                    * {
                        box-sizing: border-box;
                        }

                form.example input[type=date] {
                    padding: 10px;
                    font-size: 17px;
                    border: 1px solid grey;
                    float: left;
                    width: 80%;
                    background: white;
                    margin-left: -57%;
                    }

                form.example button {
                    float: left;
                    width: 20%;
                    padding: 10px;
                    background: darkorange;
                    color: white;
                    font-size: 17px;
                    border: 1px solid grey;
                    border-left: none;
                    cursor: pointer;
                    height: 48px;
                    }

                form.example button:hover {
                    opacity: 0.8;
                    }

                form.example::after {
                    content: "";
                    clear: both;
                    display: table;
                    }

          </style>
    </head>
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
      <a href="../admin/issue.php">Issued Item</a>
       <a href="../admin/stock.php">Stock</a>
    </div>
    </div>
     <a href="#">Purchase Item Record</a>
     <a href="../admin/issuerecord.php">Issue Item Record</a>
     <a href="../admin/studentrecord.php">Student Record</a>
     <a href="../admin/logout.php" style="float: right; margin-right: 20px;">Log out</a>
           
    </ul>
  </div>
  
  <div id="" style="margin-top:100px;">
      <form action="#" method="post" class="example" style="margin:auto;max-width:500px">
          <input type="date" name="searchitem" required>
          <button type="submit" name="submit"><i class="fa fa-search" style="width:10px; height:10px;"></i></button>
           <!--input type="submit" name="submit" style="padding:10px; background-color:occuryellow; border:none;"-->
      </form>
  </div>
   <?php 
                $host="localhost";
                $user="root";
                $password="arifa";
                $db="hmms";
                $dbconn=mysqli_connect($host,$user,$password,$db);
                 $sqlget = "SELECT c . * , p . * , t . * FROM purchaseitem c, item p, seller t WHERE c.itemid = p.id and c.seller = t.id";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
                if(isset($_POST['submit']))
                   {
                 $searchitem = $_POST['searchitem'];
                 //echo $searchitem;
                  $sqlget = "SELECT c . * , p . * , t . * FROM purchaseitem c, item p, seller t WHERE c.itemid = p.id and c.seller = t.id and c.date='$searchitem'";
                  $sqldata = mysqli_query($dbconn, $sqlget);
                     if(mysqli_num_rows($sqldata)<=0){
                         echo "<script>alert('No item is purchase on date , $searchitem ')</script>";
                         $sqlget = "SELECT c . * , p . * , t . * FROM purchaseitem c, item p, seller t WHERE c.itemid = p.id and c.seller = t.id";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
                     }
                    } 
            ?>
   
           <center><table style="margin-top:30px; margin-left:-21%;">
            <tr>
               
                <th>Item id </th>
                <th>Item name </th>
                <th>Seller name </th>
                <th>Quantity </th>
                <th>Rate </th>
                 <th>Date </th>
                  <th>Total </th>
            </tr>
               </table></center>
           
           
           
            <div id="scroll">
            <center><table style="">
         
       
            <?php 
                while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
            ?>
      
            <tr>
                
                <td><?php echo strtoupper($row['itemid']);?> </td>
                <td><?php echo strtoupper($row['itemname']);?> </td>
                <td><?php echo strtoupper($row['shopname']);?> </td>            
                <td><?php echo $row['quantity']; echo " ";echo $row['qunit'];?> </td>
                 <td><?php echo $row['rate']; echo " ";echo $row['runit'];?> </td>
                  <td><?php echo strtoupper($row['date']);?> </td> 
                   <td><?php echo strtoupper($row['total']);?> </td> 
              
               
            </tr>
                
            <?php
                  
                } ?>  </table></center></div>
        
        
            <?php include '../html/footer.php'; ?> 
  
</body>
</html>