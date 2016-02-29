<div class="stdpage ">
<div class="container">
                            <div class="shopdetail">
                    <div class="shopimg">
                        <img src="<?= base_url() ?>assets/images/products/<?= $data_product['product_img']?>" class="respimg">
                    </div>
                    <div class="shopmeta">
                        <div class="shopmetaleft">
                            <h1><?= $data_product['product_name']?></h1>
                        </div>
                        <div class="shopmetaright">
                            <h1><?= $this->access->usd_format_number($data_product['product_price']) ?></h1>
                        </div>
                        <div class="clearfix"></div>
                        <h3>
                           <?= $data_product['product_desc']?>
                        </h3>
                    </div>
                    <div class="shopspec">
                        <div class="spechead">UNIT SPECIFICATIONS</div>
                        <div class="specinner">
                            <div class="specleft">
                                <div class="specitem">
                                    <span>HASHRATE</span>
                                    <?= $data_product['hashrate']?>
                                </div>
                                <div class="specitem">
                                    <span>POWER EFFICIENCY</span>
                                    <?= $data_product['power_efficiency']?>
                                </div>
                                <div class="specitem">
                                    <span>ASIC PROCESSOR</span>
                                    <?= $data_product['asic_processor']?>
                                </div>
                                <div class="specitem">
                                    <span>WORKING ENVIRONMENT</span>
                                    <?= $data_product['working_environment']?>
                                </div>
                                <div class="specitem">
                                    <span>TRANSPORT & STORAGE ENVIRONMENT</span>
                                    <?= $data_product['transport_storage_environment']?>
                                </div>
                                <div class="specitem">
                                    <span>DIMENSIONS</span><?= $data_product['dimensions']?>
                                </div>
                                <div class="specitem last">
                                    <span>WEIGHT</span><?= $data_product['weight']?>
                                </div>
                            </div>
                            <div class="specright">
                                <div class="specitem">
                                    <span>CONTROLLER (NOT INCLUDED)</span><?= $data_product['controller']?>
                                </div>
                                <div class="specitem">
                                    <span>PERFORMANCE VARIANCE</span><?= $data_product['performance_variant']?>
                                </div>
                                <div class="specitem">
                                    <span>POWER SUPPLY INTERFACE</span><?= $data_product['power_supply_interface']?>
                                </div>
                                <div class="specitem last">
                                    <span>POWER REQUIREMENTS</span><?= $data_product['power_requirements']?>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="shopbuybtn">
                        BUY NOW
                    </div>
                </div>
</div>