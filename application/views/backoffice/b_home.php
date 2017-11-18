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
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-12"> 
                                <div class="panel panel-success">
                                        <div class="panel-heading clearfix"> 
                                            <div class="panel-title">Mensaje: <b>Inicio de Actividades</b></div> 
                                        </div> 
                                        <!-- panel body --> 
                                        <div class="panel-body"> 
                                            <p><?php echo replace_vocales_voculeshtml("Del 24 de Octubre el 31 de Octubre del 2017 se considera tiempo de pre apertura, durante este periodo de tiempo pueden ir desarrollando el negocio con total normalidad hasta empezar las actividades el 1 de Noviembre. Las comisiones generadas durante el tiempo de pre apertura serán procesadas con normalidad. El día miércoles 01 de noviembre del 2017, empezamos actividades de 3T Company contando con los servicios de viajes, educación, forex y todas las áreas al 100%.");?></p> 
                                            <p><?php echo replace_vocales_voculeshtml("Desde la fecha de inicio (1 Noviembre) ya se empezará a hacer los respectivos re consumos cada quince días para que se mantenga activa su respectiva cuenta.");?></p> 
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
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Rango")?></h5>
                                <strong>Sin Rango</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Próximo Rango")?></h5>
                                <strong>Start</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        
                        <a href="#" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Puntaje Mensual");?></h5>
                                <strong>0 PTS</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                                   
                                </div>
                            </div>
                        </a>
                            
                        <a href="#" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Puntaje Semanal");?></h5>
                                <strong>0 PTS</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-bar-chart fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Promoción");?></h5>
                                <strong>Ninguna</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-suitcase fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading"><?php echo replace_vocales_voculeshtml("Miles");?></h5>
                                <strong>0 PTS</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-plane fa-3x" aria-hidden="true"></i>
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
             <!--PAKAGE SELECTED-->
        <div class="col-md-12"> 
            <div class="panel panel-primary">
                    <div class="panel-heading clearfix"> 
                            <div class="panel-title">SELECCIONA TU PAQUETE</div> 
                    </div> 
                        <div class="col-md-1"></div>
                        <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/page_front/images/plan/basic.jpg";?>" alt="Paquete Basic"/></p>
                            <p><button type="button" onclick="make_pedido('1');" class="btn btn-sm btn-primary bg-gray btn-block">Seleccionar</button></p>
                        </div>
                       <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/page_front/images/plan/executive.jpg";?>" alt="Paquete Executive"/></p>
                            <p><button type="button" onclick="make_pedido('2');" class="btn btn-sm btn-primary bg-gray btn-block">Seleccionar</button></p>
                        </div>
                        <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/page_front/images/plan/investor.png";?>" alt="Paquete Investor"/></p>
                            <p><button type="button" onclick="make_pedido('3');" class="btn btn-sm btn-primary bg-gray btn-block">Seleccionar</button></p>
                        </div>
                        <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/page_front/images/plan/business.jpg";?>" alt="Paquete Business"/></p>
                            <p><button type="button" onclick="make_pedido('4');" class="btn btn-sm btn-primary bg-gray btn-block">Seleccionar</button></p>
                        </div>
                        <div class="col-md-2"> 
                            <p style="margin-top:10px;"><img src="<?php echo site_url()."static/page_front/images/plan/master.jpg";?>" alt="Paquete Master"/></p>
                            <p><button type="button" onclick="make_pedido('5');" class="btn btn-sm btn-primary bg-gray btn-block">Seleccionar</button></p>
                        </div>
                        <div class="col-md-1"></div>
                </div> 
        </div>
    <br/><br/>
   
    <!--SEPARATE SECCION-->
    <div class="row">
        <div class="col-sm-12 mb-25">
            <div class="panel panel-default panel-tab-box">
                <div class="panel-body"></div>
            </div>
        </div>
    </div>
    <!--END SEPARATE SECCION-->
   
    <!--PAKAGE SELECTED-->
        <div class="col-md-12"> 
            <div class="panel panel-info">
                    <div class="panel-heading clearfix"> 
                            <div class="panel-title">CUENTA SELECCIONADA</div> 
                    </div> 
                        <div class="col-md-3"> 
                            <div class="panel panel-default">
                                        <!-- panel body --> 
                                        <div class="panel-body" style="vertical-align: central !important; margin-left: 20%"> 
                                                <p>
                                                     <?php
                                                        switch ($obj_customer->franchise_id) {
                                                            case 1:
                                                                $amount = "$125";?>
                                                                 <img src="<?php echo site_url()."static/backoffice/images/basic.png";?>" alt="Cuenta Basic" height="120" width="130"/>
                                                              <?php  break;
                                                            case 2:
                                                                $amount = "$250"?>
                                                                <img src="<?php echo site_url()."static/backoffice/images/executive.png";?>" alt="Cuenta Executive" height="120" width="130"/>
                                                                <?php break;
                                                            case 3:
                                                                $amount = "$700"?>
                                                                <img src="<?php echo site_url()."static/backoffice/images/investor.png";?>" alt="Cuenta Investor" height="120" width="130"/>
                                                                <?php break;
                                                            case 4:
                                                                $amount = "$1000"?>
                                                                <img src="<?php echo site_url()."static/backoffice/images/business.png";?>" alt="Cuenta Business" height="120" width="130"/>
                                                                <?php break;
                                                            case 5:
                                                                $amount = "$3000"?>
                                                                <img src="<?php echo site_url()."static/backoffice/images/master.png";?>" alt="Cuenta Master" height="120" width="130"/>
                                                                <?php break;
                                                            case 6: 
                                                                $amount = "0 USD";?>
                                                                 <img src="<?php echo site_url()."static/backoffice/images/membership.png";?>" alt="Cuenta Membership" height="120" width="130"/>
                                                              <?php  break;
                                                        }?>
                                                </p>
                                        </div> 
                                </div> 
                        </div>
                        <div class="col-md-9"> 
                                <div class="panel panel-default">
                                        <div class="panel-heading clearfix"> 
                                            <div class="panel-title"><b><?php echo replace_vocales_voculeshtml("MODO DE ACTIVACIÓN");?></b></div> 
                                        </div> 
                                        <!-- panel body --> 
                                        <div id="spinner"></div>
                                        <div class="panel-body"> 
                                             <p><strong>Activación a través de bitcoin:</strong> enviar el monto de <b><a><?php echo $amount;?></a></b> a la siguiente dirección de bitcoin: <b>188EDdynmC6AWMdiHjsgM4pLF4fvX36LbN</b><br/> Envia un mensaje dando click en el boton de abajo indicando el usuario, el tipo de cuenta pagada y el comprobante o el código de identificación de la transacción realizada.<br></p><br/>
                                             <div class="bs-example">
                                                 <a href="<?php echo site_url().'backoffice/message_confirmation';?>"><button type="button" class="btn btn-black btn-block"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Enviar Mensaje de Confirmación</span></button></a>
                                            </div>
                                        </div> 
                                </div> 
                        </div>
                </div> 
        </div>
      <?php  } ?>         
     
    
    <!--LINK OF SPONSOR-->
            <!--<div class="row">-->
                    <div class="col-md-3"> 
                        <div class="panel panel-default">
                                    <!-- panel body --> 
                                    <div class="panel-body"> 
                                            <p>
                                                <img src="<?php echo site_url().'static/backoffice/images/share.jpg';?>" alt="share"/>
                                            </p>
                                    </div> 
                            </div> 
                    </div>
                    <div class="col-md-9"> 
                            <div class="panel panel-default">
                                    <div class="panel-heading clearfix"> 
                                        <div class="panel-title"><b>LINK DE PATROCINIO</b></div> 
                                    </div> 
                                    <!-- panel body --> 
                                    <div class="panel-body"> 
                                        <p>Estimado usuario usted tiene un enlace para patrocinar a nuevos asociados en 3T debajo de su organización. <br>•	Link de patrocinio: <a href="<?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?>" class="alert-link" target="_blank"><?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?></a><br>Compartiendo este enlace podrá patrocinar a más personas.<br><b><?php echo replace_vocales_voculeshtml("¿Cómo activar a sus patrocinados?")?> </b><br>•	Las activaciones hacen en btc (bitcoin) y se envía el monto de la cuenta seleccionada a la siguiente dirección de bitcoin: <b>188EDdynmC6AWMdiHjsgM4pLF4fvX36LbN</b></p>
                                        <br/>
                                        <a href="<?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?>" target="_blank"><button class="btn btn-success btn-block" type="button">COMPARTIR ENLACE</button></a>
                                    </div> 
                            </div> 
                    </div>
     
    
            
     <?php 
     if(count($obj_post) > 0){ ?>
            <!--SEPARATE SECCION-->
            <div class="row">
                <div class="col-sm-12 mb-25">
                    <div class="panel panel-default panel-tab-box">
                        <div class="panel-body"></div>
                    </div>
                </div>
            </div>
            <!--END SEPARATE SECCION-->
            
            <div class="col-lg-6">
                <div class="panel panel-default">
                        <div class="panel-heading no-border clearfix"> 
                            <h2 class="panel-title">NOTICIAS</h2>
                        </div>
                        <div class="panel-body">
                                <div class="carousel slide" id="carousel5">
                                        <div class="carousel-inner">
                                                <div class="item gallery active">
                                                        <ul class="list-item most-watched">
                                                            <?php foreach ($obj_post as $value) { ?>
                                                                <li>
                                                                        <div class="lockup-video">
                                                                                <div class="lockup-thumbnail">
                                                                                        <div class="embed-responsive embed-responsive-16by9">
                                                                                            <img src='<?php echo site_url()."static/backoffice/images/news/$value->img";?>' alt="<?php echo $value->title?>"/>
                                                                                        </div>
                                                                                </div>
                                                                                <div class="lockup-content">
                                                                                    <div class="lockup-title"><a href="#"><?php echo replace_vocales_voculeshtml("$value->title");?></a></div>
                                                                                        <div class="lockup-description">
                                                                                            <p><?php echo corta_texto(replace_vocales_voculeshtml("$value->summary"),80);?></p>
                                                                                        </div>
                                                                                        <div class="lockup-meta">
                                                                                            <span><?php echo formato_fecha($value->date);?></span>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </li>
                                                            <?php } ?>
                                                        </ul>
                                                </div>
                                                <div class="carousel-footer">
                                                         <a href=""><button class="btn btn-primary btn-block" type="button">VER TODO</button></a>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
            </div>
    <?php } ?>       
            
        </div>
    </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>