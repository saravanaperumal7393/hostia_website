
<?php
// include('connection.php');
include('header.php');
?>
 <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


        <section id="slider-area">
            <div class="slider-active-wrap owl-carousel text-center text-md-start">

                <div class="single-slide-wrap slide-bg-1">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    <h2 class="animated-text">Welcome to HOSTIA</h2>
                                    <h2 class="animated-text"><span>Empowering Small Industries for Growth! </span></h2>
                                    
                                    <div class="slider-btn">
                                        
                                        <a href="registration.php" class="btn btn-brand smooth-scroll">Join Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-slide-wrap slide-bg-2">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    <h2 class="animated-text1">Join Hosur's Premier Association for Small & Tiny Industries
                                        </h2>
                                    
                                    
                                    <div class="slider-btn">
                                        
                                        <a href="about.php" class="btn btn-brand-rev">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-slide-wrap slide-bg-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    <h2 class="animated-text">Explore Membership Benefits | Foster Innovation    </h2>
                                    
                                    
                                    <div class="slider-btn">
                                        
                                        <a href="contact.php" class="btn btn-brand smooth-scroll">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-slide-wrap slide-bg-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="slider-content">
                                    <h2 class="animated-text">Nurturing Tomorrow's Leaders    </h2>
                                    
                                    
                                    <div class="slider-btn">
                                        
                                        <a href="contact.php" class="btn btn-brand smooth-scroll">View More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="social-networks-icon">
                <!-- <span>7.2k Likes</span> -->
                <ul>
                    <li><a href="https://twitter.com/hostia11?lang=en" target="_blank"><i class="fab fa-twitter"></i> </a></li>
                    <li><a href="https://www.linkedin.com/in/hostia-hosur-320780191/?original_referer=https%3A%2F%2Fwww%2Egoogle%2Ecom%2F&originalSubdomain=in" target="_blank"><i class="fab fa-linkedin-in"></i> </a></li>
                    <li><a href="https://www.instagram.com/hostia_news/" target="_blank"><i class="fab fa-instagram"></i> </a></li>
                    <li><a href="https://www.youtube.com/channel/UCegslYIOKu549thw9sX67Wg" target="_blank"><i class="fab fa-youtube"></i> </a></li>
                </ul>
            </div>

        </section>

        <!--=================================-->
        <!--=         Upcoming Event        =-->
        <!--=================================-->
        <section id="upcoming-area" >
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="upcoming-event-wrap">
                            <div class="up-event-titile">
                                <h3>Advertisement</h3>
                            </div>
                            <div class="upcoming-event-content owl-carousel">
                            <?php
                            $quer3  = "SELECT * FROM tb_style1 ";
                            //   echo $quer3;
                            //   exit;
                            $result1=mysqli_query($db,$quer3);
                            while($db_field2 = mysqli_fetch_array($result1))
                            {


                            ?>
                                <!-- No 1 Event -->
                                <div class="single-upcoming-event">
                                    <div class="row">
                                        <div class="col-lg-5">
                                            <div class="up-event-thumb">
                                                <img src="members/<?php echo $db_field2['imaged']; ?>" class="img-fluid" alt="Upcoming Event">
                                                <!-- <h4 class="up-event-date">It’s 27 February 2023</h4> -->
                                            </div>
                                        </div>

                                        <div class="col-lg-7">
                                            <div class="display-table">
                                            <!-- display-table-cell -->
                                                <div class="">
                                                    <div class="up-event-text">
                                                   
                                                        <p><?php echo $db_field2['adt_des']; ?></p>
                                                        <!-- <a href="#" class="btn btn-brand btn-brand-dark">join
                                                            with us</a> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- partial -->
                        <?php }?>

                                <!-- No 2 Event -->
                                
                            
                                
                                <!-- partial -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=========================-->
        <!--=         About         =-->
        <!--=========================-->
        <section id="about-area" class="section-padding">
            <div class="about-area-wrapper">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-lg-10">
                            <div class="about-content-wrap">
                                <div class="section-title text-lg-left">
                                    <h2>About Us</h2>
                                </div>

                                <div class="about-thumb">
                                    <img src="assets/images/about/about1.jpeg" alt="" class="img-fluid">
                                </div>

                                <p>Established in 1978, HOSTIA, an acronym for Hosur Small and Tiny Industries Association, serves as the dedicated representative for around 2000 small and tiny industries situated in the Hosur Taluk of Krishnagiri District, Tamil Nadu.</p>
                                <p>Committed to fostering the growth and prosperity of small and micro-industries, HOSTIA collaborates closely with various governmental agencies, including MSME, NSIC, SIDBI, TIIC, and SIDCO, to provide vital support and resources for its member industries.<p>
                                <a href="about.php" class="btn btn-brand about-btn">know more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
 <!--===========================-->
        <!--=         Committee       =-->
        <!--===========================-->
        <section class="our-honorable-commitee section-padding parallex">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="about-page-area-title">
                            <h2 >OFFICE BEARERS </h2>
                        </div>
                    </div>
                </div>

                <div class="honorable-committee-list">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-committee-member text-center">
                                <div class="commitee-thumb">
                                    <img src="assets/images/office_bearers/moorthy.jpg" class="img-fluid" alt="Committee" />
                                </div>
                                <h3>S. Moorthy<span class="committee-deg">PRESIDENT</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-committee-member">
                                <div class="commitee-thumb">
                                    <img src="assets/images/office_bearers/sridharan.jpg" class="img-fluid" alt="Committee" />
                                </div>
                                <h3>S.Sridharan<span class="committee-deg">SECRETARY</span></h3>
                            </div>
                        </div>

                        <div class="col-lg-4 col-sm-6">
                            <div class="single-committee-member">
                                <div class="commitee-thumb">
                                    <img src="assets/images/office_bearers/vadivelu.jpg" class="img-fluid" alt="Committee" />
                                </div>
                                <h3>R.Vadivelu<span class="committee-deg">TREASURER</span></h3>
                            </div>
                        </div>
