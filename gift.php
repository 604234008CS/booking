

<div data-server-rendered="true" id="__nuxt">
    <!---->
    <div id="__layout">
        <div data-app="true" id="app" class="v-application main-app v-application--is-ltr theme--light">
            <div class="v-application--wrap">
                <aside
                    class="v-navigation-drawer v-navigation-drawer--close v-navigation-drawer--fixed v-navigation-drawer--is-mobile v-navigation-drawer--temporary theme--light"
                    style="height: 100%; top: 0px; transform: translateX(-100%); width: 256px;"
                >
                    <div class="v-navigation-drawer__content">
                        <div role="list" class="v-list v-sheet v-sheet--tile theme--light">
                            <div tabindex="-1" role="listitem" class="v-list-item theme--light">
                                <div class="v-list-item__action"><i aria-hidden="true" class="v-icon notranslate mdi mdi-repeat theme--light"></i></div>
                                <div class="v-list-item__title">Switch drawer (click me)</div>
                            </div>
                        </div>
                    </div>
                    <div class="v-navigation-drawer__border"></div>
                </aside>

                <header class="app-bar v-sheet v-sheet--tile theme--dark v-toolbar v-app-bar v-app-bar--fixed blue" style="height: 64px; margin-top: 0px; transform: translateY(0px); left: 0px; right: 0px;">
                    <div class="v-toolbar__content" style="height: 64px;">
                        <div class="container container--fluid">
                            <div class="layout justify-space-between">
                                <div class="flex">
                                    <button type="button" class="v-btn v-btn--flat v-btn--icon v-btn--round theme--dark v-size--default">
                                        <a onClick="javascript:window.location.href='../member'">
                                            <span class="v-btn__content"><i aria-hidden="true" class="v-icon notranslate mdi mdi-home theme--dark"></i></span>
                                        </a>
                                    </button>
                                    <!---->
                                </div>
                                <?php if(strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'mobile') || strstr(strtolower($_SERVER['HTTP_USER_AGENT']), 'android')) { ?>
                                <div align="center">
                                    <a href="<?=base_url()?>users/member"><img src="<?php echo $this->config->item('tem_frontend_img'); ?>logo.png" style="width: 100%;" /></a>
                                </div>
                                <div class="flex flex-grow-0">
                                    <button  type="button" class="v-btn v-btn--flat v-btn--icon v-btn--round theme--dark v-size--default"><a href="<?=base_url()?>users/member"></a> 
                                        <a onClick="javascript:window.location.href='../member'">
                                            <span class="v-btn__content"><i aria-hidden="true" class="v-icon notranslate mdi mdi-logout theme--dark"></i></span>
                                        </a>
                                    </button>
                                </div>
                                <?php }else{ ?>
                                <div align="center">
                                    <a href="<?=base_url()?>users/member"><img src="<?php echo $this->config->item('tem_frontend_img'); ?>logo.png" style="width: 25%;" /></a>
                                </div>
                                <div class="flex flex-grow-0">
                                    <?php  
                                      $urlPast = $this->uri->segment(3); if($urlPast == ''){ ?>
                                    <button type="button" class="v-btn v-btn--flat v-btn--icon v-btn--round theme--dark v-size--default">
                                        ยอดเครดิตที่ใช้ได้
                                        <?=$credit?>
                                        บาท
                                        <a onClick="javascript:window.location.href='../member'">
                                            <span class="v-btn__content"><i aria-hidden="true" class="v-icon notranslate mdi mdi-logout theme--dark"></i></span>
                                        </a>
                                    </button>
                                    <?php  }else{  ?>
                                    <button type="button" class="v-btn v-btn--flat v-btn--icon v-btn--round theme--dark v-size--default">
                                        <a href="<?=base_url()?>users/member"></a>
                                        <a onClick="javascript:window.location.href='../member'">
                                            <span class="v-btn__content"><i aria-hidden="true" class="v-icon notranslate mdi mdi-logout theme--dark"></i></span>
                                        </a>
                                    </button>
                                    <?php  } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </header>

                <main
                    class="v-content"
                    data-booted="true"
                    style="
                        padding-top: 64px;
                        padding-right: 0px;
                        padding-bottom: 100px !important;
                        padding-left: 0px;
                        flex-direction: column;
                        max-width: 100vw;
                        min-height: 100vh;
                        overflow-x: hidden;
                        background-color: rgb(255, 255, 255);
                        background-size: cover;
                        background-attachment: fixed;
                        background-position: center center;
                        background-repeat: no-repeat;
                        background-image: url('<?php echo $this->config->item('tem_frontend_img'); ?>bgusers.jpg');
                    "
                >
                    <div class="v-content__wrap">
                        <div data-v-1c09369c="" class="container container--fluid grid-list-lg">
                            <div data-v-1c09369c="" class="layout row wrap justify-center">
                                <div data-v-1c09369c="" class="flex xs12 sm10 md8 lg6">
                                    <div data-v-1c09369c="" class="pa-3 v-card v-sheet theme--light">
                                        <div data-v-1c09369c="" class="layout row wrap">
                                            <div data-v-1c09369c="" class="flex xs12">
                                                <div data-v-1c09369c="" class="v-card v-card--outlined v-sheet theme--dark blue" title="">
                                                    <div data-v-1c09369c="" class="layout pa-2 row justify-space-between">
                                                        <div data-v-1c09369c="" class="layout pa-2 row justify-space-between" id="tap_contact" >
                                                            <div class="form-row p-3" onClick="javascript:window.location.href='<?=base_url()?>users/gift/exchange_rewards'">
                                                                <div class=" btn" align="center"> 
                                                                   <img src="<?=$this->config->item('tem_frontend')?>img/exchang_credit.png" title="imiwinr" alt="imiwinr" width="100%">
                                                                </div>
                                                              </div>
                                                             <form action="<?=base_url()?>users/gift/hash_data" method="POST" id="change_mall">
                                                                <div class="form-row p-3" onClick="reward()">
                                                                  <div class="col-md-12 btn">
                                                                    <input type='hidden' name="user_id" value="<?php echo $user_id ?>">
                                                                    <input type='hidden' name="webname" value="<?php echo $webname ?>">
                                                                    <img src="<?=$this->config->item('tem_frontend')?>img/exchang_reward.png" title="imiwinr" alt="imiwinr" width="100%">
                                                                  </div>
                                                                </div>
                                                              </form>
                                                          </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-v-0a7d0aae="" data-v-1c09369c="" role="dialog" class="v-dialog__container"><!----></div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>




<script>
  function reward() {
    document.getElementById('change_mall').submit();
  }
</script>