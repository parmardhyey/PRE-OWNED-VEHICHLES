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
    <link rel="stylesheet" href="Adddelete.css">
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
    list-style-type: none;
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
    text-decoration: none;
}  
    </style>
</head>
<body >
    
    
<?php
    require('db.php');
    $id=  $_SESSION['uid'];
    $sql = "SELECT username,email,password FROM `users` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $sql    = "UPDATE  `users` SET id=$id, username='$username',email='$email',password='". md5($password)."' WHERE id=$id";
        $result   = mysqli_query($con, $sql);
        if (!$result) {
            die(mysqli_error($con));
        } else {
            echo "<script>window.alert('Profile updated Sucessfully!');
            window.location = 'profile.php';
            </script>";
           
                }
    } 
?>
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
    <div class="main">
             <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username" maxlength="20" size="20"  pattern="[A-Za-z0-9_]{1,20}"  title="Only letters (either case), numbers, and the underscore; no more than 20 characters"  required value=<?php echo $username; ?>><br>
             <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email id" required value=<?php echo $email; ?> ><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required value=<?php echo $password; ?>>
             <i class="fa-solid fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            <input type="submit" value="update" id="select">
            </form>
            </div>
           
        </div>
        <script>

const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#pwd');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
    </bottom>