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
                                   <span class="circle circle-success circle-lg"></span> Afiliado Activo &nbsp;&nbsp;<b>|</b> 
                                       <span class="circle circle-danger circle-lg"></span> Afiliado Inactivo
                                    </div>
                               <div class="alert alert-inverse pull-right" style="opacity: 0.7;" aria-label="Right Align">
                                        <b>Patrocinios Directos</b>
                                         <span class="label label-primary"><?php echo $obj_customer->direct;?></span>
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
                                                                            case 2:
                                                                            $images = "basic.png";
                                                                            break;
                                                                        case 3:
                                                                            $images = "executive.png";
                                                                            break;
                                                                        case 4:
                                                                            $images = "gold.png";
                                                                            break;
                                                                        case 5:
                                                                            $images = "senior_executive.png";
                                                                            break;
                                                                        case 6:
                                                                            $images = "membership.png";
                                                                            break;
                                                                        case 7:
                                                                            $images = "master.png";
                                                                            break;
                                                                        case 11:
                                                                            $images = "basic.png";
                                                                            break;
                                                                        case 12:
                                                                            $images = "executive.png";
                                                                            break;
                                                                        case 13:
                                                                            $images = "senior_executive.png";
                                                                            break;
                                                                        case 14:
                                                                            $text = "Master";
                                                                            break;
                                                                        }
                                                                    ?>
                                            <img src="<?php echo site_url().'static/backoffice/images/'."$images";?>" alt="" class="thumb96">
                                              </div>
                                            </div>
                                            <div class="col-sm-2" style="padding: 0;">
                                              <span class="pull-right"style="padding-right: 5px; padding-top: 5px;" >
                                                  <?php if($obj_customer->active == 1 ){$style = 'circle circle-success circle-lg';}else{$style = 'circle circle-danger circle-lg';}?>
                                                <span class="<?php echo $style;?>"></span>
                                              </span>
                                            </div>
                                          </div>
                                          </a>
                                            <span class="tree_text"><a href="<?php echo site_url().'backoffice/unilevel/'.$obj_customer->customer_id;?>"><?php echo $obj_customer->username;?></a></span>
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
                                                                            case 2:
                                                                            $images = "basic.png";
                                                                            break;
                                                                        case 3:
                                                                            $images = "executive.png";
                                                                            break;
                                                                        case 4:
                                                                            $images = "gold.png";
                                                                            break;
                                                                        case 5:
                                                                            $images = "senior_executive.png";
                                                                            break;
                                                                        case 6:
                                                                            $images = "membership.png";
                                                                            break;
                                                                        case 7:
                                                                            $images = "master.png";
                                                                            break;
                                                                        case 11:
                                                                            $images = "basic.png";
                                                                            break;
                                                                        case 12:
                                                                            $images = "executive.png";
                                                                            break;
                                                                        case 13:
                                                                            $images = "senior_executive.png";
                                                                            break;
                                                                        case 14:
                                                                            $text = "Master";
                                                                            break;
                                                                        }
                                                                    ?>
                                            <img src="<?php echo site_url().'static/backoffice/images/'."$images";?>" alt="" class="thumb96">
                                              </div>
                                            </div>
                                            <div class="col-sm-2" style="padding: 0;">
                                              <span class="pull-right"style="padding-right: 5px; padding-top: 5px;" >
                                                  <?php if($value->active == 1 ){$style = 'circle circle-success circle-lg';}else{$style = 'circle circle-danger circle-lg';}?>
                                                <span class="<?php echo $style;?>"></span>
                                              </span>
                                            </div>
                                          </div>
                                          </a>
                                            <span class="tree_text"><a href="<?php echo site_url().'backoffice/unilevel/'.$value->customer_id;?>"><?php echo $value->username;?></a></span>
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
                        <hr class="style-4 mb-20">
                            <div class="position-info-list">
                                <div class="style_basic responsive"><span class="">BASIC</span></div>
                                <div class="style_executive responsive"><span class="">EXECUTIVE</span></div>
                                <div class="style_senior_executive responsive"><span class="">SENIOR EXECUTIVE</span></div>
                                <div class="style_master responsive"><span class="">MASTER</span></div>
                                <div class="style_membership responsive"><span class="">MEMBERSHIP</span></div>
                                <div class="style_free_position responsive"><span class=""><?php echo replace_vocales_voculeshtml("POSICIÓN LIBRE");?></span></div>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('[data-toggle="popover"]').popover({ html : true });
//$('.btn').popover({title: "<h1><strong>HTML</strong> inside <code>the</code> <em>popover</em></h1>", content: "Blabla <br> <h2>Cool stuff!</h2>", html: true, placement: "right"}); 
});
</script>
<link rel="stylesheet" href="<?php echo site_url().'static/backoffice/css/arbol.css';?>" id="maincss">