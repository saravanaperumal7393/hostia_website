<?php
   
   include('header.php');
   include('sidebar.php');
   
   ?>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <style>
.header-title{
    margin: 0 0 7px 0;
    color: #009845;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 18px;
    padding: 10px 0px;
}
table th{
    padding:5px!important;
    text-align:center;
}
table td{
   
    text-align:center;
}
.avatar-xl {
    height: 3rem;
    width: 3rem;
}
.card{
    display: flex;
}

@media(max-width:991px){
    .card{
    display: inline-flex;
}
}

@media(max-width:1024px){
    .card{
    display: inline-flex;
}
}

select {
  box-sizing: border-box;
  background-clip: padding-box;
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: auto;
  line-height: 1.4286;
  padding: 10px 24px 10px 10px;
  font-size: 14px;
  border: 0;
  background: #FFF no-repeat right center url('https://cdn3.iconfinder.com/data/icons/google-material-design-icons/48/ic_keyboard_arrow_down_48px-24.png');
  background-size: 24px;
  border: 1px solid #666;
  border-width: 1px 1px 2px;
  color: #666;
  border-radius: 5px;
}

select::-ms-expand {
  display: none
}

.tri-state-toggle {
        background: rgba(165, 170, 174, 0.25);
        box-shadow: inset 0 2px 8px 0 rgba(165, 170, 174, 0.25);
        border-radius: 24px;
        display: inline-flex;
        transition: all 500ms ease;
    }

    .tri-state-toggle-button {
        border-radius: 22px;
        height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100px; /* Adjust the width as needed */
        background-color: transparent;
        border: 0px solid transparent;
        margin: 2px;
        color: #727C8F;
        cursor: pointer;
        transition: all 0.5s ease;
    }

   

    .tri-state-toggle-button:focus {
        outline: none;
    }
    .tri-state-toggle-button.pending-button.active {
    background-image: linear-gradient(-180deg, #fff 0%, #FAFAFA 81%, #F2F2F2 100%);
    border: 1px solid rgba(207,207,207,0.6);
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.1);
    color: #6744B1;
    font-weight: 500;
    transition: all .5s ease-in;
    width: 100px;
}

.tri-state-toggle-button.accepted-button.active {
    background-color: green;
    color:#fff;
    /* Add other styles for the active state of Accepted button */
}

.tri-state-toggle-button.rejected-button.active {
    background-color: red;
    color:#fff;
}

