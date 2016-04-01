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
                                                  	<th><strong>Item</strong></th>
                                                    <th><strong>Duration</strong></th>
                                                    <th><strong>Quantity</strong></th>
                                                    <th><strong>Unit Price</strong></th>
                                                    <th align="right"><strong>Total Price</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
										   $no = 1;
										   foreach($list as $row): ?>
                                            <tr>
                                               <td align="center"><strong>Instant Mining</strong><br /><?= $row['im_name']." ".$row['im_subname'] ?></td>
                                                <td align="center"><?= $row['imd_time'] ?></td>
                                                <td align="center"><?= $row['tr_amount'] * 1000000 ?> Mh/s</td>
                                                <td align="center">$ <?= $this->admin_transaction_model->get_rate_dollar() ?> </td>
                                                <td align="right">$ <?= number_format($row['tr_total_price'],0) ?></td>
                                            </tr>
                                           <?php 
										   $no++;
										   endforeach; 
										   ?>
                                            

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="5"><a href="<?= $data_head['close_button'] ?>" class="btn btn-success " >Close</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                       
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->