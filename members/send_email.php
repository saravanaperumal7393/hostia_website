
   
   <?php
   include('header.php');
   include('sidebar.php');
   ?>


<style>
    .afterline {
  text-align: center;
  max-width: 500px;
  margin:0 auto;
  padding:10px 0px;
}
    .monospace {
	 font-family: monospace;
	 text-transform: uppercase;
	 color: orange;
	 font-size: 14px;
}
 h1 {
	 margin: 0;
	 font-size: 20px;
	 color: darkorchid;
	 position: relative;
	 display: inline-block;
	 width: 100%;
     text-transform: uppercase;
}
textarea{
    width:80%; height:150px; padding:20px;box-shadow: 0px 3px 13px 6px #25292a38;
}
@media(max-width:991px){
    textarea{
    width:100%; height:150px; padding:20px;box-shadow: 0px 3px 13px 6px #25292a38;
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
                                            <div class="col-md-12">
                                            <div class="row">
                                                    <div class="col-lg-9 afterline">
                                                    <h1>
                                                        <span>Email To Members</span>
                                                    </h1>
                                                    
                                                    </div>
                                                </div>
                                               <form action="email_task.php" method="POST" enctype="multipart/form-data">
                                               <div class="row">
                                                <div class="col-lg-2 " > 
                                                            <div class="mb-3">
                                                            <label for="name" class="form-label">Attaching Image  :</label>
                                                                
                                                    
                                                            </div>
                                                </div>
                                                 <div class="col-lg-8"> 
                                                    <div class="mb-3">
                                                   
                                                    <!-- <textarea class="textarea form-control" id="adt_msg" name="adt_msg"  rows="5"  >
                                                   
                                                    </textarea> -->

                                                    <input type="file" name="image" id="files" class="form-control"/>
                                                
                                                    </div>
                                                </div>
                                                <div class="row">
                                                <div class="col-lg-2 " > 
                                                            <div class="mb-3">
                                                            <label for="name" class="form-label">Subject</label>
                                                                
                                                    
                                                            </div>
                                                </div>
                                                 <div class="col-lg-8"> 
                                                    <div class="mb-3">
                                                   
                                                    <!-- <textarea class="textarea form-control" id="adt_msg" name="adt_msg"  rows="5"  >
                                                   
                                                    </textarea> -->

                                                    <input type="text" name="subject" id="subject" class="form-control" value="Mail From HOSTIA WEBSITE">
                                                
                                                    </div>
                                                </div>
                                               <div class="row">
                                                <div class="col-lg-2 " > 
                                                            <div class="mb-3">
                                                            <label for="name" class="form-label">Email Content  :</label>
                                                                
                                                    
                                                            </div>
                                                </div>
                                                 <div class="col-lg-8"> 
                                                    <div class="mb-3">
                                            

                                                 <textarea name="email_content" cols="50" rows="3" class="style26" id="desc1" style=""></textarea>
                                                
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col-lg-12" style="margin: 0 auto;"> 
                                                    <div class="form-group">
						                           <input name="Submit" type="submit" class="btn btn-success" value="Submit" ></label></div>
						
						</div>
                                                    </div>
                                                
                                            </div>
                                           
                                                </form>
                                            </div><!-- end col-->
                                    
                                        </div> <!-- end row -->
                                    </div>
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                    

                        
                        
                        
            
                    </div> <!-- container-fluid -->

                </div> <!-- content -->
 



                <?php
   include('footer.php');
   ?>