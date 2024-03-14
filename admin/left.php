<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li style="display: none">
                    <a href="manage_subcategory.php?cat_id=1&catname=PRODUCTS" <?php if($_REQUEST["cat_id"]=='1' or $_REQUEST["catid"]=='1'){?>class="active"<?php } ?>>
                        <i class="fa fa-shopping-bag"></i>
                        <span>MANAGE PRODUCTS </span>
                    </a>
                </li>
				
                <li style="display: none">
                   <a href="add_pdf.php" <?php if($arr=='1'){?>class="active"<?php } ?>>
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span style="text-transform: uppercase;">Manage PDF </span>
                    </a>
                </li>

			      <li style="display: none">
                   <a href="product_new.php" <?php if($arr=='1'){?>class="active"<?php } ?>>
                        <i class="fa fa-picture-o" aria-hidden="true"></i>
                        <span style="text-transform: uppercase;">Manage New Arrivals </span>
                    </a>
                </li>
			
         
			     <li style="display: none">
                    <a href="date.php" <?php if($other=='1'){?>class="active"<?php } ?>>
                      <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <span style="text-transform: uppercase;">Customer List </span>
                    </a>
                </li>
				
				 <li >
                    <a href="admin1.php" <?php if($a1=='1'){?>class="active"<?php } ?>>
                        <i class="fa fa-flash"></i>
                        <span style="text-transform:uppercase;">MANAGE Advertisement</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="product_new.php" <?php if($a1=='1'){?>class="active"<?php } ?>>
                        <i class="fa fa-flash"></i>
                        <span>Add New Products</span>
                    </a>
                </li> -->
          
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>