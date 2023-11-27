<?php
 
  require("cnx.php");
  $id=$_GET['id'];
  $query = "delete from Testimoniales where Id_Testimonials=$id";
  $result = mysqli_query($cnx, $query);
  header("location:testimonials.php");


?>