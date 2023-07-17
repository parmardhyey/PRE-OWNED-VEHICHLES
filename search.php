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
        #select{
    background-image: linear-gradient(to left bottom, #a6ff00, #a6ff00, #b0fa16, #b6fd0d, #bbff00);
    margin-left: 9.5rem;
    padding:0.8rem;
    border:none;
    border-radius:0.6rem;
    width:9.6rem;
    color:rgb(3, 7, 73);
    font-size: 1.1rem;
    cursor: pointer;
    font-family:Georgia, 'Times New Roman', Times, serif;
    font-weight:bold;
 }
    </style>
</head>
<body>
   
    <header>
            <div class="header">
            <div><h2><i class="fa-solid fa-motorcycle" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>

           
           
             <div class="list">
                 <ul>
                     <li><a href="Buy used bike.php">BACK</a></li>
                  
                 </ul>
             </div>
            </div><br>
        <hr>
    </header>
<?php $search = $_POST['search'];?>
    <main>
        <div class="buy">
            <!--<div class="buy1">-->
            <?php
header('Cache-Control: no cache'); //disable validation of form by the browser
//connect ot the database
        require 'db.php';
        //get the search keyword
        //$search = $_POST['search'];
        //SQL query to get the products based on the search keyword
        $sql = "SELECT * FROM sell WHERE bikename LIKE 
        '%$search%' OR State LIKE '%$search%' OR  City LIKE '%$search%'
        ";
        //execute the query
        $res = mysqli_query($con, $sql);
        //count the rows
        $count = mysqli_num_rows($res);
        //check whether the product is available
        if ($count > 0) {
            while ($row  = mysqli_fetch_assoc($res)) {
                $id=$row['id'];
                $bikeid=$row['bikeid'];
                $model=$row['model'];
                $bikename=$row['bikename'];
                $price=$row['price'];
                $km=$row['km'];
                $ownership=$row['ownership'];
                $image=$row['image'];
              echo'  <div class="buy1"> 
                        <div class="buy11">
                        <a href="inside.php? insideid='.$bikeid.'"><img src="'.$image.'"></a>
                        </div>
                        <div class="buy12">
                        '.$model.' '.$bikename.'<br><br>
                             ₹'.$price.'<br><br>
                             '.$km.' km   . '.$ownership.' owner<br><br>
                        </div>
                    </div>';
                ?>

                    
                    



<?php
}
}else {
echo '<div class="noresult">
        <img src="illustration/search.png" style="width:400px;height:400px;">
        <p  style="font-weight:bolder;color:rgb(3,7,73);font-size:1.5rem;text-align:center">Sorry, no results found!</p>
        <p  style="color:rgb(3,7,73);font-size:1.2rem;text-align:center">Please check the spelling or try searching for something else</p><br>
        <button id="select"><a href="Buy used bike.php">Search Again</a></button>
    </div>

';
}

?>


        </div>
    </main>
</body>
</html>