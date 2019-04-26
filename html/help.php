        <?php
        $contact1 = array('name' => 'Simmi Usmani','email' => ' xyz@gmail.com','phone' => '9410059310'
        );
        ?>
        
        <?php
        $contact2 = array('name' => 'Hamid Hasan','email' => ' abc@gmail.com','phone' => '9045731350'); ?>
    
        <?php
        $contact3 = array('name' => 'Afsar Ahmad','email' => ' avba@gmail.com','phone' => '904573150');
        ?>
        
        <?php
        $contact4 = array('name' => 'Shagufta Nazneen','departement' => 'Ph.D','email' => 'shagufta101.sn@gmail.com' );
        ?>
            
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Help::</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="../css/nav.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
    li{
        
        list-style: none;
        list-style-type: none
    }
    body{
            background-color: whitesmoke;
         
       
            }
</style>
</head>
<body style="background-color: whitesmoke;">
  
    <?php include 'header.php'; ?>
    
    <div class="navbar" style="margin-top:-18px; width:100%; position: -webkit-sticky;
   position: sticky; top: 0px;">
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
      <a href="adminlogin.php">Admin</a>
      <a href="studentlogin.php">Student</a>
    </div> 
    </div>
       <a href="facilities.php">Facilities</a>
          <a href="#">Help</a>        
    </ul>
  </div>
    
        <ul>
        <li><h2>Contact us</h2></li>
            <li><p>You can contact any of the following person in case of any suggestions/queries/complaints.</p></li>
        </ul>
       <ul><li><b>Mess Incharge:-</b></li>
         
             <?php foreach ($contact1 as $key=>$value) : ?>
            <li><?php echo ucfirst($key); ?>:
            <?php echo $value; ?>    
            </li>
            <?php endforeach; ?>
    </ul>
        <ul>
        <li><b>Munshi:-</b></li>
        
            <?php foreach ($contact2 as $key=>$value) : ?>
            <li><?php echo ucfirst($key); ?>:
            <?php echo $value; ?>    
            </li>
            <?php endforeach; ?><br />
            
            <?php foreach ($contact3 as $key=>$value) : ?>
            <li><?php echo ucfirst($key); ?>:
            <?php echo $value; ?>    
            </li>
            <?php endforeach; ?>
        </ul>
        <ul>
        
         <li><b>Food Incharge:-</b></li>
        <?php foreach ($contact4 as $key=>$value) : ?>
            <li><?php echo ucfirst($key); ?>:
            <?php echo $value; ?>    
            </li>
            <?php endforeach; ?>
    </ul>
    
       

  
    
    
    <div class="mapouter"><div class="gmap_canvas"><a href="https://www.pureblack.de/google-maps/"></a><iframe width="600" height="500" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m19!1m8!1m3!1d14101.722167267266!2d78.07647175606691!3d27.919443501399744!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x3974a4e2ed964521%3A0xed437214bc721181!2sS+N+Hall%2C+AMU+Campus%2C+Aligarh%2C+Uttar+Pradesh+202002!3m2!1d27.917964599999998!2d78.0788321!5e0!3m2!1sen!2sin!4v1510895334187" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div><style>.mapouter{overflow:hidden;height:300px;width:600px;margin-top: -350px; float: right; margin-right: 60px;}.gmap_canvas {background:none!important;height:300px;width:600px;}</style></div>
     <!-- footer-->
   <?php include 'footer.php'; ?> 
</body>
</html>









