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
    <link rel="stylesheet" href="InSIDE.css">
    <title>INSIDE BUY USED BIKE</title>
   <style>
       .photo {
     position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 2px solid #e6e6e6;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 80px;
  height: 80px;
}
    </style>
    <script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>

</head>
<body>
   
    <header>
        <div class="header">
        <div><h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);font-size:1.6rem;"></i>&nbsp;PRE OWNED VEHICHLES</h2></div>
         <div class="list">
             <ul>
                 <li><a href="dashboard.php">HOME</a></li>
                 <li><a href="Buy used bike.php">BACK</a></li>
                
             </ul>
         </div>
        </div><br>
    <hr>
</header>
<?php
    
    require('db.php');
    $bikeid=$_GET['insideid'];
    $sql="SELECT * FROM `sell` WHERE bikeid=$bikeid";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
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

            echo'<div class="top">
            <div class="images">
                <div class="photo">
                    <img src="'.$image.'" id="image" >
                </div>
               
        
            </div>
            <div class="description">
                <span id="one">'.$bikename.'</span><br><br>
                <span id="two">Description:</span><br>
                <span id="three">'.$description.'</span><br><br>
                
            </div>
        </div>
            <hr>
        
            <bottom>
                <div class="D1">Bike Details:</div>
                <div class="bike">
                    <ul class="bottom1">
                        <li><i class="fas fa-tachometer-alt"></i> '.$km.'km</li>
                        <li><i class="fas fa-calendar-alt"></i> '.$model.'</li> 
                        <li><i class="fas fa-id-card"></i> '.$ownership.' owner</li>
                        <li><i class="fas fa-money-bill-wave"></i> '.$price.'</li>
                       
                    </ul>
                </div><br><br>
                <hr>
                <div class="D2">Owner Details:</div><br>
                <div class="bike">
                    <ul class="bottom1">
                        <li><i class="fas fa-user"></i> '.$name.'</li>
                        <li><i class="fas fa-phone-square-alt"></i> +91 '.$mobile.'</li>
                        <li><i class="fas fa-home"></i> '.$address.' </li>
                    </ul>
                </div><br><br>
                    <hr>
            </bottom>
        ';
        }
    }
?>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("image", 2);
</script>
</body>
</html>