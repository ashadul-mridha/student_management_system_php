<?php
include "dbcon.php";
session_start();
if (!isset($_SESSION['user_login'])) {
    header("location: login.php");
}

?>

<?php

  $user = $_SESSION['user_login'];
  $query = mysqli_query($link,"SELECT * FROM `users` WHERE `username` = '$user'");
  $row = mysqli_fetch_assoc($query);
?>

<!-- <a href="logout.php">logout </a> -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <!-- javascript link -->
    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/script.js"></script>

    <title>Admin Panel</title>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand " href="index.php">Admin Panel</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#"> <span class="fa fa-user"></span> Welcome <?php echo $row['name'];  ?> </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registration.php"> <i class="fa fa-user-plus"></i> Add User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=user-profile"> <i class="fa fa-user"></i> Profile </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php"> <i class="fa fa-power-off"></i> Logout </a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div class="list-group">
              <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"> <i class="fa fa-dashboard"></i> Dashboard </a>
              <a href="index.php?page=add-student" class="list-group-item list-group-item-action"> <i class="fa fa-user-plus"></i> Add Student</a>
              <a href="index.php?page=all-students" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> All Student </a>
              <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> All User</a>
          </div>
        </div>
        <div class="col-sm-9">
            <div class="container">

              <?php
                //echo $page;
                if (isset($_GET['page'])) {
                  $page = $_GET['page'].".php";
                }else {
                  $page = "dashboard.php";
                }
                if (file_exists($page)) {
                  include "$page";
                }else {
                  include "404.php";
                }
                
              ?>

            </div>
        </div>
      </div>
    </div>
    <footer class="footer-area">
      <p> copyright &copy; 2016-2020 Student Management system . All Right Reserved</p>
    </footer>
  </body>
</html>

