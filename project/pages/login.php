  <?php

include("../dashboard/cnx.php");


  session_start();
  session_destroy();
  session_start();



  // if(isset($_POST['login'])){ 
  //     $email = $_POST["email"];
  //     $pass = $_POST["pass"];

  //     $q = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'";
  //     $res = mysqli_query($cnx, $q); 
      
  //     $row = mysqli_num_rows($res);
  //     if ($row != 0) {
      
      
  //     $row = mysqli_fetch_assoc($res);

  //     if ($row['role'] == 'user') {
  //         header("location:index.php ");
  //         $_SESSION["user"]="user";
  //         $_SESSION["id"]=$row["id"];
  //     }
  //     if ($row['role'] == 'admin') {  
  //         $_SESSION["admin"]="admin";
  //         $_SESSION["id"]=$row["id"];
  //         header("location: ../dashboard/dashboard.php");

  //     }
  //   }
  // }

  if(isset($_POST['login'])){
    login();
  }
  function login()
  {
    require("../dashboard/cnx.php");
  
      if (empty($_POST['email']) || empty($_POST['password'])) {
          echo "You should enter your information to login";
      } else {
          $password = $_POST['password'];
          $email = $_POST['email'];
          $query = "SELECT * FROM user WHERE email = ? ";
  
          $stmt = mysqli_prepare($cnx, $query);
  
          if ($stmt) {
              mysqli_stmt_bind_param($stmt, "s", $email);
              mysqli_stmt_execute($stmt);
  
              $result = mysqli_stmt_get_result($stmt);
  
              if ($result) {
                  $row = mysqli_fetch_assoc($result);
  
                  if ($row) {
                      $password_after_fetch = $row["PASSWORD"];
  
                      if (password_verify($password, $password_after_fetch)) {
                          $role = $row["role"];
                          $id = $row["id"];
  
                          if ($role == "user") {
                            $_SESSION["user"]="user";
                            $_SESSION["id"]=$row["id"];
                              header("location:index.php ");
                          } else if ($role == "admin") {
                            $_SESSION["admin"]="admin";
                            $_SESSION["id"]=$row["id"];
                            header("location: ../dashboard/dashboard.php");
                          } else {
                              echo "something is whrong";
                          } 
                      }
  
                  } else { 
                      echo "Password is incorrect. Please try again";
                  }
              } else {
                  echo "You entered a wrong email";
              }
          } else {
              echo "Query execution failed";
          }
  
          mysqli_stmt_close($stmt);
      }
  
      mysqli_close($cnx);
  }



  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>People per task</title>

  <!-- style links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./css/about.css">
  <!-- animation links -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- link for icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php
  include("navbar.php");
  ?>
    <section class="vh-100 bg-image"style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">login </h2>
  
                <form method = "post" action = "">
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                    <input type="text" id="login-mail_inp" name="email" class="form-control form-control-lg" />
                  </div>
  
                  <div class="form-outline mb-4 ">
                    <label class="form-label" for="form3Example4cg">Password</label>
                    <input type="password" id="login-password_inp"name="password" class="form-control form-control-lg" />
                    <div class="text-center mrgntop">
                    <span id="login-mail_reg_err" class="text text-danger"></span>
                    </div>
                  </div>
                  
                  <button type="submit" class="mrgntop btn btn-primary primary-btn-orange" name = "login">login</button>
  
                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="pt-lg-10 pt-5 footer footer-color">
    <div class="container">
    <div class="row">
     <div class="col-lg-4 col-md-6 col-12">
        <!-- about company -->
        <div class="mb-4">
           <img src="images/M.png" alt="" class="logo-inverse ">
           <div class="mt-4 text-light">
              <p>Youssofia, youcode school.
                691 South El aamala Blvd.
                Morocco, CA 155
                </p>
              <!-- social media -->
              <div class="fs-2">
                <i class="fa-brands fa-linkedin" style="color: #ffff;"></i>
                <i class="fa-brands fa-instagram" style="color: #ffff;"></i>
                <i class="fa-brands fa-facebook" style="color: #ffff;"></i>
              </div>
           </div>
        </div>
     </div>
     <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
        <div class="mb-4">
           <!-- list -->
           <h3 class="fw-semibold text-light mb-3">Company</h3>
           <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
              <li><a href="#" class="nav-link text-light">About</a></li>
              <li><a href="#" class="nav-link text-light">Pricing</a></li>
              <li><a href="#" class="nav-link text-light">Blog</a></li>
              <li><a href="#" class="nav-link text-light">Careers</a></li>
              <li><a href="#" class="nav-link text-light">Contact</a></li>
           </ul>
        </div>
     </div>
     <div class="col-lg-2 col-md-3 col-6">
      <div class="mb-4">
         <h3 class="fw-semibold text-light mb-3">Resources</h3>
         <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
            <li><a href="#" class="nav-link text-light">Success Stories </a></li>
            <li><a href="#" class="nav-link text-light">Become Freelancer</a></li>
            <li><a href="#" class="nav-link text-light">Get the app</a></li>
            <li><a href="about.html" class="nav-link text-light">FAQ’s</a></li>
            <li><a href="#" class="nav-link text-light">Tutorial</a></li>
         </ul>
      </div>
   </div>
   <div class="col-lg-2 col-md-3 col-6">
    <div class="mb-4">
       <h3 class="fw-semibold text-light mb-3">Information</h3>
       <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
          <li><a href="#" class="nav-link text-light">Careers
          </a></li>
          <li><a href="#" class="nav-link text-light">FAQ</a></li>
          <li><a href="#" class="nav-link text-light">Privacy Policy </a></li>
          <li><a href="about.html" class="nav-link text-light">FAQ’s</a></li>
          <li><a href="#" class="nav-link text-light">Information</a></li>
       </ul>
    </div>
  </div>
  
    </div>
    <div class="row align-items-center g-0 border-top py-2 mt-6">
     <!-- Desc -->
     <div class="col-lg-4 col-md-5 col-12">
        <span class="text-light">
           ©
           <span id="copyright" class="text-light">
              <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
              <span class="text-light">By Goch tavn and Per Task Team</span>
           </span>
  
        </span>
     </div>
    </div>
    </div>
    </footer>
  <script src="javascript/valid_login.js"></script>
</body>
</html>