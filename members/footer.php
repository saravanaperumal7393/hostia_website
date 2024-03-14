    <footer class="footer">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <script>document.write(new Date().getFullYear())</script> &copy; HOSTIA by <a href="#">Avatar Global Services</a> 
                            </div>
                           
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <!-- Vendor -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
        <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <!-- third party js -->
        <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <!-- knob plugin -->
        <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>

        <!--Morris Chart-->
        <script src="assets/libs/morris.js06/morris.min.js"></script>
        <script src="assets/libs/raphael/raphael.min.js"></script>
    
        <!-- Dashboar init js-->
        <script src="assets/js/pages/dashboard.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.min.js"></script>
        
       
  
        <!-- third party js ends -->

        <script>
            function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
        </script>
    
    <script>
        $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
          $("#files").on("change", function(e) {
            var files = e.target.files,
              filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
              var f = files[i]
              var fileReader = new FileReader();
              fileReader.onload = (function(e) {
                var file = e.target;
                $("<span class=\"pip\">" +
                  "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + "\" alt=\" File" + (file.name ? file.name : "") +"\"/>" +
                  "<br/><span class=\"remove\">Remove image</span>" +
                  "</span>").insertAfter("#files");
                $(".remove").click(function(){
                  $(this).parent(".pip").remove();
                });
                
                // Old code here
                /*$("<img></img>", {
                  class: "imageThumb",
                  src: e.target.result,
                  title: file.name + " | Click to remove"
                }).insertAfter("#files").click(function(){$(this).remove();});*/
                
              });
              fileReader.readAsDataURL(f);
            }
            console.log(files);
          });
        } else {
          alert("Your browser doesn't support to File API")
        }
      });
      
           </script>  
           <script>
          $(".toggle-password").click(function() {
          $(this).toggleClass("fa-eye fa-eye-slash");
          input = $(this).parent().find("input");
          if (input.attr("type") == "password") {
              input.attr("type", "text");
          } else {
              input.attr("type", "password");
          }
      });
           </script> 
  <script>
        $(document).ready(function () {
            // Set the value of Password to the default Password value
            var defaultPassword = $("#password").val();

            // Add event listener to Member ID input
            $("#member_id").on("input", function () {
                // Get the value of Member ID
                var memberId = $(this).val();

                // Concatenate Member ID with the default Password value
                var newPassword = defaultPassword + memberId;

                // Set the value of Password to the concatenated value
                $("#password").val(newPassword);
            });
        });
    </script>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// function checkUsername(member_id) {
  
//     $.ajax({
//         type: "POST",
//         url: "check_available.php",
//         data: { member_id: member_id },
//         success: function(response) {
//             if (response === 'exists') {
//                 $('#nameresult').text('Member ID already exists.');
//                 $('#available').text('');
//             } else {
//                 $('#nameresult').text('');
//                 $('#available').text('Member ID is available.');
//             }
//         }
//     });
// }


function checkUsername(member_id){
  var member_id = member_id;

 $.ajax({
        method:"POST",
        url: "check_available.php",
        data:{member_id:member_id},
        success: function(data){
          $('#available').html(data);
        }
      });
}

</script>

<script>
  $(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 200;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
</script>

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'about_cmpy' );
CKEDITOR.on( 'instanceReady', function( evt )
  {
    var editor = evt.editor;
   
   editor.on('change', function (e) { 
    var contentSpace = editor.ui.space('contents');
    var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
    var ckeditorFrame = ckeditorFrameCollection[0];
    var innerDoc = ckeditorFrame.contentDocument;
    var innerDocTextAreaHeight = $(innerDoc.body).height();
    console.log(innerDocTextAreaHeight);
    });
 });

</script>
<script>
  CKEDITOR.replace( 'email_content' );
CKEDITOR.on( 'instanceReady', function( evt )
  {
    var editor = evt.editor;
   
   editor.on('change', function (e) { 
    var contentSpace = editor.ui.space('contents');
    var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
    var ckeditorFrame = ckeditorFrameCollection[0];
    var innerDoc = ckeditorFrame.contentDocument;
    var innerDocTextAreaHeight = $(innerDoc.body).height();
    console.log(innerDocTextAreaHeight);
    });
 });

</script>

<script>
  CKEDITOR.replace( 'adt_msg' );
CKEDITOR.on( 'instanceReady', function( evt )
  {
    var editor = evt.editor;
   
   editor.on('change', function (e) { 
    var contentSpace = editor.ui.space('contents');
    var ckeditorFrameCollection = contentSpace.$.getElementsByTagName('iframe');
    var ckeditorFrame = ckeditorFrameCollection[0];
    var innerDoc = ckeditorFrame.contentDocument;
    var innerDocTextAreaHeight = $(innerDoc.body).height();
    console.log(innerDocTextAreaHeight);
    });
 });

</script>

    </body>


</html>