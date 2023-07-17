<?php
    include("auth_session.php");
    require('db.php');
    $id=  $_SESSION['uid'];
    $sql = "SELECT username FROM `users` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $bikename   = stripslashes($_REQUEST['bikename']);
        $bikename    = mysqli_real_escape_string($con, $bikename);
        $rating   = stripslashes($_REQUEST['rating']);
        $rating    = mysqli_real_escape_string($con, $rating);
        $review = stripslashes($_REQUEST['review']);
        $review = mysqli_real_escape_string($con, $review);
        $query    = "INSERT into `feedback` (username,bikename,rating,review)
                     VALUES ('$username','$bikename','$rating','$review')";
        $result   = mysqli_query($con, $query);
        if (!$result) {
            die(mysqli_error($con));
         } else {
            echo "<script>window.alert('Feedback submited!'); 
                  window.location='dashboard.php';
                  </script>";
                }
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="fEEDback.css">
    <title> Feedback</title>
    <script src="https://kit.fontawesome.com/be7796383d.js" crossorigin="anonymous"></script>
    <style>
      
body {  
text-shadow: white 1px 1px 1px;
}
.value {
    position: absolute;
    bottom:13rem;
    display: inline-block;
    border-bottom: 4px dashed #bdc3c7;
     width:60px;
     margin-left:1.5rem;
     text-align:center;
    font-weight: bold;
    font-size: 3rem;
    text-shadow: white 2px 2px 2px;
    color:rgb(3, 7, 73);

}
input[type="range"] {
  -webkit-appearance: none;
  background-color: rgb(230,230,230);
  width: 21rem;
  padding: 0.6rem;
  border-radius:1rem;

}
input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none;
  background-color: #bbff00;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  border: 2px solid white;
  cursor: pointer;
  transition: .3s ease-in-out;
}​
  input[type="range"]::-webkit-slider-thumb:hover {
    background-color: white;
    border: 2px solid #e74c3c;
  }
  input[type="range"]::-webkit-slider-thumb:active {
    transform: scale(1.4);
  }
    </style>
</head>
<body>

  
        <header>
            <div class="header">
            <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925) ;  "></i>&nbsp;PRE OWNED VEHICHLES</h2> </div>
     

            
             <div class="list">
                 <ul>
                     <li><a href="dashboard.php">HOME</a></li>
                     <li><a href="Buy used bike.php">BUY USED BIKE</a></li>
                     <li><a href="sell.php">SELL USED BIKE</li></a></li>
                  
                 </ul>
             </div>
            </div>
        </header><br>
        <hr>
        <div class="main"><br>
            <div class="Feedback">
                <h2>Feedback</h2>
            </div>
        
             <div class="form">
            <form method="Post">
            <div style="float:left;">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username" maxlength="20" size="20" required value=<?php echo "'$username'" ?>><br><br>
            </div>
            
            <div style="float:right;">
            <label for="bikename">Bike's Name:</label><br>
            <input type="text" id="bikename" name="bikename" placeholder="Model Name" maxlength="20" size="20" required><br><br>
            </div>

              <div style="float:left;">
              <label for="Rating">Rating:</label><br>
              <input type="range" min="0" max="10" step="0" value="0" name="rating" required ><p class="value">0</p><br><br>
              </div> 


              <div style="float:right;" class="Review">
            <label for="Review">Review:</label><br>
            <input type="text" id="Review" name="review" placeholder="Review" maxlength="100" size="100" required><br><br>
            </div>
            
            <input type="submit" value="Submit" id="select">
            </form>
            </div>
            
        </div>
       <script>
           var elem = document.querySelector('input[type="range"]');
            var rangeValue = function(){
             var newValue = elem.value;
            var target = document.querySelector('.value');
            target.innerHTML = newValue;
            }
            elem.addEventListener("input", rangeValue);
       </script>
     
</body>
</html>
