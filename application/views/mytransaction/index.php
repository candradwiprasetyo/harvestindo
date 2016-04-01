<div class="row" style="background:#fff;">
    <div class="col-md-3" style="background: #ECEFF4; padding-right:0px;">
        <div class="panleft">
             <?php $this->load->view('layout/left_side');  ?>        
        </div>
    </div>
    
    <div class="col-md-8">
    	<div class="panright">
              
                
                <div class="paninner">
                       
                        <div class="paninner">
                        <div class="mtabs">
                            <!--<a href="index-p=records.html"><div class="mtab ">Transaction Records</div></a>-->
                            <a href="index-p=purchases.html"><div class="mtab active">Purchases</div></a>
                            <div class="clearfix"></div>
                        </div>
                        <table class="invtable brecord precord">
                                <tr>
                                    <th>No.</th>
                                    
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Payment</th>
                                    <th>Date</th>
                                    
                                    <th>Status</th>
                                </tr>
                                  <?php
								   foreach($list as $row): 
								   
								   ?>
                                                                <tr>
                                    <td><?= $row['transaction_number'] ?></td>
                                    <td><?= $row['transaction_type_name']." (".$row['im_name']." ".$row['im_subname'] ?></td>
                                    <td><?= $row['tr_amount'] * 1000 ?> GH/s</td>
                                    <td>USD <?= $row['imd_rate1'] ?> ~ <?= $row['imd_rate2'] ?> BTC</td>
                                    <td><?= $row['payment_method_name'] ?></td>
                                    <td><?= $this->access->format_date($row['transaction_date']) ?></td>
                                   
                                    <td><?= $row['status_name'] ?></td>
                                    
                                </tr>
                                 <?php 
								endforeach; 
								?>
                                                                    </table>
                     
                </div>                     
                                            
                     
                </div>
                
            </div>
        </div>
    
</div>