

<div class="stdpage galbg"><div class="container">
                           <div class="title_new" style="margin-bottom:50px;">SHOP NOW</div>
                <div class="hsgrid">
                <div class="col-md-9 col-md-offset-2">
                                            <!--<a href="http://www.hashfield.io/draft/shop-now/?p=avalon6-bitcoin-miner-35-th-s">-->
                                              <?php
							   foreach($list_product as $row): 
							   
							   ?>
                           <div class="col-sm-3">
                            <div class="form-group">
                            <div class="hsitem">
                                <img src="<?= base_url() ?>assets/images/products/<?= $row['product_img'] ?>" class="respimg">
                                <h2>Avalon6 Bitcoin Miner 3.5 TH/s</h2>
                                <div class="shopbuttons">
                                    <a href="<?= site_url() ?>product_view/view/<?= $row['product_id'] ?>">
                                        <div class="shopbutton">
                                             View Details
                                        </div>
                                    </a>
                                    <a href="#">
                                        <div class="shopbutton">
                                             Buy Now
                                        </div>
                                    </a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            </div>
                            </div>
                               <?php 
									endforeach; 
									
									?>
                        <!--</a>-->
                        </div>
                                        <div class="clearfix"></div>
                </div>
</div>
</div>