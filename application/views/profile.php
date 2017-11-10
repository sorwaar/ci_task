<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <title>Task</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href=" <?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href=" <?php echo base_url('assets/css/style.css') ?>">
 </head>
<body>

<div class="container">
  <small>HI !</small><h2><?php echo $user->name?></h2>
  <p></p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><img width="100px" src="<?php echo base_url('images/'.$user->image) ?>" /></td>
        <td><?php echo $user->name  ?></td>
        <td><?php echo $user->email  ?></td>
        <td><?php echo $user->mobile ?></td>
      </tr>
    </tbody>
  </table>

  <a href="<?php echo site_url('dashboard/logout') ?>">Logout</a>
</div>

</body>
<script src="<? php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</html>


