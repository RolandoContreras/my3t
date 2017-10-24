<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">PRODUCTOS</h1>
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
                    <div class="col-md-12"> 
					<div class="panel panel-info">
						<div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><?php echo replace_vocales_voculeshtml("Información - Productos");?></div> 
						</div> 
						<!-- panel body --> 
						<div class="panel-body"> 
                                                    <p><?php echo replace_vocales_voculeshtml("Bienvenido Rolando Contreas. En esta sección le daremos toda la información para que pueda operar correctamente los servicios comprando en 3T. Recuerde que son 3 los rubros que tenemos dentro de la empresa");?></p>
                                                    <p><?php echo replace_vocales_voculeshtml("1. VIAJES:  Todos los paquetes con excepción del paquete BASIC tienen un viaje integrado.");?></p>
                                                    <p><?php echo replace_vocales_voculeshtml("2. ENTRENAMIENTOS:  Dependiendo del paquete comprado obtienes los pasos del sistema de 9 pasos creado por nuestro Coach Frank García.");?></p>
                                                    <p><?php echo replace_vocales_voculeshtml("3. Comercio:  Aprende el mundo de forex en nuestra academia. Los cursos están divididos en 3 módulos (básico, intermedio y avanzando) dependiendo de tu paquete te entregaremos la información correspondiente.");?></p>
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
                                            $amount = "$125";?>
                                             <img src="<?php echo site_url()."static/backoffice/images/basic.png";?>" alt="Cuenta Basic" height="120" width="130"/>
                                          <?php  break;
                                        case 2:
                                            $amount = "$250"?>
                                            <img src="<?php echo site_url()."static/backoffice/images/executive.png";?>" alt="Cuenta Executive" height="120" width="130"/>
                                            <?php break;
                                        case 3:
                                            $amount = "$500"?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="spinner"></div>
                    <div class="col-lg-9 col-sm-8 pull-right box-height-byrow border">
                        <p class="uppercase ralewaybold22px"><?php echo replace_vocales_voculeshtml("MODO DE ACTIVACIÓN");?></p>
                        <div class="small">
                            <p><strong>Activación a través de bitcoin:</strong> enviar el monto de <b><a><?php echo $amount;?></a></b> a la siguiente dirección de bitcoin: <b>188EDdynmC6AWMdiHjsgM4pLF4fvX36LbN</b><br/> enviando un mensaje a su patrocinador indicando el usuario, el tipo de cuenta pagada y el comprobante o el código de identificación de la transacción realizada.<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
           
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
                            <p>Estimado usuario usted tiene un enlace para patrocinar a nuevos asociados en 3T debajo de su organización. <br>•	Link de patrocinio: <a href="<?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?>" class="alert-link" target="_blank"><?php echo site_url().'register/afiliate/'.str_to_minuscula($obj_customer->username);?></a><br>Compartiendo este enlace podrá patrocinar a más personas.<br><b><?php echo replace_vocales_voculeshtml("¿Cómo activar a sus patrocinados?")?> </b><br>•	Las activaciones hacen en btc (bitcoin) y se envía el monto de la cuenta seleccionada a la siguiente dirección de bitcoin: <b>188EDdynmC6AWMdiHjsgM4pLF4fvX36LbN</b></p>
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