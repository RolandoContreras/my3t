<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">CRECIMIENTO</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
          <div class="col-md-12"> 
              <!--SHOW ALERT  MESSAGE INFORMATIVE-->
              <div class="col-md-12"> 
                <?php 
                foreach ($messages_informative as $value) { ?>
                    <div class="row">
                        <div class="col-md-12"> 
                                    <div class="panel panel-warning">
						<div class="panel-heading clearfix"> 
                                                <div class="panel-title">Mensaje: <b><?php echo $value->title;?></b></div> 
                                            </div> 
                                            <!-- panel body --> 
                                            <div class="panel-body"> 
                                                <p><?php echo $value->text;?></p> 
                                            </div> 
                                    </div> 
                            </div>
                        </div>
                <?php } ?>
            </div>
              <!--END SHOW ALERT MESSAGE INFORMATIVE-->
              
            <div class="panel panel-primary">
                
                
                    <div class="panel-heading clearfix"> 
                            <div class="panel-title">SELECCIONA TU PAQUETE DE CRECIMIENTO</div> 
                    </div> 
                        <?php foreach ($obj_franchise as $value) { ?>
                        <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/backoffice/images/$value->img";?>" alt="<?php echo $value->name;?>"/></p>
                            <p><button type="button" onclick="make_pedido('1');" class="btn btn-sm btn-black bg-gray btn-block">Seleccionar</button></p>
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
                           Monto disponible para activar
                        </div>
                        <div class="panel-body">
                            <div role="alert" class="alert alert-info">
                                <strong>Nota:</strong><br>
                            <?php echo replace_vocales_voculeshtml("Una vez selecciona el nuevo paquete, el paquete anterior queda eliminado.");?><br><?php echo replace_vocales_voculeshtml("El contrato empezará nuevamente desde el día 1.");?><br/>
                            </div><br/>
                            <div class="form-inline" >
                                <p class="lead">
                                Saldo Disponible en Billetera:
                                <b><?php if(count($obj_balance_disponible)>0){echo "$".$obj_balance_disponible;}else{echo "$0.00";}?></b>
                                </p>
                                <!--BLOCK THE BOTON IF IS SATUDAY OR SUNDAY-->
                                        <input class="form-inline" type="hidden" name="SolicitarPago" value="1"/>
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