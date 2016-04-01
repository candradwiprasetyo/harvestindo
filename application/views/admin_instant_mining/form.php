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
                                    
                      
                                       
                                        <div class="col-md-12">
                                      
                                      
                                         <div class="form-group">
                                         <label>Name</label>
                                    <input required type="text" name="i_name" class="form-control" placeholder="Name" value="<?= @$data['im_name'] ?>" title="Fill name"/>
                                			</div>
                                            
                                        <div class="form-group">
                                        <label>Subname</label>
                                    <input required type="text" name="i_subname" class="form-control" placeholder="Subname" value="<?= @$data['im_subname'] ?>" title="Fill subname"/>
                                		</div>
                                        
                                        <div class="form-group">
                                        <label>Remaining</label>
                                    <input required type="text" name="i_remaining" class="form-control" placeholder="Remaining" value="<?= @$data['im_remaining'] ?>" title="Fill remaining"/>
                                		</div>
                                           
                                      <div class="form-group">
                                        <label>Maintenance Fee</label>
                                    <input required type="text" name="i_maintenance_fee" class="form-control" placeholder="Maintenance Fee" value="<?= @$data['im_maintenance_fee'] ?>" title="Fill maintenance fee"/>
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