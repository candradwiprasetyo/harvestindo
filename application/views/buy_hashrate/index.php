<div class="row" style="background:#fff;">
    <div class="col-md-3" style="background: #ECEFF4; padding-right:0px;">
        <div class="panleft">
                     <?php $this->load->view('layout/left_side');  ?>        
        </div>
    </div>
    
    <div class="col-md-8">
    <div class="panright">
              
                
                <div class="paninner">
                                            
                        <div class="mtabs">
                            <a href="index-p=instant.html"><div class="mtab active">INSTANT MINING</div></a>
                            <a href="index-p=expert.html"><div class="mtab ">EXPERT MINING</div></a>
                            <a href="index-p=ultima.html"><div class="mtab ">ULTIMA MINING</div></a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="moptions">
                        	
                        <?php
						$no = 1;
                        $query = mysql_query("select * from instant_minings order by im_id");
						while($row = mysql_fetch_array($query)){
						?>
                              <div class="moption col-md-5">
                              <div class="form-group">
                                    <a href="#" id="lins<?= $no ?>" class="lmine">
                                        <div class="mopt" id="lins<?= $no ?>">
                                            <div class="moptbig" id="lins<?= $no ?>"><?= $row['im_name']?><span><?= $row['im_subname']?></span></div>
                                            <div class="moptsmall" id="lins<?= $no ?>"><?= $row['im_remaining']?> TH remaining</div>
                                        </div>
                                    </a>
                                    <div class="moptsub" id="oins<?= $no ?>">
                                        <div class="mopttop">
                                         <?php
										$query_detail = mysql_query("select * from instant_mining_details where im_id = '".$row['im_id']."' order by imd_id");
										while($row_detail = mysql_fetch_array($query_detail)){
										?>
                                            <div class="msubopt">
                                                <div class="mso mso1"><?= $row_detail['imd_time'] ?></div>
                                                <div class="mso mso2">USD <?= $row_detail['imd_rate1'] ?> ~ <?= $row_detail['imd_rate2'] ?> BTC</div>
                                                <div class="mso mso3"><input id="i_check" type="radio" name="i_check" value="<?= $row_detail['imd_id'] ?>"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                      <?php
										}
									  ?>
                                        </div>
                                        <div class="moptbottom">
                                            <div class="msubopt">
                                                <div class="mso mso1">Maintenance fee</div>
                                                <div class="mso mso2">USD <?= $row['im_maintenance_fee'] ?> /Day/TH/s</div>
                                                <div class="mso mso3"></div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
							$no++;
							}
							?>
							
                            
                                <div class="clearfix"></div>
                                                    </div>

                        <div class="moptslide">
                            <h1>AMOUNT TO PURCHASE</h1>
                            <div class="theslide">
                                                            </div>
                            
                            <div id='slider-instant' class='slider-engine'></div>                            
                            <div class="slidemetas">
                                <div class="slidemetaleft">
                                    <br>Your Purchases <span>USD 13,750 or 38.5 BTC</span>
                                </div>
                                <div class="slidemetaright">
                                    <div class="btnbuy_new">
                                        BUY NOW
                                    </div>
                                    
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    
                     
                </div>
                
            </div>
        </div>
    
</div>


<script src="<?= base_url() ?>assets/nouislider/nouislider.js"></script>
<script src="<?= base_url() ?>assets/nouislider/wNumb.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){
        var toUSD = wNumb({
                mark: '.',
                thousand: ',',
                decimals: 2,
                prefix: 'USD&nbsp;',
                postfix: ''
        });
        
        var toBTC = wNumb({
                mark: '.',
                thousand: ',',
                decimals: 7,
                prefix: '',
                postfix: '&nbsp;BTC'
        });
        
                        var slider = document.getElementById('slider-instant');
                noUiSlider.create(slider, {
                    start: [ 0 ],
                    step: 0.01,
                    connect: 'lower',
                    tooltips: [ wNumb({
                                        decimals: 2,
                                        postfix: '&nbsp;TH/s',
                                }) ],
                    range: {
                            'min': [  0, 0.01 ],
                            '25%': [ 1, 0.1 ],
                            '75%': [ 25, 1 ],
                            'max': [ 100 ]
                    },
                    pips: {
                            mode: 'range',
                            density: 1
                    }
                });

                slider.noUiSlider.on('update', function( ) {
                    var slival = slider.noUiSlider.get();
                                            var metaval = toUSD.to(((slival * <?= $this->buy_hashrate_model->get_rate() ?>) * <?= $this->access->get_coinbase_buy(); ?>)) + " or " + toBTC.to((slival * <?= $this->buy_hashrate_model->get_rate(); ?>));
                                        $(".slidemetaleft span").html(metaval);
                });
                
    });
	
	$(".btnbuy_new").click(function(){
       //window.location = "http://www.hashfield.io/draft/invoice/";
	   var amount = $('.noUi-tooltip').html();
	   var data_amount = amount.split("&nbsp;");
	   var i_check = $("input[name='i_check']:checked").val();
	   
	   if(i_check == undefined){
			alert("Please choose one of product");
		}else if(data_amount[0] == '0.00'){
			alert("Please choose amount of purchase");
		}else{
			window.location.href = '<?= site_url()?>buy_hashrate/create_instant_mining/' + data_amount[0] + '/' + i_check;
		}
	   
    });
</script>