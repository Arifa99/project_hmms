<?php
include("admindbconn.php");
    if (isset($_POST['submitted']))
    {
        include("admindbconn.php");
        
        $shopname = $_POST['seller'];
        $itemid = $_POST['itemid'];
        $qty = $_POST['qty'];
        $qunit = $_POST['qunit'];
        $rate = $_POST['rate']; 
        $runit = $_POST['runit'];
        $date = $_POST['date'];
        $total = $_POST['total'];
        $other = $_POST['new_itemid'];
        
        if ($itemid == 'others')
        {
            $q = "INSERT INTO item (itemname) VALUES ('$other')";
            mysqli_query($dbconn, $q); 
            $itemid = mysqli_insert_id($dbconn);
        }
        
        $sql = "SELECT id FROM stock WHERE itemid='$itemid'";
        $result = mysqli_query($dbconn, $sql);
        
        if(mysqli_num_rows($result)>0){
            
     $sqlinsert = "UPDATE stock SET quantity = quantity + '$qty' WHERE itemid='$itemid'";
            
               if(mysqli_query($dbconn, $sqlinsert))
           {
               echo "<script>alert('successfully insert in stock')</script>";
           }else{
               
               echo "<script>alert('Couldn't insert in stock')</script>";
           }
            

        }else{
   $sqlinsert = "INSERT INTO stock (itemid, quantity, qunit) VALUES('$itemid','$qty','$qunit')"; 
           if(mysqli_query($dbconn, $sqlinsert))
           {
               echo "<script>alert('successfully insert in stock')</script>";
           }else{
               
               echo "<script>alert('not insert stock')</script>";
           }
}
        
         
  
       
     $sqlinsert = "INSERT INTO purchaseitem (seller, itemid, quantity, qunit, rate, runit, date, total) VALUES('$shopname','$itemid','$qty','$qunit','$rate','$runit','$date','$total')";
        
        
     if(mysqli_query($dbconn, $sqlinsert))
    {
        echo "<script>alert('Item added successfully');</script>";
           
    }
    else
    {
        echo "<script>alert('Item could't be added);</script>";
    } 
   
    mysqli_close($dbconn);    
   }
