<?php
    //include auth_session.php file on all user panel pages
    include("Admin auth_session.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/be7796383d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="Adashboard.css">
    <title> ADMIN DASHBOARD/FEEDBACK</title>
    <style>
          body{   
   background: url(illustration/feedback2.png) 1% 20% ,url(illustration/feedback1.png) 100% 90%;
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: 240px, 240px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left:20rem;
  margin-right:4rem;
  width:60%;
  text-align:center;
  margin-top:5rem;

}

td, th {
    border: 0.1px solid rgb(3, 7, 73);
  padding: 8px;
  color:rgb(3, 7, 73);
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
 

</style>
</head>
<body>
 
    <header>
            <div class="header">
            <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>
             <div class="list">
                 <ul>
                 
                     <li><a href="index.php">MANAGE USERS</a></li>
                     <li><a href="Admin product.php">MANAGE PRODUCT</a></li>
                     <li><a href="Admin feedback.php">FEEDBACK</a></li>
                   
                    
                    </li>
                 </ul>
                
             </div>
            </div><br>
        <hr>
    </header>

    <bottom>
        <div class="bottom">
            <div class="two">
            <table >
             <tr >
            <th>USERNAME</th>
            <th>BIKENAME</th>
            <th>RATING</th>
            <th>REVIEW</th>
            </tr>
            <?php
                 require('Admin db.php');

               $sql="SELECT * FROM `feedback`";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $username=$row['username'];
                        $bikename=$row['bikename'];
                        $rating=$row['rating'];
                        $review=$row['review'];
                        echo'<tr>
                        <td>'.$username.'</td>
                        <td>'.$bikename.'</td>
                        <td>'.$rating.'/10</td>
                        <td>'.$review.'</td>
                        </tr>';
                    }
                }

            ?>

</table>

        </div>
    </bottom>


</body>
</html>
