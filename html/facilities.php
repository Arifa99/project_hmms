 <!DOCTYPE html>
<html lang="en">
<head>
<title>Facilities</title>
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1">
                  <link type="text/css" rel="stylesheet" href="../css/nav.css">
                      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
     body{
            background-color: whitesmoke;
        }
div.gallery {
    margin: 20px;
    border: 0px solid black;
    width: 226px;
   float: left;
        }

div.gallery:hover {
    border: 0px solid #777;
}

div.gallery img {
    width: 226px;
    height: 210px;
    border: 2px solid black;
    box-shadow: 5px 5px 5px gray;
    border-radius: 10px;   
}

div.desc {
    padding: 10px;
    text-align: center;
}
</style>
    </head>  
<body>
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
       <a href="#">Facilities</a>
          <a href="help.php">Help</a>
           
    </ul>
  </div>                         
    
<div id="images" style="margin-top: 30px; margin-bottom:650px;">
<div class="gallery">
  <a target="_blank" href="../facilities/mess.php">
    <img src="../img/dinning-hall.jpg" alt="Dinning" width="300" height="200">
  </a>
    <div class="desc"><b>Dinning</b></div>
</div>
<div class="gallery">
  <a target="_blank" href="../facilities/readingroom.php">
    <img src="../img/rd.jpg" alt="reading" width="600" height="400">
  </a>
    <div class="desc"><b>Reading Room</b></div>
</div>
<div class="gallery">
  <a target="_blank" href="../facilities/computerroom.php">
    <img src="../img/cr.jpg" alt="computer" width="600" height="400">
  </a>
    <div class="desc"><b>Computer Room</b></div>
</div>
<div class="gallery">
  <a target="_blank" href="../facilities/commonroom.php">
    <img src="../img/misilli.jpg" alt="Misc" width="600" height="400">
  </a>
       <div class="desc"><b>Common room</b></div>
    </div>
<div class="gallery">
  <a target="_blank" href="../facilities/sport.php">
    <img src="../img/sp.jpg" alt="Sport" width="600" height="400">
  </a>
    <div class="desc"><b>Sport</b></div>
</div>
    <div class="gallery">
  <a target="_blank" href="../facilities/canteen.php">
    <img src="../img/ca.jpg" alt="Canteen" width="600" height="400">
  </a>
         <div class="desc"><b>Canteen</b></div>
    </div>
    </div>
   
    <?php include 'footer.php'; ?>
 
</body>
</html>