
<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update User <small class="text-secondary"> Update User </small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-dashboard text-primary"></i><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><i class="fa fa-users text-primary"></i><a href="index.php?page=user-profile">User Profile</a></li>
    <li class="breadcrumb-item"><i class="fa fa-pencil-square-o"></i> Update User</li>
</ol>

<?php

    $session_user = $_SESSION['user_login'];
    $user_data = mysqli_query($link,"SELECT * FROM `users` WHERE `username`= '$session_user'");
    $user_row = mysqli_fetch_assoc($user_data);

?>


<?php

    if (isset($_POST['edit-user'])) {
        //catch value from data
        $name = $_POST['name'];
        $email = $_POST['email'];
        //manipulat image name
        
        //insert data
        $query = "UPDATE `users` SET `name`='$name',`email`='$email' WHERE `username`= '$session_user'";
        $result = mysqli_query($link,$query);
        if ($result) {
            header("location: index.php?page=user-profile");    
        }
        
    }

?>
<div class="row">
    <div class="col-sm-6">
        <form action="" method="post">
            <div class="form-group">
                <label for="name">User Name</label>
                <input type="text" name="name" id="name"  class="form-control" value="<?php echo $user_row['name'] ?>">
            </div>
            <div class="form-group">
                <label for="email">User Email</label>
                <input type="email" name="email" id="email"  class="form-control" value="<?php echo $user_row['email'] ?>">
            </div>
            <button type="submit" name="edit-user" class="btn btn-success float-right">Update Profile</button> 
        </form>       
    </div>
</div>
