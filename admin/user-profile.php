<h1 class="text-primary"><i class="fa fa-user"></i> User <small class="text-secondary"> My Profile </small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item text-primary"><i class="fa fa-dashboard text-primary"></i> <a href="index.php?page=dashboard"> Dashboard </a></li>
    <li class="breadcrumb-item"><i class="fa fa-user"></i> Profile </li>
</ol>

<?php

    $session_user = $_SESSION['user_login'];
    $user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username`= '$session_user'");
    $user_row = mysqli_fetch_assoc($user_data);

?>

<div class="row">
    <div class="col-sm-6">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <td>User Id</td>
                    <td><?php echo $user_row['id'] ?></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td><?php echo ucwords($user_row['name']) ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $user_row['username'] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $user_row['email'] ?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td><?php echo ucwords($user_row['status']) ?></td>
                </tr>
                <tr>
                    <td>SignUp Date</td>
                    <td><?php echo $user_row['datetime'] ?></td>
                </tr>
            </table>
            <a href="index.php?page=update-user"><button name="edit-user" class="btn btn-success float-right">Edit User</button></a>
        </div>
    </div>
    <?php
        if (isset($_POST['upload'])) {
            $photo = explode('.',$_FILES['profile-pic']['name']);
            $photo = end($photo);
            $photo = $session_user.'.'.$photo;
            $result = mysqli_query($link,"UPDATE `users` SET `photo`='$photo' WHERE `username`= '$session_user'");
            if ($result) {
                move_uploaded_file($_FILES['profile-pic']['tmp_name'],'images/'.$photo);
                header("location: index.php?page=user-profile");
            }
        }

    ?>

    <div class="col-sm-6">
        <a href="">
            <img src="images/<?php echo $user_row['photo'] ?>" alt="user image" style="height: 290px;">
        </a>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="profile-pic">Profile Picture</label>
            <br>
            <input type="file" name="profile-pic" id="profile-pic">
            <br>
            <button type="submit" name="upload" class="btn btn-success  mt-3">Upload</button>
        </form>
    </div>
</div>