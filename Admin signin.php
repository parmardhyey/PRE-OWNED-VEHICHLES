<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/be7796383d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="Adsignin.css">
    <title>Login</title>
   
</head>
<body>
<?php
require('Admin db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']??"");
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM  admin  WHERE username='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['password'] = $password;
            // Redirect user to index.php
	    header("Location:index.php");
         }else{
	echo "<script>window.alert('Incorrect Username/Password!'); 
        window.location='Admin signin.php';
        </script>";
	}
 }
?>

        <header>
            <div class="logo">
            <h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2>
            </div>
        </header><br>
        <hr>
        <div class="main">
            <div class="signin">
                <h2><br>SIGN IN</h2>
            </div>

             <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username" required><br><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="password" placeholder="password" required><br><br>
            <input type="submit" value="submit" id="select">
            </form>
            </div>
           
        </div>
        
</body>
</html>
