<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link href="<?= base_url('assets/images/favicon.ico') ?>" type="image/x-icon" rel="shortcut icon">
    <title><?= ucwords($data['title']) ?></title>

   
    <script src="<?= base_url('assets/js/bootstrap/jquery.js') ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap/bootstrap.min.js') ?>"></script>

    <link href="<?= base_url('assets/css/genericons-ver=3.0.3.css') ?>" rel="stylesheet">
    
    <link href="<?= base_url('assets/css/style-ver=4.3.1.css') ?>" rel="stylesheet">
    
    <link href="<?= base_url('assets/css/lightbox.min-ver=1.4.6.css') ?>" rel="stylesheet">
    
    <script type='text/javascript' src='<?= base_url('assets/js/jquery.js?ver=1.11.3') ?>'></script>
    
    <script type='text/javascript' src='<?= base_url('assets/js/jquery-migrate.min.js?ver=1.2.1') ?>'></script>
    
    <link href="<?= base_url('assets/css/nouislider/nouislider.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/nouislider/nouislider.pips.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/nouislider/nouislider.tooltips.css') ?>" rel="stylesheet">
    
    <link href="<?= base_url('assets/css/bootstrap/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap/bootstrap-theme.min.css') ?>" rel="stylesheet">
    
     <!-- core CSS -->
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    
     <link href="<?= base_url('assets/admin/css/font-awesome.min.css') ?>" rel="stylesheet">
    
  </head>

  <body>
  
  
  <div class="">
   
    <div class="navbar navbar-default" style="background:#B4CE53">
      
          
          <div class="" style="margin-top:0px;">
            <ul class="nav navbar-nav">
               <?php
             $this->load->view('layout/navbar'); 
			 ?>
              <?php
if($this->session->userdata('hash_logged')){
?>
              <div class="toprightmenu"><a href="javascript:void();" id="openusermenu"><img src="<?= base_url() ?>assets/images/toprightmenu.png" class="respimg"></a></div>
              <?php
}
			  ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
     
   
</div>


            <div class="navbar navbar-default">
                    <div class="container padding-container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                   
                            <a class="navbar-brand" href="<?= site_url() ?>"><img src="<?= base_url() ?>assets/images/logo.png" width="250"></a>
                        </div>
                        <div class="navbar-collapse collapse menuwrap">
                                <ul class="group navbar-nav" id="menugroup">
                                    
                                    <li class="current_page_item"><a  href="#" id="gotowhatis" >What is Hashfield</a></li>
                                    <li><a  href="#" id="gotohprod" >Our Products</a></li>
                                    <li><a href="<?= site_url() ?>referral_program">Referral Program</a></li>
                                    <li><a  href="#" id="gotohshop">Shop Now</a></li>
                                    <li><a href="<?= site_url() ?>faq">FAQ</a></li>
                                    <li><a  href="<?= site_url() ?>myaccount">My Account</a></li>
                                   
                                 </ul>
                        </div>
					</div>
            </div>

<br>


<?php
if($this->session->userdata('hash_logged')){
?>
<div class="usermenu">
                            <ul>
                                    <li>Hello, <?= $data_user['user_first_name']?></li>
                                    <li><a href="<?= site_url() ?>myaccount">DASHBOARD</a></li>
                                     <?php if($this->access->get_cart($this->session->userdata('hash_user_id')) > 0){ ?><li><a href="<?= site_url() ?>payment">MY CART</a></li><?php } ?>
                                    <li><a href="<?= site_url() ?>myaccount/logout">LOGOUT</a></li>
                            </ul>
                    </div>
<?php
}
?>