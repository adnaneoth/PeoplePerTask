<?php
 
  require("cnx.php");
  $id=$_GET['id'];
  $query = "delete from CATEGORES where id_cat=$id";
  $result = mysqli_query($cnx, $query);
  header("location:categories.php");


?>