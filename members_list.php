<?php
// include('connection.php');
include('header.php');
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
    color:#fff;
}
.btn-primary {
    background-color: #4dbe81;
    border: 1px solid;
    border-color: #d3d0d0;
}
.btn-primary:hover {
    background-color: #705dc8;
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
.search_padding{
padding:10px;
}
.search_padding input{
padding:5px;
font-size:14px;
border:1px solid #808080c2;
}
p{
    text-transform:capitalize;
}
.hidden {
    display: none;
}
</style>   
    <!--==========================-->
        <!--=         Banner         =-->
        <!--==========================-->
        <section id="page-title-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 m-auto text-center">
                        <div class="page-title-content">
                            <h1 class="h2">Hostia Members Profile  </h1>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>

         <!--=================================-->
        <!--=         Upcoming Event        =-->
        <!--=================================-->
        <section id="page-content-wrap">
            <div class=" section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 m-auto">
                        <div class="row">
                            <div class="col-md-9 filters-group">
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
                            
                            <div class="col-md-3 search_padding">
                                <label> Search </label>
                            <input type="search" class="form-control my-1 my-md-0" id="searchInput" placeholder="">
                            
                            </div>
                        </div>
                        <div class="team-boxed">
        <div class="">
       
            <div class="row ">
            <?php
                                
                                $selquery = "SELECT * FROM members WHERE id NOT IN (1, 2)";
                                        
        
                                $result=mysqli_query($db,$selquery);
                                while ($db_field2 = mysqli_fetch_array($result)) {
                                    ?>
                                <div class="col-md-6 col-lg-4 item" data-group="<?php echo strtoupper(substr($db_field2["company_name"], 0, 1)); ?>">
                                    <div class="box1">
                                    <?php if ($db_field2['profile_picture'] != null) { ?>
                                                      <!-- Display the image when profile_picture exists -->
                                                      <img src="members/<?php echo $db_field2['profile_picture']; ?>" class="rounded-circle" alt="profile-image">
                                                      
                                                   <?php } else { ?>
                                                      
                                                      <img src="assets/person.jpg" class="rounded-circle" alt="profile-image">
                                                   <?php } ?>
                                        
                                    <h5 class="name">ID : <?php echo $db_field2["members_id"]?></h5>
                                    <p class="title">Region : <?php echo $db_field2["area"]?></p>
                                    <p class="title"><?php echo $db_field2["company_name"]?></p>
                                    <p class="title"><?php echo $db_field2["category"]?></p>
                                        <h5 class="name_mem"><?php echo $db_field2["name"]?></h5>
                                        <p class="position"><?php echo $db_field2["position"]?></p>
                                        <!-- style="display:none;" -->
                                        <div class="hidden"> 
                                        <p class="hidden"><?php echo $db_field2["address"]?></p>
                                        <p class="hidden"><?php echo $db_field2["email"]?></p>
                                        <p class="hidden"><?php echo $db_field2["mobile"]?></p>
                                        <p class="hidden"><?php echo $db_field2["about"]?></p>
                                        <p class="hidden"><?php echo $db_field2["facilities"]?></p>
                                        <p class="hidden"><?php echo $db_field2["process"]?></p>
                                        <p class="hidden"><?php echo $db_field2["product"]?></p>
                                        </div>
                                       
                                      
                                        <!-- <p class="description"><?php echo $db_field2["address"]?> </p> -->
                                        <!-- <p><a href="<?php echo $db_field2["email"]?>"><?php echo $db_field2["email"]?></a></p> -->
                                    <a href="card/index.php?member_id=<?php echo base64_encode($db_field2["id"]);?>"  target="_blank"> <button class="view_more" ><span>View More </span></button></a>
                                        <!-- <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div> -->
                                    </div>
                                </div>
              
             
                <?php
                             }
                            ?>
            </div>
        </div>
    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

    

      <!-- Add this in your HTML head section -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Click event handler for filter buttons
        $('.btn_a').click(function () {
            var selectedGroup = $(this).data('group');

            // Hide all items initially
            $('.item').hide();

            // Show only items with data-group attribute matching the selected letter
            if (selectedGroup === 'See All') {
                $('.item').show(); // If "See All" is clicked, show all items
            } else {
                $('.item[data-group="' + selectedGroup + '"]').show(); // Show items matching the selected group
            }
        });

        // Function to filter items based on search input
        function filterItems(searchText) {
            // Hide all items initially
            $('.item').hide();

            // Show only items that match the search input
            $('.item').each(function () {
                var itemText = $(this).text().toLowerCase();
                if (itemText.includes(searchText.toLowerCase())) {
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
            $('.item').show();
        });
    });
</script>


  
 
        <?php
include('footer.php');
?>