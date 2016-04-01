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
               Gambar berhasil ditampilkan
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
                                                <th width="5%">No</th>
                                                <th>Name</th>
                                                <th>Subname</th>
                                                <th>Remaining</th>
                                                <th>Maintenance Fee</th>
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
										   $no = 1;
										   foreach($list as $row): ?>
                                            <tr>
                                                <td><?= $no?></td>
                                                <td><?= $row['im_name'] ?></td>
                                                <td><?= $row['im_subname']?></td>
                                                <td><?= $row['im_remaining']?></td>
                                                <td><?= $row['im_maintenance_fee']?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?= site_url() ?>admin_instant_mining/form/<?= $row['im_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                  <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['im_id']; ?>, '<?= site_url().'admin_instant_mining/delete/'; ?>')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            <tr>
                                            <td></td>
                                                <td colspan="5">
                                                	
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                               
                                                <th>Jangka Waktu</th>
                                                <th>Rate</th>
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
										   $no_detail = 1;
										   $query_detail = mysql_query("select * from instant_mining_details where im_id = '".$row['im_id']."' order by imd_id");
										   while($row_detail = mysql_fetch_array($query_detail)){ 
										   ?>
                                            <tr>
                                               
                                                <td><?= $row_detail['imd_time'] ?></td>
                                                <td><?= "USD ".$row_detail['imd_rate1']." ~ ".$row_detail['imd_rate2']." BTC"  ?></td>
                                                <td style="text-align:center;">
                                                    <a href="<?= site_url() ?>admin_instant_mining/form_detail/<?= $row['im_id']?>/<?= $row_detail['imd_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                  <a href="javascript:void(0)" onclick="confirm_delete(<?= $row_detail['imd_id']; ?>, '<?= site_url().'admin_instant_mining/delete_detail/'; ?>')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

                                                </td> 
                                            </tr>
                                            
                                           <?php 
										   $no_detail++;
										   }										   ?>
                                            
                                            

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="6"><a href="<?= site_url().'admin_instant_mining/form_detail/'.$row['im_id'].'/0' ?>	" class="btn btn-success " >Add Detail</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                       
                                    </table>
                                                    
                                                </td>
                                            </tr>
                                           <?php 
										   $no++;
										   endforeach; 
										   ?>
                                            
                                            

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="6"><a href="<?= $data_head['add_button'] ?>" class="btn btn-success " >Add</a></td>
                                               
                                            </tr>
                                        </tfoot>
                                       
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->