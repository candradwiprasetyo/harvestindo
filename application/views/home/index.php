
<!-- normal -->
<div class="topper">

            <div class="toppernumcontainer">
            
                    <div class="toptagline">
                        <div class="toptag">
                            Your Trustworthy Partner<br>
                                in<br>
                                    <span>Bitcoin Cloudmining</span><br><br>
                          
                        </div>
                    </div>

                    <style>
                        .toptag {
                            position:relative;
                            width:75%;
                            padding-right:25%;
                            margin:auto;
                            padding-top:100px;
                            font-size:2em;
                            color:#064e8c;
                            text-align:center;
                        }
                        .toptag span {
                            font-weight:bold;
                            font-size:2.4em;
                        }
                        .greenstuff {
                            position:relative;
                            width:5%;
                            height:16px;
                            margin:auto;
                            background-color:#a4cd3e;
                        }
                    </style>

                    
            </div>

            <div class="downarrow"><img src="<?= base_url() ?>/assets/images/downarrow.png" class="respimg"></div>
</div>


<!-- normal -->
<div class="whatishead" id="whatishead">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="text-align:right;">
                        <div class="whatislogo">
                                <img src="<?= base_url() ?>/assets/images/whatis_logo.png" class="respimg" style="text-align:center;">
                        </div>
                </div>
                
                <div class="col-md-5">
                        
                                
                                <?= $data_content['about'] ?>
                                
                                <a href="what-is-hashfield/index.html"><h2>Read More</h2><div class="rmstripe"></div></a>
                                
                                <div class="row">
                                <?php
							   foreach($list_gallery as $row_gallery): 
							   
							   ?>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <a href="<?= base_url() ?>assets/images/home_gallery/<?= $row_gallery['gallery_img']?>" rel="lightbox"><img src="<?= base_url() ?>assets/images/home_gallery/<?= $row_gallery['gallery_img']?>" class="respimg whatishead_img"></a>
                                        </div>
                                    </div>
                                 <?php 
			endforeach; 
			?>
                                                                  
                                </div>
                                
                                <a href="<?= site_url() ?>gallery">
                                    <div class="gallinkbtn">
                                        View Gallery
                                    </div>
                                </a>                            
                  </div>
                
            </div>
        </div>
</div>


<!-- normal -->
 
<div class="featuresbar">
            <img src="<?= base_url() ?>assets/images/features.png" class="respimg">
</div>

<div class="hexwrap">
			<?php
           foreach($list_features as $row_features): 
		   
		   ?>
            <div class="hexg">
                    <div class="hexgcontent" style="background: url('<?= base_url() ?>assets/images/home_features/<?= $row_features['feature_img']?>') no-repeat center 12%; background-size: 20% auto;">
                            <h3><?= $row_features['feature_name'] ?></h3>
                            <p><?= $row_features['feature_desc'] ?></p>
                    </div>
            </div>
            <?php 
			endforeach; 
			?>

            <div class="beehive">

            </div>
</div>




<div class="hiwwrap">
    <div class="container">
        <div class="title_new">HOW IT WORKS</div>
        	<div class="row">
            
            <div class="col-md-10 col-md-offset-2">
            <?php
           foreach($list_how as $row_how): 
		   
		   ?>
            	<div class="col-md-2 text_hitam">
                <img src="<?= base_url() ?>assets/images/home_how/<?= $row_how['data_img']?>" class="respimg">
                <p><?= $row_how['data_desc']?></p>
            </div>
             <?php 
			endforeach; 
			?>
          
            </div>
            
            </div>
        </div>
</div>


    <div class="hprodwrap" id="hprodwrap">
     	<div class="title_new2">OUR <strong>PRODUCTS</strong></div>
        
        <div class="hprods">
        <div class="col-md-12 col-md-offset-1">
        <?php
           foreach($list_our_products as $row_our_products): 
		   
		   ?>
       	 	<div class="col-md-3">
            	
                	<div class="form-group">
                    <div class="hprod">
                    <?php
                    $name_our = explode(" ", $row_our_products['data_name']);
					?>
                        <div class="r1"><?= $name_our[0]?></div>
                        <div class="r2"><?= $name_our[1] ?></div> 
                        <p><?= $row_our_products['data_desc'] ?></p>
                    </div>
                   
                </div>
            </div>
           <?php 
			endforeach; 
			?>
            </div>
            <div class="clearfix"></div>
            
            <a class="hprodmorelink" href="<?= site_url() ?>feature">
                <div class="hprodmore">
                    View Details
                </div>
            </a>
      
        </div>
        
    </div>

  


<div class="hshop" id="hshop">
<div class="container">
        <div class="title_new" style="margin-bottom:50px;">SHOP NOW</div>
        
        
        	<div class="col-md-9 col-md-offset-2">
           
            <?php
			//for($i=1; $i<=12; $i++){
           foreach($list_products as $row_products): 
		   ?>
            <a href="<?= site_url() ?>product_view/view/<?= $row_products['product_id'] ?>">
                <div class="col-md-3">
                        <div class="form-group">
                        <img src="<?= base_url() ?>assets/images/products/<?= $row_products['product_img'] ?>" class="respimg">
                        <h2><?= $row_products['product_name'] ?></h2>
                        </div>
                   
                </div>
            </a>
          	<?php
			
			endforeach;
			//}
		  	?>
          	</div>
            <div class="clearfix"></div>
            
            <a class="shoplink" href="<?= site_url() ?>shop_now">
                <div class="shoplinkbtn">
                    VIEW MORE
                </div>
            </a>
            <div class="clearfix"></div>
        
   </div>
</div>

   
