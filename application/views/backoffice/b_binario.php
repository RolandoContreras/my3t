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
        <div class="container-fluid">
            <div class="row ml-custom">
                <div class="col-xs-12">
                    <div class="col-lg-12">
                        <div class="panel panel-default network-tree-panel">
                            <div class="panel-body">
                                
                            <!--//INFORMATION POINT-->   
                                <div class="row">
                                    <div class="alert alert-inverse pull-left" style="opacity: 0.7;" aria-label="Left Align">
                                        <?php 
                                            if($obj_customer->binary == 1){ ?>
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
                                                <span class="inline-block relative">
                                                    <a  href="#" title="<?php echo $obj_customer->first_name;?>" data-toggle="popover" data-placement="right" data-content="<?php if($obj_customer->active == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="user-packet">
                                                        <div class="row imagen-profile">
                                                                <div class="div-img">
                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$obj_customer->img;?>" alt="paquete" width="80">
                                                                </div>
                                                        </div>
                                                        <?php if($obj_customer->active == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span class="user-name"><?php echo $obj_customer->username;?></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span>
                                                    </a>
                                                </span>
                                                
                                        <ul class="">
                                            <!--//------2DO LEVEL LEFT------->
                                            <li>
                                                <span class="inline-block relative">
                                                    <?php if(isset($n2_iz)){  ?>
                                                        <a  href="#" title="<?php echo $n2_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n2_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>">
                                                            <div class="row imagen-profile">
                                                                    <div class="div-img">
                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n2_iz[11];?>" alt="paquete" width="80">
                                                                    </div>
                                                            </div>
                                                        </a>
                                                        <!--USERNAME-->
                                                        <?php if($n2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span><a href="<?php echo site_url().'backoffice/binario/'.$n2_iz[2];?>" class=""><?php echo $n2_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                     <?php }else{ ?>
                                                        <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>                                                            
                                                    <?php } ?>
                                                </span>
                                                <!--//------END 2DO LEVEL LEFT------->
                                            <ul class="">
                                                <!--//-----3ER LEVEL LEFT--------->
                                                <li>
                                                    <span class="inline-block relative">
                                                        <?php if(isset($n3_iz)){  ?>
                                                            <a  href="#" title="<?php echo $n3_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n3_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                <div class="row imagen-profile">
                                                                        <div class="div-img">
                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n3_iz[11];?>" alt="paquete" width="80">
                                                                        </div>
                                                                </div>
                                                                </a>
                                                        <!--USERNAME-->
                                                        <?php if($n3_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                        <span><a href="<?php echo site_url().'backoffice/binario/'.$n3_iz[2];?>" class=""><?php echo $n3_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                            
                                                            <?php }else{ ?>
                                                             <img src="<?php echo site_url().'static/backoffice/images/blank.png';?>" alt="paquete blank" width="80"/>     
                                                            <?php } ?>
                                                    </span>
                                                            <!--//-----END 4TO LEVEL LEFT--------->
                                                    <ul class="hidden-xs">
                                                        <li>
                                                            <!--//-----4TO LEVEL LEFT--------->
                                                                <span class="inline-block relative">
                                                                    <?php if(isset($n4_iz)){  ?>
                                                                        <a  href="#" title="<?php echo $n4_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                            <div class="row imagen-profile">
                                                                                    <div class="div-img">
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n4_iz[11];?>" alt="paquete" width="80">
                                                                                    </div>
                                                                            </div>
                                                                            </a>
                                                                    <!--USERNAME-->
                                                                            <?php if($n4_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_iz[2];?>" class=""><?php echo $n4_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                                        
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
                                                                                        <a  href="#" title="<?php echo $n5_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                            <div class="row imagen-profile">
                                                                                                    <div class="div-img">
                                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n5_iz[11];?>" alt="paquete" width="60">
                                                                                                    </div>
                                                                                            </div>
                                                                                            </a>
                                                                                    <!--USERNAME-->
                                                                                            <?php if($n5_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_iz[2];?>" class=""><?php echo $n5_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                        <a  href="#" title="<?php echo $n5_2_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_2_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                            <div class="row imagen-profile">
                                                                                                    <div class="div-img">
                                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n5_2_iz[11];?>" alt="paquete" width="60">
                                                                                                    </div>
                                                                                            </div>
                                                                                            </a>
                                                                                    <!--USERNAME-->
                                                                                            <?php if($n5_2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_2_iz[2];?>" class=""><?php echo $n5_2_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                    <a  href="#" title="<?php echo $n4_2_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_2_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                        <div class="row imagen-profile">
                                                                                <div class="div-img">
                                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$n4_2_iz[11];?>" alt="paquete" width="80">
                                                                                </div>
                                                                        </div>
                                                                        </a>
                                                                    <!--USERNAME-->
                                                                            <?php if($n4_2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_2_iz[2];?>" class=""><?php echo $n4_2_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
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
                                                                                        <a  href="#" title="<?php echo $n5_3_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_3_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                            <div class="row imagen-profile">
                                                                                                    <div class="div-img">
                                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n5_3_iz[11];?>" alt="paquete" width="60">
                                                                                                    </div>
                                                                                            </div>
                                                                                            </a>
                                                                                    <!--USERNAME-->
                                                                                            <?php if($n5_3_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_3_iz[2];?>" class=""><?php echo $n5_3_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                        <a  href="#" title="<?php echo $n5_4_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_4_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                            <div class="row imagen-profile">
                                                                                                    <div class="div-img">
                                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n5_4_iz[11];?>" alt="paquete" width="60">
                                                                                                    </div>
                                                                                            </div>
                                                                                            </a>
                                                                                    <!--USERNAME-->
                                                                                            <?php if($n5_4_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_4_iz[2];?>" class=""><?php echo $n5_4_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                    <a  href="#" title="<?php echo $n3_2_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n3_2_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                        <div class="row imagen-profile">
                                                                <div class="div-img">
                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$n3_2_iz[11];?>" alt="paquete" width="80">
                                                                </div>
                                                        </div>
                                                        </a>
                                                         <!--USERNAME-->
                                                            <?php if($n3_2_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n3_2_iz[2];?>" class=""><?php echo $n3_2_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
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
                                                                        <a  href="#" title="<?php echo $n4_3_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_3_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                            <div class="row imagen-profile">
                                                                                    <div class="div-img">
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n4_3_iz[11];?>" alt="paquete" width="80">
                                                                                    </div>
                                                                            </div>
                                                                            </a>
                                                                    <!--USERNAME-->
                                                                    <?php if($n4_3_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                    <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_3_iz[2];?>" class=""><?php echo $n4_3_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                                        
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
                                                                                            <a  href="#" title="<?php echo $n5_5_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_5_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_5_iz[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                        <!--USERNAME-->
                                                                                                <?php if($n5_5_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_5_iz[2];?>" class=""><?php echo $n5_5_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                            <a  href="#" title="<?php echo $n5_6_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_6_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_6_iz[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                        <!--USERNAME-->
                                                                                                <?php if($n5_6_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_6_iz[2];?>" class=""><?php echo $n5_6_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                    <a  href="#" title="<?php echo $n4_4_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_4_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                        <div class="row imagen-profile">
                                                                                <div class="div-img">
                                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$n4_4_iz[11];?>" alt="paquete" width="80">
                                                                                </div>
                                                                        </div>
                                                                        </a>
                                                                    <!--USERNAME-->
                                                                    <?php if($n4_4_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                    <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_4_iz[2];?>" class=""><?php echo $n4_4_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                                    
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
                                                                                            <a  href="#" title="<?php echo $n5_7_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_7_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_7_iz[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                        <!--USERNAME-->
                                                                                                <?php if($n5_7_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_7_iz[2];?>" class=""><?php echo $n5_7_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                            <a  href="#" title="<?php echo $n5_8_iz[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_8_iz[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_8_iz[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                        <!--USERNAME-->
                                                                                                <?php if($n5_8_iz[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_8_iz[2];?>" class=""><?php echo $n5_8_iz[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                        <a  href="#" title="<?php echo $n2_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n2_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="">
                                                            <div class="row imagen-profile">
                                                                    <div class="div-img">
                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n2_de[11];?>" alt="paquete" width="80">
                                                                    </div>
                                                            </div>
                                                            </a>
                                                            <!--USERNAME-->
                                                            <?php if($n2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n2_de[2];?>" class=""><?php echo $n2_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                        
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
                                                            <a  href="#" title="<?php echo $n3_2_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n3_2_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                <div class="row imagen-profile">
                                                                        <div class="div-img">
                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n3_2_de[11];?>" alt="paquete" width="80">
                                                                        </div>
                                                                </div>
                                                                </a>
                                                            <!--USERNAME-->
                                                            <?php if($n3_2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n3_2_de[2];?>" class=""><?php echo $n3_2_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                            
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
                                                                        <a  href="#" title="<?php echo $n4_4_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_4_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                            <div class="row imagen-profile">
                                                                                    <div class="div-img">
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n4_4_de[11];?>" alt="paquete" width="80">
                                                                                    </div>
                                                                            </div>
                                                                            </a>
                                                                            <!--USERNAME-->
                                                                            <?php if($n4_4_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_4_de[2];?>" class=""><?php echo $n4_4_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                                        
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
                                                                                            <a  href="#" title="<?php echo $n5_8_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_8_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_8_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_8_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_8_de[2];?>" class=""><?php echo $n5_8_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                            <a  href="#" title="<?php echo $n5_7_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_7_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_7_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_7_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_7_de[2];?>" class=""><?php echo $n5_7_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                    <a  href="#" title="<?php echo $n4_3_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_3_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                        <div class="row imagen-profile">
                                                                                <div class="div-img">
                                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$n4_3_de[11];?>" alt="paquete" width="80">
                                                                                </div>
                                                                        </div>
                                                                        </a>
                                                                            <!--USERNAME-->
                                                                            <?php if($n4_3_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_3_de[2];?>" class=""><?php echo $n4_3_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                                    
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
                                                                                            <a  href="#" title="<?php echo $n5_6_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_6_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_6_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_6_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_6_de[2];?>" class=""><?php echo $n5_6_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                            <a  href="#" title="<?php echo $n5_5_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_5_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_5_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_5_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_5_de[2];?>" class=""><?php echo $n5_5_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                    <a  href="#" title="<?php echo $n3_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n3_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                        <div class="row imagen-profile">
                                                                <div class="div-img">
                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$n3_de[11];?>" alt="paquete" width="80">
                                                                </div>
                                                        </div>
                                                        </a>
                                                        <!--USERNAME-->
                                                            <?php if($n3_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                            <span><a href="<?php echo site_url().'backoffice/binario/'.$n3_de[2];?>" class=""><?php echo $n3_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                    
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
                                                                        <a  href="#" title="<?php echo $n4_2_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_2_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                            <div class="row imagen-profile">
                                                                                    <div class="div-img">
                                                                                        <img src="<?php echo site_url().'static/backoffice/images/'.$n4_2_de[11];?>" alt="paquete" width="80">
                                                                                    </div>
                                                                            </div>
                                                                            </a>
                                                                            <!--USERNAME-->
                                                                                <?php if($n4_2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_2_de[2];?>" class=""><?php echo $n4_2_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
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
                                                                                            <a  href="#" title="<?php echo $n5_4_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_4_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_4_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_4_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_4_de[2];?>" class=""><?php echo $n5_4_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                            <a  href="#" title="<?php echo $n5_3_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_3_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_3_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_3_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_3_de[2];?>" class=""><?php echo $n5_3_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                    <a  href="#" title="<?php echo $n4_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n4_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                        <div class="row imagen-profile">
                                                                                <div class="div-img">
                                                                                    <img src="<?php echo site_url().'static/backoffice/images/'.$n4_de[11];?>" alt="paquete" width="80">
                                                                                </div>
                                                                        </div>
                                                                        </a>
                                                                    <!--USERNAME-->
                                                                                <?php if($n4_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n4_de[2];?>" class=""><?php echo $n4_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>
                                                                    
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
                                                                                            <a  href="#" title="<?php echo $n5_2_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_2_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_2_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_2_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_2_de[2];?>" class=""><?php echo $n5_2_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
                                                                                            <a  href="#" title="<?php echo $n5_de[0];?>" data-toggle="popover" data-placement="right" data-content="<?php if($n5_de[7] == 1){ echo "ACTIVO";?><?php }else{ echo "INACTIVO";?><?php } ?>" class="status-1">
                                                                                                <div class="row imagen-profile">
                                                                                                        <div class="div-img">
                                                                                                            <img src="<?php echo site_url().'static/backoffice/images/'.$n5_de[11];?>" alt="paquete" width="60">
                                                                                                        </div>
                                                                                                </div>
                                                                                                </a>
                                                                                                <!--USERNAME-->
                                                                                                <?php if($n5_de[7] == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                                                                                <span><a href="<?php echo site_url().'backoffice/binario/'.$n5_de[2];?>" class=""><?php echo $n5_de[6];?></a></span> - <span class="<?php echo $style;?>"><?php echo $text;?></span> <br>

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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="popover"]').popover({ html : true });
//$('.btn').popover({title: "<h1><strong>HTML</strong> inside <code>the</code> <em>popover</em></h1>", content: "Blabla <br> <h2>Cool stuff!</h2>", html: true, placement: "right"}); 
});
</script>

<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/arbol.css';?>" id="maincss">