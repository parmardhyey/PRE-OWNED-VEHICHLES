<?php
    //include auth_session.php file on all user panel pages
    include("Admin auth_session.php");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="Adddelete.css">
    <title> UPDATE USER</title>
    <script src="https://kit.fontawesome.com/be7796383d.js" crossorigin="anonymous"></script>
    
</head>
<body>


<?php
    require('Admin db.php');
    $id=$_GET['updateid'];
    $sql = "SELECT username,email FROM `users` WHERE id=$id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $email = $row['email'];
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
            echo "<script>window.alert('User updated Sucessfully!');  
            </script>";
            header('location:index.php');
                }
    } 
?>
 
    
      
        <header>
            <div class="logo">
            <h2><i class="fas fa-car" style="color:rgba(0, 0, 39, 0.925);"></i>&nbsp;PRE OWNED VEHICHLES</h2>
            </div>
        </header><br>
        <hr><br><br>
        <div class="main">
             <div class="form">
            <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Username" maxlength="20" size="20"  pattern="[A-Za-z0-9_]{1,20}"  title="Only letters (either case), numbers, and the underscore; no more than 20 characters"  required value=<?php echo $username; ?>><br>
             <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" placeholder="Email id" required value=<?php echo $email; ?> ><br>
            <label for="pwd">Password:</label><br>
            <input type="password" id="pwd" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
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
</body>
</html>

