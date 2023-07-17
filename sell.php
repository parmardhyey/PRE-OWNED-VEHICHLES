<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/be7796383d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="Sell.css">
    <title>Sell Used Bike</title>
  
</head>

<body>
    <?php
    
    include_once 'db.php';
    $id=  $_SESSION['uid'];
    if (isset($_REQUEST['submit'])) {
        $name = stripslashes($_REQUEST['name']);
         //escapes special characters in a string
        $name = mysqli_real_escape_string($con, $name);
        // removes backslashes
        $bike = stripslashes($_REQUEST['bikename']);
         //escapes special characters in a string
        $bike = mysqli_real_escape_string($con, $bike);
        $ownership    = stripslashes($_REQUEST['ownership']);
        $ownership    = mysqli_real_escape_string($con, $ownership);
        $mobile    = stripslashes($_REQUEST['mobile']);
        $mobile    = mysqli_real_escape_string($con, $mobile);
        $price    = stripslashes($_REQUEST['price']);
        $price    = mysqli_real_escape_string($con, $price);
        $km    = stripslashes($_REQUEST['km']);
        $km    = mysqli_real_escape_string($con, $km);
        $model    = stripslashes($_REQUEST['model']);
        $model    = mysqli_real_escape_string($con, $model);
        $description    = stripslashes($_REQUEST['description']);
        $description   = mysqli_real_escape_string($con, $description);
        $address    = stripslashes($_REQUEST['address']);
        $address    = mysqli_real_escape_string($con, $address);
        $State    = stripslashes($_REQUEST['State']);
        $State    = mysqli_real_escape_string($con, $State);
        $City    = stripslashes($_REQUEST['City']);
        $City    = mysqli_real_escape_string($con, $City);
        $filename =$_FILES["image"]["name"];
        $tempname =$_FILES["image"]["tmp_name"];
        $folder= "image/".$filename;
        move_uploaded_file($tempname,$folder);
        $query    = "INSERT into `sell` (id,name,bikename,ownership,mobile,price,km,model,description,address,State,city,image)
                     VALUES ('$id','$name','$bike','$ownership','$mobile','$price', '$km','$model', '$description','$address','$State','$City','$folder')";
        $result   = mysqli_query($con, $query);
        if (!$result) {
            die(mysqli_error($con));
        } else {
            echo "<script>window.alert('Your Ad Posted Successfully!'); 
            window.location='dashboard.php';
            </script>";
                }
    } 
?>
   <header>
   <div class="header">
            <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>
             <div class="list">
                 <ul>
                     <li><a href="dashboard.php">HOME</a></li>
                     <li><a href="Buy used bike.php">BUY USED BIKE</a></li>
                     <li><a href="feedback.php">FEEDBACK</li></a></li>
                 </ul>
             </div>
            </div><br>
        <hr>
        <div class="main">
            
            <div class="form">
            <form action="" method="post" enctype="multipart/form-data">

            <div style="float:left;">
            <label for="name">Owner Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Owner name" required maxlength="20" size="20"><br><br>
            </div>

            <div style="float:left;">
            <label for="Bikename">Bikename:</label><br>
            <input type="text" id="bikename" name="bikename" placeholder="bikename" required maxlength="20" size="20"><br><br>
            </div>

            <div style="float:left;">
            <label for="Ownership">Ownership Type:</label><br>
            <input type="number" id="Ownership" name="ownership" placeholder="Ownership " required  min="1" max="5"><br><br>
            </div>

            <div style="float:left;">
            <label for="mobile"  id="mobile">Mobile</label><br>
            <input type="tel" name="mobile"  id="mobile" pattern="[0-9]{10}"  placeholder="Ten digit mobile number" required/><br><br>
            </div>
           

            <div style="float:left;">
            <label for="Price">Price:</label><br>
            <input type="number" id="Price" name="price" placeholder="Price" required  min="1" max="1000000" maxlength="6" size="6"><br><br>
            </div>

            <div style="float:left;">
            <label for="KM Driven">KM Driven</label><br>
            <input type="number" id="KM Driven" name="km" placeholder="KM Driven" required min="1" max="100000"><br><br>
            </div>

            <div style="float:left;">
            <label for="Model" id="Model">Bike Model Year:</label><br>
            <input type="number" id="Model" name="model" placeholder="Model Year" required  min="2000" max="2022" ><br><br>
            </div>
           

            <div style="float:left;">
            <label for="Description">Description:</label><br>
            <input type="text" id="Description" name="description" placeholder="Description" required maxlength="800" size="800"><br><br>
            </div>

            <div style="float:left;">
            <label for="Address">Address:</label><br>
            <input type="text" id="Address" name="address" placeholder="Address" required maxlength="100" size="100"><br><br>
            </div>

            <div style="float:left;">
            <label for="State">State:</label><br>
            <input type="text" id="State" name="State" placeholder="State" required maxlength="20" size="20"><br><br>
            </div>

            <div style="float:left;">
            <label for="City">City:</label><br>
            <input type="text" id="City" name="City" placeholder="City" required maxlength="20" size="20"><br><br>
            </div>

            <div style="float:left;" id="nameimage">
            <label for="Image">Image:</label><br>
            <input type="file" id="Image" name="image"  placeholder="Image" required>
            </div>

            <div style="float:right;" id="nameimage">
            <input type="submit" value="submit" id="select" name="submit">
            </div>
            </form>
            
        
</body>
</html>