?>
<html>
    <head>
        <title>Dashboard</title>
        <link type="text/css" rel="stylesheet" href="../css/nav.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            
            body{
                background-color: whitesmoke;
                background-image: url(../img/salad-2068220_960_720.jpg);
                background-size: cover;
                }
       
            label{
                text-align: right;
                font-family: Times New Roman;
                font-size: 100%;
                float: left;
                display: inline-block;
                width: 30%;
                }
            
            input{
                width: 60%;
                padding: 10px 8px;
                display: inline-block;
                }
            
            form{
                height: auto;
                background-color: rgba(0, 0, 0, 0.5);
                width: 35%;
                margin: 0 auto;
                float: left;
                margin-top: 50px;
                color: white;
                } 
    
             /* large margin-right to force the next element to the new-line and margin-left to create a gutter between the label and input */
                    
            label + input {
                width: 33%;
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
                border: 2px solid black;  
                }

            th, td {
                text-align: center;
                padding: 8px;
                }

            tr:nth-child(even){background-color: aliceblue;}
            tr:nth-child(odd){background-color: white;}

            th {
                background-color: cadetblue;
                color: white;
                }
                    
            .unit {
                width: 15%;
                padding:5px 10px;
                border-color: darkgray;
                background-color: White;
                margin-left: 70%; 
                margin-top: -30px;
                }
        
            .seller {
                padding:5px 10px;
                width: 56%;
                height:30px;
                border-color: darkgray;
                background-color: White;
                margin-left: 4%; 
                margin-top: 10px; 
                }
                    
            .itemname{
                padding:5px 10px;
                width: 56%;
                height:30px;
                border-color: darkgray;
                background-color: White;
                margin-left: 4%; 
                margin-top: 0px; 
                }
            
        </style>
        <script>
            
            function multiply(){
                a = Number(document.getElementById('qty').value);
                b = Number(document.getElementById('rate').value);
                c =a*b;
                document.getElementById('total').value = c;
                }
            
         </script>
            
         <script type="text/javascript">
             
            function CheckItem(val){
                var element=document.getElementById('item');
                if(val=='enter the item'||val=='others')
                element.style.display='block';
                else  
                element.style.display='none';
                }

        </script> 
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
                        <a href="#">Purchase Item</a>
                        <a href="../admin/issue.php">Issued Item</a>
                        <a href="../admin/stock.php">Stock</a>
                    </div>
                </div>
                    <a href="../admin/purchaserecord.php">Purchase Item Record</a>
                    <a href="../admin/issuerecord.php">Issue Item Record</a>
                    <a href="../admin/studentrecord.php">Student Record</a>
                    <a href="../admin/logout.php" style="float: right; margin-right: 20px;">Log out</a>
            </ul>
        </div>
        
        <form action="#" method="post" style="margin-left: 10%;">
        <input type=hidden name="submitted" value="true" /> 
            <fieldset>
                <legend style="color:orange"><b>ADD ITEM</b></legend>
                
                <label style="margin-top:12px">Seller Name:</label>    
                <select class="seller" value="seller" name="seller">
                    <option> <center value=""> --Seller--</center></option>
                    
                    <?php 
                      
                        $query = "SELECT * FROM `seller`";
                        $result1 = mysqli_query($dbconn, $query);

                    ?>
                    
                    <?php while($row1 = mysqli_fetch_array($result1)):;?> 
                    <option value="<?php echo $row1[0];?>"><?php echo $row1[1]; ?></option>
                    <?php endwhile ?>
                </select><br/>
        
                <br><label>Item Name:</label>              
                <select class="itemname" value="itemid" name="itemid" onchange='CheckItem(this.value);'>
                    <option> <center value=""> --Item Name--</center></option>
          
                    <?php 
                        
                        $query = "SELECT * FROM `item`";
                        $result1 = mysqli_query($dbconn, $query);

                    ?>
                    
                    <?php while($row1 = mysqli_fetch_array($result1)):;?> 
                    <option value="<?php echo $row1[0];?>"><?php echo $row1[1]; ?></option>
                    <?php endwhile ?>
                    
                    <option value="others">others</option>
                </select><br/>
        
                <input type="text" name="new_itemid" id="item" style="display:none; width:128px; height:30px; margin-left:147px; margin-top:20px;"/>    
       
                <br><label>Quantity:</label>
                <input type="text" placeholder="Enter Quantity" name="qty" id="qty" value="" style="height:30px; " onKeyUp="multiply()" />
                
                <select class="unit" name="qunit" style="height:30px; width:20%">
                        <option value="kg">Kg</option>
                        <option value="lit">Litre</option>
                        <option value="gm">gm</option>
                        <option value="pack">pack</option>
                </select>
                
                <label style="margin-top: 20px;">Rate:</label>
                <input type="text" placeholder="Enter Rate" name="rate" value="" id="rate" onKeyUp="multiply()" style="margin-top: 20px;height:30px; ">
                
                <select class="unit" name="runit" style="height:30px; width:20%">
                        <option value="/kg">/Kg</option>
                        <option value="/lit">/Litre</option>
                        <option value="/gm">/gm</option>
                        <option value="/pack">/pack</option>
                </select>
                
                <label style="margin-top: 20px;">Total Price:</label>
                <input type = "text" placeholder="Total Cost" id="total" name="total" readonly style="margin-top: 20px; height:30px; width:150px;"><br>
                
                <br><label>Purchased Date:</label>
                <input type = "date" placeholder="Enter purchasing Date" name="date" style="height:30px;" required><br>
         
                <button class="button" style="vertical-align:middle"><span>Submit</span></button>
        </fieldset>
    </form>
    
           
           <div style="margin-top:600px">
            <?php include '../html/footer.php'; ?> 
        </div>
        </body>
</html>