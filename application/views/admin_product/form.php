<!-- Content Header (Page header) -->
        
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                            <div class="title_page"> <?= $data_head['title'] ?></div>
                            

                             <form  class="cmxform" id="createForm" action="<?= $data_head['action']?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                      
                                       
                                        <div class="col-md-9">
                                      
                                      
                                         <div class="form-group">
                                         <label>Name</label>
                                    <input required type="text" name="i_name" class="form-control" placeholder="product name" value="<?= @$data['product_name'] ?>" title="Fill product name"/>
                                			</div>
                                        
                                         <div class="form-group">
                                         <label>Price</label>
                                    <input required type="text" name="i_price" class="form-control" placeholder="product price" value="<?= @$data['product_price'] ?>" title="Fill product price"/>
                                			</div>
                                        
                                         <div class="form-group">
                                            <label>Description</label>
                                           <textarea id="editor" name="editor" rows="10" cols="80">
                                            <?php
                                            echo @$data['product_desc']
                                            ?>
                                        </textarea>
                                        </div>
                                      
                                      	
                                         <div class="form-group">
                                         <label>Hashrate</label>
                                    <input required type="text" name="i_hashrate" class="form-control" placeholder="hashrate" value="<?= @$data['hashrate'] ?>" title="Fill product hashrate"/>
                                			</div>
                                            
                                            <div class="form-group">
                                         <label>Power efficiency</label>
                                    <input required type="text" name="i_power_efficiency" class="form-control" placeholder="power efficiency" value="<?= @$data['power_efficiency'] ?>" title="Fill product power efficiency"/>
                                			</div>
                                            
                                            
                                            <div class="form-group">
                                         <label>Asic processor</label>
                                    <input required type="text" name="i_asic_processor" class="form-control" placeholder="asic processor" value="<?= @$data['asic_processor'] ?>" title="Fill product asic processor"/>
                                			</div>
                                            
                                            <div class="form-group">
                                         <label>Working environment</label>
                                    <input required type="text" name="i_working_environment" class="form-control" placeholder="working environment" value="<?= @$data['working_environment'] ?>" title="Fill product working environment"/>
                                			</div>
                                            
                                            <div class="form-group">
                                         <label>Transport / storage_environment</label>
                                    <input required type="text" name="i_transport_storage_environment" class="form-control" placeholder="transport / storage environment" value="<?= @$data['transport_storage_environment'] ?>" title="Fill product transport / storage environment"/>
                                			</div>
                                 
                                            <div class="form-group">
                                         <label>Dimensions</label>
                                    <input required type="text" name="i_dimensions" class="form-control" placeholder="dimensions" value="<?= @$data['dimensions'] ?>" title="Fill product dimensions"/>
                                			</div>
                                            
                                            <div class="form-group">
                                         <label>Weight</label>
                                    <input required type="text" name="i_weight" class="form-control" placeholder="weight" value="<?= @$data['weight'] ?>" title="Fill product weight"/>
                                			</div>
                                            
                                            <div class="form-group">
                                         <label>Controller</label>
                                    <textarea id="editor2" name="i_controller" rows="10" cols="80">
                                            <?php
                                            echo @$data['controller']
                                            ?>
                                        </textarea>
                                        		</div>
                                            
                                            <div class="form-group">
                                         <label>Performance variant</label>
                                    <input required type="text" name="i_performance_variant" class="form-control" placeholder="performance variant" value="<?= @$data['performance_variant'] ?>" title="Fill product performance variant"/>
                                			</div>
           
                                            <div class="form-group">
                                         <label>Power supply interface</label>
                                    <input required type="text" name="i_power_supply_interface" class="form-control" placeholder="power supply interface" value="<?= @$data['power_supply_interface'] ?>" title="Fill product power supply interface"/>
                                			</div>

                                            <div class="form-group">
                                         <label>Power Requirements</label>
                                    <input required type="text" name="i_power_requirements" class="form-control" placeholder="power_requirements" value="<?= @$data['power_requirements'] ?>" title="Fill product power requirements"/>
                                			</div>
                                 
                                        
                                        </div>
                                      
                                        
 										<div class="col-md-3">
                                          <div class="form-group">
                                         <label>Images</label>
                                         <?php
                                        if($data['row_id']){
										?>
                                        <br />
                                        <img src="<?= base_url(); ?>assets/images/products/<?= $data['product_img']?>" style="width:100%;"/>
                                        <?php
										}
										?>
                                           <input type="file" name="i_img" id="i_img" <?php if(!$data['row_id']){ echo " required "; } ?>title="fill product img" />
                                        </div>
                                    
                                      
                                        </div>
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Save"/>
                                <a href="<?= $data_head['close_button']?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
               
                </section><!-- /.content -->