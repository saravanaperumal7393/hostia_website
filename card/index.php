<?php
error_reporting(0);
include('../connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['nameContact'];
    $email = $_POST['emailContact'];
    $message = $_POST['messageContact'];
   

    $quer3 = "SELECT * FROM members WHERE id = " . base64_decode($_GET['member_id']);
    $result1 = mysqli_query($db, $quer3);

    // Assuming you want to retrieve the email from the first row in the result set
    if ($db_field3 = mysqli_fetch_array($result1)) {
        $our_email = $db_field3['email'];
     
        $to = $our_email;
        $subject = "Mail From HOSTIA WEBSITE";

        $messages = "This message was sent from:\n" .
            "Job Creation Mail From Avatar Jobs Website\n" .
            "------------------------------------------------------------------\n\n" .
            " Name       :\t $name\n\n" .
            "Email       :\t $email\n\n" .
            "Message      :\t $message\n\n";

        $headers  = "From: $email\r\n";

        if (mail($to, $subject, $messages, $headers)) {
            ?>
            <script>
                alert("Thank you for your enquiry, We will contact you shortly");
                window.location.href = "index.php";
            </script>
            <?php
        } 
    } 
}
?>
  <?php
          $quer5  = "SELECT * FROM members WHERE id = " . base64_decode($_GET['member_id']);
        //   echo $quer3;
        //   exit;
        $result2=mysqli_query($db,$quer5);
        while($db_field3 = mysqli_fetch_array($result2))
        {

				
          ?>


<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8" />
    <title>HOSTIA - MEMBERS PAGE</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="format-detection" content="<?php echo $db_field3["company_name"];?>"/>
    <meta name="format-detection" content="<?php echo $db_field3["address"];?>"/>
    <meta name="author" content="<?php echo $db_field3["name"];?>" />
    <meta name="description" content="<?php echo $db_field3["company_name"];?>, <?php echo $db_field3["address"];?>,<?php echo $db_field3["mobile"];?>, <?php echo $db_field3["email"];?>" />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-touch-icon-57x57.png">
	<link rel="shortcut icon" type="image/x-icon" href="../assets/images/logo/logo.png" />

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="assets/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/demo/style-demo.css"/>
	
	<!-- Mapbox-->
    <script src='../../api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
	<link href='../../api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
	
</head>

<style>
	.circle-menu{
		display: none;
	}
    .member_a{
        font-size:12px;
    }
    @media(max-width:991px){
        .member_a{
        font-size:16px;
    }
    }

	.contact_info a {
    color: #000;
    padding: 10px;
    font-size: 16px;
    text-decoration: unset;
	}

	.contact_info i {
    
    padding-right: 5px;
    
    
	}
</style>

<body class="bg-triangles">


    <main class="main">
	    <div class="container gutter-top">
		    <div class="row sticky-parent">
            <?php
          $quer3  = "SELECT * FROM members WHERE id = " . base64_decode($_GET['member_id']);
        //   echo $quer3;
        //   exit;
        $result1=mysqli_query($db,$quer3);
        while($db_field2 = mysqli_fetch_array($result1))
        {


          ?>

			    <!-- Sidebar -->
                <aside class="col-12 col-md-12 col-xl-3">
				    <div class="sidebar box shadow pb-0 sticky-column">
					<?php if ($db_field2['profile_picture'] != null) { ?>
                                                      <!-- Display the image when profile_picture exists -->
                        
					<svg class="avatar avatar--180" viewBox="0 0 188 188">
                            <g class="avatar__box">
                                <image xlink:href="../members/<?php echo $db_field2['profile_picture']; ?>" height="100%" width="100%" />
                            </g>
                        </svg>
					
                                                      
                                                   <?php } else { ?>
                                                      
                                                    <svg class="avatar avatar--180" viewBox="0 0 188 188">
                            <g class="avatar__box">
                                <image xlink:href="assets/person.jpg" height="100%" width="100%" />
                            </g>
                        </svg>
                                                   <?php } ?>
						
						<div class="text-center">
						    <h3 class="title title--h3 sidebar__user-name "><span class="weight--500"><?php echo $db_field2["members_id"];?></h3>
							<div class="compy_name">Region : <?php echo $db_field2["area"];?></div>
							<div class="badge badge--light" style="line-height:20px;">
							<h6>
								<?php 
									echo $db_field2["company_name"];
								?>
								</h6>
							</div>
							<br>
							<div class="compy_name"><?php echo $db_field2["category"];?></div>
							<div class="compy_name"><?php echo $db_field2["name"];?></div>
							<div class="position" style="    text-transform: capitalize;    color: #11c011;    font-size: 16px;"><?php echo $db_field2["position"];?></div>
						
                            
							
							<!-- Social -->
		                    <!-- <div class="social">
		                        <a class="social__link" href="https://www.facebook.com/"><i class="font-icon icon-facebook"></i></a>
		                        <a class="social__link" href="https://www.behance.com/"><i class="font-icon icon-twitter"></i></a>
		                        <a class="social__link" href="https://www.linkedin.com/"><i class="font-icon icon-linkedin2"></i></a>
		                    </div> -->
						</div>
						
						<div class="sidebar__info box-inner box-inner--rounded">
						<div class="row"> 
							<div class="col-12 col-md-12 col-xl-12">
									<div class="pb-0 pb-sm-2">
										
										<p class="text-white"><i class="font-icon icon-location"></i><?php echo $db_field2["address"];?></p>
										
									</div>
								
							</div>
						

						</div>
		                    
							
							<!-- <a class="btn" href="#"><i class="font-icon icon-download"></i> Download CV</a> -->
						</div>
					</div>	
		        </aside>
		        
				<!-- Content -->
		        <div class="col-12 col-md-12 col-xl-9">
					
				    <div class="box shadow pb-0">
								<!-- -----------process & product -------------- -->
								<div class="row"> 
								<?php 
						   if (!empty($db_field2["email_mob_info"]) && $db_field2["email_mob_info"] == 'Enable') {

						   ?>
							<div class="col-12 col-md-6 col-xl-6">
									<div class="pb-0 pb-sm-2 contact_info">
										<h1 class="title title--h1 first-title title__separate">Contact info</h1>
										<p><a href="mailto:<?php echo $db_field2["email"];?>" class=""><i class="font-icon icon-envelope"></i><?php echo $db_field2["email"];?></a></p>
										<p><a href="tel:<?php echo $db_field2["mobile"];?>"> <i class="font-icon icon-phone"></i> <?php echo $db_field2["mobile"];?></a> </p>
									</div>
								
							</div>
							<?php 
						  }

						   ?>

						</div>
						
						<div class="row"> 
						<?php
						if(!empty($db_field2["company_image"])){
						?>
							
						<div class="col-12 col-md-6 col-xl-6">
						<!-- <div class="pb-0 pb-sm-2">
		                            <h1 class="title title--h1 first-title title__separate">Company Image</h1>
						            
                                    
					            </div> -->

								<div class="pb-0">
								<h1 class="title title--h1 first-title title__separate">Company Image</h1>

										<!-- Content -->
										<div class="gallery-grid js-masonry js-filter-container">
											<div class="gutter-sizer"></div>
											<!-- Item 1 -->
											<figure class="gallery-grid__item category-concept">
												<div class="gallery-grid__image-wrap">
													<img class="gallery-grid__image cover lazyload" src="../members/<?php echo $db_field2["company_image"];?>" data-zoom alt="" />
												</div>
												
											</figure>

										
										</div>
								</div>
								</div>
								<?php
						}
						?>
							<div class="col-12 col-md-6 col-xl-6">
									<div class="pb-0 pb-sm-2">
										<h1 class="title title--h1 first-title title__separate">Facilities</h1>
										<p><?php echo $db_field2["facilities"];?></p>
										
									</div>
								
							</div>

						</div>
						<!-- -----------process & product -------------- -->
						<div class="row"> 
							<div class="col-12 col-md-6 col-xl-6">
									<div class="pb-0 pb-sm-2">
										<h1 class="title title--h1 first-title title__separate">Process</h1>
										<p><?php echo $db_field2["process"];?></p>
										
									</div>
								
							</div>
							<div class="col-12 col-md-6 col-xl-6">
									<div class="pb-0 pb-sm-2">
										<h1 class="title title--h1 first-title title__separate">Products</h1>
										<p><?php echo $db_field2["product"];?></p>
										
									</div>
								
							</div>

						</div>
						
					    <!-- Menu -->
					   
			            <div class="content" id="content">
						    <div id="about-tab" class="tabcontent active">
					            <!-- ABOUT -->
						        <div class="pb-0 pb-sm-2">
		                            <h1 class="title title--h1 first-title title__separate">About Company</h1>
						            <p><?php echo $db_field2["about"];?></p>
                                    
					            </div>
						
						        <!-- What -->
						       
						
						        <!-- Testimonials -->
						       
						
						        <!-- Clients -->
						       
						    </div>
							
						
							<div id="contact-tab" class="tabcontent">
							 
						        <h2 class="title title--h3">Contact Form</h2>
							
						        <form  method="POST" action="" class="contact-form" >
                                    <div class="row">
				                        <div class="form-group col-12 col-md-6">
									        <i class="font-icon icon-user"></i>
                                            <input type="text" class="input input__icon form-control" id="nameContact" name="nameContact" placeholder="Full name" required="required" autocomplete="on" oninvalid="setCustomValidity('Fill in the field')" onkeyup="setCustomValidity('')">
								            <div class="help-block with-errors"></div>
				                        </div>
				                        <div class="form-group col-12 col-md-6">
									        <i class="font-icon icon-envelope"></i>
                                            <input type="email" class="input input__icon form-control" id="emailContact" name="emailContact" placeholder="Email address" required="required" autocomplete="on" oninvalid="setCustomValidity('Email is incorrect')" onkeyup="setCustomValidity('')">
								            <div class="help-block with-errors"></div>
				                        </div>
				                        <div class="form-group col-12 col-md-12">
                                            <textarea class="textarea form-control" id="messageContact" name="messageContact" placeholder="Your Message"  rows="4" required="required" oninvalid="setCustomValidity('Fill in the field')" onkeyup="setCustomValidity('')"></textarea>
								            <div class="help-block with-errors"></div>
				                        </div>
						            </div>
							        <div class="row">
				                        <div class="col-12 col-md-6 order-2 order-md-1 text-center text-md-left">
					                        <div id="validator-contact" class="hidden"></div>
				                        </div>
				                        <div class="col-12 col-md-6 order-1 order-md-2 text-right">
					                        <button type="submit" name="submit" class="btn"><i class="font-icon icon-send"></i> Send Message</button>
				                        </div>
			                        </div>
		                        </form>
							</div>
							
						</div>
					</div>
					
					<!-- Footer -->
					<footer class="footer">© 2024 HOSTIA</footer>
		        </div>
                <?php } ?>
			</div>
		</div>	
    </main>

    <div class="back-to-top"></div>

    <!-- SVG masks -->
    <svg class="svg-defs">
        <clipPath id="avatar-box">
            <path d="M1.85379 38.4859C2.9221 18.6653 18.6653 2.92275 38.4858 1.85453 56.0986.905299 77.2792 0 94 0c16.721 0 37.901.905299 55.514 1.85453 19.821 1.06822 35.564 16.81077 36.632 36.63137C187.095 56.0922 188 77.267 188 94c0 16.733-.905 37.908-1.854 55.514-1.068 19.821-16.811 35.563-36.632 36.631C131.901 187.095 110.721 188 94 188c-16.7208 0-37.9014-.905-55.5142-1.855-19.8205-1.068-35.5637-16.81-36.63201-36.631C.904831 131.908 0 110.733 0 94c0-16.733.904831-37.9078 1.85379-55.5141z"/>
        </clipPath>
        <clipPath id="avatar-hexagon">
             <path d="M0 27.2891c0-4.6662 2.4889-8.976 6.52491-11.2986L31.308 1.72845c3.98-2.290382 8.8697-2.305446 12.8637-.03963l25.234 14.31558C73.4807 18.3162 76 22.6478 76 27.3426V56.684c0 4.6805-2.5041 9.0013-6.5597 11.3186L44.4317 82.2915c-3.9869 2.278-8.8765 2.278-12.8634 0L6.55974 68.0026C2.50414 65.6853 0 61.3645 0 56.684V27.2891z"/>
        </clipPath>		
    </svg>

	

	<!-- JavaScripts -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/common.js"></script>
    
	<!-- Mapbox init -->
	<script src="assets/js/mapbox.init.js"></script>
	
	<script src="assets/demo/plugins-demo.js"></script>

</body>


</html>

<?php } ?>