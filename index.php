<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <title>Student Management System</title>
  </head>
  <body>
    <div class="container">
        <br>
        <a class="btn btn-primary float-right" href="admin/login.php">Login</a>
        <br>
        <br>
        <h1 class="text-center">Welcome To Student Management System</h1>
        <br>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <form action="#" method="post">
                
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2" class="text-center h5"><label for="">Student Information</label></td>
                        </tr>
                        <tr>
                            <td><label for="choose">Choose Class </label></td> 
                            <td>
                                <select class="form-control" name="choose" id="choose">
                                    <option value="select"> Select </option>
                                    <option value="1st"> 1st </option>
                                    <option value="2nd"> 2nd </option>
                                    <option value="3rd"> 3rd </option>
                                    <option value="4th"> 4th </option>
                                    <option value="5th"> 5th </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="roll"> Roll </label></td>
                            <td><input class="form-control" type="number" name="roll" id="roll" pattern="[0-9]{6}" placeholder="Enter Your Roll"></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"><input class="btn btn-success" type="submit" value="Show Info " name="show_info"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <?php
        require_once "./admin/dbcon.php";
        if (isset($_POST['show_info'])) {
            $roll = $_POST['roll'];
            $choose = $_POST['choose'];
            $query = mysqli_query($link,"SELECT * FROM `student_info` WHERE `roll` = '$roll' AND `class`= '$choose'");

            if (mysqli_num_rows($query) == 1 ){ 
                $row = mysqli_fetch_assoc($query);
             ?>
             
             <div class="row justify-content-center">
             <div class="col-sm-8">
                 <table class="table table-bordered">
                     <tr>
                         <td rowspan="4">
                             <img src="admin/student_img/<?php echo $row['photo'] ?>" alt="Student Image" class="img-thumbnail" style="width:150px;">
                         </td>
                         <td>Name</td>
                         <td><?php echo $row['name'] ?></td>
                     </tr>
                     <tr>
                         <td>Roll</td>
                         <td><?php echo $row['roll'] ?></td>
                     </tr>
                     <tr>
                         <td>Class</td>
                         <td><?php echo $row['class'] ?></td>
                     </tr>
                     <tr>
                         <td>City</td>
                         <td><?php echo $row['city'] ?></td>
                     </tr>
                 </table>
             </div>                  
         </div>
                
             <?php
            }
            else {
            ?>
                
                <script>
                    alert("Data Not Found");
                </script>
            <?php
                
            }}?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  </body>
</html>