.tri-state-toggle-button:focus {
  outline: none;
}
</style>
 
 <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row justify-content-between">
                                            <div class="col-md-4">
                                            <h4 class="mt-0 header-title">Members Post Request </h4>
                                            </div><!-- end col-->
                                            <div class="col-md-8">
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
                        <div class="row" style="overflow:auto;">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                    <div class="" style="margin-bottom: 10px;">
                                     <button type="button" class="btn btn-danger" id="deleteSelected" style="background:red;"> <i class="fa fa-trash-o"></i>&nbsp; Delete Selected</button>
                                    </div>
                                       
    
                                        <table id="datatable" class="table table-bordered dt-responsive table-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>Member id</th>
                                                <th>Name</th>
                                                <!-- <th>DP</th> -->
                                                <th>Company Name</th>
                                                <th>Posts</th>
                                                <th>Content</th>
                                                <th>ADT Status</th>
                                                <!-- colspan="2" -->
                                                <th >Action</th>
                                            </tr>
                                            </thead>
    
    
                                            <tbody>
                                            <?php
                           
                              
                                // Initialize the SQL query
                                $sql2 = "SELECT * FROM member_post 
                                WHERE register_value != 'new' 
                                AND cus_date >= DATE_SUB(NOW(), INTERVAL 7 DAY)
                                ORDER BY id DESC";

                              
                                    $result2=mysqli_query($db,$sql2);
                                    $num=1;
                                    while ($db_field2 = mysqli_fetch_array($result2)) {
                                        
                                        $members_id_no = $db_field2["id"];
                                        $rowId = $db_field2["id"];
                                        $member_table_id = $db_field2["member_table_id"];
                                        $fileLinks = explode("\n", $db_field2["file"]);
                                
                                        ?>  
                                            <tr>
                                                <td><input type="checkbox" class="custom-control-input m-0" id="customCheck<?php echo $db_field2["id"] ?>" value="<?php echo $db_field2["id"] ?>"></td>
                                                <td style=" padding:15px!important;"><?php echo $db_field2["member_id"] ?></td>
                                                <td style="text-align:left; text-transform:capitalize; padding:5px!important;min-width: 150px;" width="15%">
                                                <?php
                                                        $members_name_query = "SELECT * FROM members WHERE id='$member_table_id'";
                                                                $result_members = mysqli_query($db, $members_name_query);

                                                                if ($result_members) {
                                                                    $member_data = mysqli_fetch_assoc($result_members);

                                                                    if ($member_data) {
                                                                        // Assuming 'members' is a column in your 'members' table
                                                                        
                                                                        $profile_picture = $member_data['profile_picture'];
                                                                        // $lname = $member_data['lname'];
                                                                        if (!empty($profile_picture)) {
                                                                        ?>
                                                                        <img src="<?php echo $profile_picture; ?>" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                                                        <?php } else {?>
                                                                        <img src="assets/person.jpg" class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">
                                                                        <?php }}}?>&nbsp;<?php echo $db_field2["name"] ?>
                                              </td>
                                                <!-- <td></td> -->
                                                <td style=" padding:15px!important;"><?php echo $db_field2["company_name"] ?></td>
                                                
                                                <td style="min-width: 100px;">                                         
                                                    <?php if(!empty($db_field2["file"]))  {   
                                                        foreach ($fileLinks as $fileLink) { ?>
                                                            <a href="<?php echo $fileLink; ?>" target="_blank">ADT Link</a><br>
                                                    <?php } 
                                                    } else { ?>
                                                        <p style="color:red;">No Files</p>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align:left;" >
                                             
                                                <span class="more">
                                                <?php echo $db_field2["content"] ?>
                                                </span>
                                            </td>
                                                <form id="statusForm<?php echo $rowId; ?>" action="process_page.php" method="post">
                                                    <td>
                                                        <?php
                                                        // Assuming $db_status contains the status fetched from the database
                                                        $db_status = $db_field2["post_status"]; // Replace this line with your actual database query

                                                        // Set the initial state based on the fetched value
                                                        $pendingClass = ($db_status === "Pending") ? "active" : "";
                                                        $acceptedClass = ($db_status === "Accepted") ? "active" : "";
                                                        $rejectedClass = ($db_status === "Rejected") ? "active" : "";
                                                        ?>
                                                        <div class="tri-state-toggle" data-toggle-id="<?php echo $rowId; ?>">
                                                            <button type="button" class="tri-state-toggle-button pending-button <?php echo $pendingClass; ?>" id="toggle-button1-<?php echo $rowId; ?>" value="Pending">Pending</button>
                                                            <button type="button" class="tri-state-toggle-button accepted-button <?php echo $acceptedClass; ?>" id="toggle-button2-<?php echo $rowId; ?>" value="Accepted">Accepted</button>
                                                            <button type="button" class="tri-state-toggle-button rejected-button <?php echo $rejectedClass; ?>" id="toggle-button3-<?php echo $rowId; ?>" value="Rejected">Rejected</button>
                                                        </div>
                                                        <input type="hidden" name="post_status" id="status<?php echo $rowId; ?>" value="<?php echo $db_status; ?>">
                                                        <input type="hidden" name="id" value="<?php echo $rowId; ?>">
                                                    </td>
                                                </form>





                                                     <!-- <select name="adt_status" id="adt_status">
                                                        <option value="Processing">Approved</option>
                                                        <option value="Pending">Pending</option>
                                                        
                                                        
                                                        </select>  -->
                                                    <!-- </td> -->
                                        <!-- <td width="6%" align="center" valign="middle" bgcolor="#FFFFFF" style=" padding:5px!important;">
                                                <a class="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="javascript:void(0);" onclick="openmemberpopup( <?php echo $db_field2['id'];?>)">
                                                <img src="assets/images/edit_icon_1.png"  width="35" alt="">
                                                        </a> 
                                               
                                        </td>-->
                                        
                                        <td width="11%" align="center" valign="middle" bgcolor="#FFFFFF">
                                        <form action="delete_job.php?<?php $db_field2["id"]?>" method="post">
                                                        <input type="hidden" name="id" value="<?php echo $db_field2['id']; ?>">
                                                        
                                                        <button type="submit" class="badge bg-danger" style="border:none;"  name="delete_job" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                            </form>
                                        </td> 
                                            </tr>
                                    <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                        <!-- end row -->

                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                        <script>
                               function openmemberpopup(jobId) {
        var screenWidth = window.screen.width;
        var screenHeight = window.screen.height;
        var popupWidth = 800;
        var popupHeight = 500;

        var leftPosition = (screenWidth - popupWidth) / 2;
        var topPosition = (screenHeight - popupHeight) / 2;
        var logName = "<?php echo $_SESSION['uname']; ?>"; // PHP session variable for logged-in username

    var popup = window.open("admin_post_edit.php?id="+ jobId , "DateInputWindow", "width=" + popupWidth + ",height=" + popupHeight + ",left=" + leftPosition + ",top=" + topPosition);

        if (popup) {
            popup.focus();
        } else {
            alert('Please allow pop-ups to enter the date.');
        }
    }
   $(document).ready(function () {
    // Function to filter table rows based on search input
    function filterItems(searchText) {
        // Hide all table rows initially
        $('#datatable tbody tr').hide();

        // Show only table rows that match the search input
        $('#datatable tbody tr').each(function () {
            var rowText = $(this).text().toLowerCase();
            if (rowText.includes(searchText.toLowerCase())) {
                $(this).show();
            }
        });
    }

    // Handle keyup event on the search input
    $('#searchInput').keyup(function () {
        var searchText = $(this).val();
        filterItems(searchText);
    });

    // Handle initial filtering if needed
    // filterItems(''); // Uncomment this line if you want to filter initially
});

</script>
<script>
    $(document).ready(function() {
        // Delete selected records when the delete button is clicked
        $('#deleteSelected').click(function() {
            var selectedIDs = [];
            
            // Loop through checked checkboxes to collect IDs
            $('input[type=checkbox]:checked').each(function() {
                // Extract the ID from checkbox value
                var id = $(this).val();
                selectedIDs.push(id);
            });
            
            // Perform deletion via AJAX
            $.ajax({
                type: 'POST',
                url: 'iteration_delete_multiple_jobs.php',
                data: {
                    selectedIDs: selectedIDs
                },
                success: function(response) {
                    // Handle success message or refresh the page
                    alert('Selected jobs deleted successfully');
                    window.location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle error
                    alert('Error deleting jobs');
                }
            });
        });
    });

    
</script>       
<script>
    $(document).ready(function () {
        // Set the initial state for each row
        $(".tri-state-toggle").each(function () {
            var rowId = $(this).data("toggle-id");
            var dbStatus = $("#status" + rowId).val(); // Get the value from the hidden input
            $("#toggle-button1-" + rowId).addClass(dbStatus === "" ? "active" : "");
        });

        // Handle button click events
        $(".tri-state-toggle-button").click(function () {
            var rowId = $(this).parent().data("toggle-id");

            // Remove "active" class from all buttons in the current row
            $("#toggle-button1-" + rowId).removeClass("active");
            $("#toggle-button2-" + rowId).removeClass("active");
            $("#toggle-button3-" + rowId).removeClass("active");

            // Add "active" class to the clicked button
            $(this).addClass("active");

            // Update the hidden input and submit the form
            var hiddenInput = $("#status" + rowId);
            hiddenInput.val($(this).val());
            $("#statusForm" + rowId).submit(); // Submit the form
        });
    });
</script>



                        

    <?php
   include('footer.php');
   ?>