<?php error_reporting(0);?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
       <title>JAMIA ABDUS SALAM - ADMIN </title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="" type="image/x-icon">
        <link rel="preconnect" href="https://fonts.googleapis.com/" />
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" media="screen" href="new/css/perfect-scrollbar.min.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="new/css/style.css" />
        <link defer rel="stylesheet" type="text/css" media="screen" href="new/css/animate.css" />
        <script src="new/js/perfect-scrollbar.min.js"></script>
        <script defer src="new/js/popper.min.js"></script>
        <script defer src="new/js/tippy-bundle.umd.min.js"></script>
        <script defer src="new/js/sweetalert.min.js"></script>
    </head>

    <body
        x-data="main"
        class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
        :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme, $store.app.menu, $store.app.layout,$store.app.rtlClass]"
    >
        <!-- screen loader -->
        <div class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
            <svg width="64" height="64" viewBox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
                <path
                    d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s" repeatCount="indefinite" />
                </path>
                <path
                    d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z"
                >
                    <animateTransform attributeName="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s" repeatCount="indefinite" />
                </path>
            </svg>
        </div>



        <div class="main-container min-h-screen text-black dark:text-white-dark">
            <!-- start main content section -->
            <div class="flex min-h-screen items-center justify-center bg-[url('../images/map.svg')] bg-cover bg-center dark:bg-[url('../images/map-dark.svg')]">
                <div class="panel m-6 w-full max-w-lg sm:w-[480px]">
                    <h2 class="mb-3 text-2xl font-bold text-center">JAMIA ABDUS SALAM - ADMIN </h2>
                    <?php if($_GET['a']!="") {?><div class="alert alert-error" style="color:#6b0e0e;font-size:18px;"> <?php echo $_GET['a'];?>  <!--<strong>Error!</strong> Please enter an username and a password.-->
        </div><?php } ?>
                    <p class="mb-7">Enter your Username and password to login</p>
                    <form class="space-y-5" action="login_check.php" method="POST">
                        <div>
                            <label for="name">Username</label>
                            
                            <input type="text" class="form-input" id="uname" name="uname" placeholder="USER-NAME" required="">
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" id="pass" type="pass" name="pass" class="form-input" placeholder="Enter Password" />
                        </div>
               
                        <button type="submit" class="btn btn-primary w-full">SUBMIT</button>
                    </form>
                    <div
                        class="relative my-7 h-5 text-center before:absolute before:inset-0 before:m-auto before:h-[1px] before:w-full before:bg-[#ebedf2] dark:before:bg-[#253b5c]"
                    >
                      
                    </div>
                    
                
                </div>
            </div>
            <!-- end main content section -->
        </div>

        <script src="new/js/alpine-collaspe.min.js"></script>
        <script src="new/js/alpine-persist.min.js"></script>
        <script defer src="new/js/alpine-ui.min.js"></script>
        <script defer src="new/js/alpine-focus.min.js"></script>
        <script defer src="new/js/alpine.min.js"></script>

        <script src="new/js/custom.js"></script>

        <script>
            // main section
            document.addEventListener('alpine:init', () => {
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));
            });
        </script>
    </body>


</html>
