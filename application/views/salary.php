<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>Task</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href=" <?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href=" <?php echo base_url('assets/font-awesome/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href=" <?php echo base_url('assets/css/style.css') ?>">
    </head>

    <body class="pt-10" >
        <div class="container">
            <a  href="<?php echo site_url('home') ?>" class="btn btn-info " role="button">Task 1</a>
            <a  href="<?php echo site_url('salary') ?>" class="btn btn-info " role="button">Task 2</a>
            <div class="row">
                <div class="col-md-4">
                    <section class="main" style="padding-top: 10%;" >
                        <form class="form-horizontal" method="post" action="<?php echo site_url('salary/add') ?>" >
                            <fieldset>
                                <!-- Form Name -->
                                <legend>Add Employer</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Name</label>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Enter  Name" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email</label>
                                    <div class="col-md-8">
                                        <input id="email" name="email" type="email" placeholder="Enter  email" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="mobile">Mobile</label>
                                    <div class="col-md-8">
                                        <input id="mobile" name="mobile" type="text" placeholder="Enter Mobile Number" class="form-control input-md" required="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="basic">Basic salary</label>
                                    <div class="col-md-8">
                                        <input id="basic" name="basic" type="text" placeholder="Enter basic salary" class="form-control input-md" required="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="rent">House Rent</label>
                                    <div class="col-md-8">
                                        <input id="rent" name="rent" type="text" placeholder="Enter house rent" class="form-control input-md" required="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="medical">Medical</label>
                                    <div class="col-md-8">
                                        <input id="medical" name="medical" type="text" placeholder="Enter Medical" class="form-control input-md" required="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="tax">Tax</label>
                                    <div class="col-md-8">
                                        <input id="tax" name="tax" type="text" placeholder="Enter Tax" class="form-control input-md" required="" >
                                    </div>
                                </div>
                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="save"></label>
                                    <div class="col-md-8">
                                        <button type="submit" id="save" name="save" class="btn btn-success right">Add</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </section>
                </div>
                <div class="col-md-8 pt-5">
                    <?php if($this->session->flashdata('msg')): ?>
                    <div class="alert alert-success">
                        <strong><?php echo $this->session->flashdata('msg'); ?> 
                    </div>
                   <?php endif;?>
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Basic salary</th>
                            <th>House Rent</th>
                            <th>Medical</th>
                            <th>Monthly Salary</th>
                            <th>Action</th>


                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($employer as $v ): ?>
                          <tr>
                            <td><?php echo $v->name ?></td>
                            <td><?php echo $v->email ?></td>
                            <td><?php echo $v->mobile ?></td>
                            <td><?php echo $v->basic ?></td>
                            <td><?php echo $v->rent ?></td>
                            <td><?php echo $v->medical ?></td>
                            <td><?php echo $v->main-$v->tax ?></td>
                            <td><a href="<?php echo site_url('salary/delete/'.$v->id)?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                          </tr>
                      <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>

        <!-- Footer -->
        <footer class="pt-5" >
        	<div class="container">
        		<div class="row" >
                    <div class="col-md-4"></div>
        			
        			<div class="col-md-8 ">
        				
        				<p class="left" >&copy;Sorwar Hossain</p>
        		</div>
        	</div>
        </footer>
        <!-- Javascript -->
        <script src="<? php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
    </body>

</html>

