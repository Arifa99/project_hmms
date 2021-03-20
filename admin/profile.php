<?php

$host="localhost";
                $user="root";
                $password="arifa";
                $db="hmms";
                $dbconn=mysqli_connect($host,$user,$password,$db);

$id=$_GET['id'];

echo $id;
$sq=mysqli_query($dbconn,("select * from admin where id=".$id));
$r=mysqli_fetch_array($sq);

if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    


$q="update admin set name='$name', address='$address', email='$email', password='$password', phone='$phone' where id=$id ";
$query=mysqli_query($dbconn, ($q));
if($query)
{
 header("location: home.php");
}
}

?>
   

   <html>
    <head> 
        <title>adminprofile</title>
        <link type="text/css" rel="stylesheet" href="../css/nav.css">
    </head>
    <style>
        <style>
 * {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

.col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
}

.col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}

</style>

    
    <body>
        <?php include '../html/header.php'; ?> 
        
        <div class="container">
           <form name="#" method="post" enctype="multipart/form-data">
			<?php 
             
             include("admindbconn.php");

                $select_q="select * from admin where id=$id";
                $q=mysqli_query($dbconn, $select_q);
                        
            ?>

                <div class="row">
                    <div class="col-25">
                        <label for="name">Name</label>
                    </div>
                <div class="col-75">
                    <input type="text" id="name" name="name" placeholder="Your name.." value="<?php echo $r['name'];?>">
                </div>
                </div>
                
                 <div class="row">
                    <div class="col-25">
                        <label for="address">Address</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="address" name="address" placeholder="Your phone no..." value="<?php echo $r['address'];?>">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-25">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="email" name="email" placeholder="Your e-mail.." value="<?php echo $r['email'];?>">
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-25">
                        <label for="password">Phone No.</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="password" name="password" placeholder="Your password..." value="<?php echo $r['password'];?>">
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-25">
                        <label for="">Phone</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="phone" name="phone" placeholder="Your phone no..." value="<?php echo $r['phone'];?>">
                    </div>
                </div>
        
    <div class="row">
      <input type="submit" name="submit">
    </div>
  </form>
</div>
      
    </body>
</html>