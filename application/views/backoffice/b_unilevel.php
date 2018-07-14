<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">Arbol Unilevel</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div>
<!------------------------------------------->
<div id="page-content-wrapper">
    <main>
        <div class="container-fluid">
            <div class="row ml-custom">
                <!--SHOW ALERT MESSAGE INFORMATIVE-->
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
                
                <div class="col-xs-12">
                    <div class="col-lg-12">
                        <div class="panel panel-default network-tree-panel">
                           <div class="cont-arbol">
                               <div class="alert alert-inverse pull-left" style="opacity: 0.7;" aria-label="Right Align">
                                   <a href="<?php echo site_url().'backoffice/unilevel';?>"><button class="btn btn-success btn-outline" type="button">Volver Al Inicio</button></a>
                                   <a href="javascript:history.back(1)"><button class="btn btn-success btn-outline" type="button"><?php echo replace_vocales_voculeshtml("Volver Atrás");?></button></a>
                               </div>
                               <div class="alert alert-inverse pull-right" style="opacity: 0.7;" aria-label="Right Align">
                                   <button class="btn btn-success btn-outline" type="button">Patrocinios Directos: <?php echo $obj_customer->direct;?></button><br/><br/>
                                   <button class="btn btn-success btn-outline" type="button">2° Patrocinios Directos: <?php echo isset($direct_3)?$direct_3:"0";?></button><br/><br/>
                                   <button class="btn btn-success btn-outline" type="button">3° Patrocinios Directos: <?php echo isset($direct_4)?$direct_4:"0";?></button>
                                </div>
                            <div class="tree" style="width: 1000%;"> 
                                <div class="col-lg-12"><hr class="style-2"></div>
                                <ul>
                                    <li>
                                    <span class="inline-block relative">
                                            <div class="popover__wrapper">
                                                        <a href="javascript:void(0);">
                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$obj_customer->img;?>" alt="paquete" width="80"></div>
                                                        <?php if($obj_customer->active == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span class="user-name"><?php echo $obj_customer->username;?></span>
                                                      </a>
                                                      <div class="push popover__content">
                                                          <p class="popover__message">
                                                              Usuario: <b><?php echo $obj_customer->username;?></b><br/>
                                                              Nombre: <b><?php echo $obj_customer->first_name." ".$obj_customer->last_name;?></b><br/>
                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                              Rango: <b><?php echo string_to_mayusculas($obj_customer->rango);?></b><br/>
                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$obj_customer->img_rango";?>" width="50px" alt="rango"/>
                                                          </p>
                                                      </div>
                                                    </div>
                            <!--BEGIN SECOND LEVEL-->
                            <?php 
                            if(count($obj_customer_n2) > 0){ ?>
                                <ul>
                                    <?php 
                                     foreach ($obj_customer_n2 as $value) { ?>
                                        <li>
                                            <div class="popover__wrapper">
                                                        <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value->customer_id);?>">
                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$value->img;?>" alt="paquete" width="80"></div>
                                                        <?php if($value->active == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span class="user-name"><?php echo $value->username;?></span>
                                                      </a>
                                                      <div class="push popover__content">
                                                          <p class="popover__message">
                                                              Usuario: <b><?php echo string_to_mayusculas($value->username);?></b><br/>
                                                              Nombre: <b><?php echo string_to_mayusculas($value->first_name." ".$value->last_name);?></b><br/>
                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                              Rango: <b><?php echo string_to_mayusculas($value->rango);?></b><br/>
                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$value->img_rango";?>" width="50px" alt="rango"/>
                                                          </p>
                                                      </div>
                                                    </div>
                                                    <!--BEGIN THIRD LEVEL-->
                                                            <?php 
                                                            if(count($obj_customer_n3) > 0){ ?>
                                                                <ul>
                                                                    <?php 
                                                                     foreach ($obj_customer_n3 as $value3) { ?>
                                                                        <?php if($value->customer_id == $value3->parents_id){ ?>
                                                                                <li>
                                                                                    <div class="popover__wrapper">
                                                                                            <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value3->customer_id);?>">
                                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$value3->img;?>" alt="paquete" width="80"></div>
                                                                                            <?php if($value3->active == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span class="user-name"><?php echo $value3->username;?></span>
                                                                                          </a>
                                                                                          <div class="push popover__content">
                                                                                              <p class="popover__message">
                                                                                                  Usuario: <b><?php echo string_to_mayusculas($value3->username);?></b><br/>
                                                                                                  Nombre: <b><?php echo string_to_mayusculas($value3->first_name." ".$value3->last_name);?></b><br/>
                                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                  Rango: <b><?php echo string_to_mayusculas($value3->rango);?></b><br/>
                                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$value3->img_rango";?>" width="50px" alt="rango"/>
                                                                                              </p>
                                                                                          </div>
                                                                                        </div>
                                                                                    <!--BEGIN FOURD LEVEL-->
                                                                                            <?php 
                                                                                            if(count($obj_customer_n4) > 0){ ?>
                                                                                                <ul>
                                                                                                    <?php 
                                                                                                     foreach ($obj_customer_n4 as $value4) { ?>
                                                                                                        <?php if($value3->customer_id == $value4->parents_id){ ?>
                                                                                                                <li>
                                                                                                                    <div class="popover__wrapper">
                                                                                                                        <a href="<?php echo site_url().'backoffice/unilevel/'.encrypt($value4->customer_id);?>">
                                                                                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$value4->img;?>" alt="paquete" width="80"></div>
                                                                                                                        <?php if($value4->active == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                                        <span class="user-name"><?php echo $value4->username;?></span>
                                                                                                                      </a>
                                                                                                                      <div class="push popover__content">
                                                                                                                          <p class="popover__message">
                                                                                                                              Usuario: <b><?php echo string_to_mayusculas($value4->username);?></b><br/>
                                                                                                                              Nombre: <b><?php echo string_to_mayusculas($value4->first_name." ".$value4->last_name);?></b><br/>
                                                                                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                                              Rango: <b><?php echo string_to_mayusculas($value4->rango);?></b><br/>
                                                                                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$value4->img_rango";?>" width="50px" alt="rango"/>
                                                                                                                          </p>
                                                                                                                      </div>
                                                                                                                    </div>
                                                                                                                   <br><br><br>
                                                                                                                </li>
                                                                                                                <?php } ?>
                                                                                                     <?php } ?>
                                                                                            </ul>
                                                                                           <?php } ?>
                                                                                    
                                                                                    <br><br><br>
                                                                                </li>
                                                                                <?php } ?>
                                                                     <?php } ?>
                                                            </ul>
                                                           <?php } ?>
                                            <br><br><br>
                                        </li>
                                     <?php }?>
                            </ul>
                           <?php } ?>
                            <!--END PRIMARIO-->
                           </li>
                           <!--END ID ARBOL-->
                        </ul>
                    </div>
                </div>
                        </div>
                    </div>
                </div>
            </div>                        
        </div>
    </main>
</div>
</section>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/arbol.css';?>" id="maincss">