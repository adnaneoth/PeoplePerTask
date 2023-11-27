<?php
require("cnx.php");


?>

<?php
require("head.php");


?>




            <section class="Agents px-4">
                   <!-- Button trigger modal -->
        
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"> Add categores</button>

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
                        <label for="f_name">mame_cat:</label>
                        <input type="text" name="mame_cat" class="form-control">
                    </div>

             
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="add_c" value="Add Categores">
                </div>
            </div>
        </div>
    </div>
</form>
<?php
if(isset($_POST['add_c']))
{
    $mame_cat = $_POST['mame_cat'];

    if(empty($mame_cat)){
        header('location:categories.php? message = fill all data!');
    }else{
    $query = "INSERT INTO categores (mame_cat) VALUES ('$mame_cat')";
    $result = mysqli_query($cnx, $query);
    }
 
if (!$result){
    die("query failed ".mysqli_connect_error());
}
// else
// {
//     header('location:agents.php?insert_msg your insert successfuly');
// }
  
}
?>
                <table class="agent table align-middle bg-white">

                    <thead class="bg-light">
                        <tr>
                            <th>id_cat</th>
                            <th>name_cat</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from CATEGORES";
                        $result = mysqli_query($cnx, $query);
                        if (!$result) {
                            die("query faild" . mysqli_connect_error());
                        } else {


                            while ($row = mysqli_fetch_assoc($result)) {
                                  $id=$row['id_cat'];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $id; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['mame_cat']; ?>
                                    </td>
                                    
                                    <td><a href="update_.php?id=<?=$id?>" class="btn btn-success">Update</a></td>
                                    <td><a href="delete_cat.php?id=<?=$id?>" class="btn btn-danger">delete</a></td>
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