<!-- 
                        <div class="col-lg-3 col-sm-6">
                            <div class="single-committee-member">
                                <div class="commitee-thumb">
                                    <img src="assets/images/person/person.jpg" class="img-fluid" alt="Committee" />
                                </div>
                                <h3>R.Kumar<span class="committee-deg">Vice President</span></h3>
                            </div>
                        </div> -->

                        <div class="col-lg-12 text-center">
                            <a href="office_bearers.php" class="btn btn-brand btn-loadmore">View More</a>
                        </div>
                 
                    </div>
                </div>
            </div>
    </div>

        <!--=================================-->
        <!--=         Responsibility        =-->
        <!--=================================-->
        <section id="responsibility-area" class="section-padding">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Our Responsibility</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Responsibility Content Wrapper ==-->
                <div class="row text-center text-sm-left">
                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="assets/images/icon/icon1.png" class="responsibility_img" alt="Responsibility">
                            <h4>Information and Resources</h4>
                            <p>Provide clear information about the association's history, mission, goals, and membership benefits.</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->

                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="assets/images/icon/icon2.png" class="responsibility_img" alt="Responsibility">
                            <h4>Member Portal</h4>
                            <p>Create a secure member portal for members to access exclusive content, discounts, networking opportunities.</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->

                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="assets/images/icon/icon3.png" class="responsibility_img" alt="Responsibility">
                            <h4>Newsletters and Announcements</h4>
                            <p>Send regular newsletters and email updates informing members about key developments and  activities.</p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->

                    <!--== Single Responsibility Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-responsibility">
                            <img src="assets/images/icon/icon4.png" class="responsibility_img" alt="Responsibility">
                            <h4>Policy Statements and Issues</h4>
                            <p>Clearly communicate the association's stance on important policy issues affecting STIs.
                            </p>
                        </div>
                    </div>
                    <!--== Single Responsibility End ==-->
                </div>
                <!--== Responsibility Content Wrapper ==-->
            </div>
        </section>

        <!--================================-->
        <!--=         Fun Fact        =-->
        <!--================================-->
        <section id="funfact-area">
            <div class="container-fluid">
                <div class="row text-center">
                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="assets/images/fun-fact/user.svg" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                            <h5><span class="funfact-count">1198</span>+</h5>
                                <p>Members</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->

                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="assets/images/fun-fact/picture.svg" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5 class="funfact-count">725</h5>
                                <p>Photos</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->

                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="assets/images/fun-fact/event.svg" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5><span class="funfact-count">230</span>+</h5>
                                <p>Events</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->

                    <!--== Single FunFact Start ==-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-funfact-wrap">
                            <div class="funfact-icon">
                                <img src="assets/images/fun-fact/medal.svg" alt="Funfact">
                            </div>
                            <div class="funfact-info">
                                <h5><span class="funfact-count">10</span>+</h5>
                                <p>Awards</p>
                            </div>
                        </div>
                    </div>
                    <!--== Single FunFact End ==-->
                </div>
            </div>
        </section>

        <!--======================-->
       
        <!--=         Gallery        =-->
        <!--==========================-->
        <section id="gallery-area" class="section-padding">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Our gallery</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Gallery Container Warpper ==-->
                <div class="gallery-content-wrapper">
                    <div id="gallery">
                        <figure>
                            <img src="assets/images/gallery/photo1.jpg" alt="Gallery " title="Gallery">
                            <figcaption>Tamilnadu Defence Investment Conclave </figcaption>
                        </figure>
                  
                        <figure>
                            <img src="assets/images/gallery/gallery1.jpg" alt="Gallery " title="Gallery">
                            <figcaption>Vendor Development Meet</figcaption>
                        </figure>
                        <figure>
                            <img src="assets/images/gallery/gallery2.jpg" alt="Gallery " title="Gallery">
                            <figcaption>Cyclone Relief Material Handed over to District Collector</figcaption>
                        </figure>
                   
                      
                    </div>
                    <div class="col-lg-12 text-center">
                        <a href="gallery_img.php" class="btn btn-brand btn-loadmore">View More</a>
                    </div>
                </div>
                <!--== Gallery Container Warpper==-->
            </div>
        </section>

        <!--=================================-->
        <!--=         Call To Action        =-->
        <!--=================================-->
        <section id="scholership-promo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="scholership-promo-text">
                            <h2> <span>Become a Member Today!</span> </h2>
                            <p style="color: #fff;">Join us in shaping the future of the industry. Take advantage of exclusive resources, networking opportunities, and advocacy initiatives designed to elevate your business. </p>
                            <a href="registration.php" class="btn btn_green">Join Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== Scholership Promo Area End ==-->

        <!--=======================-->
        <!--=         Blog        =-->
        <!--=======================-->
        <section id="blog-area" class="section-padding" style="display:none;">
            <div class="container">
                <!--== Section Title Start ==-->
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                            <h2>Blogs</h2>
                        </div>
                    </div>
                </div>
                <!--== Section Title End ==-->

                <!--== Blog Content Wrapper ==-->
                <div class="row">
                    <!--== Single Blog Post start ==-->
                    <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="assets/images/blog/blog.png" alt="Blog" class="img-fluid" />
                                </div>
                                <!-- <figcaption class="blog-meta clearfix">
                                    <a href="single-blog.html" class="author">
                                        <div class="author-pic">
                                            <img src="assets/images/blog/author.jpg" alt="Author">
                                        </div>
                                        <div class="author-info">
                                            <h5>Daney williams</h5>
                                            <p>2 hours Ago</p>
                                        </div>
                                    </a>
                                    <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div>
                                </figcaption> -->
                            </figure>

                            <div class="blog-content">
                                <h3><a href="#">Recently we create a maassive project </a></h3>
                                <p>This is a big project of our company.</p>
                                <!-- <a href="single-blog.html" class="btn btn-brand">More</a> -->
                            </div>
                        </article>
                    </div>
                    <!--== Single Blog Post End ==-->

                       <!--== Single Blog Post start ==-->
                       <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="assets/images/blog/blog.png" alt="Blog" class="img-fluid" />
                                </div>
                                <!-- <figcaption class="blog-meta clearfix">
                                    <a href="single-blog.html" class="author">
                                        <div class="author-pic">
                                            <img src="assets/images/blog/author.jpg" alt="Author">
                                        </div>
                                        <div class="author-info">
                                            <h5>Daney williams</h5>
                                            <p>2 hours Ago</p>
                                        </div>
                                    </a>
                                    <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div>
                                </figcaption> -->
                            </figure>

                            <div class="blog-content">
                                <h3><a href="#">Recently we create a maassive project </a></h3>
                                <p>This is a big project of our company.</p>
                                <!-- <a href="single-blog.html" class="btn btn-brand">More</a> -->
                            </div>
                        </article>
                    </div>
                    <!--== Single Blog Post End ==-->

                       <!--== Single Blog Post start ==-->
                       <div class="col-lg-4 col-md-6">
                        <article class="single-blog-post">
                            <figure class="blog-thumb">
                                <div class="blog-thumbnail">
                                    <img src="assets/images/blog/blog.png" alt="Blog" class="img-fluid" />
                                </div>
                                <!-- <figcaption class="blog-meta clearfix">
                                    <a href="single-blog.html" class="author">
                                        <div class="author-pic">
                                            <img src="assets/images/blog/author.jpg" alt="Author">
                                        </div>
                                        <div class="author-info">
                                            <h5>Daney williams</h5>
                                            <p>2 hours Ago</p>
                                        </div>
                                    </a>
                                    <div class="like-comm pull-right">
                                        <a href="#"><i class="fa fa-comment-o"></i>77</a>
                                        <a href="#"><i class="fa fa-heart-o"></i>12</a>
                                    </div>
                                </figcaption> -->
                            </figure>

                            <div class="blog-content">
                                <h3><a href="#">Recently we create a maassive project </a></h3>
                                <p>This is a big project of our company.</p>
                                <!-- <a href="single-blog.html" class="btn btn-brand">More</a> -->
                            </div>
                        </article>
                    </div>
                    <!--== Single Blog Post End ==-->



                  
                </div>
                <!--== Blog Content Wrapper ==-->
            </div>
        </section>
      <!-- -------------------------------------------------------------------------------------------------------------- -->
   

      <section  class="section-padding">
        <div class="container">
        <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="section-title">
                        <h2 style="color: #009746;">Members Advertisements</h2>
                        </div>
                    </div>
                </div>
            <div class="row">
                <!-- Logo slider with Title and description -->
  <div class="logo-slider-2">
 
    <div class="owl-carousel version-2" >
    <?php
                            $quer3  = "SELECT * FROM member_post where post_status='Accepted' AND cus_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
                          
                            //   echo $quer3;
                            //   exit;
                            $result1=mysqli_query($db,$quer3);
                            while($db_field2 = mysqli_fetch_array($result1))
                            {
                                $file_img =$db_field2['file'];
                                if(empty($file_img)){
                                    

                                ?>


                <div> 
                   
                    <p class="date_member"><?php echo $db_field2['cus_date']; ?> </p>
                    <h2 ><?php echo $db_field2['company_name']; ?></h2>
                    <p style="text-transform:capitalize;">
                    <?php
                    $content = $db_field2['content'];
                    $words = str_word_count($content);

                    if ($words > 25) {
                        // Display truncated content with "View More" link
                        $truncated_content = implode(' ', array_slice(str_word_count($content, 1), 0, 25));
                        echo '<p style="text-transform:capitalize;">' . $truncated_content . '... <a href="members_post_details.php?id=' . $db_field2['id'] . '">View More</a></p>';

                    } else {
                        // Display full content
                        echo '<p style="text-transform:capitalize;">' . $content . '</p>';
                    }
                    ?>
                    </p>
                </div>
     
    
    <?php }else {?>
        <div> 
                    <img src="members/<?php echo $db_field2['file']; ?>">
                    <p class="date_member"><?php echo $db_field2['cus_date']; ?> </p>
                    <h2 ><?php echo $db_field2['company_name']; ?></h2>
                    <p style="text-transform:capitalize;">
                    <?php
                    $content = $db_field2['content'];
                    $words = str_word_count($content);

                    if ($words > 25) {
                        // Display truncated content with "View More" link
                        $truncated_content = implode(' ', array_slice(str_word_count($content, 1), 0, 25));
                        echo '<p style="text-transform:capitalize;">' . $truncated_content . '... <a href="members_post_details.php?id=' . $db_field2['id'] . '">View More</a></p>';

                    } else {
                        // Display full content
                        echo '<p style="text-transform:capitalize;">' . $content . '</p>';
                    }
                    ?>
                    </p>
                </div>
        <?php }}?>
   
     
    </div>
  </div>
     
            </div>
        </div>
    </section>

    <!-- --------------------------------------------------- -->
    <?php
