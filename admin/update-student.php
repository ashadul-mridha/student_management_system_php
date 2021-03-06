
<h1 class="text-primary"><i class="fa fa-pencil-square-o"></i> Update Student <small class="text-secondary"> Update Student </small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-dashboard text-primary"></i><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><i class="fa fa-users text-primary"></i><a href="index.php?page=all-students">All Student</a></li>
    <li class="breadcrumb-item"><i class="fa fa-pencil-square-o"></i> Update Student</li>
</ol>

<?php

$id = base64_decode($_GET['id']);
$result = mysqli_query($link,"SELECT * FROM `student_info` WHERE `id`= '$id'");
$row = mysqli_fetch_assoc($result);

?>


<?php

    if (isset($_POST['update'])) {
        //catch value from data
        $name = $_POST['name'];
        $roll = $_POST['roll'];
        $city = $_POST['city'];
        $pcontact = $_POST['pcontact'];
        $class = $_POST['class'];
        //manipulat image name
        $photo = $_FILES['photo'];
        $photo = explode("." , $_FILES['photo']['name']);
        $photo = end($photo);
        $photo_name = $roll.'.'.$photo;
        //insert data
        $query = "UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`pcontact`='$pcontact',`photo`='$photo_name' WHERE `id`='$id'";
        $result = mysqli_query($link,$query);
        if ($result) {
            header("location: index.php?page=all-students");
            move_uploaded_file($_FILES['photo']['tmp_name'],'student_img/'.$photo_name);  
        }else {
            
        }
        
    }

?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" value="<?php echo $row['name'] ?>">
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Student Roll" class="form-control" value="<?php echo $row['roll'] ?>">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="Student Address" class="form-control" value="<?php echo $row['city'] ?>">
            </div>
            <div class="form-group">
                <label for="pcontact">Parents Phone Number</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="01*********" class="form-control" value="<?php echo $row['pcontact'] ?>">
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control">
                    <option  value="">select</option>
                    <option <?php echo $row['class']=='1st' ? 'selected=""':''; ?> value="1st">1st</option>
                    <option <?php echo $row['class']=='2nd' ? 'selected=""':''; ?> value="2nd">2nd</option>
                    <option <?php echo $row['class']=='3rd' ? 'selected=""':''; ?> value="3rd">3rd</option>
                    <option <?php echo $row['class']=='4th' ? 'selected=""':''; ?> value="4th">4th</option>
                    <option <?php echo $row['class']=='5th' ? 'selected=""':''; ?> value="5th">5th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo"> Photo </label>
                <input type="file" name="photo" id="photo">
            </div>
            <button type="submit" name="update" class="btn btn-success mb-3 float-right">Update Student</button>    
        </form>
    </div>
</div>