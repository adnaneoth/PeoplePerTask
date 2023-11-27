<?php
include('cnx.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "select * from Freelances where Id_freelance = '$id'";
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
if(isset($_POST['update_fr']))
{

    if(isset($_GET['id_new'])){ 
        $idnew = $_GET['id_new'];
    }


    $fname = $_POST['name_fr'];
    $fskills = $_POST['skills_fr'];
    $f_id_user = $_POST['f_id_user'];

   

    $query = "UPDATE Freelances SET  name_freelince = '$fname', skills = '$fskills', id = '$f_id_user'
    WHERE Id_freelance = '$idnew'";

$result = mysqli_query($cnx, $query);


if(!$result){
    die("deleted faild".mysqli_connect_error());
}
else{
    header('location:agents.php?delete_msg your update is  successfuly');
}
}

?>



<!doctype html>
<html lang="en">
<head>
  	<title>edit Freelancer</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
  
<body>
   <form action="update_freelancer.php?id_new=<?=$id;?>" method="post">
	<div class="container">
	    
	    <div class="row">
	    	<div class="col-md-4">
	    		<h3>edit Freelancer</h3>

			    <form action="save.php" id="form">
			    	<div class="form-group">
					    <label for="email">name_freelince</label>
					    <input class="form-control" type="text" name="name_fr" value = "<?php echo $row['name_freelince']?>">
				  	</div>
				  	<div class="form-group">
					    <label for="first_name">skills</label>
					    <input class="form-control" type="text" name="skills_fr" value = "<?php echo $row['skills']?>">
				  	</div>
				  	<div class="form-group">
					    <label for="f_id_user">User_name:</label>
                       <select name="f_id_user" id="">
                        <?php 
                         $query = "SELECT * from user";
                         $result = mysqli_query($cnx, $query);
                         foreach($result as $res){  ?>
                            <option value=" <?php   echo $res['id']?>"><?php echo $res['mame']?></option>
                        <?php }?>

                       </select>
				  	</div>
			
				  	<input type="submit" class="btn btn-success" name="update_fr" value="Save Change">
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