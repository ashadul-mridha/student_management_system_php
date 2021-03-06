
                <h1 class="text-primary"><i class="fa fa-dashboard"></i> Dashboard <small class="text-secondary"> Statistics Overview </small></h1>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><i class="fa fa-dashboard"></i> Dashboard </li>
                </ol>
                <?php

                  $count_student = mysqli_query($link,"SELECT * FROM `student_info`");
                  $total_student = mysqli_num_rows($count_student);

                  $count_users = mysqli_query($link,"SELECT * FROM `users`");
                  $total_users = mysqli_num_rows($count_users);
                  

                ?>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body bg-primary">
                        <div class="row">
                          <div class="col-sm-3">
                            <i class="fa fa-users fa-5x text-white"></i>
                          </div>
                          <div class="col-sm-9">
                            <div class="float-right text-white" style="font-size: 45px;"><?Php echo $total_student; ?></div>
                            <div class="clearfix"></div>
                            <div class="float-right text-white">All Student</div>
                          </div>
                        </div>
                      </div>
                      <a href="">
                        <div class="card-footer">
                            <span class="float-left">All Student</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card">
                      <div class="card-body bg-primary">
                        <div class="row">
                          <div class="col-sm-3">
                            <i class="fa fa-users fa-5x text-white"></i>
                          </div>
                          <div class="col-sm-9">
                            <div class="float-right text-white" style="font-size: 45px;"><?Php echo $total_users; ?></div>
                            <div class="clearfix"></div>
                            <div class="float-right text-white">All User</div>
                          </div>
                        </div>
                      </div>
                      <a href="index.php?page=all-users">
                        <div class="card-footer">
                            <span class="float-left">All User</span>
                            <span class="float-right"><i class="fa fa-arrow-circle-o-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                      </a>
                    </div>
                  </div>
                  
                </div>
                <hr>
                <h3>New Student</h3>
                
<div class="table-responsive">
                  <table id="data" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>City</th>
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
                        <td><?php echo strtoupper($row['name']) ?></td>
                        <td><?php echo $row['roll'] ?></td>
                        <td><?php echo $row['city'] ?></td>
                        <td><?php echo $row['pcontact'] ?></td>
                        <td><img style="width: 100px;" src="student_img/<?php echo $row['photo'] ?>" alt="student Image"></td>
                        <td>
                            <a href="index.php?page=update-student&id=<?php echo base64_encode($row['id']) ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Edit</a>
                            <a href="delete_student.php?id=<?php echo base64_encode($row['id']) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                        </td>
                      </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                    <tbody>
                  </table>
                </div>