$quer3 = "SELECT * FROM popup WHERE status='1'";
$result1 = mysqli_query($db, $quer3);

if(mysqli_num_rows($result1) > 0) { // Check if any rows were returned
    ?>
    <div id="bkgOverlay" class="backgroundOverlay"></div>
    <div id="delayedPopup" class="delayedPopupWindow">
        <?php
        while ($db_field2 = mysqli_fetch_array($result1)) {
        ?>
        <a href="#" id="btnClose" title="Click here to close this deal box."><img src="assets/close.png"></a>
        <div class="formDescription">
            <img src="members/<?php echo $db_field2['imaged']; ?>">
        </div>
        <div id="mc_embed_signup">
            <p><?php echo $db_field2['hlink']; ?></p>
        </div>
        <?php
        } // end while
        ?>
    </div>
    <?php
} // end if
?>

<script>
 $(document).ready(function ()
{
	//Fade in delay for the background overlay (control timing here)
	$("#bkgOverlay").delay(1000).fadeIn(400);
  //Fade in delay for the popup (control timing here)
	$("#delayedPopup").delay(1000).fadeIn(400);
	
	//Hide dialouge and background when the user clicks the close button
	$("#btnClose").click(function (e)
	{
		HideDialog();
		e.preventDefault();
	});
});
//Controls how the modal popup is closed with the close button
function HideDialog()
{
	$("#bkgOverlay").fadeOut(400);
	$("#delayedPopup").fadeOut(300);
}


</script>

        <?php
include('footer.php');
        ?>