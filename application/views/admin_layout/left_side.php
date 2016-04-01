 <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="image" style="text-align:center; margin-bottom:10px; margin-top:10px;">
                        	 <?php
                            
							if($data_user['user_img']==""){
								$img = base_url()."assets/images/user/default.jpg";
							}else{
								$img = base_url()."assets/images/user/".$data_user['user_img'];
							}
							?>
                            <img src="<?= $img ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="info" style="text-align:center;">
                            <p style="color:#a0acbf; ">
                                        <?php
                                       
                                        echo "Welcome, ".$data_user['user_username'];
                                        ?>
                                </p>

                            <a style="color:#a0acbf;  "><?= $data_user['user_type_name']?></a>
                        </div>
                    </div>
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                   <?php //if(isset($_SESSION['menu_active'])) { echo $_SESSION['menu_active']; }?>
                    <ul class="sidebar-menu">
                  
                   <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Homepage</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= site_url() ?>admin_home_about"><i class="fa fa-list-alt"></i>About</a></li> 
                                <li><a href="<?= site_url() ?>admin_home_gallery"><i class="fa fa-list-alt"></i>Gallery</a></li>
                                <li><a href="<?= site_url() ?>admin_home_features"><i class="fa fa-list-alt"></i>Features</a></li>
                                <li><a href="<?= site_url() ?>admin_home_how"><i class="fa fa-list-alt"></i>How it works</a></li>
                                <li><a href="<?= site_url() ?>admin_our_products"><i class="fa fa-list-alt"></i>Our Products</a></li>
                                
                            </ul>
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_bank') ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Bank</span>
                               
                            </a>
                            
                  </li>
                 
                 <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_product') ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Products</span>
                               
                            </a>
                            
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_payment_method') ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Payment Method</span>
                               
                            </a>
                            
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_rate') ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Rate</span>
                               
                            </a>
                            
                  </li>
                  
                  
                  
                   <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_instant_mining') ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Instant Mining</span>
                               
                            </a>
                            
                  </li>
                  
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_transaction') ?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Transactions</span>
                               
                            </a>
                            
                  </li>
               
                 
                  <li <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 8){ echo "class='active'"; } ?>>
                            <a href="<?= site_url('admin_member') ?>">
                                <i class="fa fa-users"></i>
                                <span>Member</span>
                               
                            </a>
                            
                  </li>
                  
                  <li class="treeview <?php if(isset($_SESSION['menu_active']) && $_SESSION['menu_active'] == 1){ echo "active"; }?>">
                            <a href="#">
                                <i class="fa fa-list-alt"></i>
                                <span>Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?= site_url() ?>admin_limit_transfer"><i class="fa fa-list-alt"></i>Limit transfer</a></li> 
                             
                                
                            </ul>
                  </li>
               
            
              
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>