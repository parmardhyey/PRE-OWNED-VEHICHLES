<?php
if(isset($_POST['submit_rating']))
{
require "db.php";
  
  $php_rating=$_POST['phprating'];
  $asp_rating=$_POST['asprating'];
  $jsp_rating=$_POST['jsprating'];
  $insert=mysql_query("insert into rating values('','$php_rating','$asp_rating','jsp_rating')");
}
?>