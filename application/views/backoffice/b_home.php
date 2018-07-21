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
                <?php 
                foreach ($messages_informative as $value) { ?>
                    <div class="row">
                        <div class="col-md-12"> 
                                    <div class="panel panel-success">
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
            <!--END SHOW ALERT INFORMATIVE MESSAGE--> 
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
        <?php if($obj_customer->active == 0){ ?>
             <!--PAKAGE SELECTED-->
        <div class="col-md-12"> 
            <div class="panel panel-primary">
                    <div class="panel-heading clearfix"> 
                            <div class="panel-title">SELECCIONA TU PAQUETE</div> 
                    </div>
                    <?php foreach ($obj_franchise as $value) { ?>
                             <div class="col-md-2"> 
                                <p style="margin-top:10px;align-items: center !important;padding: 5px;" ><img src="<?php echo site_url()."static/backoffice/images/$value->img";?>" alt="<?php echo $value->name;?>"/></p>
                                <p><button type="button" onclick="make_pedido('<?php echo $value->franchise_id;?>');" class="btn btn-sm btn-black bg-gray btn-block">Seleccionar</button></p>
                            </div>
                    <?php } ?>
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
                                                <p><img src="<?php echo site_url()."static/backoffice/images/$obj_customer->franchise_img";?>" alt="<?php echo $obj_customer->franchise;?>" height="120" width="130"/></p>
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
                                             <p><strong>Activación a través de bitcoin:</strong> enviar el monto de <b><a><?php echo "$".$obj_customer->price;?></a></b>  a la siguiente dirección de bitcoin: <b>188EDdynmC6AWMdiHjsgM4pLF4fvX36LbN</b><br/> Envia un mensaje dando click en el boton de abajo indicando el usuario, el tipo de cuenta pagada y el comprobante o el código de identificación de la transacción realizada.<br></p><br/>
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
        </div>
    </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
