
   
   <?php
   include('header.php');
   include('sidebar.php');
   ?>

<style>

.filters-group {
    padding: 0;
    margin: 0 0 4px;
    border: 0;
}
.btn {
    padding: 5px 10px;
}
.btn_a {
    font-size: 14px;
   
    text-transform: capitalize;
    padding: 10px 14px;
    font-weight: 600;
    border: 0;
    position: relative;
    z-index: 1;
    transition: .2s ease;
}
.btn-primary {
    background-color: #4dbe81;
    border: 1px solid;
    border-color: #d3d0d0;
}
.margin_display{
    margin: 1% 10% 1%;
}
@media(max-width:991px){
    .btn_a {
    width:20%;
}
.margin_display{
    margin: 1% 8% 1%;
}
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-md-3">
                                                <div class="mt-3 mt-md-0">
                                                    <a href="add_member.php">
                                                    <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus-circle me-1"></i> Add Member</button>
                                                    </a>
                                                </div>
                                            </div><!-- end col-->
                                            <div class="col-md-3">
                                                <div class="mt-3 mt-md-0">
                                                    <a href="send_email.php">
                                                    <button type="button" class="btn btn-info waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="fa fa-send-o"></i>&nbsp; Send Email</button>
                                                    </a>
                                                </div>
                                            </div><!-- end col-->
                                            <div class="col-md-6">
                                                <form class="d-flex flex-wrap align-items-center justify-content-sm-end">
                                                    <label for="status-select" class="me-2">Search</label>
                                                    <!-- <div class="me-sm-2">
                                                        <select class="form-select my-1 my-md-0" id="status-select">
                                                            <option selected="">All</option>
                                                            <option value="1">Name</option>
                                                            <option value="2">Post</option>
                                                            <option value="3">Followers</option>
                                                            <option value="4">Followings</option>
                                                        </select>
                                                    </div> -->
                                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                                    <div>
                                                    <input type="search" class="form-control my-1 my-md-0" id="searchInput" placeholder="Search...">
                                                    </div>
                                                </form>
                                            </div>
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    <div class="row">
                            <div class="col-sm-12 filters-group">
                                <div class="btn-group filter-options row margin_display" >
                                    <button class="btn_a btn-primary col-md-1 " data-group="A">A</button>
                                    <button class="btn_a btn-primary col-md-1 " data-group="B">B</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="C">C</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="D">D</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="E">E</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="F">F</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="G">G</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="H">H</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="I">I</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="J">J</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="K">K</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="L">L</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="M">M</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="N">N</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="O">O</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="P">P</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="Q">Q</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="R">R</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="S">S</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="T">T</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="U">U</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="V">V</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="W">W</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="X">X</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="Y">Y</button>
                                    <button class="btn_a btn-primary col-md-1" data-group="Z">Z</button>
                                    <button class="btn_a btn-primary col-md-3" data-group="See All">See All</button>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->        
                        <div class="row">
                            <?php
                                
                                $selquery = "SELECT * FROM members WHERE id NOT IN (1, 2)";
                                

                        $result=mysqli_query($db,$selquery);
                        while ($db_field2 = mysqli_fetch_array($result)) {
                            ?>
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="text-center card-body">
                                    
                                        <div>
                                           
                                            <?php if ($db_field2['profile_picture'] != null) { ?>
                                                      <!-- Display the image when profile_picture exists -->
                                                      <img src="<?php echo $db_field2['profile_picture']; ?>" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                                      
                                                   <?php } else { ?>
                                                      
                                                      <img src="assets/person.jpg" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                                   <?php } ?>
                                            <!-- <p class="text-muted font-13 mb-3">
                                            <?php echo $db_field2["about"]?>
                                            </p> -->
    
                                            <div class="text-start item">
                                            <p class="text-muted font-13"><strong>Memeber ID :</strong> <span class="ms-2"><?php echo $db_field2["members_id"]?></span></p>
                                                <p class="text-muted font-13"><strong>Name :</strong> <span class="ms-2"><?php echo $db_field2["name"]?></span></p>
    
                                                <p class="text-muted font-13"><strong>Company Name :</strong><span class="ms-2"><?php echo $db_field2["company_name"]?></span></p>
    
                                                <p class="text-muted font-13"><strong>Email :</strong> <span class="ms-2"><?php echo $db_field2["email"]?></span></p>
    
                                                
                                            </div>
                                            <input type="hidden" name="id" value="<?php echo $db_field2["id"]?>">
                                            <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light" onclick="openmemberpopup( <?php echo $db_field2['id'];?>)">Edit Details</button>
                                            <button type="button" class="btn btn-danger rounded-pill waves-effect waves-light" onclick="deletemember( <?php echo $db_field2['id'];?>)">Delete Member</button>
                                        </div>
                                    </div>
                                </div>
                                

                            </div> <!-- end col -->

                            <?php
                             }
                            ?>

                          
                        </div>
                        <!-- end row -->

                        
                        
                        
            
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
 
<script>
    function openmemberpopup(jobId) {
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;
        var popupWidth = 800;
        var popupHeight = 500;

        var leftPosition = (screenWidth - popupWidth) / 2;
        var topPosition = (screenHeight - popupHeight) / 2;
        var logName = "<?php echo $_SESSION['uname']; ?>"; // PHP session variable for logged-in username

    var popup = window.open("edit_members.php?id=" + jobId + "&logname=" + logName, "DateInputWindow", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftPosition + ",top=" + topPosition);

        if (popup) {
            popup.focus();
        } else {
            alert('Please allow pop-ups to enter the date.');
        }
    }

    function deletemember(jobId) {
        if (confirm("Are you sure you want to delete this member?")) {
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;
        var popupWidth = 800;
        var popupHeight = 500;

        var leftPosition = (screenWidth - popupWidth) / 2;
        var topPosition = (screenHeight - popupHeight) / 2;
        var logName = "<?php echo $_SESSION['uname']; ?>"; // PHP session variable for logged-in username

    var popup = window.open("delete_member.php?id=" + jobId , "DateInputWindow", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftPosition + ",top=" + topPosition);

        if (popup) {
            popup.focus();
        } else {
            alert('Please allow pop-ups to enter the date.');
        }
    }
}
</script>
<!-- Add this in your HTML head section -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Function to filter items based on the initial letter of company names
        function filterByInitialLetter(selectedGroup) {
            // Hide all members initially
            $('.col-xl-4').hide();

            // Show only members with company names starting with the selected letter
            $('.col-xl-4').each(function () {
                var companyName = $(this).find('.text-muted.font-13:eq(2) span').text();
                if (selectedGroup === 'See All' || (companyName && companyName.trim().toUpperCase().startsWith(selectedGroup))) {
                    $(this).show();
                }
            });
        }

        // Click event handler for filter buttons
        $('.btn_a').click(function () {
            var selectedGroup = $(this).data('group');
            filterByInitialLetter(selectedGroup);
        });

        // Function to filter items based on search input
        function filterItems(searchText) {
            // Hide all items initially
            $('.col-xl-4').hide();

            // Show only items that match the search input
            $('.col-xl-4').each(function () {
                var itemText = $(this).text().toLowerCase();
                if (searchText === '' || itemText.includes(searchText.toLowerCase())) {
                    $(this).show();
                }
            });
        }

        // Handle keyup event on the search input
        $('#searchInput').keyup(function () {
            var searchText = $(this).val();
            filterItems(searchText);
        });

        // Event handler for "See All" button
        $('.btn_a[data-group="See All"]').click(function () {
            // Clear search input
            $('#searchInput').val('');
            // Show all items
            $('.col-xl-4').show();
        });
    });
</script>


                <?php
   include('footer.php');
   ?>