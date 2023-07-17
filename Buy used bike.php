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
    <link rel="stylesheet" href="buy used Bike.css">
    <title> BUY USED BIKE</title>
    <style>
.search {
  width: 100%;
  position: relative;
  display: flex;
}
.searchTerm {
  width: 20rem;
  border: 3px solid rgb(230,230,230);
  border-right: none;
  padding: 5px;
  height: 30px;
  border-radius: 5px 0 0 5px;
  outline: none;
  color: rgb(3,7,73);
}
.searchTerm:focus{
  color: rgb(3,7,73);
}
.searchButton {
  width: 36px;
  height: 30px;
  border: 1px solid rgb(230,230,230);
  background: rgb(230,230,230);
  text-align: center;
  color: rgb(3,7,73);
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 17px;
}
/*Resize the wrap to see the search bar change!*/
.wrap{
  position: absolute;
  top:5%;
  left:45%;
  transform: translate(-50%, -50%);
}
    </style>
</head>
<body>
   
    <header>
            <div class="header">
            <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>

            <form action="search.php" method="post" class=" d-flex py-3" autocomplete="off">
            <div class="wrap">
             <div class="search">
            <input type="text"  name="search" class="searchTerm" placeholder="Search for State,City or Your favorite bike....">
            <button type="submit"  name="submit" class="searchButton">
             <i class="fa fa-search"></i>
             </button>
            </div>
            </div>
            </form>
           
             <div class="list">
                 <ul>
                     <li><a href="dashboard.php">HOME</a></li>
                     <li><a href="sell.php">SELL USED BIKE</a></li>
                     <li><a href="feedback.php">FEEDBACK</li></a></li>
                  
                 </ul>
             </div>
            </div><br>
        <hr>
    </header>

    <main>
        <div class="buy">
            <!--<div class="buy1">-->
                <?php
                require('db.php');

              $sql="SELECT * FROM `sell`";
               $result=mysqli_query($con,$sql);
               if($result){
                   while($row=mysqli_fetch_assoc($result)){
                       $id=$row['id'];
                       $bikeid=$row['bikeid'];
                       $model=$row['model'];
                       $bikename=$row['bikename'];
                       $price=$row['price'];
                       $km=$row['km'];
                       $ownership=$row['ownership'];
                       $image=$row['image'];
                       
                       echo'
                  
                       <div class="buy1"> 
                        <div class="buy11">
                        <a href="inside.php? insideid='.$bikeid.'"><img src="'.$image.'"></a>
                        </div>
                        <div class="buy12">
                            '.$model.' '.$bikename.'<br><br>
                             ₹'.$price.'<br><br>
                            '.$km.' km   . '.$ownership.' owner<br><br>
                        </div>
                    </div>';
                   
                   }
               }

           ?>


        </div>
    </main>
</body>
</html>