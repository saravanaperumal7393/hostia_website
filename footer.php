 
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the email field is set and not empty
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        // Sanitize the email input
        $to_email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

        // Set up email subject and message for user
        $subject = "New subscription";
        $message = "Thank you for subscribing to our newsletter.";

        // Set up email subject and message for admin
        $subject1 = "New subscription Found";
        $message1 = "New subscription Found: " . $_POST['email'];
        $to_admin = "admin@hostiahosur.com";

        // Set up headers
        $headers = "From: admin@hostiahosur.com"; // Change this to your email address
        $headers1 = "From: " . $_POST['email']; // Change this to user's email address

        // Send email to admin
        if (mail($to_admin, $subject1, $message1, $headers1)) {
            // Notification email sent to admin
        } 

        // Send email to user
        if (mail($to_email, $subject, $message, $headers)) {
           
        } 
    } 
}
?>



 
 <!--=========================-->
        <!--=        Footer         =-->
        <!--=========================-->
        <footer id="footer-area">
            <!-- Footer Widget Start -->
            <div class="footer-widget section-padding">
                <div class="container">
                    <div class="row">
                        <!-- Single Widget Start -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-widget-wrap typefooter-1">
                                <div class="widgei-body">
                                    <div class="footer-about">
                                        <a href="index.php">
                                        <img src="assets/images/logo/foot_logo.png" class="foot_logo" alt="Logo" class="img-fluid" />
                                        </a>
                                        <!-- <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>  Address: #CP-6, Sipcot Industrial Complex, <br> Phase-2, Hosur - 635 130, TamilNadu.</a>
                                        <br />
                                        <a href="#"><i class="fa fa-phone"></i>  Phone: +8745 44 5444</a>
                                        <br />
                                        <a href="#"><i class="fa fa-envelope"></i> Email: demoemail@demo.com</a> -->
                                        <div class="box-footer box-infos">
                                            <div class="module">
                                                
                                                <div class="modcontent">
                                                    <ul class="list-icon">
                                                        
                                                        
                                                        <li><span class="icon fa fa-map-marker"></span>
                                                            #CP-6, Sipcot Industrial Complex, <br> Phase-2, Hosur - 635 130,<br> TamilNadu.
                                                            </li>  
                                                        <li><span class="icon fa fa-phone"></span><a href="tel:04344260687">04344 260687,</a> <br><a href="tel:+919487230890">+919487230890</a></li>
                                                        <li><span class="icon fa fa-envelope"></span><a href="mailto:hostia.hosur@gmail.com">hostia.hosur@gmail.com
                                                        </a> <br> <a href="mailto:admin@hostiahosur.com">admin@hostiahosur.com
                                                        </a></li>
                                                      
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Widget End -->
                                  <!-- Single Widget Start -->
                                  <div class="col-lg-4 col-sm-6">
                                    <div class="single-widget-wrap">
                                        <h4 class="widget-title">Quick Links</h4>
                                        <div class="widgei-body">
                                            <ul class="double-list footer-list clearfix">
                                            <li><a href="index.php">Homepage</a></li>
                                                <li><a href="about.php">About Hostia</a></li>
                                                <li><a href="roll_honors.php">Roll of Honours </a></li>
                                                <li><a href="office_bearers.php">Office Bearers </a></li>
                                                <li><a href="vision_mission.php">Vision & Mission </a></li>
                                                <li><a href="objectives.php">Objectives </a></li>
                                                <li><a href="#">Milestones </a></li>
                                                <li><a href="#">Events</a></li>
                                                <li><a href="members_list.php">Members Profile  </a></li>
                                                <li><a href="digital_library.php">Digital Library</a></li>
                                                <li><a href="#">NewsLetter  </a></li>
                                                <li><a href="gallery_img.php">Gallery </a></li>
                                                
                                                                                               
                                                <li><a href="contact.php">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Widget End -->
                        <!-- Single Widget Start -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="single-widget-wrap">
                                <h4 class="widget-title">Get In Touch</h4>
                                <div class="widgei-body">
                                   
                                    <div class="newsletter-form">
                                    <form  action="" method="POST">
                                        <input name="email" type="email" placeholder="Enter Your Email" id="subscribe" required />
                                        <button type="submit" name="submit">
                                            <i class="far fa-paper-plane"></i>
                                        </button>
                                        <p id="cbx-subscribe-form-error"></p>
                                    </form>

                                    </div>
                                    <div class="footer-social-icons">
                                        <a href="https://www.instagram.com/hostia_news/" target="_blank"><i class="fab fa-instagram"></i></a>
                                        <a href="https://twitter.com/hostia11?lang=en" target="_blank"><i class="fab fa-twitter"></i></a>
                                        <a href="https://www.linkedin.com/in/hostia-hosur-320780191/?original_referer=https%3A%2F%2Fwww%2Egoogle%2Ecom%2F&originalSubdomain=in  " target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="https://www.youtube.com/channel/UCegslYIOKu549thw9sX67Wg" target="_blank"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>  
                            </div>
                        </div>
                        <!-- Single Widget End -->

              

                       
                        <!-- Single Widget End -->
                    </div>
                </div>
            </div>
            <!-- Footer Widget End -->

            <!-- Footer Bottom Start -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-4 text-center">
                    <div></div>
                <!-- <div ><p> Visitor Count : <span class="website-counter"> </span> </p></div> -->
                <div ><p> Visitor Count : <span class="website-counter" id="visitorCount"> </span> </p></div> 
                <!-- <h1>Visitor Count:</h1>
