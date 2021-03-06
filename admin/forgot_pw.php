<?php
    include "dbcon.php";
    if (isset($_POST['reset'])) {
        $cu_password = $_POST['cu_Password'];
        $new_password = $_POST['new_Password'];
        $c_password = $_POST['c_Password'];

        $cu_password = md5($cu_password);
        $query = mysqli_query($link,"SELECT * FROM `users` WHERE `password`= '$cu_password'");
        $row = mysqli_fetch_assoc($query);
        $id = $row['id'];
        if (mysqli_num_rows($query) > 0) {
            if (strlen($new_password) > 7) {
                if ($new_password == $c_password) {
                    $new_password = md5($new_password);
                    $query = mysqli_query($link,"UPDATE `users` SET `password`='$new_password' WHERE `id` = '$id'");
                    header("location: login.php");
                }else {
                    $c_password_error = "Conform Password Not Match";
                }
            }else {
                $new_password_error = "Password More Then 8 Characters";
            }
        }else {
            $cu_password_error = "You Current Password Was Wrong";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--css link-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <h3 class="text-center mt-3 text-success">Reset Password</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="cu_Password" class="col-sm-2 col-form-label control-label">Current Password</label>
                        <div class="col-sm-4">
                            <input type="Password" class="form-control" id="cu_Password" name="cu_Password" placeholder="Enter Your Current Password" value="<?php if (isset($cu_password)) { echo $cu_password; }?>" >
                        </div>
                        <label class="error"><?php if (isset($cu_password_error)) { echo $cu_password_error;}?></label>
                    </div>
                    <div class="form-group row">
                        <label for="new_Password" class="col-sm-2 col-form-label control-label">New Password</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="new_Password" name="new_Password" placeholder="Enter New Password" value="<?php if (isset($new_password)) { echo $new_password; }?>">
                        </div>
                            <label class="error"><?php if (isset($new_password_error)) { echo $new_password_error;}?></label>
                    </div>
                    <div class="form-group row">
                        <label for="c_Password" class="col-sm-2 col-form-label control-label">Conform Password</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="c_Password" name="c_Password" placeholder="Enter Your New Password" value="<?php if (isset($c_password)) { echo $c_password; }?>">
                        </div>
                        <label class="error"><?php if (isset($c_password_error)) { echo $c_password_error;}?></label>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-success float-right " name="reset">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>