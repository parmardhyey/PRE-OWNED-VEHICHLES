
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://kit.fontawesome.com/be7796383d.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="SIgnUp.css">
    <title> Register</title>
</head>
<body>


<?php
    require('db.php');
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
        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '". md5($password)."', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if (!$result) {
            echo "Error!";
        } else {
            echo "<script>window.alert('Registration Successful Continue with Login!'); 
                  window.location='signin.php';
                  </script>";
                }
    } 
?>
 
    
      
        <header>
            <div class="logo">
            <h2><i class="fas fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;2NDHANDVEHICLE</h2>
            </div>
        </header><br>
        <hr>
        <div class="main">
            <div class="signup">
                <h2><br>SIGN UP</h2>
            </div>

             <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username"  maxlength="20" size="20" pattern="[A-Za-z0-9_]{1,20}"  title="Only letters (either case), numbers, and the underscore; no more than 20 characters"   required><br>
             <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email id" required><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
             <i class="fa-solid fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
            <input type="submit" value="submit" id="select">
            </form>
            </div>
            <div class="signin"><h2>Already a member? <a href="signin.php"> Sign in</a></h2></div>
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

</body>
</html>

