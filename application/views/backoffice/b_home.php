<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">Tablero</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">TOTAL PAGADO</h5>
                            <p class="title"><?php if(count($obj_total)>0){echo "$".number_format($obj_total,'2','.',',');}else{echo "$0.00";}?></p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-btc fa-4x" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">BALANCE POR DISPONER</h5>
                            <p class="title"><?php if(count($obj_balance)>0){echo "$".number_format($obj_balance,'2','.',',');}else{echo "$0.00";}?></p>
                            <div class="mt-10">
                            </div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-credit-card-alt fa-3x" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="well media media-badges box box-height">
                <div class="row">
                    <div class="col-sm-8">
                        
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">PAQUETE ACTUAL</h5>
                            <p class="title"><?php echo $text_franchise;?></p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 120px" src="<?php echo site_url()."static/backoffice/images/$images_franchise";?>" alt="<?php echo $text_franchise;?>"/>
                        </div>
                        </div>
                    
                </div>
                </div>
            </div>
             
             
    <div class="row">
        <div class="col-sm-12 mb-25">
            <div class="panel panel-default panel-tab-box">
                <div class="panel-body">
                    <div class="flex-container fix-box-height">
                        <a href="<?php echo site_url('backoffice/binario');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Calificación Binario")?></h5>
                                <strong><?php if($obj_customer->calification==1){echo "Calificado";}else{echo "No Calificado";}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-tree fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        
                        <a href="<?php echo site_url('backoffice/binario');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Puntos de Calificación Izquierda");?></h5>
                                <strong><?php if($obj_customer->point_calification_left==0){echo "Calificado";}else{echo $obj_customer->point_calification_left." "."PTS";}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-arrow-left fa-3x" aria-hidden="true"></i>
                                   
                                </div>
                            </div>
                        </a>
                            
                        <a href="<?php echo site_url('backoffice/binario');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Puntos de Calificación Derecha");?></h5>
                                <strong><?php if($obj_customer->point_calification_rigth==0){echo "Calificado";}else{echo $obj_customer->point_calification_rigth." "."PTS";}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-arrow-right fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        
                        <a href="<?php echo site_url('backoffice/binario');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Puntos Izquierda</h5>
                                <strong><?php echo $points_left." "."PTS";?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-arrow-circle-left fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        
                        <a href="<?php echo site_url('backoffice/binario');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Puntos Derecha</h5>
                                <strong><?php echo $points_rigth." "."PTS";?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-arrow-circle-right fa-3x" aria-hidden="true"></i>
                                    
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo site_url('backoffice/binario');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Patrocinios Directos</h5>
                                <strong><?php echo $obj_customer->direct;?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-users fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo site_url('backoffice/misdatos');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Fecha de Activación");?></h5>
                                    <strong><?php if(formato_fecha_barras($obj_customer->date_start)== '00/00/0000'){ echo "-----";}else{echo formato_fecha_barras($obj_customer->date_start);}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                   <i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo site_url('backoffice/misdatos');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Fecha de Inicio de Pago");?></h5>
                                    <strong><?php if(formato_fecha_barras($obj_customer->date_stand_by)== '00/00/0000'){ echo "-----";}else{echo formato_fecha_barras($obj_customer->date_stand_by);}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                   <i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>


                        <a href="<?php echo site_url('backoffice/misdatos');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Fecha de Termino");?></h5>
                                <strong><?php if(formato_fecha_barras($obj_customer->date_end)== '00/00/0000'){ echo "-----";}else{echo formato_fecha_barras($obj_customer->date_end);}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-stop fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>

                        <a href="<?php echo site_url('backoffice/misdatos');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Fecha de Creación");?></h5>
                                <strong><?php echo formato_fecha_barras($obj_customer->created_at);?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-area-chart fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?php if($obj_customer->active == 0){ ?>
            <div class="media-body media-middle">
             <h4 class="media-heading text-uppercase">Selecciona tu Paquete</h4>
             </div>
             <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">BEGINNER</h5>
                            <p class="title">$50.00</p>
                            <p>50 PUNTOS</p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/beginner.png";?>" alt="Paquete Beginner"/>
                        </div>
                        </div>
                        <div class="media-body media-middle">
                            <button type="button" onclick="make_pedido('1');" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">START</h5>
                            <p class="title">$100.00</p>
                            <p>100 PUNTOS</p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/start.png";?>" alt="Paquete Start"/>
                        </div>
                        </div>
                           <div class="media-body media-middle">
                            <button type="button" onclick="make_pedido('2');" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div>                        
                    </div>
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">GENERAL</h5>
                            <p class="title">$300.00</p>
                            <p>300 PUNTOS</p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/general.png";?>" alt="Paquete General"/>
                        </div>
                        </div>
                           <div class="media-body media-middle">
                            <button type="button" onclick="make_pedido('3');" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div>                        
                    </div>
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">VIP</h5>
                            <p class="title">$500.00</p>
                            <p>500 PUNTOS</p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/vip.png";?>" alt="Paquete VIP"/>
                        </div>
                        </div>
                        <div class="media-body media-middle">
                            <button type="button" onclick="make_pedido('4');" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">PREMIUM</h5>
                            <p class="title">$1,000.00</p>
                            <p>1000 PUNTOS</p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/premium.png";?>" alt="Paquete Premium"/>
                        </div>
                        </div>
                        <div class="media-body media-middle">
                            <button type="button" onclick="make_pedido('5');" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div> 
                    </div>
                    <div class="col-sm-2">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">MASTER</h5>
                            <p class="title">$5,000.00</p>
                            <p>5000 PUNTOS</p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 80px" src="<?php echo site_url()."static/backoffice/images/master.png";?>" alt="Paquete Master"/>
                        </div>
                        </div>
                        <div class="media-body media-middle">
                            <button type="button" onclick="make_pedido('6');" class="btn btn-sm btn-primary bg-gray">Seleccionar</button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    <br/><br/>
             
    <div class="row fix-box-height-byrow">
        <div class="col-lg-12">
            <div class="well media media-badges">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 box-height-byrow text-center-md flex-items-center mb-xs-30">
                        <div class="row">
                            <div class="col-md-4 col-xs-12 pull-right-lg text-center">
                                <div class="media-middle">
                                <div class="status-frozen"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-8 col-xs-12 pull-left">
                                <div class="media-body media-middle">
                                    <div class="mb-20">
                                    <p class="uppercase ralewaybold22px lh-1 mb-15">CUENTA SELECCIONADA</p>
                                    </div>
                                    <?php
                                    switch ($obj_customer->franchise_id) {
                                        case 1:
                                            $amount = "50 USD";?>
                                             <img src="<?php echo site_url()."static/backoffice/images/beginner.png";?>" alt="Cuenta Beginner" height="120" width="130"/>
                                          <?php  break;
                                        case 2:
                                            $amount = "100 USD"?>
                                            <img src="<?php echo site_url()."static/backoffice/images/start.png";?>" alt="Cuenta Start" height="120" width="130"/>
                                            <?php break;
                                        case 3:
                                            $amount = "300 USD"?>
                                            <img src="<?php echo site_url()."static/backoffice/images/general.png";?>" alt="Cuenta General" height="120" width="130"/>
                                            <?php break;
                                        case 4:
                                            $amount = "500 USD"?>
                                            <img src="<?php echo site_url()."static/backoffice/images/vip.png";?>" alt="Cuenta VIP" height="120" width="130"/>
                                            <?php break;
                                        case 5:
                                            $amount = "1000 USD"?>
                                            <img src="<?php echo site_url()."static/backoffice/images/premium.png";?>" alt="Cuenta Premium" height="120" width="130"/>
                                            <?php break;
                                        case 6:
                                            $amount = "5000 USD"?>
                                            <img src="<?php echo site_url()."static/backoffice/images/master.png";?>" alt="Cuenta Master" height="120" width="130"/>
                                        <?php break;
                                        case 7: 
                                            $amount = "0 USD";?>
                                             <img src="<?php echo site_url()."static/backoffice/images/membership.png";?>" alt="Cuenta Membership" height="120" width="130"/>
                                          <?php  break;
                                    }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="spinner"></div>
                    <div class="col-lg-9 col-sm-8 pull-right box-height-byrow border">
                        <p class="uppercase ralewaybold22px"><?php echo replace_vocales_voculeshtml("MODO DE ACTIVACIÓN");?></p>
                        <div class="small">
                            <p><strong>Activación a través de bitcoin:</strong> enviar el monto de <b><a><?php echo $amount;?></a></b> a la siguiente dirección de bitcoin: <b>1PZT316a1c7EvZoMrLKPZpETsZSg9MSw9G</b><br/> enviando un mensaje a su patrocinador indicando el usuario, el tipo de cuenta pagada y el comprobante o el código de identificación de la transacción realizada.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
      <?php  } ?>            
              
              
    <div class="row fix-box-height-byrow">
        <div class="col-lg-12">
            <div class="well media media-badges">
                <div class="row">
                    <div class="col-lg-3 col-sm-4 box-height-byrow text-center-md flex-items-center mb-xs-30">
                        <div class="row">
                            <div class="col-md-8 col-xs-12 pull-left">
                                <div class="media-body media-middle">
                                    <div class="mb-20">
                                    </div>
                                    <img src="<?php echo site_url()."static/backoffice/images/share.png";?>" alt="Compartir" height="140" width="140" class="text-center"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-sm-8 pull-right box-height-byrow border">
                        <p class="uppercase ralewaybold22px"><?php echo replace_vocales_voculeshtml("LINK DE PATROCINIO");?></p>
                        <div class="small">
                            <p>Estimado usuario usted tiene un enlace para patrocinar a nuevos asociados en CRIPTOWIN debajo de su organización. <br>•	Link de patrocinio: <a href="<?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?>" class="alert-link" target="_blank"><?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?></a><br>Compartiendo este enlace podrá patrocinar a más personas.<br><b><?php echo replace_vocales_voculeshtml("¿Cómo activar a sus patrocinados?")?> </b><br>•	Las activaciones hacen en btc (bitcoin) y se envía el monto de la cuenta seleccionada a la siguiente dirección de bitcoin: <b>1PZT316a1c7EvZoMrLKPZpETsZSg9MSw9G</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div> 
    </div>
    </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>