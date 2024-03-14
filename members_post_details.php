<?php
include('header.php');
?>    
   

         <!--=================================-->
        <!--=         Upcoming Event        =-->
        <!--=================================-->
        <section id="page-content-wrap">
            <div class="about-page-content-wrap section-padding">
                <div class="container">
                    <div class="row about_us_ul">
                        <div class="col-lg-11 m-auto">
                            <!-- Single about text start -->
                            <div class="single-about-text">
                                <?php
                                    $id=$_GET['id'];
                                    
                                    $quer3  = "SELECT * FROM member_post where id= $id";
                                    //   echo $quer3;
                                    //   exit;
                                    $result1=mysqli_query($db,$quer3);
                                    while($db_field2 = mysqli_fetch_array($result1))
                                    {
                                        $file_img =$db_field2['file'];
                                if(empty($file_img)){
                                ?>

                                <p class="date_member" style="float:right;"><?php echo $db_field2['cus_date']; ?> </p>
                                <h2 style="text-align:center;" ><?php echo $db_field2['company_name']; ?></h2>
                                <p><?php echo $db_field2['content']; ?></p>
                                
                                <?php }else {?>
                                    <img src="members/<?php echo $db_field2['file']; ?>" alt="Member ADT" class="img-fluid img-left">
                                    <p class="date_member" style="float:right;"><?php echo $db_field2['cus_date']; ?> </p>
                                <h2 style="text-align:center;" ><?php echo $db_field2['company_name']; ?></h2>
                                <p><?php echo $db_field2['content']; ?></p>
                                    <?php }}?>
                            </div>
                            <!-- Single about text End -->

                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>

    

      

  
 
        <?php
include('footer.php');
?>