<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
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
            <!--SHOW ALERT MESSAGE INFORMATIVE --> 
            <div class="col-lg-12">
                <div class="panel-group" id="accordion">
                    <?php foreach ($messages_informative as $value) { ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-success">
                                            <header class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse_message"><i class="collapse-caret fa  fa-angle-up"></i> Informativo</a>
                                            </header>
                                            <div id="collapse_message" class="panel-collapse collapse in center">
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
                            </div>
                    <?php } ?>
                </div>
            </div>
            <!--END SHOW ALERT INFORMATIVE MESSAGE--> 
            <!--START NEWS-->
            <?php if($obj_news){ ?>
                <div class="col-lg-12">
                            <div class="panel-group" id="accordion">
                                <div class="panel panel-shadow">
                                    <header class="panel-heading">
                                        <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse61"><i class="collapse-caret fa  fa-angle-up"></i> Noticias</a>
                                    </header>
                                    <div id="collapse61" class="panel-collapse collapse in center">
                                        <div class="panel-body">
                                            <?php foreach ($obj_news as $value) { ?>
                                            <div>
                                                <img class="text-center img-rounded img-responsive" src="<?php echo site_url()."static/backoffice/images/new/$value->img";?>">
                                            </div>
                                            <hr>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
            <?php } ?>
            <!--END NEWS-->
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
                            <p class="title"><?php echo $obj_customer->franchise;?></p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <img style="max-width: 150px" src="<?php echo site_url()."static/backoffice/images/$obj_customer->franchise_img";?>" alt="<?php echo $obj_customer->franchise;?>"/>
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
                                    <h5 class="media-heading">Rango Actual</h5>
                                <strong><?php echo $obj_customer->ranges;?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <?php 
                                        if($obj_customer->range_id == 0){ ?>
                                                <i class="fa fa-user-circle-o fa-3x" aria-hidden="true"></i>
                                        <?php }else{ ?>
                                                <i><img style="max-width: none" src="<?php echo site_url().'static/backoffice/images/rangos/'.$obj_customer->img;?>" alt="<?php echo $obj_customer->ranges;?>" width="55px"/></i>  
                                        <?php } ?>
                                    
                                </div>
                            </div>
                        </a>
                        
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading">Próximo Rango</h5>
                                <strong><?php echo $next_range->name;?> / <?php echo $next_range->point_grupal;?> PTS</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i><img style="max-width: none" src="<?php echo site_url().'static/backoffice/images/rangos/'.$next_range->img;?>" alt="<?php echo $next_range->name;?>" width="55px"/></i>
                                </div>
                            </div>
                        </a>
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Puntaje Izquierda</h5>
                                <strong><?php echo format_number_miles($obj_customer->point_left,2);?> PTS</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-align-left fa-3x"></i>
                                </div>
                            </div>
                        </a>
                        <a class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Puntaje Derecha</h5>
                                <strong><?php echo format_number_miles($obj_customer->point_rigth);?> PTS</strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-align-right fa-3x"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo site_url().'backoffice/binary';?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading">Binario</h5>
                                <strong><?php echo $obj_customer->binaries == 1 ?"Calificado":"No Calificado";?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-users fa-3x"></i>
                                   
                                </div>
                            </div>
                        </a>
                            
                        
                        <a href="<?php echo site_url('backoffice/points');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading">Puntos del Mes</h5>
                                    <strong><?php echo format_number_miles($obj_customer->points);?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-list-ol fa-3x"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo site_url('backoffice/unilevel');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Patrocinios Directos</h5>
                                <strong><?php echo $obj_customer->direct;?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-user-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>
                        <a href="javascript:void(0);" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                <h5 class="media-heading">Team Builder</h5>
                                <strong><?php if(formato_fecha_barras($obj_customer->team_builder)== '00/00/0000'){ echo "-----";}else{echo formato_fecha_barras($obj_customer->team_builder);}?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-calendar fa-3x"></i>
                                </div>
                            </div>
                        </a>
                        <a href="<?php echo site_url('backoffice/misdatos');?>" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading">Fecha de Activación</h5>
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
                                    <h5 class="media-heading">Fecha de Creación</h5>
                                <strong><?php echo formato_fecha_barras($obj_customer->created_at);?></strong>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-calendar fa-3x" aria-hidden="true"></i>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="col-flex box-height">
                            <div class="media">
                                <div class="media-body media-middle">
                                    <h5 class="media-heading">Catálogo</h5>
                                <button class="btn btn-success" type="button">VER</button>
                                </div>
                                <div class="media-right media-middle">
                                    <i class="fa fa-cart-plus fa-3x"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <?php if($obj_customer->active == 0){ ?>
             <!--PAKAGE SELECTED-->
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-collapse collapse in center">
                        <div class="panel-heading clearfix"> 
                        <div class="panel-title"><b>SELECCIONA TU PAQUETE</b></div> 
                    </div> 
                    <!-- panel body --> 
                    <div class="panel-body"> 
                        <?php foreach ($obj_franchise as $value) { ?>
                             <div class="col-md-3"> 
                                <p style="margin-top:10px;align-items: center !important;padding: 5px;" ><img src="<?php echo site_url()."static/backoffice/images/$value->img";?>" alt="<?php echo $value->name;?>"/></p>
                                <p><button type="button" onclick="make_pedido('<?php echo $value->franchise_id;?>');" class="btn btn-sm btn-black bg-gray btn-block">Seleccionar</button></p>
                            </div>
                    <?php } ?>
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <!--SEPARATE SECCION-->
    <div class="row">
        <div class="col-sm-12 mb-25">
            <div class="panel panel-default panel-tab-box"><div class="panel-body"></div></div>
        </div>
    </div>
    <!--END SEPARATE SECCION-->
   
    <!--PAKAGE SELECTED-->
        <div class="col-md-12"> 
            <div class="panel panel-success">
                    <div id="collapse_message" class="panel-collapse collapse in center">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title"><b>CUENTA SELECCIONADA</b></div> 
                        </div>
                        <div class="col-md-3"> 
                            <div class="panel panel-success">
                                <!-- panel body --> 
                                <div class="panel-body" style="vertical-align: central !important; margin-left: 25%"> 
                                    <p>
                                        <img src="<?php echo site_url()."static/backoffice/images/$obj_customer->franchise_img";?>" alt="<?php echo $obj_customer->franchise;?>" height="120" width="130"/>
                                    </p>
                                </div> 
                            </div> 
                        </div>
                        <div class="col-md-7"> 
                            <div class="panel panel-success">
                                <div id="collapse_message" class="panel-collapse collapse in center">
                                    <div class="panel-heading clearfix"> 
                                            <div class="panel-title"><b>MODO DE ACTIVACIÓN - BILLETERA DE BITCOIN</b></div> 
                                    </div> 
                                    <!-- panel body --> 
                                    <div class="panel-body"> 
                                        <p><strong>Activación a través de bitcoin:</strong> enviar el monto de <b><a><?php echo "$".$obj_customer->price;?></a></b>  a la siguiente dirección de bitcoin: <b>15UuH4uF42kFEHL7uZbibjDhGJ5YTZjewn</b><br/> Envia un mensaje dando click en el boton de abajo indicando el usuario, el tipo de cuenta pagada y el comprobante o el código de identificación de la transacción realizada.<br></p><br/>
                                        <div class="bs-example">
                                             <a href="<?php echo site_url().'backoffice/message_confirmation';?>"><button type="button" class="btn btn-black btn-block"><i class="fa fa-upload"></i>&nbsp;&nbsp;<span class="bold">Enviar Mensaje de Confirmación</span></button></a>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                        </div>
                        <div class="col-md-2"> 
                            <div class="panel panel-success">
                                <div id="collapse_message" class="panel-collapse collapse in center">
                                    <!-- panel body --> 
                                    <div class="panel-body"> 
                                        <img ng-if="image" ng-src="data:image/png;base64,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" src="data:image/png;base64,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">
                                    </div> 
                                </div>
                            </div> 
                        </div>

                        <!-- panel body --> 
                    </div>
            </div> 
        </div>
      <?php  } ?>         
     
    
    <!--LINK OF SPONSOR-->
            <!--<div class="row">-->
                <div class="col-md-12"> 
            <div class="panel panel-success">
                    <div id="collapse_message" class="panel-collapse collapse in center">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title"><b>PATROCINIO</b></div> 
                        </div>
                        <div class="col-md-3"> 
                            <div class="panel panel-success">
                                <!-- panel body --> 
                                <div class="panel-body"> 
                                    <p>
                                        <img src="<?php echo site_url().'static/backoffice/images/share.jpg';?>" alt="share"/>
                                    </p>
                                </div> 
                            </div> 
                        </div>
                        <div class="col-md-9"> 
                            <div class="panel panel-success">
                                <div id="collapse_message" class="panel-collapse collapse in center">
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
                        </div>
                        <!-- panel body --> 
                    </div>
            </div> 
        </div>
        </div>
    </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
