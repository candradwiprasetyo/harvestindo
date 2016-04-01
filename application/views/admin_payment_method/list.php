   <?php
                if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>
               
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                              <div class="title_page"> <?= $data_head['title'] ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">No</th>
                                                <th>Payment method</th>
                                                <th>Status</th>
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
										   $no = 1;
										   foreach($list as $row): ?>
                                            <tr>
                                                <td><?= $no?></td>
                                              
                                                <td><?= $row['payment_method_name']?></td>
                                               <td><?= ($row['payment_method_status'] == 1) ? "Active" : "Non Active"; ?></td>
                                                <td style="text-align:center;">
                                                <?php
                                                if($row['payment_method_status'] == 1){
												?>
												<a href="<?= site_url() ?>admin_payment_method/disable/<?= $row['payment_method_id']?>" class="btn btn-default" >Disable</a>
												<?php
												}else{
												?>
	
                                                    <a href="<?= site_url() ?>admin_payment_method/enable/<?= $row['payment_method_id']?>" class="btn btn-default" >Enable</a>
                                            	<?php
												}
												?>

                                                </td> 
                                            </tr>
                                           <?php 
										   $no++;
										   endforeach; 
										   ?>
                                            

                                           
                                          
                                        </tbody>
                                          <!--<tfoot>
                                            <tr>
                                                <td colspan="4"><a href="<?= $data_head['add_button'] ?>" class="btn btn-success " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                        -->
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->