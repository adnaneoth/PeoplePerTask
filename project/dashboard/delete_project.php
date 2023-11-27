<?php
 
  require("cnx.php");
  $id=$_GET['id'];
  $query = "delete from project where id_project=$id";
  $result = mysqli_query($cnx, $query);
  header("location:project.php");


?>