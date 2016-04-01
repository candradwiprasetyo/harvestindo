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
                                                <th>Bank Name</th>
                                                <th>Account Number</th>
                                                <th>Account Name</th>
                                                <th>Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php 
										   $no = 1;
										   foreach($list as $row): ?>
                                            <tr>
                                                <td><?= $no?></td>
                                                 <td><?= $row['bank_name']?></td>
                                                <td><?= $row['bank_account_number']?></td>
                                                <td><?= $row['bank_account_name']?></td>
                                                <td style="text-align:center;">

                                                    <a href="<?= site_url() ?>admin_bank/form/<?= $row['bank_id']?>" class="btn btn-default" ><i class="fa fa-pencil"></i></a>
                                                   <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['bank_id']; ?>, '<?= site_url().'admin_bank/delete/'; ?>')" class="btn btn-default" ><i class="fa fa-trash-o"></i></a>

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