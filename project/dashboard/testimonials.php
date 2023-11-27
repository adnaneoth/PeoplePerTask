<?php
require("cnx.php");


?>

<?php
require("head.php");


?>
  <section class="Agents px-4">
           

                <table class="agent table align-middle bg-white">

                    <thead class="bg-light">
                        <tr>
                          
                            <th>Id</th>
                            <th>commente</th>
                            <th>name_user</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT Id_Testimonials,commente,mame FROM Testimoniales INNER JOIN user ON  user.id=Testimoniales.id ";
                        $result = mysqli_query($cnx, $query);
                        if (!$result) {
                            die("query faild" . mysqli_connect_error());
                        } else {


                            while ($row = mysqli_fetch_assoc($result)) {
                                $id=$row['Id_Testimonials'];
                               ?>
                                <tr>
                                    <td>
                                        <?php echo $id; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['commente']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['mame']; ?>
                                    </td>
                                   
                                    <td><a href="delete_testimonials.php?id=<?=$id?>" class="btn btn-danger">delete</a></td>
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