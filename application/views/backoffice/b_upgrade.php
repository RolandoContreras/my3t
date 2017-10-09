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
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-12">
           <div class="media-body media-middle">
             <h4 class="media-heading text-uppercase">Selecciona tu Paquete de Crecimiento</h4>
             </div>
             <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-12">
                <div class="row">
                    
                    <?php foreach ($obj_franchise as $value) { ?>
                    
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                                <h5 class="media-heading text-uppercase title-small"><?php echo ucwords($value->name);?></h5>
                            <p class="title"><?php echo "$".$value->price;?></p>
                            <p><?php echo $value->price." "."PUNTOS";?> </p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            
                           <?php
                           switch ($value->franchise_id) {
                                        case 1:
                                           $img = "beginner.png";
                                           break;
                                        case 2:
                                            $img = "start.png";
                                            break;
                                        case 3:
                                           $img = "general.png";
                                            break;
                                        case 4:
                                            $img = "vip.png";
                                            break;
                                        case 5:
                                            $img = "premium.png";
                                            break;
                                        case 6:
                                            $img = "master.png";
                                            break;
                                    }?>
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/$img";?>" alt="<?php echo $value->name?>"/>
                        </div>
                        </div>
                        <div class="media-body media-middle">
                            <button type="button" onclick="" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div>
                
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
                </div>
    <br/><br/>
    
    </div>
    </div>
   </section>
<br/><br/><br/><br/>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>