<div id="visitorCount"></div> -->
                        </div>
                        <div class="col-lg-4 text-center">
                            <div class="footer-bottom-text">
                                <p>© 2024 HOSTIA, All Rights Reserved.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 text-center">
                            <div class="footer-bottom-text">
                                <p>Developed By <a style="color:#ffdd54;" href="https://www.avatarthebranding.company/"  target="_blank">Avatar Global Services</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer Bottom End -->
        </footer>

       



    </div>
    <!-- /#site -->


    <!-- Dependency Scripts -->
    <script id="script-bundle" src="assets/vendors/js/bundle.js"></script>

    <!-- <script id="color-switcher" src="assets/js/switcher.js"></script> -->

    <!-- Site Scripts -->
    <script src="assets/js/app.js"></script>
    

    <script>
        "use strict";
(function () {
	window.onload = () => {
		const obj = document.querySelector("#gallery");
		const time = 10000;
		function animStart() {
			if (obj.classList.contains("active") == false) {
				obj.classList.add("active");
				setTimeout(() => {
					animEnd();
				}, time);
			}
		}
		function animEnd() {
			obj.classList.remove("active");
			obj.offsetWidth;
		}
		document.addEventListener("scroll", function () {
			// scroll or scrollend
			animStart();
		});
		window.addEventListener("resize", animStart);
		animStart();
	};
})();

    </script>

<script>
const galleryItem = document.getElementsByClassName("gallery-item");
const lightBoxContainer = document.createElement("div");
const lightBoxContent = document.createElement("div");
const lightBoxImg = document.createElement("img");
const lightBoxPrev = document.createElement("div");
const lightBoxNext = document.createElement("div");

lightBoxContainer.classList.add("lightbox");
lightBoxContent.classList.add("lightbox-content");
lightBoxPrev.classList.add("fa", "fa-angle-left", "lightbox-prev");
lightBoxNext.classList.add("fa", "fa-angle-right", "lightbox-next");

lightBoxContainer.appendChild(lightBoxContent);
lightBoxContent.appendChild(lightBoxImg);
lightBoxContent.appendChild(lightBoxPrev);
lightBoxContent.appendChild(lightBoxNext);

document.body.appendChild(lightBoxContainer);

let index = 1;

function showLightBox(n) {
    if (n > galleryItem.length) {
        index = 1;
    } else if (n < 1) {
        index = galleryItem.length;
    }
    let imageLocation = galleryItem[index-1].children[0].getAttribute("src");
    lightBoxImg.setAttribute("src", imageLocation);
}

function currentImage() {
    lightBoxContainer.style.display = "block";

    let imageIndex = parseInt(this.getAttribute("data-index"));
    showLightBox(index = imageIndex);
}
for (let i = 0; i < galleryItem.length; i++) {
    galleryItem[i].addEventListener("click", currentImage);
}

function slideImage(n) {
    showLightBox(index += n);
}
function prevImage() {
    slideImage(-1);
}
function nextImage() {
    slideImage(1);
}
lightBoxPrev.addEventListener("click", prevImage);
lightBoxNext.addEventListener("click", nextImage);

