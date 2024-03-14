<?php
 
 $log_name=$_SESSION["uname"];
 // session_start();
    
?>
  
  <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu">

                <div class="h-100" data-simplebar>

                 

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        <ul id="side-menu">

                            <!-- <li class="menu-title">Navigation</li> -->
                            <?php if($log_name =="admin@hostiahosur.com") {?>
                                <li>
                                <a href="member_list.php">
                                <i class="fa fa-edit"></i>
                                    <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                                    <span>  Member Details </span>
                                </a>
                            </li>
                            <li>
                                <a href="post_data_tables.php">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                                    <span>Admin Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="add_post.php">
                                <i class="fa fa-plus"></i>
                                    <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                                    <span> Add Post </span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="add_member.php">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                    
                                    <span> Add New Members </span>
                                </a>
                            </li> -->

                            <li>
                                <a href="text_scroll.php">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                    <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                                    <span> Flash News </span>
                                </a>
                            </li>

                            <li>
                                <a href="popup.php">
                                <i class="fa fa-bullhorn" aria-hidden="true"></i>
                                    <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                                    <span> Announcement Bar </span>
                                </a>
                            </li>
                         
                         
                            
                                <?php } else {?>  
                            <li>
                                <a href="index.php">
                                    <i class="mdi mdi-view-dashboard-outline"></i>
                                    <!-- <span class="badge bg-success rounded-pill float-end">9+</span> -->
                                    <span> Dashboard </span>
                                </a>
                            </li>
                         
                            <?php }?> 
                        

                           
                           
                           
                        </ul>

                    </div>
                    <!-- End Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->