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
                                         <label>Bank Name</label>
                                    <input required type="text" name="i_bank_name" class="form-control" placeholder="" value="<?= @$data['bank_name'] ?>" title="Fill bank name"/>
                                			</div>
                                            
                                             <div class="form-group">
                                         <label>Bank Account Name</label>
                                    <input required type="text" name="i_bank_account_name" class="form-control" placeholder="" value="<?= @$data['bank_account_name'] ?>" title="Fill bank account name"/>
                                			</div>
                                            
                                             <div class="form-group">
                                         <label>Bank Account Number</label>
                                    <input required type="text" name="i_bank_account_number" class="form-control" placeholder="" value="<?= @$data['bank_account_number'] ?>" title="Fill bank account number"/>
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