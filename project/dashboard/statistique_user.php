<?php include('cnx.php'); ?>
   


    <?php
       $sql = "SELECT COUNT(id) AS user_count FROM user";

       
        $res = mysqli_query($cnx,$sql);
        if(!$res){
            die("query faild".mysqli_connect_error());
        }
        else{
           
        }
    ?>
<?php
 while($row = mysqli_fetch_assoc($res)){
    $usercount = $row['user_count'];
                

?>
<div class="col-xl-3 col-sm-6 col-12 mb-4">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <p class="mb-0">user</p>
                                        <div class="mt-4">
                                            <h3><strong></strong></h3>
                                            <p><strong><?php  echo $usercount ;  ?></strong> </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <img src="img/project-icon-4.svg" alt="icon">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <?php
}
                

?> 