<?php
    //include auth_session.php file on all user panel pages
    include("Admin auth_session.php");
    ?>

<?php
  require('Admin db.php');
  if(isset($_GET['deleteid'])){
      $bikeid=$_GET['deleteid'];
      $sql="DELETE FROM `sell` WHERE bikeid=$bikeid";
      $result=mysqli_query($con,$sql);
      if($result){
        header('location:Admin product.php');
      }else{
          die(mysqli_error($con));
      }
      
  }
?>