function closeLightBox() {
    if (this === event.target) {
        lightBoxContainer.style.display = "none";
    }
}
lightBoxContainer.addEventListener("click", closeLightBox);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
// Slider version 1
$('.owl-carousel.version-1').owlCarousel({
    loop:true,
    margin:15,
    autoplay:false,
    autoplayspeed :3000,
    responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:4,
            nav:true
        }
    }
});

// Slider version 2
$('.owl-carousel.version-2').owlCarousel({
    // loop:true,
    margin: 15,
    autoplay: true,
    loop: false,
    autoplaySpeed: 3000,
    center: true,
    responsiveClass: true,
    startPosition: 1, // Start from the second item
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 2,
            nav: false
        },
        1000: {
            items: 3,
            nav: true
        }
    }
});
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> -->
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
<script>
$(document).ready(function(){
    $('.toggle-password').click(function(){
        
        $(this).toggleClass('fa-eye fa-eye-slash');
        var input = $('#pass');
        input.attr('type') === 'password' ? input.attr('type', 'text') : input.attr('type', 'password');
    });
});
</script>
<script>
function checkemail(email){
  var email = email;
//   alert(email);

 $.ajax({
        method:"POST",
        url: "validate_email.php",
        data:{email:email},
        success: function(data){
          $('#available').html(data);
        }
      });
}

</script>
<script src="dflip/js/dflip.min.js" type="text/javascript"></script>

<script>
    var counterContainer = document.querySelector(".website-counter");
    var resetButton = document.querySelector("#reset");
    var visitCount = localStorage.getItem("page_view");
    var sessionFlag = sessionStorage.getItem("visited");

    // Check if page_view entry is present and user has not visited during the current session
    if (!sessionFlag && visitCount) {
        visitCount = Number(visitCount) + 1;
        localStorage.setItem("page_view", visitCount);
        sessionStorage.setItem("visited", true); // Set session flag to mark the user as visited during this session
    } else if (!sessionFlag) {
        visitCount = 1;
        localStorage.setItem("page_view", 1);
        sessionStorage.setItem("visited", true); // Set session flag to mark the user as visited during this session
    }
    counterContainer.innerHTML = visitCount;

    // Adding onClick event listener
    resetButton.addEventListener("click", () => {
        visitCount = 1;
        localStorage.setItem("page_view", 1);
        sessionStorage.removeItem("visited"); // Remove session flag to allow counting for new users in the next session
        counterContainer.innerHTML = visitCount;
    });
</script>

<!-- <script src="https://cdn.rawgit.com/sachinchoolur/lightgallery.js/master/dist/js/lightgallery.js"> </script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-pager.js/master/dist/lg-pager.js"> </script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-autoplay.js/master/dist/lg-autoplay.js"> </script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-share.js/master/dist/lg-share.js"> </script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-fullscreen.js/master/dist/lg-fullscreen.js"> </script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-zoom.js/master/dist/lg-zoom.js"> </script>
<script src="https://cdn.rawgit.com/sachinchoolur/lg-hash.js/master/dist/lg-hash.js"> </script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"> </script>

<script>
    lightGallery(document.getElementById('lightgallery'), {
  download: false,
  share: false
});
</script> -->

<script type="text/javascript" src="assets/light/lightgallery.js"></script>
   <script type="text/javascript" src="assets/light/lightgallery-all.js"></script>
   <script type="text/javascript" src="assets/light/lightgallery-all.min.js"></script>
<script type="text/javascript">
		    
        $(document).ready(function(){
            $('#lightgallery').lightGallery();
            $('#lightgallery1').lightGallery();
            $('#lightgallery2').lightGallery();
            $('#lightgallery3').lightGallery();
        });
        </script>
<script>
// Function to fetch and display the visitor count using JavaScript
function fetchVisitorCount() {
    fetch('counter.txt')
    .then(response => response.text())
    .then(count => {
        document.getElementById('visitorCount').innerText = count;
    });
}

// Call the function initially
fetchVisitorCount();

// Refresh the count every 10 seconds (or any interval you prefer)
setInterval(fetchVisitorCount, 10000); // 10000 milliseconds = 10 seconds
</script>
</body>



</html>