<?php

				$host="localhost";
                $user="root";
                $password="arifa";
                $db="hmms";
                $dbconn=mysqli_connect($host,$user,$password,$db);

$id=$_GET['id'];

//echo $id;
$sq=mysqli_query($dbconn,("select * from menu where id=".$id));
$r=mysqli_fetch_array($sq);

if(isset($_POST['submit']))
{
    $breakfast=$_POST['breakfast'];
    $lunch=$_POST['lunch'];
    $dinner=$_POST['dinner'];


$q="update menu set breakfast='$breakfast', lunch='$lunch', dinner='$dinner' where id=$id ";
$query=mysqli_query($dbconn, ($q));
if($query)
{
 header("location: home.php");
}
}

?>



<html>
	<head>
  <title>Home::</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="../css/nav.css">
<style>
body{
                
                   background-color: whitesmoke;
        background-image: url(../img/salad-2068220_960_720.jpg);
        background-size: cover;
    
            }

.dropdown-content {
    display: none;
    position: relative;
    background-color: black;
    color: black;
    min-width: 10px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1000;
    
}

 ul{
    
        margin-left: 300px;
         list-style-type: none;
        padding: 1px;
        overflow: hidden;
    }
 button{
        width: 100%;
    }

  
   .i img{
        width:180px; 
        height:200px;
    
        margin-top: 50px; 
     
        border: 2px solid black;
    }
    
   
            .button {
                display: inline-block;
                background-color: darkorange;
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
            opacity: 0.5;
}

        .button:hover span:after {
  opacity: 1;
  right: 0;
}
 .legend{
     color:darkorange;}
table {
    border-collapse: collapse;
    width: auto;
    margin-top: 10px;
    margin-left: 1%;
}

th, td {
    text-align: left;
    padding: 8px;
}

    form{
        width: 50%;
        margin-left: -40%;
        background-color: rgb(0,0,0,0.5);
        margin-top: 50px;
        
    }
    input[type="text"],[type="number"]{
        border-radius: 2px;
        height: 35px;
        width: 300px;
        margin-left: 30px;
        padding-left: 30px;
        background-color: rgb(0,0,0,0.0);
        color: white;
        font-size: 17px;
            
    }
    
     input[type="submit"]{
        border-radius: 2px;
        height: 35px;
        width: 100px;
        margin-left: 30px;
         float: right;
          background-color: rgb(0,0,0,0.0);
         color: white;
    }
</style>    
</head>
<body>
 <?php include '../html/header.php'; ?>   

                                <!-- navigation bar -->

<div class="navbar" style="margin-top:-18px; width:100%; position: -webkit-sticky;position: sticky; top: 0px;">
 <ul>

  <a href="#">Dashboard</a>

    <div class="dropdown">
    <button class="dropbtn">Inventory 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="../admin/purchase.php">Purchase</a>
      <a href="../admin/issue.php">Issue item</a>
      <a href="../admin/stock.php">Stock</a>
    </div>
    </div>
     <a href="../admin/purchaserecord.php">Purchase Item Record</a>
     <a href="../admin/issuerecord.php">Issue Item Record</a>
     <a href="../admin/studentrecord.php">Student Record</a>
     <a href="../admin/logout.php" style="float: right; margin-right: 20px;">Log out</a>
           
    </ul>
  </div>
				
		<!--Main Content start-->
			<div style="height: 60%; padding: 10px 50px;color:white"> 
				<center>
					<form name="#" method="post" enctype="multipart/form-data">
					<?php 
             
                $host="localhost";
                $user="root";
                $password="arifa";
                $db="hmms";
                $dbconn=mysqli_connect($host,$user,$password,$db);

                $select_q="select * from menu where id=$id";
                $q=mysqli_query($dbconn, $select_q);
                        {
      ?>
                        <fieldset><legend class="legend"><b>MESS MENU</b></legend>
						
						<table style="color:white;font-size:17px;">
								<tr>
                                    <td>Day:</td>
                                    <td id="std"> <input type="text" name="day" value="<?php echo $r['day'];?>" readonly /></td>
							
							
							<tr>
								<td> Breakfast:</td>
								<td id="std"> <input type="text" name="breakfast" placeholder="Breakfast" value="<?php echo $r['breakfast'];?>"></td>
							</tr>
							<tr>
								<td> Lunch:</td>
								<td id="std"> <input type="text" name="lunch" placeholder="Lunch" value="<?php echo $r['lunch'];?>"></td>
							</tr>
							<tr>
								<td> Dinner:</td>
								<td id="std"> <input type="text" name="dinner" placeholder="Dinner" value="<?php echo $r['dinner'];?>"></td>
							</tr>
				            <?php	}	?>
				             <tr>
                                 <td><button type="submit" name="submit" class="button" style=" margin-left:30%;">Submit</button></td>
                            </tr>
						

						</table>
						 </fieldset>
					</form>
                   
				</center>
				
			</div>

			
		<?php include '../html/footer.php'; ?>


	</body>


</html>