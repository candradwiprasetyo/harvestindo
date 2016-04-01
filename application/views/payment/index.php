<script type="text/javascript">
function load_payment_method(id)
{
	//alert(id);
	
	var payment_notif = document.getElementById("payment_notif");
	payment_notif.style.display = 'inline';
	
	if(id){
		$("#payment_notif").load('payment/payment_notif/'+id); 
	}else{
		
		payment_notif.style.display = 'none';
	}
}
</script>
<div class="row" style="background:#fff;">
    <div class="col-md-3" style="background: #ECEFF4; padding-right:0px;">
        <div class="panleft">
                   <?php $this->load->view('layout/left_side');  ?>        
        </div>
    </div>
    
    <div class="col-md-8">
    <div class="panright">
              
                
                <div class="paninner">
                                         
                        
                      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="invoice_table">
  <tr>
    <td class="invoice_head">INVOICE</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="4" style="margin-top:10px;">
      <tr>
        <td width="35%" rowspan="2" align="center"><img src="<?= site_url() ?>assets/images/logo.png" width="150" /></td>
        <td width="16%" valign="top"><strong>Invoice Date :</strong><br /><?= date("d.m.Y"); ?></td>
        <td width="21%" align="right" valign="top">From :</td>
        <td width="4%" align="right" valign="top">&nbsp;</td>
         <td width="22%" align="right" valign="top">To :</td>
        <td align="right" width="2%">&nbsp;</td>
      </tr>
      <tr>
        <td valign="top"></td>
        <td align="right" valign="top"><strong>Hashfield.io</strong>
        <br />
        PT. Harvestindo Global Persada
        </td>
        <td width="4%" align="right"></td>
        <td align="right" valign="top"><strong>E : 
          <?= $data['user_email'] ?>
        </strong></td>
        <td align="right">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" class="invoice_table_content">
      <tr align="center" class="invoice_table_content_title">
        <td><strong>Item</strong></td>
        <td><strong>Duration</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Unit Price</strong></td>
        <td align="right"><strong>Total Price</strong></td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
      </tr>
      <?php 
	$total_price = 0;
	foreach($list as $row): ?>
      <tr height="50" style="border-bottom:1px solid #ccc; color:#595a5c">
        <td align="center"><strong>Instant Mining</strong><br /><?= $row['im_name']." ".$row['im_subname'] ?></td>
        <td align="center"><?= $row['imd_time'] ?></td>
        <td align="center"><?= $row['tr_amount'] * 1000000 ?> Mh/s</td>
        <td align="center">$ <?= $this->payment_model->get_rate_dollar() ?> </td>
        <td align="right">$ <?= number_format($row['tr_total_price'],0) ?></td>
        <td width="3%">&nbsp;</td>
        <td align="right">
        
        
        <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['tr_id'] ?>, '<?= site_url() ?>payment/delete_detail/')" class="btn btn-default"><i class="fa fa-trash-o"></i></a>
        </td>
        <td width="3%">&nbsp;</td>
      </tr>
	  <?php 
		$total_price = $total_price + $row['tr_total_price'];
		endforeach; 
		?>
      <tr height="50">
        <td align="center">&nbsp;</td>
         <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center"><strong>Grand Total</strong></td>
        <td align="right">$ <?= number_format($total_price,0) ?></td>
        <td align="right"></td>
        <td width="3%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
      </tr>
       
    </table></td>
  </tr>
  
  <tr>
    <td>
    <form action="<?= site_url() ?>payment/save_payment/" enctype="multipart/form-data" method="post">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_payment_method">
    <tr>
    	<td>&nbsp;</td>
    </tr>
      <tr>
      
        <td align="center">
          <select name="i_payment_method" onchange="return load_payment_method(this.value)" required class="payment_method_select">
          <option value="">- Select Payment Method -</option>
        <?php
        $qpm = mysql_query("select * from payment_methods where payment_method_status = '1' order by payment_method_id");
		while($rpm = mysql_fetch_array($qpm)){
		?>
        <option value="<?= $rpm['payment_method_id'] ?>"><?= $rpm['payment_method_name'] ?></option>
        <?php
		}
		?>
        
        </select>
        </td>
        </tr>
         <tr>
        <td colspan="2" align="center" height="50">&nbsp;
        </td>
        </tr>
        <tr>
        <td colspan="2" align="center">
        <div id="payment_notif"></div>
        </td>
        </tr>
      <tr height="60">
        <td colspan="2" align="center">
        
        <div class="col-md-10 col-md-offset-1">
        <div class="col-md-3">
        <a href="<?= site_url('buy_hashrate') ?>"><div class="invoice_button_con">Continue Shopping</div></a>
        </div>
        <div class="col-md-3">
         <a href="<?= site_url('payment/cancel_payment') ?>"><div class="invoice_button_con">Cancel</div></a>
        </div><div class="col-md-3">
       <input type="submit" value="SAVE" class="invoice_button" />
        </div>
        </div>
        
        </td>
        </tr>
    </table>
    </form>
    </td>
  </tr>
</table>

                     
                     
                </div>
                
            </div><!-- end panrigth-->
            
        </div>
    
</div>

<script type="text/javascript">
function confirm_delete(id,control){
	var a = confirm("Are you sure want to delete this item ?");
	if(a==true){
		window.location.href = control+id;
	}
}
</script>