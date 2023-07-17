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
    <title> ADMIN DASHBOARD / MANAGE PRODUCTS</title>
   
    <style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  margin-left:4rem;
  margin-right:4rem;
  width:90%;
  text-align:center;
  margin-top:5rem;
  margin-bottom:5rem;
}

td, th {
border: 0.1px solid rgb(3, 7, 73);
  padding: 2px;
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
            <table >
             <tr >
             <th>USERID</th>
             <th>BIKEID</th>
            <th>NAME</th>
            <th>BIKENAME</th>
            <th>OWNER TYPE</th>
            <th>MODEL</th>
            <th>PRICE</th>
            <th>KM</th>
            <th>CONTACT NO</th>
            <th>STATE</th>
            <th>CITY</th>
            <th>ADDRESS</th>
            <th>IMAGE</th>
            <th>OPERATION</th>
            </tr>
            <?php
                 require('Admin db.php');
               $sql="SELECT * FROM `sell`";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $bikeid=$row['bikeid'];
                        $name=$row['name'];
                        $bikename=$row['bikename'];
                        $ownership=$row['ownership'];
                        $model=$row['model'];
                        $price=$row['price'];
                        $km=$row['km'];
                        $mobile=$row['mobile'];
                        $description=$row['description'];
                        $State=$row['State'];
                        $City=$row['city'];
                        $address=$row['address'];
                        $image=$row['image'];
                        echo'<tr>
                        <td>'.$id.'</td>
                        <td>'.$bikeid.'</td>
                        <td>'.$name.'</td>
                        <td>'.$bikename.'</td>
                        <td>'.$ownership.'</td>
                        <td>'.$model.'</td>
                        <td>'.$price.'</td>
                        <td>'.$km.'</td>
                        <td>'.$mobile.'</td>
                        <td>'.$State.'</td>
                        <td>'.$City.'</td>
                        <td>'.$address.'</td>
                        <td> <img src="'.$image.'" style="height:80px;width:80px;"></td>
                        <td ><a href="delete product.php? deleteid='.$bikeid.'" style="color:black;"><i class="fa-solid fa-trash-can" style="font-size:1.2rem;color:#000030;"></i></a></td>
                        </tr>';
                    }
                }

            ?>

</table>

        </div>
    </bottom>

  
</body>
</html>
