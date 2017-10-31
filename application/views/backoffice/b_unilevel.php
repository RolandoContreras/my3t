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
                <div class="col-xs-12">
                    <div class="col-lg-12">
                        <div class="panel panel-default network-tree-panel">
                           <div class="cont-arbol">
                               <div class="alert alert-inverse pull-left" style="opacity: 0.7;" aria-label="Right Align">
                                   <a href="<?php echo site_url().'backoffice/unilevel';?>"><button class="btn btn-success btn-outline" type="button">Volver Al Inicio</button></a>
                                   <a href="javascript:history.back(1)"><button class="btn btn-success btn-outline" type="button"><?php echo replace_vocales_voculeshtml("Volver Atrás");?></button></a>
                               </div>
                               <div class="alert alert-inverse pull-right" style="opacity: 0.7;" aria-label="Right Align">
                                   <button class="btn btn-success btn-outline" type="button">Patrocinios Directos: <?php echo $obj_customer->direct;?></button>
                                </div>
                            <div class="tree" style="width: 1000%;"> 
                                <div class="col-lg-12"><hr class="style-2"></div>
                                <ul>
                                    <li>
                                    <span class="inline-block relative">
                                                    <a href="#" data-toggle="popover" data-placement="right" data-container="body" title="Datos del Afiliado" data-content="
                                                Nombre:<?php echo $obj_customer->first_name." ".$obj_customer->last_name;?>
                                                Fecha Registro:<?php echo $obj_customer->created_at;?>
                                                Estatus:
                                                <?php if($obj_customer->active == 1){ ?>
                                                          Activo
                                                      <?php }else{ ?>
                                                          Inactivo
                                                      <?php } ?>

                                                          Calificación:<?php echo $obj_customer->franchise;?>
                                                Pais: <?php echo $obj_customer->pais;?>" class="some-popover-link">

                                          <div class="row imagen-profile">
                                            <div class="col-sm-2" style="padding: 0;"></div>
                                            <div class="col-sm-8" style="padding: 0;">
                                              <div class="div-img">
                                                   <?php
                                                        switch ($obj_customer->franchise_id) {
                                                            case 1:
                                                                $images = "basic.png";
                                                                break;
                                                            case 2:
                                                                $images = "executive.png";
                                                                break;
                                                            case 3:
                                                                $images = "investor.png";
                                                                break;
                                                            case 4:
                                                                $images = "business.png";
                                                                break;
                                                            case 5:
                                                                $images = "master.png";
                                                                break;
                                                            case 6:
                                                                $images = "membership.png";
                                                                break;
                                                            }
                                                     ?>
                                                  <img src="<?php echo site_url().'static/backoffice/images/'."$images";?>" alt="paquete" width="150">
                                              </div>
                                            </div>
                                                  <?php if($obj_customer->active == 1 ){$style = 'text-success';$text = 'Activo';}else{$style = 'text-danger';$text = 'Inactivo';}?>
                                          </div>
                                          </a>
                                        <span class="tree_text"><a href="<?php echo site_url().'backoffice/unilevel/'.$obj_customer->customer_id;?>"><?php echo $obj_customer->username;?></a></span> - <span class="tree_text"><a class="<?php echo $style;?>"><?php echo $text;?></a></span>
                                            
                                                </span>
                            <!--BEGIN SECOND LEVEL-->
                            <?php 
                            if(count($obj_customer_n2) > 0){ ?>
                                <ul>
                                    <?php 
                                     foreach ($obj_customer_n2 as $value) { ?>
                                        <li>
                                            <a href="#" data-toggle="popover" data-placement="right" data-container="body" title="Datos del Afiliado" data-content="
                                                Nombre:<?php echo $value->first_name." ".$value->last_name;?>
                                                Fecha Registro:<?php echo $value->created_at;?>
                                                Estatus:
                                                <?php if($value->active == 1){ ?>
                                                          Activo
                                                      <?php }else{ ?>
                                                          Inactivo
                                                      <?php } ?>

                                                          Calificación:<?php echo $value->franchise;?>
                                                Pais: <?php echo $value->pais;?>
                                                Padre:<?php echo $obj_customer->username;?>" class="some-popover-link">

                                          <div class="row imagen-profile">
                                            <div class="col-sm-2" style="padding: 0;"></div>
                                            <div class="col-sm-8" style="padding: 0;">
                                              <div class="div-img">
                                                   <?php
                                                        switch ($value->franchise_id) {
                                                               case 1:
                                                                    $images = "basic.png";
                                                                    break;
                                                                case 2:
                                                                    $images = "executive.png";
                                                                    break;
                                                                case 3:
                                                                    $images = "investor.png";
                                                                    break;
                                                                case 4:
                                                                    $images = "business.png";
                                                                    break;
                                                                case 5:
                                                                    $images = "master.png";
                                                                    break;
                                                                case 6:
                                                                    $images = "membership.png";
                                                                    break;
                                                                }
                                                    ?>
                                            <img src="<?php echo site_url().'static/backoffice/images/'."$images";?>" alt="paquete" width="150">
                                              </div>
                                            </div>
                                          </div>
                                          </a>
                                            <?php if($value->active == 1 ){$style = 'text-success';$text='Activo';}else{$style = 'text-danger';$text='Inactivo';}?>
                                            <span class="tree_text"><a href="<?php echo site_url().'backoffice/unilevel/'.$value->customer_id;?>"><?php echo $value->username;?></a></span> - <span class="tree_text"><a class="<?php echo $style;?>"><?php echo $text;?></a></span>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="popover"]').popover({ html : true });
//$('.btn').popover({title: "<h1><strong>HTML</strong> inside <code>the</code> <em>popover</em></h1>", content: "Blabla <br> <h2>Cool stuff!</h2>", html: true, placement: "right"}); 
});
</script>
<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/arbol.css';?>" id="maincss">
<link rel="stylesheet" href="<?php echo site_url().'static/page_front/css/style.css';?>" id="style-css">