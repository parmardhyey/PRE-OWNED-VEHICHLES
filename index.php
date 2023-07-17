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
    <link rel="stylesheet" href="adashboard.css">
    <title> ADMIN DASHBOARD</title>
   
    <style>
        body{
   background: url(illustration/Add\ user.png) 2% 20%  ,url(illustration/steps.png) 100% 90%;
   background-repeat: no-repeat;
   background-attachment: fixed;
   background-size: 240px, 240px;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left:19rem;
  margin-right:0rem;
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
<body >
    
    
    <header>
            <div class="header">
            <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>
             <div class="list">
                 <ul>
                 
                     <li><a href="index.php">MANAGE USERS</a></li>
                     <li><a href="Admin product.php">MANAGE PRODUCT</a></li>
                     <li><a href="Admin feedback.php">FEEDBACK</a></li>
                     <li><a href="Admin logout.php"><i class="fa-solid fa-right-from-bracket" style="font-size:1.3rem;"></i></a>
                     
                    </li>
                 </ul>
                
             </div>
            </div><br>
        <hr>
    </header>
      
    <bottom>
        <div class="bottom">
            </div>
            <div class="one">
                <li style="margin-top:2rem;padding:1rem;width:7.5rem;color:white;cursor: pointer;border-radius:1rem;  background-image: linear-gradient(to right top, #bbff00, #bbff00);"><a href="add.php">ADD USER</a></li>
            </div>
            <div class="two">
            <table >
             <tr >
             <th>ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>OPERATION</th>
            </tr>
            <?php
                 require('Admin db.php');

               $sql="SELECT * FROM `users`";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $username=$row['username'];
                        $email=$row['email'];
                        $password=$row['password'];
                        echo'<tr>
                        <td>'.$id.'</td>
                        <td>'.$username.'</td>
                        <td>'.$email.'</td>
                        <td>'.$password.'</td>
                        <td >
                       <a href="update.php? updateid='.$id.'" style="color: white;"><i class="fa-solid fa-pen-to-square" style="font-size:1.2rem;color:#000030;"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="delete.php? deleteid='.$id.'" style="color:white;"><i class="fa-solid fa-trash-can" style="font-size:1.2rem;color:#000030;"></i></a>
                        </td>
                        </tr>';
                    }
                }

            ?>

</table>

        </div>
    </bottom>
</body>
</html>
