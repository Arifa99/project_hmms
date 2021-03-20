<html>
     <head><title></title>
      <link type="text/css" rel="stylesheet" href="../css/nav.css">
       <link rel="stylesheet" href="../css/icon.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <style>
        body{
            background-color: whitesmoke;
             background-image: url(../img/salad-2068220_960_720.jpg);
                    background-size:cover;
        }
        table {
             border-collapse: collapse;
             width: auto;
             background-color: rgb(0,0,0,0.5);
             margin-top: 30px;
            margin-left: 10%;
        }

       th, td {
           text-align: center;
           padding: 8px;
        }

            tr:nth-child(even){background-color: rgb(0, 0, 0, 0.0); color: white}
            tr:nth-child(odd){background-color: rgb(0, 0, 0, 0.0); color: white}
       th {
           background-color: rgb(0, 0, 0, 0.0); ;
           color: orange;
        }
       select {
           width: 15%;
           padding:10px 12px;
           border-color: darkgray;
           background-color: White;
           margin-left: 70%; 
           margin-top: -39px;
}
              * {
                        box-sizing: border-box;
                        }

                form.example input[type=text] {
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
                    height: 42px;
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
<body>
    <?php include '../html/header.php'; ?>   

    
    <div class="navbar">
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
     <a href="../admin/purchaserecord.php">Purchase item record</a>
     <a href="../admin/issuerecord.php">Issue item record</a>
     <a href="">Student record</a>
     <a href="../admin/logout.php" style="float: right; margin-right: 20px;">Log out</a>
           
    </ul>
  </div>
 
           <div id="" style="margin-top:100px;">
      <form action="#" method="post" class="example" style="margin:auto;max-width:500px">
          <input type="text" name="searchitem" placeholder="Enter Enrollment number" required>
          <button type="submit" name="submit"><i class="fa fa-search" style="width:10px; height:10px;"></i></button>
           <!--input type="submit" name="submit" style="padding:10px; background-color:occuryellow; border:none;"-->
      </form>
  </div>
            <?php 
                include("admindbconn.php");
                $sqlget = "SELECT * FROM student ORDER BY enroll";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
               if(isset($_POST['submit']))
                   {
                 $searchitem = $_POST['searchitem'];
                 //echo $searchitem;
                  $sqlget = " SELECT * FROM student where enroll='$searchitem'";
                  $sqldata = mysqli_query($dbconn, $sqlget);
                     if(mysqli_num_rows($sqldata)<=0){
                         echo "<script>alert('No sudent is available of this enrollment no. , $searchitem ')</script>";
                         $sqlget = "SELECT * FROM student ORDER BY enroll";
                $sqldata = mysqli_query($dbconn, $sqlget) or die('error getting');
                     }
                    } 
            ?>
   <table>
         <tr>
            <th>Name </th>
            <th>Enrollment No. </th>
            <th>Course </th>
            <th>E-mail </th>
            <th>Room No. </th>
            <th>Block</th>
            <th>Fees Detail</th>
            </tr>
       
    
            <?php 
                while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
                ?>
      
            <tr>
            <td><?php echo ucfirst($row['name']);?> </td>
            <td><?php echo strtoupper($row['enroll']);?> </td>
            <td><?php echo strtoupper($row['course']);?> </td>
            <td><?php echo $row['email'];?> </td>
            <td><?php echo $row['room'];?> </td>
            <td><?php echo ucfirst($row['block']);?> </td>
            <td> <a href="fees.php?id=<?php echo $row['enroll']; ?>" style="text-decoration:none; color:white"><i class='material-icons'> edit</i></a></td>
            
            </tr>
                         
         
                        <?php
                  
                        } ?>  </table>
    <?php include '../html/footer.php'; ?> 
</body>
</html>