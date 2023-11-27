<?php
 
  require("cnx.php");
  $id=$_GET['id'];
  $query = "delete from user where id=$id";
  $result = mysqli_query($cnx, $query);
  header("location:user.php");


?>