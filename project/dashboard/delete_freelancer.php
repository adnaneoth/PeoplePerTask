<?php
 
  require("cnx.php");
  $id=$_GET['id'];
  $query = "delete from Freelances where Id_freelance=$id";
  $result = mysqli_query($cnx, $query);
  header("location:agents.php");


?>