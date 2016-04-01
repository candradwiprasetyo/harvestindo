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
    <td>
    
    <div class="cart_empty">Your shopping cart is empty
    
    </div> 
    <div class="row">
    <div class="col-md-3 col-md-offset-4"><a href="<?= site_url('buy_hashrate') ?>"><div class="invoice_button_con">Continue Shopping</div></a></div>
    </div>
    <br />
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