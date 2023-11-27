<?php
include('cnx.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "select * from user where id = '$id'";
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
if(isset($_POST['update_u']))
{

    if(isset($_GET['id_new'])){ 
        $idnew = $_GET['id_new'];
    }


    $uname = $_POST['name_u'];
    $upass = $_POST['pass_u'];
    $uemail = $_POST['email_u'];

   

    $query = "UPDATE user SET  mame = '$uname', PASSWORD = '$upass', email = '$uemail'
    WHERE id = '$idnew'";

$result = mysqli_query($cnx, $query);


if(!$result){
    die("deleted faild".mysqli_connect_error());
}
else{
    header('location:user.php?delete_msg your update is  successfuly');
}
}

?>



<!doctype html>
<html lang="en">
<head>
  	<title>edit user</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 
</head>
  
<body>
   <form action="update_user.php?id_new=<?=$id;?>" method="post">
	<div class="container">
	    
	    <div class="row">
	    	<div class="col-md-4">
	    		<h3>edit user</h3>

			    <form action="save.php" id="form">
			    	<div class="form-group">
					    <label for="email">name</label>
					    <input class="form-control" type="text" name="name_u" value = "<?php echo $row['mame']?>">
				  	</div>
				  	<div class="form-group">
					    <label for="first_name">Password</label>
					    <input class="form-control" type="text" name="pass_u" value = "<?php echo $row['PASSWORD']?>">
				  	</div>
				  	<div class="form-group">
					    <label for="last_name">email</label>
					    <input class="form-control" type="text" name="email_u"  value = "<?php echo $row['email']?>">
				  	</div>
			
				  	<input type="submit" class="btn btn-success" name="update_u" value="Save Change">
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