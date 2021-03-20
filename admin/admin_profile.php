<?php
include("admindbconn.php");

$id=$_GET['id'];

echo $id;
$sq=mysqli_query($dbconn,("select * from admin where id=".$id));
$r=mysqli_fetch_array($sq);

if(isset($_POST['submit']))
{
    $target = "../html/images/".basename($_FILES['photo']['name']);
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];
    $image = $_FILES['photo']['name'];


$q="update admin set name='$name', address='$address', email='$email', password='$password', phone='$phone', photo='$image' where id=$id ";
$query=mysqli_query($dbconn, ($q));
if(mysqli_query($dbconn, $q))
{
 move_uploaded_file($_FILES['photo']['tmp_name'], $target);   
 header("location: home.php");
}else
    {
      echo "Couldn't Update";
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
body{
        background-color: whitesmoke;
        background-image: url(../img/salad-2068220_960_720.jpg);
        background-size: cover;
    
    }
        input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    background-color: rgb(0,0,0,0.0);
    color:white;
}

        form{
            border:1px solid black;
            width:50%;
            height: auto;
            margin-left: 25%;
            padding:3%;
            padding-top: 0px;
            background-color: rgb(0,0,0,0.5);
            margin-top: 20px;
            
        }
label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: darkorange;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: darkorange;
    opacity: 0.5;
}

.container {
    border-radius: 5px;
    background-color: rgb(0,0,0,0.5);
    padding: 20px;
    color:white;
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
        .i img{
            height:100px;
            width: 100px;
            float:left;
            background-color:white;
        }

</style>

    
    <body>
         <div id="header" style="background-color: whitesmoke;margin-top: -1.5%;">    
             <img src="../img/Capture.PNG"  width="195px" height="183px" style="z-index:1000;  position: fixed;top: 0px;box-shadow: 0 0 20px grey; margin-left: 98px;position:fixed">            
             <img src="../img/logo.png" alt="" class="logo_def" style="margin-left: 310px; height:150px; width:77%;margin-top:0%;   box-shadow: 1px 2px 1px grey;">
            </div>
        
        <div class="container">
            
           <form name="#" method="post" enctype="multipart/form-data">
           <h1 style="font-family: monospace;">Edit Profile</h1>
		    <?php 
             
                $select_q="select * from admin where id=$id";
                $q=mysqli_query($dbconn, $select_q);
                        
            ?>
           <div class="i">  
            <?php echo "<img src='../html/images/".$r['photo']."'>" ?>
               </div><br><br>
               
                <div class="row" style="margin-top:100px;">
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
                        <label for="password">Password</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="password" name="password" placeholder="Your password..." value="<?php echo $r['password'];?>">
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-25">
                        <label for="phone">Phone</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="phone" name="phone" placeholder="Your phone no..." value="<?php echo $r['phone'];?>">
                    </div>
                </div>
                
                 <div class="row">
                    <div class="col-25">
                        <label for="password">Photo</label>
                    </div>
                    <div class="col-75">
                    <input type="file" id="photo" name="photo" value="<?php echo "<img src='../html/images/".$r['photo']."'/>" ?>">
                    </div>
</div>
                
               
    <div class="row">
      <input type="submit" name="submit">
    </div>
  </form>
</div>
        <?php include '../html/footer.php'; ?>  
    </body>
</html>