<?php
require("cnx.php");


?>

<?php
require("head.php");


?>




            <section class="Agents px-4">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add user</button>

<!-- Modal -->
<form  method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="f_name">Name:</label>
                        <input type="text" name="u_name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="f_skills">Password:</label>
                        <input type="text" name="u_pass" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="f_id_user">email:</label>
                        <input type="text" name="u_email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="add_u" value="Add">
                </div>
                
            </div>
        </div>
    </div>
</form>
<?php
if(isset($_POST['add_u']))
{
    $u_name = $_POST['u_name'];
    $u_pass = $_POST['u_pass'];
    $u_email = $_POST['u_email'];

    if(empty($u_name)){
        header('location:user.php? message = fill all data!');
    }else{
    $query = "INSERT INTO user (mame, PASSWORD, email) VALUES ('$u_name', '$u_pass', '$u_email')";
    $result = mysqli_query($cnx, $query);
    }
 
if (!$result){
    die("query failed ".mysqli_connect_error());
}

  
}
?>
                <table class="agent table align-middle bg-white">

                    <thead class="bg-light">
                        <tr>
                            <th>Id_user</th>
                            <th>name</th>
                            
                            <th>email</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from user";
                        $result = mysqli_query($cnx, $query);
                        if (!$result) {
                            die("query faild" . mysqli_connect_error());
                        } else {


                            while ($row = mysqli_fetch_assoc($result)) {
                                  $id=$row['id'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $id; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['mame']; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $row['email'];?>
                                    </td>
                                    <td><a href="update_user.php?id=<?=$id?>" class="btn btn-success">Update</a></td>
                                    <td><a href="delet_user.php?id=<?=$id?>" class="btn btn-danger">delete</a></td>
                                </tr>
                                <?php
                            }
                        }

                        ?>

                    </tbody>
                </table>


            </section>
            <!-- edit modal -->
            <div class="modal">
                <div class="modal-content">
                    <form id="forms">
                        <!-- 2 column grid layout with text inputs for the first and last names -->
                        <div class="row mb-4">
                            <div class="col">
                                <div class="">
                                    <label class="form-label">First name</label>
                                    <input type="text" class="form-control first_name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label class="form-label">Last name</label>
                                    <input type="text" class="form-control last_name">
                                </div>
                            </div>
                        </div>

                        <!-- Text input -->
                        <div class="mb-4">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control email">
                        </div>

                        <!-- Text input -->
                        <div class="mb-4">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control title_user">
                        </div>

                        <!-- Number input -->
                        <div class=" mb-4">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control status">
                        </div>

                        <!-- Message input -->
                        <div class=" mb-4">
                            <label class="form-label">Position</label>
                            <textarea class="form-control position" rows="4"></textarea>
                        </div>

                        <!-- Submit button -->
                        <div class="d-flex w-100 justify-content-center">
                            <p class="error text-danger"></p>
                            <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                            <button class="btn btn-danger btn-block mb-4 annuler">Annuler</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
    <script src="agents.js"></script>
</body>

</html>