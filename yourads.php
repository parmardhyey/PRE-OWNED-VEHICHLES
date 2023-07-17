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
    <link rel="stylesheet" href="yourads.css">
    <title> PROFILE</title>
    <style>
       * {
    padding: 0%;
     margin: 0%;
     box-sizing: border-box;
     text-decoration: none;
 }
 .header{
     display: flex;
     flex-direction: row;
     justify-content: space-between;
     padding-top: 1.5rem;
     margin-left: 2.5rem;
     margin-right: 5rem;
     color:rgb(3, 7, 73); 
 }
 ul{
    display: flex;
    flex-direction: row; 
 }
 li{
     list-style-type: none;
     margin-left: 3rem;
     font-weight: 900;
 }
 hr{
    border:0.1rem solid rgb(3, 7, 73);
}
a{
    color:rgb(3, 7, 73);
}  
    </style>
</head>
<body >
    
    
    <header>
            <div class="header">
            <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>
             <div class="list">
                 <ul>
                 
                     <li><a href="profile.php">BASIC PROFILE</a></li>
                     <li><a href="yourads.php">YOUR BIKE ADS</a></li>
                     <li><a href="dashboard.php">HOME</a></li>
                     <li><a href="logout.php"><i class="fa-solid fa-right-from-bracket" style="font-size:1.3rem;"></i></a>
                     
                    </li>
                 </ul>
                
             </div>
            </div><br>
        <hr>
    </header>
   
    <bottom>
      
        <div class="container">

        <?php
    
    require('db.php');
    $id=  $_SESSION['uid'];
    $sql="SELECT * FROM `sell` WHERE id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $bikeid=$row['bikeid'];
            $name=$row['name'];
            $bikename=$row['bikename'];
            $ownership=$row['ownership'];
            $model=$row['model'];
            $price=$row['price'];
            $km=$row['km'];
            $mobile=$row['mobile'];
            $description=$row['description'];
            $address=$row['address'];
            $image=$row['image'];

            echo'   <div class="bigcon">
            <div class="medcon1">
                 <div class="smallcon11">'.$bikename.'</div>
             </div>
       
              <div class="medcon2">
                 <div class="smallcon21"><i class="fas fa-tachometer-alt"  style="font-size:1rem;color:#a1a1a1;"></i>  '.$km.' </div>
                 <div class="smallcon22"><i class="fas fa-money-bill-wave"  style="font-size:1rem;color:#a1a1a1;"></i>  '.$price.'</div>
                 <div class="smallcon23"><i class="fas fa-calendar-alt"  style="font-size:1rem;color:#a1a1a1;"></i>   '.$model.'</div>
             </div>

             <div class="medcon3">
                 <div class="smallcon31">
                     <img src="'.$image.'" id="image" >
                 </div>
                 <div class="smallcon32">
                     <table>
                         <tr>
                             <td><i class="fas fa-user"  style="font-size:1rem;color:#a1a1a1;"></i> '.$name.'</td>
                             <td>
                             <a href="edit.php? editid='.$bikeid.'" style="color:white;"><i class="fa-solid fa-pen-to-square" style="font-size:1.7rem;color:#3697ff;"></i></a>
                             </td>
                         </tr> 
                         <tr>
                             <td><i class="fas fa-id-card" style="font-size:1rem;color:#a1a1a1;"></i>  '.$ownership.' Owner</td>
                             <td>
                             <a href="delete ads.php? delid='.$bikeid.'" style="color:white;"><i class="fa-solid fa-trash-can" style="font-size:1.7rem;color:#ff3646;"></i></a>
                             </td>
                             </tr> 
                      </table>
                 </div>
             </div>

             <div class="medcon4">'.$address.' </div>
            
          </div>';
        }
    }
?>


        </div>

    </bottom>