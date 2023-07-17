<?php
    //include auth_session.php file on all user panel pages
    include("auth_session.php");
    ?>
<?php
  require('db.php');
  if(isset($_GET['delid'])){
      $id=$_GET['delid'];
      $sql="DELETE FROM `sell` WHERE bikeid=$id";
      $result=mysqli_query($con,$sql);
      if($result){
        header('location:yourads.php');
      }else{
          die(mysqli_error($con));
      }
      
  }
?>