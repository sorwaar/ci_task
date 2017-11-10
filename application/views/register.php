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

    <body class="pt-10" >
        <div class="container">
            <a  href="<?php echo site_url('home') ?>" class="btn btn-info " role="button">Task 1</a>
            <a  href="<?php echo site_url('salary') ?>" class="btn btn-info " role="button">Task 2</a>
            <div class="row">
                <?php if($this->session->flashdata('conformed')): ?>
                    <div class="alert alert-success">
                        <strong><?php echo $this->session->flashdata('conformed'); ?> 
                    </div>
                <?php endif;?>
                <div class="col-md-4 pt-5" >
                    <?php if($this->session->flashdata('mx')): ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $this->session->flashdata('mx'); ?> 
                        </div>
                    <?php endif; ?>
                    <section class="main">
                        <form class="form-horizontal" method="post" action="<?php echo site_url('home/login') ?>" >
                            <fieldset>
                                <!-- Form Name -->
                                <legend>Login</legend>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email</label>
                                    <div class="col-md-8">
                                        <input id="email" name="email" type="email" placeholder="Enter your Email" class="form-control input-md">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="password">Password</label>
                                    <div class="col-md-8">
                                        <input id="password" name="password" type="password" placeholder="Enter your Password" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="save"></label>
                                    <div class="col-md-8">
                                        <button type="submit" id="save" name="save" class="btn btn-success right">Login</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </section>
                </div>
                <div class="col-md-1 middle-border"></div>
                <div class="col-md-1 "> </div>
                
                <div class="col-md-5">
                    <?php if($this->session->flashdata('ms')): ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $this->session->flashdata('ms'); ?> 
                        </div>
                    <?php elseif($this->session->flashdata('msgg')): ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $this->session->flashdata('msgg'); ?> 
                        </div>
                   <?php elseif($this->session->flashdata('msggg')): ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $this->session->flashdata('msggg'); ?> 
                        </div>
                    <?php elseif($this->session->flashdata('err')): ?>
                        <div class="alert alert-danger">
                            <strong><?php echo $this->session->flashdata('err'); ?> 
                        </div>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('msg')): ?>
                    <section class="main" style="padding-top: 10%;" >
                        <div class="alert alert-success">
                            <strong><?php echo $this->session->flashdata('msg'); ?>  
                        </div>
                        <div>
                        <legend>We just sent you a confirmation email with 6 digit code . Please check your email end enter the code below :</legend>

                        </div>
                        <form class="form-horizontal" method="post" action="home/mailConform" >
                            
                                <div class="form-group">
                                    <label class="col-md-5 control-label" for="name">Conformation Code :</label>
                                    <div class="col-md-7">
                                        <input id="code" name="code" type="text" placeholder="123456" class="form-control input-md">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="save"></label>
                                    <div class="col-md-8">
                                        <button type="submit" id="save" name="save" class="btn btn-success right">Submit</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>

                    </strong>
                    <?php else: ?>
                    <section class="main" style="padding-top: 10%;" >
                        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo site_url('home/registerAction') ?>" >
                            
                            <small>New Here ?</small>
                            <fieldset>
                                <!-- Form Name -->
                                <legend>Register Now</legend>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="name">Name</label>
                                    <div class="col-md-8">
                                        <input id="name" name="name" type="text" placeholder="Enter Your Name" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="email">Email</label>
                                    <div class="col-md-8">
                                        <input id="email" name="email" type="email" placeholder="Enter Your email" class="form-control input-md" required="">
                                    </div>
                                </div>
                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="mobile">Mobile</label>
                                    <div class="col-md-8">
                                        <input id="mobile" name="mobile" type="text" placeholder="Enter Your Mobile Number" class="form-control input-md" required="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="image">Image</label>
                                    <div class="col-md-8">
                                        <input id="image" name="image" type="file" class="form-control input-md" required="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="image">Date of birth</label>
                                    <div class="col-md-8">
                                        <div class="form-group col-md-5 ">
                                          <select class="form-control" name="age_date" required >
                                            <option value="">Date</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                          </select>
                                        </div>
                                        <div class=" form-group col-md-5">
                                          <select class="form-control" name="age_month" required>
                                            <option value="">Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                          </select>
                                        </div>
                                        <div class=" form-group col-md-5">
                                          <select class="form-control" name="age_year" required>
                                            <option value="">Year</option>
                                            <option value="1980">1980</option>
                                            <option value="1981">1981</option>
                                            <option value="1982">1982</option>
                                            <option value="1983">1983</option>
                                            <option value="1984">1984</option>
                                            <option value="1985">1985</option>
                                            <option value="1986">1986</option>
                                            <option value="1987">1987</option>
                                            <option value="1988">1988</option>
                                            <option value="1989">1989</option>
                                            <option value="1990">1990</option>
                                            <option value="1991">1991</option>
                                            <option value="1992">1992</option>
                                            <option value="1993">1993</option>
                                            <option value="1994">1994</option>
                                            <option value="1995">1995</option>
                                            <option value="1996">1996</option>
                                            <option value="1997">1997</option>
                                            <option value="1998">1998</option>
                                            <option value="1999">1999</option>
                                            <option value="2000">2000</option>
                                            <option value="2001">2001</option>
                                            <option value="2002">2002</option>
                                            <option value="2003">2003</option>
                                            <option value="2004">2004</option>
                                            <option value="2005">2005</option>
                                            <option value="2006">2006</option>
                                            <option value="2007">2007</option>
                                            <option value="2008">2008</option>
                                            <option value="2009">2009</option>
                                            <option value="2010">2010</option>
                                            <option value="2011">2011</option>
                                            <option value="2012">2012</option>
                                            <option value="2013">2013</option>
                                            <option value="2014">2014</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2016</option>
                                            <option value="2015">2017</option>
                                          </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Password input-->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="password">Password</label>
                                    <div class="col-md-8">
                                        <input id="password" name="password" type="password" placeholder="Password" class="form-control input-md" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="re_password">Re enter password</label>
                                    <div class="col-md-8">
                                        <input id="re_password" name="re_password" type="password" placeholder="Re enter password" class="form-control input-md" required>
                                    </div>
                                </div>
                                <!-- Button (Double) -->
                                <div class="form-group">
                                    <label class="col-md-4 control-label" for="save"></label>
                                    <div class="col-md-8">
                                        <button type="submit" id="save" name="save" class="btn btn-success right">Register</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </section>
                <?php endif;?>
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

