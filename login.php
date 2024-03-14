<?php
include('header.php');
error_reporting(0);
?>    
   


         <!--=================================-->
        <!--=         Upcoming Event        =-->
        <!--=================================-->
        <section id="page-content-wrap">
            <div class="login-page-content-wrap ">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-12 m-auto">
                            <!-- Single about text start -->
                            <div class="box m-auto">
                                <span class="borderLine"></span>
                           
                                <form action="login_check.php" method="POST">
                                <?php if($_GET['a']!="") {?><div class="alert alert-error" style="color:#ffff;font-size:16px;"> <?php echo $_GET['a'];?>  <!--<strong>Error!</strong> Please enter an username and a password.-->
        </div><?php } ?>
                                <img src="assets/images/logo/foot_logo.png">
                                
                                    <h2>Members Log In</h2>
                                    
                                    <div class="inputBox">
                                    <input type="text" required="required" placeholder="Email" name="uname" id="uname">
                                    <span>Email</span>
                                    <i></i>
                                    </div>
                                    <div class="inputBox">
                                        <input type="password" required="required" placeholder="Password" name="pass" id="pass">
                                        <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                                        <span>Password</span>
                                    </div>
                                    <div class="links">
                                    <a href="forget_password.php">Forgot Password ?</a>
                                    <a href="registration.php">Signup</a>
                                    </div>
                                    <input type="submit" value="Login">
                                </form>
                             </div>
                                

                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

    
   


      

  
 
        <?php
include('footer.php');
?>