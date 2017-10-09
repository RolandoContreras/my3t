<section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
              <div class="pull-right text-success">
                Precio bitcoin: $<?php echo $price_btc;?>
              </div>
                              <div class="col-lg-3">
                <img src="<?php echo site_url().'static/backoffice/images/logo-btc2.png';?>" class="responsive" height="100px;" id="LogoClienteMill">
              </div>
              <div class="clearfix"></div>           
            </div>
                         
            <div class="row">
                
               <div class="col-lg-3 col-sm-6">
                  <!-- START widget-->
                  <div class="panel widget bg-danger">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-danger-dark pv-lg">
                           <em class="icon-wallet fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0"><?php if(count($obj_madatory)>0){echo "$".$obj_madatory;}else{echo "$0.00";}?></div>
                           <div class="text-uppercase">Balance Cuenta Mandatoria</div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="col-lg-3 col-md-6 col-sm-12">
                  <!-- START widget-->
                  <div class="panel widget bg-success">
                     <div class="row row-table">
                        <div class="col-xs-4 text-center bg-success-dark pv-lg">
                           <em class="icon-badge fa-3x"></em>
                        </div>
                        <div class="col-xs-8 pv-lg">
                           <div class="h2 mt0"><?php echo $obj_customer->franchise;?></div>
                           <div class="text-uppercase">Calificaci&oacute;n</div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

             <?php if($obj_customer->active == 0){ ?>
                    <div class="row">
                        <div role="alert" class="alert alert-danger">
                            <strong>RENOVACI&Oacute;N:</strong>
                        </div>
                        <div class="form-group">
                                <div class="col-sm-12">
                                     <div class="div-img">
                                            <?php
                                            switch ($obj_customer->franchise_id) {
                                                    case 2: ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/basic.jpg';?>" alt="" class="img-responsive img-circle thumb48" style="display: inline !important;">
                                                       <input  type="radio" name="kit" id="kit" value="2" 
                                                       <?php if($obj_customer->franchise_id == 2){ ?> checked="" <?php } ?> >
                                                       <span class=""></span><b>BASIC $100.00</b>
                                                       <?php 
                                                        break;
                                                    case 3: ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/platinium.jpg';?>" alt="" class="img-responsive img-circle thumb48" style="display: inline !important;">
                                                        <label class="radio-inline">
                                                        <input type="radio" name="kit" id="kit" value="3"
                                                        <?php if($obj_customer->franchise_id == 3){ ?> checked="" <?php } ?> >
                                                        <span class=""></span><b>PLATINIUM</b> $250.00</label>
                                                    <?php break;    
                                                    case 4: ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/gold.jpg';?>" alt="" class="img-responsive img-circle thumb48" style="display: inline !important;">
                                                        <label class="radio-inline">
                                                        <input  type="radio" name="kit" id="kit" value="4"
                                                        <?php if($obj_customer->franchise_id == 4){ ?> checked="" <?php } ?> >
                                                        <span class=""></span><b>GOLD</b> $500.00</label>
                                                     <?php break;
                                                    case 5: ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/vip.jpg';?>" alt="" class="img-responsive img-circle thumb48" style="display: inline !important;">
                                                        <label class="radio-inline">
                                                        <input  type="radio" name="kit" id="kit" value="5"
                                                        <?php if($obj_customer->franchise_id == 5){ ?> checked="" <?php } ?> >        
                                                        <span class=""></span><b>VIP</b> $1000.00 &nbsp;&nbsp;&nbsp;</label> 
                                                    <?php break;
                                                    case 7: ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/elite.jpg';?>" alt="" class="img-responsive img-circle thumb48" style="display: inline !important;">
                                                        <label class="radio-inline">
                                                        <input  type="radio" name="kit" id="kit" value="7"
                                                        <?php if($obj_customer->franchise_id == 7){ ?> checked="" <?php } ?> >        
                                                        <span class=""></span><b>ELITE</b> $5000.00
                                                        </label>
                                                    <?php break;
                                                }
                                            ?>
                                        </div>
                                    
                                    <br/><br/>
                                    <button type="button" disabled="" onclick="make_pedido();" class="btn btn-sm btn-primary bg-danger-dark"><?php echo replace_vocales_voculeshtml("Hacer Renovación");?></button>
                                </div>
                          </div>
                     </div>
            <?php  } ?>
             
             
             <br/><br/>
            <div class="row">
              <div class="col-lg-12">
                <?php 
                if($obj_customer->active != "1"){ ?>
                    <strong>Para la renovación debe enviar la diferencia a nuetra dirección de bitcoin: </strong>
                    <a class="alert-link">
                        <b><?php echo "$".number_format($amount_send,2); ?></b>
                    </a>
                <?php } ?><br/>
                <strong>Aquí esta la dirección para enviar los bitcoin para la renovación:</strong><a> 188EDdynmC6AWMdiHjsgM4pLF4fvX36LbN</a><br>
                <br><br>
              </div>
            </div>
         </div>
      </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>