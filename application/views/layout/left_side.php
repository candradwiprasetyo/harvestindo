   <div class="logowrap">
                            <a href="<?= site_url() ?>"><img src="<?= base_url() ?>assets/images/logo.png" class="respimg"></a>
                        </div>
                        <div class="profilewrap">
                            <?php 
                            if($data_user['user_img']){
                                $profile_photo = $data_user['user_img'];
                            }else{
                                $profile_photo = "default.jpg";
                            }
                            ?>  <div class="photo_frame">
                            <img src="<?= base_url() ?>assets/images/photo frame.png" style="width:100%; height:100%">
                            </div><img src="<?= base_url() ?>assets/images/user/<?= $profile_photo ?>" width="80" class="photo_profile">
                          
                            <h4><?= $data_user['user_email'] ?></h4>
                        </div>
                        <div class="vmenuwrap">
                            <a href="<?= site_url() ?>myaccount">
                                <div class="vmenu active">
                                    DASHBOARD
                                </div>
                            </a>
                            <a href="../contracts/index.html">
                                <div class="vmenu ">
                                    HISTORY
                                </div>
                            </a>
                            <a href="<?= site_url() ?>mytransaction">
                                <div class="vmenu ">
                                    TRANSACTIONS
                                </div>
                            </a>
                            <a href="#">
                                <div class="vmenu">
                                    REDEEM CODE
                                </div>
                            </a>
                            <a href="#">
                                <div class="vmenu">
                                    REFERRALS
                                    <div class="rpointy"></div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="vmenu">
                                    SETTINGS
                                </div>
                            </a>
                            <a href="#">
                                <div class="vmenu">
                                    HELP
                                    <div class="rpointy"></div>
                                </div>
                            </a>
                            <a href="<?= site_url() ?>buy_hashrate">
                                                            <div class="vmenu">
                                        BUY HASHRATE
                                        <div class="rpointy"></div>
                                    </div>
                                                    </a>
                                            </div>