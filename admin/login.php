<?php
include "dbcon.php";
session_start();
if (isset($_SESSION['user_login'])) {
    header("location: index.php");
}
if (isset($_POST['login'])) {
    //catch the value from form
    $username = $_POST['username'];
    $password = $_POST['password'];
    //check the username inside database
    $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username`= '$username';");
    if (mysqli_num_rows($username_check) > 0) {
        $row = mysqli_fetch_assoc($username_check);
        if ($row['password'] == md5($password)) {
            if ($row['status'] == 'active') {
                session_start();
                //code
                $_SESSION['user_login'] = $username;
                header("location: index.php");
            }else {
                $status_error = "User Was Not Active";
            }  
        }else {
            $password_error = "Password Not Match";
        }
    }else {
        $username_error = "This Username Was Not Found";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

    <title>Login Page</title>
  </head>
  <body>
    <div class="container">
        <br>
        <h2 class="text-center">Student Management System</h2>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <h4 class="text-center">Admin Login Form</h4>
                <form action="#" method="post">
                    <div>
                        <input type="text" name="username" id="username" placeholder="Enter Username" class="form-control" value="<?php if(isset($username)){ echo $username;}?>" >
                    </div>
                    <div>
                        <input type="text" name="password" id="Password" placeholder="Enter Password" class="form-control" value="<?php if(isset($password)){ echo $password;}?>">
                    </div>                   
                    <div class="mt-2">
                        <a class="text-danger text-left" href="forgot_pw.php">Reset Password?</a>
                        <input type="submit" name="login" id="submit" value="Login"  class="btn btn-success float-right">
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <?php if (isset($username_error)) { echo "<div class='alert alert-danger'>".$username_error."</div>";}?>
                <?php if (isset($password_error)) { echo "<div class='alert alert-danger'>".$password_error."</div>";}?>
                <?php if (isset($status_error)) { echo "<div class='alert alert-danger'>".$status_error."</div>";}?>
            </div>
        </div>
    </div>
  </body>
</html>