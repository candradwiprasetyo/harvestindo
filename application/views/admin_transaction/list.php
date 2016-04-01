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
				else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Hapus Berhasil
                </div>
           
                </section>
                <?php
                }
				else if(isset($_GET['did']) && $_GET['did'] == 4){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Transaksi berhasil disetujui
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 5){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Gambar tidak ditampilkan
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
                                                <th>No.</th>
                                    
                                                <th>User</th>
                                                <th>Transaction type</th>
                                                <th>Payment method</th>
                                                <th>Date</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
										   $no = 1;
										   foreach($list as $row): ?>
                                            <tr>
                                               <td><?= $row['transaction_number'] ?></td>
                                                <td><?= $row['user_first_name']." (".$row['user_email'].")"?></td>
                                                <td><?= $row['transaction_type_name']?></td>
                                                <td><?= $row['payment_method_name'] ?></td>
                                                <td><?= $this->access->format_date($row['transaction_date']) ?></td>
                                                 <td><?= number_format($row['total_price'],0) ?></td>
                                                <td><?= $row['status_name'] ?></td>
                                               
                                                <td style="text-align:center;">
                                                <?php
                                                if($row['status_id']==1){
												?>
                                                
<a href="<?= site_url() ?>admin_transaction/approve/<?= $row['transaction_id']?>" class="btn btn-default" >Approve</a>
                                                <?php
												}
													?>
                                                 
                                                 <?php
                                                 if($row['transaction_type_id'] == 1){
												 ?>
                                                 <a href="<?= site_url() ?>admin_transaction/view_detail1/<?= $row['transaction_data_id']?>" class="btn btn-default" >View Detail</a>
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
                                         
                                       
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->