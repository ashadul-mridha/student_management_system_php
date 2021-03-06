<!-- 


<h1 class="text-primary"><i class="fa fa-user-plus"></i> Add Student <small class="text-secondary"> Add New Student </small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item"><i class="fa fa-user-plus"></i> Add Student</li>
</ol>

<?php

    if (isset($_POST['submit'])) {
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
        $query = "INSERT INTO `student_info`(`name`, `roll`, `class`, `city`, `pcontact`, `photo`) VALUES ('$name','$roll','$class','$city','$pcontact','$photo_name')";
        $result = mysqli_query($link,$query);
        if ($result) {
            $success = "Data Insert Success";
            //data insert alert
            if (isset($success)) { echo '<div class="alert alert-success">'.$success.'</div>';}
            move_uploaded_file($_FILES['photo']['tmp_name'],'student_img/'.$photo_name);  
        }else {
            $error = "Data Insert Error";
            //data insert error
            if (isset($error)) { echo '<div class="alert alert-danger">'.$error.'</div>';}
        }
        
    }

?>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Student Name" class="form-control">
            </div>
            <div class="form-group">
                <label for="roll">Roll</label>
                <input type="text" name="roll" id="roll" placeholder="Student Roll" class="form-control">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" placeholder="Student Address" class="form-control">
            </div>
            <div class="form-group">
                <label for="pcontact">Parents Phone Number</label>
                <input type="text" name="pcontact" id="pcontact" placeholder="01*********" class="form-control">
            </div>
            <div class="form-group">
                <label for="class">Class</label>
                <select name="class" id="class" class="form-control">
                    <option value="">select</option>
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="4th">4th</option>
                    <option value="5th">5th</option>
                </select>
            </div>
            <div class="form-group">
                <label for="photo">Picture</label>
                <input type="file" name="photo" id="photo">
            </div>
            <button type="submit" name="submit" class="btn btn-success mb-3 float-right">Add Student</button>    
        </form>
    </div>
</div> -->