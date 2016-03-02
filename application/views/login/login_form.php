<div class="container">
		<div class="container_page">
			<div class="title_new" style="margin-bottom:10px;">LOGIN </div>
            
            
            <div class="col-md-4  col-md-offset-4">
        	<div class="new_login_page">
            
            
             <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                      
                                        
                                        <div class="form-group">
                                           		<?php
                                                if($message){
												?>
                                            	<div class="message_error"><?= $message ?></div>
                                            	<?php
												}else if(isset($_GET['err']) && $_GET['err'] == 1){
												?>
                                            	<div class="message_error">Wrong username or password. Please try again !</div>
                                            	<?php
												}else if(isset($_GET['err']) && $_GET['err'] == 2){
												?>
                                            	<div class="message_error">The username is already taken</div>
                                            	<?php
												}
												else if(isset($_GET['err']) && $_GET['err'] == 3){
												?>
                                            	<div class="message_error">Wrong captcha ! Please try again</div>
                                            	<?php
												}else if(isset($_GET['did']) && $_GET['did'] == 1){
                                                ?>
                                                <div class="message">Signup success. Please login here </div>
                                                <?php
                                                }
												?>
                                        </div>
                                
                                       
                                        
                                        <form action="<?=site_url('login/submit_login')?>" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-10">
                                                    <div class="form-group">
                                                    <input required type="text" name="i_username" class="form-control" placeholder="Username" value="" title=""/>
                                                    </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <input required type="password" name="i_password" class="form-control" placeholder="Password" value="" title=""/>
                                                </div>
                                            </div>
                                        </div>
                                        <br />
                                        
                                        <div class="row">
                                            <div class="col-md-5">
                                                
                                                <div class="form-group">
                                                    <input class="btn button_signup" type="submit" value="LOG IN" />
                                                </div>
                                            </div>
                                        
                                            <div class="col-md-4">
                                                
                                                 <div class="form-group">
                                                     <a href="<?= site_url() ?>register" class="btn button_signup">SIGN UP</a>
                                                </div>
                                            </div>
                                        </div>
                                         </form>
                                         
                                   
                                
                                 </div>
                            
                            </div><!-- /.box -->
           
        </div>
        
        </div>
    </div>
            
      	</div>
</div>

