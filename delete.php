<?php
    //include auth_session.php file on all user panel pages
    include("Admin auth_session.php");
    ?>
<?php
  require('Admin db.php');
  if(isset($_GET['deleteid'])){
      $id=$_GET['deleteid'];
      $sql="DELETE FROM `users` WHERE id=$id";
      $result=mysqli_query($con,$sql);
      if($result){
        header('location:index.php');
      }else{
          die(mysqli_error($con));
      }
      
  }
?>