<?php
include('cnx.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "select * from project where id_project = '$id'";
    $res = mysqli_query($cnx ,$sql);

    if(!$res){
        die("query Failed".mysqli_connect_error());
    }
    else{
        $row = mysqli_fetch_assoc($res);
    }
}
?>



<?php
if(isset($_POST['update_project']))
{

    if(isset($_GET['id_new'])){ 
        $idnew = $_GET['id_new'];
    }


    $p_titre = $_POST['titre'];
    $p_id_cat = $_POST['id_cat'];
    $p_id_sub_cat = $_POST['id_sub_cat'];
    $p_id_user = $_POST['id_user'];



   

    $query = "UPDATE project SET  titre = '$p_titre', id_cat = '$p_id_cat', id_sub_cat = '$p_id_sub_cat', id ='$p_id_user'
    WHERE id_project = '$idnew'";

$result = mysqli_query($cnx, $query);


if(!$result){
    die("deleted faild".mysqli_connect_error());
}
else{
    header('location:project.php?delete_msg your update is  successfuly');
}
}

?>



<!doctype html>
<html lang="en">
<head>
  	<title>edit project</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
  
<body>
   <form action="update_project.php?id_new=<?=$id;?>" method="post">
	<div class="container">
	    
	    <div class="row">
	    	<div class="col-md-4">
	    		<h3>edit project</h3>

			    <form action="save.php" id="form">
			    	<div class="form-group">
					    <label for="email">titre</label>
					    <input class="form-control" type="text" name="titre" value = "<?php echo $row['titre']?>">
				  	</div>
				  	<div class="form-group">
					    <label for="first_name">id_cat</label>
					    <input class="form-control" type="text" name="id_cat" value = "<?php echo $row['id_cat']?>">
				  	</div>
				  	<div class="form-group">
					    <label for="last_name">id_sub_cat</label>
					    <input class="form-control" type="text" name="id_sub_cat"  value = "<?php echo $row['id_sub_cat']?>">
				  	</div>
                      <div class="form-group">
					    <label for="last_name">id_user</label>
					    <input class="form-control" type="text" name="id_user"  value = "<?php echo $row['id']?>">
				  	</div>
			
				  	<input type="submit" class="btn btn-success" name="update_project" value="Save Change">
				</form>
	    	</div>
	    </div>
	</div>
    </form>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Page Script -->
	<script src="assets/js/scripts.js"></script>

</body>
  
</html>