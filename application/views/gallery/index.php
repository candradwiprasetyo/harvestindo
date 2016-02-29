
<div class="container">
        <div class="title_new" style="margin-bottom:50px;">HOW IT WORKS</div>
        
                       <div class="col-md-11 col-md-offset-1">         
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
                       </div>
		</div>
</div>
<div style="height:50px;"></div>