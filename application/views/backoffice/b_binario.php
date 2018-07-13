<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">Arbol Binario</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div>
<!------------------------------------------->
<div id="page-content-wrapper">
    <main>
        <div class="container-fluid cont-arbol">
            <div class="row ml-custom">
                <div class="col-xs-12">
                    <div class="col-lg-12">
                        <div class="panel panel-default network-tree-panel cont-arbol">
                            <div class="panel-body cont-arbol">
                                
                            <!--//INFORMATION POINT-->   
                                <div class="row">
                                    <div class="alert alert-inverse pull-left" style="opacity: 0.7;" aria-label="Left Align">
                                        <?php 
                                            if($obj_customer->binaries == 1){ ?>
                                                <b>CALIFICADO PARA BINARIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                                <?php }else{ ?>
                                                <b>PUNTOS DE CALIFICACIÓN</b>
                                                     <hr>
                                                    <b>IZQUIERDA: </b> <span class="label label-primary"><?php if($obj_customer->point_calification_left > 0){echo $obj_customer->point_calification_left;}else{echo "0";}?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    <b>DERECHA: </b><span class="label label-primary"><?php if($obj_customer->point_calification_rigth > 0){echo $obj_customer->point_calification_rigth;}else{echo "0";}?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <?php } ?>
                                    </div>
                                    <div class="alert alert-inverse pull-right" style="opacity: 0.7;" aria-label="Right Align">
                                        <b>PUNTOS DE BINARIO</b>
                                        <hr>
                                         <b>IZQUIERDA: </b> 
                                         <span class="label label-primary"><?php echo format_number_miles($obj_customer->point_left);?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                         <b>DERECHA: </b><span class="label label-primary"><?php echo format_number_miles($obj_customer->point_rigth);?></span> &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <!--//END INFORMATION POINT-->    
                                <hr>
                                <div class="clearfix btn-holder">
                                    <a href="<?php echo site_url().'backoffice/binario';?>" class="btn btn-success btn-sm pull-left" aria-label="Left Align">
                                        <span class="rotate-top-left"><em class="fa fa-circle" aria-hidden="true"></em></span>Volver al inicio
                                    </a>
                                    <a href="javascript: history.back(-1)" class="btn btn-success btn-sm pull-right" aria-label="Right Align"> Subir un nivel
                                        <span class="rotate-top-right"><em class="fa fa-arrow-down" aria-hidden="true"></em></span>
                                    </a>
                                </div>
                                
                                <!--//ESTRUCTURE TREE-->
                                    <div class="network-tree-stucture">
                                        <ul>
                                            <li>
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
                                                              Rango: <b><?php echo $obj_customer->rango;?></b><br/>
                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$obj_customer->img_rango";?>" width="50px" alt="rango"/>
                                                          </p>
                                                      </div>
                                                    </div>
                                        <ul class="">
                                            <!--//------2DO LEVEL LEFT------->
                                            <li>
                                                <?php if(isset($n2_iz)){  ?>
                                                 <div class="popover__wrapper">
                                                        <a href="<?php echo site_url().'backoffice/binario/'.$n2_iz[2];?>">
                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n2_iz[11]?>" alt="paquete" width="80"></div>
                                                        <?php if($n2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span class="user-name"><?php echo $n2_iz[6];?></span>
                                                      </a>
                                                      <div class="push popover__content">
                                                          <p class="popover__message">
                                                              Usuario: <b><?php echo $n2_iz[6];?></b><br/>
                                                              Nombre: <b><?php echo $n2_iz[0]." ".$n2_iz[1];?></b><br/>
                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                              Rango: <b><?php echo $n2_iz[12];?></b><br/>
                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$n2_iz[13]";?>" width="50px" alt="<?php echo $n2_iz[13];?>"/>
                                                          </p>
                                                      </div>
                                                    </div>
                                                <?php }else{ ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>                                                            
                                                    <?php } ?>

                                                <!--//------END 2DO LEVEL LEFT------->
                                            <ul class="">
                                                <!--//-----3ER LEVEL LEFT--------->
                                                <li>
                                                    <?php if(isset($n3_iz)){  ?>
                                                    <div class="popover__wrapper">
                                                        <a href="<?php echo site_url().'backoffice/binario/'.$n3_iz[2];?>">
                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n3_iz[11]?>" alt="paquete" width="80"></div>
                                                        <?php if($n3_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span class="user-name"><?php echo $n3_iz[6];?></span>
                                                      </a>
                                                      <div class="push popover__content">
                                                          <p class="popover__message">
                                                              Usuario: <b><?php echo $n3_iz[6];?></b><br/>
                                                              Nombre: <b><?php echo $n3_iz[0]." ".$n3_iz[1];?></b><br/>
                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                              Rango: <b><?php echo $n3_iz[12];?></b><br/>
                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$n3_iz[13]";?>" width="50px" alt="<?php echo $n3_iz[13];?>"/>
                                                          </p>
                                                      </div>
                                                    </div>
                                                    <?php }else{ ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>                                                            
                                                        <span class="user-name"></span>
                                                    <?php } ?>
                                                            <!--//-----END 4TO LEVEL LEFT--------->
                                                    <ul class="hidden-xs">
                                                        <li>
                                                            <!--//-----4TO LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_iz)){  ?>
                                                                         <div class="popover__wrapper_left">
                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n4_iz[2];?>">
                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_iz[11]?>" alt="paquete" width="80"></div>
                                                                                <?php if($n4_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                <span class="user-name"><?php echo $n4_iz[6];?></span>
                                                                              </a>
                                                                              <div class="push popover__content_left">
                                                                                  <p class="popover__message_left">
                                                                                      Usuario: <b><?php echo $n4_iz[6];?></b><br/>
                                                                                      Nombre: <b><?php echo $n4_iz[0]." ".$n4_iz[1];?></b><br/>
                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                      Rango: <b><?php echo $n4_iz[12];?></b><br/>
                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_iz[13]";?>" width="50px" alt="<?php echo $n4_iz[13];?>"/>
                                                                                  </p>
                                                                              </div>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                       <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO LEVEL LEFT--------->
                                                                    <ul class="hidden-xs">
                                                                        <li>
                                                                            <!--//-----5TO LEVEL LEFT--------->
                                                                                <span class="inline-block relative">
                                                                                    <?php if(isset($n5_iz)){  ?>
                                                                                        <div class="popover__wrapper_5left">
                                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n5_iz[2];?>">
                                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_iz[11]?>" alt="paquete" width="80"></div>
                                                                                            <?php if($n5_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span class="user-name"><?php echo $n5_iz[6];?></span>
                                                                                          </a>
                                                                                          <div class="push popover__content_5left">
                                                                                              <p class="popover__message_5left">
                                                                                                  Usuario: <b><?php echo $n5_iz[6];?></b><br/>
                                                                                                  Nombre: <b><?php echo $n5_iz[0]." ".$n5_iz[1];?></b><br/>
                                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                  Rango: <b><?php echo $n5_iz[12];?></b><br/>
                                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_iz[13]";?>" width="50px" alt="<?php echo $n5_iz[13];?>"/>
                                                                                              </p>
                                                                                          </div>
                                                                                        </div>
                                                                                        <?php }else{ ?>
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                       <?php } ?>
                                                                                    </span>
                                                                                    <!--//-----END 4TO LEVEL LEFT--------->

                                                                        </li>
                                                                        <li>
                                                                            <!--//-----5TO LEVEL LEFT--------->
                                                                                <span class="inline-block relative">
                                                                                    <?php if(isset($n5_2_iz)){  ?>
                                                                                        <div class="popover__wrapper_5left">
                                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n5_2_iz[2];?>">
                                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_2_iz[11]?>" alt="paquete" width="80"></div>
                                                                                            <?php if($n5_2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span class="user-name"><?php echo $n5_2_iz[6];?></span>
                                                                                          </a>
                                                                                          <div class="push popover__content_5left">
                                                                                              <p class="popover__message_5left">
                                                                                                  Usuario: <b><?php echo $n5_2_iz[6];?></b><br/>
                                                                                                  Nombre: <b><?php echo $n5_2_iz[0]." ".$n5_2_iz[1];?></b><br/>
                                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                  Rango: <b><?php echo $n5_2_iz[12];?></b><br/>
                                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_2_iz[13]";?>" width="50px" alt="<?php echo $n5_2_iz[13];?>"/>
                                                                                              </p>
                                                                                          </div>
                                                                                        </div>
                                                                                        <?php }else{ ?>
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                       <?php } ?>
                                                                                    </span>
                                                                                    <!--//-----END 4TO LEVEL LEFT--------->

                                                                        </li>
                                                                    </ul>
                                                                    
                                                        </li>
                                                        
                                                        <li>
                                                            <!--//-----4TO 2IZ LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_2_iz)){ ?>
                                                                    <div class="popover__wrapper_left">
                                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n4_2_iz[2];?>">
                                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_2_iz[11]?>" alt="paquete" width="80"></div>
                                                                                            <?php if($n4_2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span class="user-name"><?php echo $n4_2_iz[6];?></span>
                                                                                          </a>
                                                                                          <div class="push popover__content_left">
                                                                                              <p class="popover__message_left">
                                                                                                  Usuario: <b><?php echo $n4_2_iz[6];?></b><br/>
                                                                                                  Nombre: <b><?php echo $n4_2_iz[0]." ".$n4_2_iz[1];?></b><br/>
                                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                  Rango: <b><?php echo $n4_2_iz[12];?></b><br/>
                                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_2_iz[13]";?>" width="50px" alt="<?php echo $n4_2_iz[13];?>"/>
                                                                                              </p>
                                                                                          </div>
                                                                                        </div>
                                                                    <?php }else{ ?>
                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                    <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO 2DO LEVEL LEFT--------->
                                                                    
                                                                    <ul>
                                                                        <li>
                                                                            <!--//-----5TO LEVEL LEFT--------->
                                                                                <span class="inline-block relative">
                                                                                    <?php if(isset($n5_3_iz)){  ?>
                                                                                        <div class="popover__wrapper_5left">
                                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n5_3_iz[2];?>">
                                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_3_iz[11]?>" alt="paquete" width="80"></div>
                                                                                            <?php if($n5_3_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span class="user-name"><?php echo $n5_3_iz[6];?></span>
                                                                                          </a>
                                                                                          <div class="push popover__content_5left">
                                                                                              <p class="popover__message_5left">
                                                                                                  Usuario: <b><?php echo $n5_3_iz[6];?></b><br/>
                                                                                                  Nombre: <b><?php echo $n5_3_iz[0]." ".$n5_3_iz[1];?></b><br/>
                                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                  Rango: <b><?php echo $n5_3_iz[12];?></b><br/>
                                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_3_iz[13]";?>" width="50px" alt="<?php echo $n5_3_iz[13];?>"/>
                                                                                              </p>
                                                                                          </div>
                                                                                        </div>

                                                                                        <?php }else{ ?>
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                       <?php } ?>
                                                                                    </span>
                                                                                    <!--//-----END 4TO LEVEL LEFT--------->

                                                                        </li>
                                                                        <li>
                                                                            <!--//-----5TO LEVEL LEFT--------->
                                                                                <span class="inline-block relative">
                                                                                    <?php if(isset($n5_4_iz)){  ?>
                                                                                        <div class="popover__wrapper_5left">
                                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n5_4_iz[2];?>">
                                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_4_iz[11]?>" alt="paquete" width="80"></div>
                                                                                            <?php if($n5_4_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span class="user-name"><?php echo $n5_4_iz[6];?></span>
                                                                                          </a>
                                                                                          <div class="push popover__content_5left">
                                                                                              <p class="popover__message_5left">
                                                                                                  Usuario: <b><?php echo $n5_4_iz[6];?></b><br/>
                                                                                                  Nombre: <b><?php echo $n5_4_iz[0]." ".$n5_4_iz[1];?></b><br/>
                                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                  Rango: <b><?php echo $n5_4_iz[12];?></b><br/>
                                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_4_iz[13]";?>" width="50px" alt="<?php echo $n5_4_iz[13];?>"/>
                                                                                              </p>
                                                                                          </div>
                                                                                        </div>

                                                                                        <?php }else{ ?>
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                       <?php } ?>
                                                                                    </span>
                                                                                    <!--//-----END 4TO LEVEL LEFT--------->

                                                                        </li>
                                                                    </ul>
                                                        </li>
                                                    </ul>
                                                </li>

                                                 <!--//-----3ER 2DO LEVEL LEFT--------->
                                                <li>
                                                    <span class="inline-block relative">
                                                    <?php if(isset($n3_2_iz)){ ?>
                                                    <div class="popover__wrapper">
                                                        <a href="<?php echo site_url().'backoffice/binario/'.$n3_2_iz[2];?>">
                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n3_2_iz[11]?>" alt="paquete" width="80"></div>
                                                        <?php if($n3_2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span class="user-name"><?php echo $n3_2_iz[6];?></span>
                                                      </a>
                                                      <div class="push popover__content">
                                                          <p class="popover__message">
                                                              Usuario: <b><?php echo $n3_2_iz[6];?></b><br/>
                                                              Nombre: <b><?php echo $n3_2_iz[0]." ".$n3_2_iz[1];?></b><br/>
                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                              Rango: <b><?php echo $n3_2_iz[12];?></b><br/>
                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$n3_2_iz[13]";?>" width="50px" alt="<?php echo $n3_2_iz[13];?>"/>
                                                          </p>
                                                      </div>
                                                    </div>
                                                        <?php }else{ ?>
                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="96"/>     
                                                         <?php } ?>
                                                    </span>
                                                            <!--//-----END 3ER 2DO LEVEL LEFT--------->
                                                    <ul class="hidden-xs">
                                                        <li>
                                                            <!--//-----4TO 3ER LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_3_iz)){ ?>
                                                                        <div class="popover__wrapper_left">
                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n4_3_iz[2];?>">
                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_3_iz[11]?>" alt="paquete" width="80"></div>
                                                                            <?php if($n4_3_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span class="user-name"><?php echo $n4_3_iz[6];?></span>
                                                                          </a>
                                                                          <div class="push popover__content_left">
                                                                              <p class="popover__message_left">
                                                                                  Usuario: <b><?php echo $n4_3_iz[6];?></b><br/>
                                                                                  Nombre: <b><?php echo $n4_3_iz[0]." ".$n4_3_iz[1];?></b><br/>
                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                  Rango: <b><?php echo $n4_3_iz[12];?></b><br/>
                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_3_iz[13]";?>" width="50px" alt="<?php echo $n4_3_iz[13];?>"/>
                                                                              </p>
                                                                          </div>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                             <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                        <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO 3ER LEVEL LEFT--------->
                                                                    
                                                                        <ul>
                                                                            <li>
                                                                                <!--//-----5TO_5 LEVEL LEFT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_5_iz)){  ?>
                                                                                            <div class="popover__wrapper_5left">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_5_iz[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_5_iz[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_5_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_5_iz[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5left">
                                                                                                  <p class="popover__message_5left">
                                                                                                      Usuario: <b><?php echo $n5_5_iz[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_5_iz[0]." ".$n5_5_iz[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_5_iz[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_5_iz[13]";?>" width="50px" alt="<?php echo $n5_5_iz[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->

                                                                            </li>
                                                                            <li>
                                                                                <!--//-----5TO_6 LEVEL LEFT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_6_iz)){  ?>
                                                                                            <div class="popover__wrapper_5left">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_6_iz[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_6_iz[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_6_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_6_iz[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5left">
                                                                                                  <p class="popover__message_5left">
                                                                                                      Usuario: <b><?php echo $n5_6_iz[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_6_iz[0]." ".$n5_6_iz[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_6_iz[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_6_iz[13]";?>" width="50px" alt="<?php echo $n5_6_iz[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->

                                                                            </li>
                                                                        </ul>
                                                        </li>
                                                        <li>
                                                            <!--//-----4TO 4TO LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_4_iz)){ ?>
                                                                    <div class="popover__wrapper_left">
                                                                        <a href="<?php echo site_url().'backoffice/binario/'.$n4_4_iz[2];?>">
                                                                        <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_4_iz[11]?>" alt="paquete" width="80"></div>
                                                                        <?php if($n4_4_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                        <span class="user-name"><?php echo $n4_4_iz[6];?></span>
                                                                      </a>
                                                                      <div class="push popover__content_left">
                                                                          <p class="popover__message_left">
                                                                              Usuario: <b><?php echo $n4_4_iz[6];?></b><br/>
                                                                              Nombre: <b><?php echo $n4_4_iz[0]." ".$n4_4_iz[1];?></b><br/>
                                                                              Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                              Rango: <b><?php echo $n4_4_iz[12];?></b><br/>
                                                                              <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_4_iz[13]";?>" width="50px" alt="<?php echo $n4_4_iz[13];?>"/>
                                                                          </p>
                                                                      </div>
                                                                    </div>
                                                                    <?php }else{ ?>
                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                    <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO LEVEL LEFT--------->
                                                                    
                                                                        <ul>
                                                                            <li>
                                                                                <!--//-----5TO_7 LEVEL LEFT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_7_iz)){  ?>
                                                                                           <div class="popover__wrapper_5left">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_7_iz[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_7_iz[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_7_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_7_iz[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5left">
                                                                                                  <p class="popover__message_5left">
                                                                                                      Usuario: <b><?php echo $n5_7_iz[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_7_iz[0]." ".$n5_7_iz[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_7_iz[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_7_iz[13]";?>" width="50px" alt="<?php echo $n5_7_iz[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->

                                                                            </li>
                                                                            <li>
                                                                                <!--//-----5TO_6 LEVEL LEFT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_8_iz)){  ?>
                                                                                            <div class="popover__wrapper_5left">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_8_iz[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_8_iz[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_8_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_8_iz[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5left">
                                                                                                  <p class="popover__message_5left">
                                                                                                      Usuario: <b><?php echo $n5_8_iz[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_8_iz[0]." ".$n5_8_iz[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_8_iz[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_8_iz[13]";?>" width="50px" alt="<?php echo $n5_8_iz[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->

                                                                            </li>
                                                                        </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
<!--                                        -------------------------------------
                                        -------------------------------------
                                        -------------------------------------
                                        --------------------------------------->
                                        
                                         <!--//------2DO LEVEL RIGHT------->
                                            <li>
                                                <span class="inline-block relative">
                                                    <?php if(isset($n2_de)){  ?>
                                                       <div class="popover__wrapper">
                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n2_de[2];?>">
                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n2_de[11]?>" alt="paquete" width="80"></div>
                                                                <?php if($n2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                <span class="user-name"><?php echo $n2_de[6];?></span>
                                                              </a>
                                                              <div class="push popover__content">
                                                                  <p class="popover__message">
                                                                      Usuario: <b><?php echo $n2_de[6];?></b><br/>
                                                                      Nombre: <b><?php echo $n2_de[0]." ".$n2_de[1];?></b><br/>
                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                      Rango: <b><?php echo $n2_de[12];?></b><br/>
                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n2_de[13]";?>" width="50px" alt="<?php echo $n2_de[13];?>"/>
                                                                  </p>
                                                              </div>
                                                            </div>
                                                     <?php }else{ ?>
                                                         <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                    <?php } ?>
                                                </span>
                                                <!--//------END 2DO LEVEL RIGHT------->
                                            <ul class="">
                                                <!--//-----3ER 2DO LEVEL RIGHT--------->
                                                <li>
                                                    <span class="inline-block relative">
                                                        <?php if(isset($n3_2_de)){  ?>
                                                             <div class="popover__wrapper">
                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n3_2_de[2];?>">
                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n3_2_de[11]?>" alt="paquete" width="80"></div>
                                                                <?php if($n3_2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                <span class="user-name"><?php echo $n3_2_de[6];?></span>
                                                              </a>
                                                              <div class="push popover__content">
                                                                  <p class="popover__message">
                                                                      Usuario: <b><?php echo $n3_2_de[6];?></b><br/>
                                                                      Nombre: <b><?php echo $n3_2_de[0]." ".$n3_2_de[1];?></b><br/>
                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                      Rango: <b><?php echo $n3_2_de[12];?></b><br/>
                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n3_2_de[13]";?>" width="50px" alt="<?php echo $n3_2_de[13];?>"/>
                                                                  </p>
                                                              </div>
                                                            </div>
                                                            <?php }else{ ?>
                                                             <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                            <?php } ?>
                                                    </span>
                                                            <!--//-----3ER 2DO LEVEL RIGHT--------->
                                                    <ul class="hidden-xs">
                                                        <li>
                                                            <!--//-----4TO 4TO LEVEL RIGHT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_4_de)){  ?>
                                                                        <div class="popover__wrapper_right">
                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n4_4_de[2];?>">
                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_4_de[11]?>" alt="paquete" width="80"></div>
                                                                                <?php if($n4_4_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                <span class="user-name"><?php echo $n4_4_de[6];?></span>
                                                                              </a>
                                                                              <div class="push popover__content_right">
                                                                                  <p class="popover__message_right">
                                                                                      Usuario: <b><?php echo $n4_4_de[6];?></b><br/>
                                                                                      Nombre: <b><?php echo $n4_4_de[0]." ".$n4_4_de[1];?></b><br/>
                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                      Rango: <b><?php echo $n4_4_de[12];?></b><br/>
                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_4_de[13]";?>" width="50px" alt="<?php echo $n4_4_de[13];?>"/>
                                                                                  </p>
                                                                              </div>
                                                                            </div>
                                                                        <?php }else{ ?>
                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                       <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO LEVEL LEFT--------->
                                                                        <ul class="hidden-xs">
                                                                            <li>
                                                                                <!--//-----5TO LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_8_de)){  ?>
                                                                                           <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_8_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_8_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_8_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_8_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_8_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_8_de[0]." ".$n5_8_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_8_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_8_de[13]";?>" width="50px" alt="<?php echo $n5_8_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>
                                                                            <li>
                                                                                <!--//-----5TO_3 LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_7_de)){  ?>
                                                                                             <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_7_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_7_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_7_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_7_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_7_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_7_de[0]." ".$n5_7_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_7_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_7_de[13]";?>" width="50px" alt="<?php echo $n5_7_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>  
                                                                         </ul>
                                                        </li>
                                                        <li>
                                                            <!--//-----4TO 3ER LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_3_de)){ ?>
                                                                    <div class="popover__wrapper_right">
                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n4_3_de[2];?>">
                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_3_de[11]?>" alt="paquete" width="80"></div>
                                                                            <?php if($n4_3_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span class="user-name"><?php echo $n4_3_de[6];?></span>
                                                                          </a>
                                                                          <div class="push popover__content_right">
                                                                              <p class="popover__message_right">
                                                                                  Usuario: <b><?php echo $n4_3_de[6];?></b><br/>
                                                                                  Nombre: <b><?php echo $n4_3_de[0]." ".$n4_3_de[1];?></b><br/>
                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                  Rango: <b><?php echo string_to_mayusculas($n4_3_de[12]);?></b><br/>
                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_3_de[13]";?>" width="50px" alt="<?php echo $n4_3_de[13];?>"/>
                                                                              </p>
                                                                          </div>
                                                                        </div>
                                                                    <?php }else{ ?>
                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                    <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO 3ER LEVEL RIGHT--------->
                                                                        <ul class="hidden-xs">
                                                                            <li>
                                                                                <!--//-----5TO LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_6_de)){  ?>
                                                                                           <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_6_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_6_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_6_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_6_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_6_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_6_de[0]." ".$n5_6_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_6_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_6_de[13]";?>" width="50px" alt="<?php echo $n5_6_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>
                                                                            <li>
                                                                                <!--//-----5TO_3 LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_5_de)){  ?>
                                                                                            <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_5_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_5_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_5_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_5_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_5_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_5_de[0]." ".$n5_5_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_5_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_5_de[13]";?>" width="50px" alt="<?php echo $n5_5_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>  
                                                                         </ul>
                                                                    
                                                        </li>
                                                    </ul>
                                                </li>

                                                 <!--//-----3ER LEVEL RIGHT--------->
                                                <li>
                                                    <span class="inline-block relative">
                                                    <?php if(isset($n3_de)){ ?>
                                                        <div class="popover__wrapper">
                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n3_de[2];?>">
                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n3_de[11]?>" alt="paquete" width="80"></div>
                                                                <?php if($n3_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                <span class="user-name"><?php echo $n3_de[6];?></span>
                                                              </a>
                                                              <div class="push popover__content">
                                                                  <p class="popover__message">
                                                                      Usuario: <b><?php echo $n3_de[6];?></b><br/>
                                                                      Nombre: <b><?php echo $n3_de[0]." ".$n3_de[1];?></b><br/>
                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                      Rango: <b><?php echo $n3_de[12];?></b><br/>
                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n3_de[13]";?>" width="50px" alt="<?php echo $n3_de[13];?>"/>
                                                                  </p>
                                                              </div>
                                                            </div>
                                                        <?php }else{ ?>
                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                         <?php } ?>
                                                    </span>
                                                            <!--//-----END 3ER LEVEL RIGHT--------->
                                                    <ul class="hidden-xs">
                                                        <li>
                                                            <!--//-----4TO 2DO LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_2_de)){ ?>
                                                                        <div class="popover__wrapper_right">
                                                                            <a href="<?php echo site_url().'backoffice/binario/'.$n4_2_de[2];?>">
                                                                            <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_2_de[11]?>" alt="paquete" width="80"></div>
                                                                            <?php if($n4_2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span class="user-name"><?php echo $n4_2_de[6];?></span>
                                                                          </a>
                                                                          <div class="push popover__content_right">
                                                                              <p class="popover__message_right">
                                                                                  Usuario: <b><?php echo $n4_2_de[6];?></b><br/>
                                                                                  Nombre: <b><?php echo $n4_2_de[0]." ".$n4_2_de[1];?></b><br/>
                                                                                  Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                  Rango: <b><?php echo $n4_2_de[12];?></b><br/>
                                                                                  <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_2_de[13]";?>" width="50px" alt="<?php echo $n4_2_de[13];?>"/>
                                                                              </p>
                                                                          </div>
                                                                        </div>
                                                                        <?php }else{ ?>
                                                                             <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                        <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO 2DO LEVEL RIGHT--------->
                                                                        <ul class="hidden-xs">
                                                                            <li>
                                                                                <!--//-----5TO LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_4_de)){  ?>
                                                                                            <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_4_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_4_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_4_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_4_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_4_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_4_de[0]." ".$n5_4_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_4_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_4_de[13]";?>" width="50px" alt="<?php echo $n5_4_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>
                                                                            <li>
                                                                                <!--//-----5TO_3 LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_3_de)){  ?>
                                                                                            <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_3_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_3_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_3_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_3_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_3_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_3_de[0]." ".$n5_3_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_4_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_3_de[13]";?>" width="50px" alt="<?php echo $n5_3_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>  
                                                                         </ul> 
                                                        </li>
                                                        
                                                        <li>
                                                            <!--//-----4TO LEVEL RIGHT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_de)){ ?>
                                                                   <div class="popover__wrapper_right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n4_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n4_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n4_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n4_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_right">
                                                                                                  <p class="popover__message_right">
                                                                                                      Usuario: <b><?php echo $n4_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n4_de[0]." ".$n4_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n4_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n4_de[13]";?>" width="50px" alt="<?php echo $n4_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                    <?php }else{ ?>
                                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                    <?php } ?>
                                                                    </span>
                                                                    <!--//-----END 4TO LEVEL RIGHT--------->
                                                                    
                                                                         <ul class="hidden-xs">
                                                                            <li>
                                                                                <!--//-----5TO LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_2_de)){  ?>
                                                                                            <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_2_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_2_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_2_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_2_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_2_de[0]." ".$n5_2_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_2_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_2_de[13]";?>" width="50px" alt="<?php echo $n5_2_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>
                                                                            <li>
                                                                                <!--//-----5TO LEVEL RIGHT--------->
                                                                                    <span class="inline-block relative">
                                                                                        <?php if(isset($n5_de)){  ?>
                                                                                            <div class="popover__wrapper_5right">
                                                                                                <a href="<?php echo site_url().'backoffice/binario/'.$n5_de[2];?>">
                                                                                                <div class="row imagen-profile"><img src="<?php echo site_url().'static/backoffice/images/'.$n5_de[11]?>" alt="paquete" width="80"></div>
                                                                                                <?php if($n5_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span class="user-name"><?php echo $n5_de[6];?></span>
                                                                                              </a>
                                                                                              <div class="push popover__content_5right">
                                                                                                  <p class="popover__message_5right">
                                                                                                      Usuario: <b><?php echo $n5_de[6];?></b><br/>
                                                                                                      Nombre: <b><?php echo $n5_de[0]." ".$n5_de[1];?></b><br/>
                                                                                                      Estado: <span class="<?php echo $style;?>"><?php echo $text;?></span><br/>
                                                                                                      Rango: <b><?php echo $n5_de[12];?></b><br/>
                                                                                                      <img src="<?php echo site_url()."static/backoffice/images/rangos/$n5_de[13]";?>" width="50px" alt="<?php echo $n5_de[13];?>"/>
                                                                                                  </p>
                                                                                              </div>
                                                                                            </div>
                                                                                            <?php }else{ ?>
                                                                                            <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                                                           <?php } ?>
                                                                                        </span>
                                                                                        <!--//-----END 4TO LEVEL LEFT--------->
                                                                            </li>
                                                                         </ul>   
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                     </ul>
                                </li>
                            </ul>
                        </div>
                                <br><br><br>
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
<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/arbol.css';?>">