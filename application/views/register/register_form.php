<div class="container">
		<div class="container_page">
        <div class="row">
			<div class="title_new" style="margin-bottom:10px;">Register </div>

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
                                            	<div class="message_error">The username is already taken. Please use another username</div>
                                            	<?php
												}else if(isset($_GET['did']) && $_GET['did'] == 1){
												?>
                                            	<div class="message_did">Register success</div>
                                            	<?php
												}
												
												?>
                                        </div>
                                
                                      
                                        
                                        <div class="col-md-4 col-md-offset-4">
                                         	

                                         
                                             
                                                  <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
                                                
                                                    <div class="col-md-10">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_first_name" class="form-control" placeholder="First Name" value="" title=""/>
                                                            <input id="t_sign_up3" name="t_sign_up3" type="hidden" value="2" style="color:#000"/>
                                                            </div>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input required type="text" name="i_last_name" class="form-control" placeholder="Last Name" value="" title=""/>
                                                        </div>
                                                    </div>
                                               
                                                    <div class="col-md-10">
                                                            <div class="form-group">
                                                            <input required type="text" name="i_email" class="form-control" placeholder="Email Address" value="" title=""/>
                                                            </div>
                                                    </div>
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
                                                    
                                                  
                                                    
                                                  
                                                    
                                                  
                                                
                                                    <div class="col-md-11">
                                                       
                                                        <div class="form-group">
                                                            <input class="btn button_signup" type="submit" value="SIGN UP"/>
                                                        </div>
                                                    </div>
                                                
                                                  
                                                
                                                </form>
                                        	

 												
                                            
                                            </div>
                                            
                                      
</div>
</div>
</div>