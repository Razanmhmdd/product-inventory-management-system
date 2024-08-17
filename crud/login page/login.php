<?php
session_start();
require '../configuration/db.php';
if (isset($_POST['login'])) {
    $user=$_POST['username'];
    $password=$_POST['password'];


    $sql="select * from user where username='$user' and password='$password'";
    $result=mysqli_query($conn,$sql) or die(mysql_error());
    $count=mysqli_num_rows($result);
    echo $count;
if($count==1){ 
    $user = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $user['id'];
    header("location:../home page/table.php");
    }

else {
    echo"<script> alert('Check Username And Password') </script>";
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <div class="login-container">
        <h2>CRUD OPERATION</h2>
        <form id="loginForm" method="post" action="./login.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username">
                <span class="error" id="usernameError"></span>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
                <span class="error" id="passwordError"></span>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
   
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</html>


