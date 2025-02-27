<?php
require("../dashboard/cnx.php");

if(empty($_POST["name"])){
    die("name is required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Not a valid email address");
}

if(strlen($_POST["password"]) < 8){
    die ("password must be at least 8 characters");
}

if(!preg_match("/[a-z]/i", $_POST["password"])){        
    die ("password must contain at least one letter");
}

if(!preg_match("/[0-9]/", $_POST["password"])){
    die ("password must contain at least one number");
}

// if($_POST["password"] !== $_POST["confpassword"]){
//     die ("passwords do not match");
// }

$query = "INSERT INTO user (mame, email, password) VALUES (?, ?, ?)";
$res = mysqli_prepare($cnx, $query);

if (!$res) {
    die("Failed: " . mysqli_error($conn));
}

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars ($_POST["email"]);
$password = htmlspecialchars ($_POST["password"]);

$hashedpassword = password_hash($password,PASSWORD_DEFAULT);

// Use the hashed password
// $hashedPassword = password_hash($_POST["password"], PASSWORD_DEFAULT);

// mysqli_stmt_bind_param($res, "sss", $name, $email, $hashedPassword);
mysqli_stmt_bind_param($res, "sss", $name, $email, $hashedpassword);

if (!mysqli_stmt_execute($res)) {
    die("Query execution failed: " . mysqli_stmt_error($res));
}

header("location: index.php");

mysqli_stmt_close($res);
mysqli_close($conn);
?>