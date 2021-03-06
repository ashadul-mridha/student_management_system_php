<?php
include "dbcon.php";
session_start();
if (isset($_POST['registration'])) {
    
    //catch the value from form by post method
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $c_password = $_POST['c_password'];
    $photo = $_FILES['photo'];
    $photo = explode("." , $_FILES['photo']['name']);
    $photo = end($photo);
    $photo_name = $username.'.'.$photo;
    //create empty error
    $input_error = array();
    if (empty($name)) {
        $input_error['name'] = "This Name feild is required";
    }
    if (empty($email)) {
        $input_error['email'] = "This Email feild is required";
    }
    if (empty($username)) {
        $input_error['username'] = "This Username feild is required";
    }
    if (empty($password)) {
        $input_error['password'] = "This Password feild is required";
    }
    if (empty($c_password)) {
        $input_error['c_password'] = "This Conform Password feild is required";
    }
    if (empty($photo_name)) {
        $input_error['photo'] = "This Photo feild is required";
    }
    if (count($input_error) == 0) {
        $email_check = mysqli_query($link, "SELECT * FROM `users` WHERE `email` = '$email';" );
        if (mysqli_num_rows($email_check) == 0) {
            $username_check = mysqli_query($link, "SELECT * FROM `users` WHERE `username` = '$username';" );
            if (mysqli_num_rows($username_check) == 0) {
                if (strlen($username) > 7) {
                    if (strlen($password) > 7) {
                        if ($password == $c_password) {
                            //password encrypt
                            $password = md5($password);
                            //insert data in database
                            $query = "INSERT INTO `users`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name' , '$email' , '$username' , '$password' , '$photo_name' , 'inactive')";
                            $result = mysqli_query($link,$query);
                            if ($result) {
                                $_SESSION['data_insert_success'] = "Data Insert Success";
                                move_uploaded_file($_FILES['photo']['tmp_name'],'images/'.$photo_name);
                                header('location: registration.php');
                            }else {
                                $_SESSION['data_insert_error'] = "Data Insert Error";
                            }
                        }else {
                            $password_not_match = "Conform Password Not Match";
                        }
                    }else {
                        $password_l = "Password More Then 8 Characters";
                    }
                }else {
                    $username_l = "Username More Then 8 Characters";
                }
            }else {
                $username_error = "This Username Already Exists";
            }
        }else {
            $email_error = "This Email Already Exists";
        }


    }

    echo "<pre>";
   // print_r($email_check);
    echo "</pre>";


}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="../js/bootstrap.min.js"></script>

    <title>User Registration Form</title>
  </head>
  <body>
    <div class="container">
    <br>
        <h2>User Registration Form </h2>
        <!-- showing alert data insert or data not error -->
        <?php if (isset($_SESSION['data_insert_success'])) { echo "<div class='alert alert-success'>".$_SESSION['data_insert_success']."</div>";}?>
        <?php if (isset($_SESSION['data_insert_error'])) { echo "<div class='alert alert-warning'>".$_SESSION['data_insert_error']."</div>";}?>
        <hr>
        <!-- create register form -->
        <div class="row">
            <div class="col-md-12">
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label for="name" class="col-sm-1 col-form-label control-label">Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your name" value="<?php if (isset($name)) { echo $name; }?>" >
                    </div>
                    <label class="error"><?php if (isset($input_error['name'])) { echo $input_error['name'];}?></label>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-1 col-form-label control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email" value="<?php if (isset($email)) { echo $email; }?>" >
                    </div>
                    <label class="error"><?php if (isset($input_error['email'])) { echo $input_error['email'];}?></label>
                    <label class="error"><?php if (isset($email_error)) { echo $email_error; }?></label>
                </div>
                <div class="form-group row">
                    <label for="username" class="col-sm-1 col-form-label control-label">Username</label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your username" value="<?php if (isset($username)) { echo $username; }?>">
                    </div>
                    <label class="error"><?php if (isset($input_error['username'])) { echo $input_error['username'];}?></label>
                    <label class="error"><?php if (isset($username_error)) { echo $username_error; }?></label>
                    <label class="error"><?php if (isset($username_l)) { echo $username_l; }?></label>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-1 col-form-label control-label">password</label>
                    <div class="col-sm-4">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your password" value="<?php if (isset($password)) { echo $password; }?>">
                    </div>
                    <label class="error"><?php if (isset($input_error['password'])) { echo $input_error['password'];}?></label>
                    <label class="error"><?php if (isset($password_l)) { echo $password_l; }?></label>
                </div>
                <div class="form-group row">
                    <label for="c_password" class="col-sm-1 col-form-label control-label">Conform Password</label>
                    <div class="col-sm-4">
                    <input type="password" class="form-control" id="c_password" name="c_password" placeholder="Enter Your conform password" value="<?php if (isset($c_password)) { echo $c_password; }?>">
                    </div>
                    <label class="error"><?php if (isset($input_error['c_password'])) { echo $input_error['c_password'];}?></label>
                    <label class="error"><?php if (isset($password_not_match)) { echo $password_not_match;}?></label>
                </div>
                <div class="form-group row">
                    <label for="photo" class="col-sm-1 col-form-label control-label">Photo</label>
                    <div class="col-sm-4">
                    <input type="file" id="photo" name="photo" >
                    </div>
                    <label class="error"><?php if (isset($input_error['photo'])) { echo $input_error['photo'];}?></label>
                </div>
                <div class="col-sm-4">
                    <input type="submit" value="Registration" name="registration" class="btn btn-success">
                </div>
                <br>
                <div class="col-sm-4">
                    <p>If You Have An Account? Then Please <a href="login.php?page=dashboard"> Login </a> </p>
                </div>
            </form>
            <hr>
            <footer>
                <p>copyright &copy; 2016 - 2020 All Right Reserved </p>
            </footer>
        </div>
    </div>
  </body>
</html>