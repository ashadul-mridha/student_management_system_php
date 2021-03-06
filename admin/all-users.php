
<h1 class="text-primary"><i class="fa fa-users"></i> All User <small class="text-secondary"> All User </small></h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><i class="fa fa-dashboard text-primary"></i><a href="index.php?page=dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><i class="fa fa-users"></i> All Users</li>
</ol>

<div class="table-responsive">
  <table id="data" class="table table-hover table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Photo</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      $show_user = mysqli_query($link,"SELECT * FROM `users`");
                      while ($row = mysqli_fetch_assoc($show_user)) {
                    ?>
                      <tr>
                        <td><?php echo ucwords($row['name']) ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><img style="width: 100px;" src="images/<?php echo $row['photo'] ?>" alt="User Image"></td>
                      </tr>
                    <?php
                      }
                    ?>
                    </tbody>
                    <tbody>
                  </table>
                </div>