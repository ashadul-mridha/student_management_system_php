
<h1 class="text-primary"><i class="fa fa-users"></i> All Student <small class="text-secondary"> All Student </small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-dashboard text-primary"></i><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><i class="fa fa-users"></i> All Student</li>
</ol>

<div class="table-responsive">
                  <table id="data" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>City</th>
                        <th>Class</th>
                        <th>Contact</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      $show_std = mysqli_query($link,"SELECT * FROM `student_info`");
                      while ($row = mysqli_fetch_assoc($show_std)) {

                    ?>
                   

                      <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo ucwords($row['name']) ?></td>
                        <td><?php echo $row['roll'] ?></td>
                        <td><?php echo ucwords($row['city']) ?></td>
                        <td><?php echo $row['class'] ?></td>
                        <td><?php echo $row['pcontact'] ?></td>
                        <td><img style="width: 100px;" src="student_img/<?php echo $row['photo'] ?>" alt="student Image"></td>
                        <td>
                          <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                          <a href="delete_student.php?id=<?php echo base64_encode($row['id']) ?>" class="btn btn-xs btn-danger mt-1"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                    <tbody>
                  </table>
                </div>