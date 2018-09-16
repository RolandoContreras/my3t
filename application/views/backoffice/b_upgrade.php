<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase"><?=lang('idioma.b_crecimiento');?></h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
          <div class="col-md-12"> 
              <!--SHOW ALERT  MESSAGE INFORMATIVE-->
              
              <!--SHOW ALERT  MESSAGE INFORMATIVE-->
            <div class="col-md-12"> 
                <?php 
                foreach ($messages_informative as $value) { ?>
                    <div class="row">
                        <div class="col-md-12"> 
                                        <div class="panel panel-success">
                                            <header class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse_message"><i class="collapse-caret fa  fa-angle-up"></i> <?=lang('idioma.b_informativo');?></a>
                                            </header>
                                            <div id="collapse_message" class="panel-collapse collapse in center">
                                                    <div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><?=lang('idioma.b_mensaje');?> <b><?php echo $value->title;?></b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?php echo $value->text;?></p> 
                                                </div> 
                                            </div>
                                        </div> 
                                </div>
                        </div>
                <?php } ?>
            </div>  
            <!--END SHOW ALERT MESSAGE INFORMATIVE-->
            <div class="panel panel-primary">
                    <div class="panel-heading clearfix"> 
                            <div class="panel-title"><?=lang('idioma.b_selecciona_paquete');?></div> 
                    </div> 
                        <?php foreach ($obj_franchise as $value) { ?>
                        <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/backoffice/images/"."$value->img";?>" alt="<?php echo $value->name;?>"/></p>
                            <p><button disabled="" type="button" onclick="make_pedido('1');" class="btn btn-sm btn-black bg-gray btn-block"><?=lang('idioma.b_seleccionar');?></button></p>
                        </div>
                        <?php } ?>
                </div> 
        </div>
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-12">
             <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-12">
                <div class="row">
               <div class="col-lg-12">
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           <?=lang('idioma.b_monto_disponible');?>
                        </div>
                        <div class="panel-body">
                            <div role="alert" class="alert alert-info">
                                <strong><?=lang('idioma.b_nota');?>:</strong><br>
                                    <?=lang('idioma.b_una_vez');?><br><?=lang('idioma.b_el_contrato');?><br/>
                            </div><br/>
                            <div class="form-inline" >
                                <p class="lead">
                                <?=lang('idioma.b_saldo_disponible');?>
                                <b><?php if(count($obj_balance_disponible)>0){echo "$".$obj_balance_disponible;}else{echo "$0.00";}?></b>
                                </p>
                                <!--BLOCK THE BOTON IF IS SATUDAY OR SUNDAY-->
                                        <input class="form-inline" type="hidden" name="<?=lang('idioma.b_precio_btc');?>SolicitarPago" value="1"/>
                                </div>
                            <br/>
                            <br/>
                           </div>
                     </div>
                  </div>  
            </div>
            </div>
         </div>
    <br/><br/>
    
    </div>
    </div>
   </section>
<br/><br/><br/><br/>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>