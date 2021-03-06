<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from http://wrapbootstrap.com/preview/WB009538N by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2017 04:37:29 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Sé parte del club privado más completo en viajes, desarrollo personal y financiero a nivel mundial. Los 3 rubros más cotizados en un solo lugar... Viaja, entrénate y Gana!!!">
<meta name="keywords" content="3T Club,Club privado,training,travel,trade,bitcoin,criptocurrency,criptomoneda,mlm,redes,multinivel,peruano,educacion,entrenamiento,forex,bursatil,viaja, entreate y gana">
<title>Backoffice | Travel - Training- Trade</title>
<script src="https://use.fontawesome.com/3aa4a6fd0b.js"></script>
<!-- Site favicon -->
<link rel="shortcut icon" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>" type="image/x-icon">
<link rel="icon" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>" type="image/x-icon">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>">
<!-- /site favicon -->
<!-- Entypo font stylesheet -->
<link href="<?php echo site_url().'static/backoffice/css/assets/entypo.css';?>" rel="stylesheet">
<!-- /entypo font stylesheet -->
<link href="<?php echo site_url().'static/backoffice/css/one/style_one.css';?>" rel="stylesheet">
<!-- Font awesome stylesheet -->
<link href="<?php echo site_url().'static/backoffice/css/assets/font-awesome.min.css';?>" rel="stylesheet">
<!-- /font awesome stylesheet -->
<!-- Bootstrap stylesheet min version -->
<link href="<?php echo site_url().'static/backoffice/css/assets/bootstrap.min.css';?>" rel="stylesheet">
<!-- /bootstrap stylesheet min version -->
<!-- Mouldifi core stylesheet -->
<link href="<?php echo site_url().'static/backoffice/css/assets/mouldifi-core.css';?>" rel="stylesheet">
<!-- /mouldifi core stylesheet -->
<link href="<?php echo site_url().'static/backoffice/css/assets/mouldifi-forms.css';?>" rel="stylesheet">
<script>
    var site = '<?php echo site_url();?>';
</script>
</head>
<body>
<!-- Page container -->
<div class="page-container">
	<!-- Page Sidebar -->
	<div class="page-sidebar">
		<!-- Site header  -->
		<header class="site-header">
		  <div class="site-logo">
                      <a href="<?php echo site_url().'backoffice';?>">
                          <img style="margin-left: -20% !important" src="<?php echo site_url().'static/page_front/images/logo/logo_small.png';?>" width="115px" alt="Logo Criptowin">
                      </a>
                  </div>
		  <div class="sidebar-collapse hidden-xs">
                      <a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a>
                  </div>
		  <div class="sidebar-mobile-menu visible-xs">
                      <a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#">
                          <i class="icon-menu"></i>
                      </a>
                  </div>
		</header>
		<!-- /site header -->
		<!-- Main navigation -->
		<ul id="side-nav" class="main-menu navbar-collapse collapse">
                     <?php 
                            if($_SESSION['customer']['active']==1){
                                $title_active='Activo';
                                $style_active='label-success';
                            }else{
                                $title_active='Inactivo';
                                $style_active='label-danger';
                            }
                            ?>
                     <?php 
                                    $url = explode("/",uri_string()); 
                                    $style_inicio = "";
                                    $style_misdatos = "";
                                    $style_points = "";
                                    $style_productos = "";
                                    $style_unilevel = "";
                                    $style_binario = "";
                                    $style_upgrade = "";
                                    $style_comisiones = "";
                                    $style_mired = "";
                                    $style_billetera = "";
                                    $style_soporte = "";
                                    $style_information = "";
                                    $style_pagos = "";
                                    if(isset($url[2])){
                                        switch ($url[2]) {
                                            ////////
                                                    case "profile":
                                                        $style_misdatos = "a_active";
                                                        $nav = "profile";
                                                        break;
                                                     case "points":
                                                        $style_inicio = "a_active";
                                                         $nav = "points";
                                                        break;
                                                    case "informacion":
                                                        $style_information = "a_active";
                                                        $nav = "informacion";
                                                        break;
                                                    case "upgrade":
                                                        $style_upgrade = "a_active";
                                                        $nav = "upgrade";
                                                        break;
                                                    case "unilevel":
                                                        $style_unilevel = "a_active";
                                                        $nav = "unilevel";
                                                        break;
                                                    case "binario":
                                                        $style_binario = "a_active";
                                                        $nav = "binario";
                                                        break;
                                                    case "comisiones":
                                                        $style_comisiones = "a_active";
                                                        $nav = "comisiones";
                                                        break;
                                                    case "billetera":
                                                        $style_billetera = "a_active";
                                                        $nav = "billetera";
                                                        break;
                                                    case "cobros":
                                                        $style_pagos = "a_active";
                                                        $nav = "cobros";
                                                        break;
                                                    case "productos":
                                                        $style_productos = "a_active";
                                                        $nav = "productos";
                                                        break;
                                                    case "academy":
                                                        $style_productos = "a_active";
                                                        $nav = "academy";
                                                        break;
                                                    case "message_confirmation":
                                                        $style_inicio = "a_active";
                                                        $nav = "message_confirmation";
                                                        break;
                                                    case "informacion":
                                                        $style_pagos = "a_active";
                                                        $nav = "informacion";
                                                        break;
                                                    case "messages":
                                                        $style_inicio = "a_active";
                                                        $nav = "messages";
                                                        break;
                                                    case "soporte":
                                                        $style_soporte = "a_active";
                                                        $nav = "soporte";
                                                        break;
                                                    case "compose_message":
                                                        $style_inicio = "a_active";
                                                        $nav = "compose_message";
                                                        break;
                                                    default:
                                                         $title = "Inicio";
                                                         $nav = "backoffice";
                                            }
                                    }else{
                                        $style_inicio = "a_active";
                                        $nav = "";
                                    }
                                    ?>  
                        <li class="has-sub"><a class="<?php echo $style_active;?>"><em class="icon-star"></em><span class="title"><?php echo $title_active;?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice'?>" class="<?php echo $style_inicio;?>"><i class="fa fa-tachometer fa-lg"></i><span class="title"><?=lang('idioma.b_tablero');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/profile'?>" class="<?php echo $style_misdatos;?>"><i class="fa fa-address-book fa-lg"></i><span class="title"><?=lang('idioma.b_perfil');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/informacion'?>" class="<?php echo $style_information;?>"><i class="fa fa-info-circle fa-lg"></i><span class="title"><?=lang('idioma.b_informacion');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/productos'?>" class="<?php echo $style_productos;?>"><i class="fa fa-product-hunt fa-lg"></i><span class="title"><?=lang('idioma.b_productos');?></span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/upgrade'?>" class="<?php echo $style_upgrade;?>"><i class="fa fa-arrow-up fa-lg"></i><span class="title"><?=lang('idioma.b_crecimiento');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/billetera'?>" class="<?php echo $style_billetera;?>"><i class="fa fa-btc"></i><span class="title"><?=lang('idioma.b_billetera');?></span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/unilevel'?>" class="<?php echo $style_unilevel;?>"><i class="fa fa-cubes fa-lg"></i><span class="title"><?=lang('idioma.b_unilevel');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/binario'?>" class="<?php echo $style_binario;?>"><i class="fa fa-users fa-lg"></i><span class="title"><?=lang('idioma.b_binario');?></span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/comisiones'?>" class="<?php echo $style_comisiones;?>"><i class="fa fa-area-chart fa-lg"></i><span class="title"><?=lang('idioma.b_comisiones');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/soporte'?>" class="<?php echo $style_soporte;?>"><i class="fa fa-cogs"></i><span class="title"><?=lang('idioma.b_soporte');?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/cobros'?>" class="<?php echo $style_pagos;?>"><i class="fa fa-university fa-lg"></i><span class="title"><?=lang('idioma.b_cobros');?></span></a></li>
		</ul>
		<!-- /main navigation -->		
  </div>
  <!-- Main container -->
  <div class="main-container gray-bg">
		<!-- Main header -->
		<div class="main-header row">
		  <div class="col-sm-6 col-xs-7">
		  
			<!-- User info -->
			<ul class="user-info pull-left">          
                            <li class="profile-info dropdown">
                                <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"> 
                                    <img width="44" class="img-circle avatar" alt="" src="<?php echo site_url().'static/backoffice/images/avatar/avatar.png';?>"><?php echo $_SESSION['customer']['name'];?> &nbsp;&nbsp;<i class="fa fa-arrow-down" aria-hidden="true"></i>
                                </a>
                              <!-- User action menu -->
                              <ul class="dropdown-menu">
                                  <li><a href="<?php echo site_url().'backoffice/profile';?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i><?=lang('idioma.b_perfil');?></a></li>
                                  <li><a href="<?php echo site_url().'backoffice/messages'; ?>"><i class="fa fa-comment" aria-hidden="true"></i><?=lang('idioma.b_mensajes');?></a></li>
                                  <li class="notifications dropdown"><a href='<?php echo site_url()."es/backoffice/$nav";?>'><img src="<?php echo site_url().'static/page_front/images/language/es.png';?>" alt="espanol" width="20"/>&nbsp;&nbsp;&nbsp;&nbsp; <?=lang('idioma.b_espanol');?></a></li>
                                  <li class="notifications dropdown"><a href="<?php echo site_url()."en/backoffice/$nav";?>"><img src="<?php echo site_url().'static/page_front/images/language/en.png';?>" alt="espanol" width="20"/>&nbsp;&nbsp;&nbsp;&nbsp; <?=lang('idioma.b_inlges');?></a></li>
                                  <li class="divider"></li>
                                  <li><a href="<?php echo site_url().'login/logout';?>"><i class="fa fa-sign-out fa-lg"></i><?=lang('idioma.b_salir');?></a></li>
                              </ul>
                              <!-- /user action menu -->
                            </li>
                          </ul>
			<!-- /user info -->
		  </div>
		  <div class="col-sm-6 col-xs-5">
			<div class="pull-right">
				<!-- User alerts -->
				<ul class="user-info pull-left">
				  <!-- Messages -->
				  <li class="notifications dropdown">
					<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            <i class="icon-mail"></i><span class="badge badge-secondary"><?php echo $all_message;?></span></a>
					<ul class="dropdown-menu pull-right">
						<li class="first">
							<div class="dropdown-content-header"><?=lang('idioma.b_mensajes');?></div>
						</li>
						<li>
                                                    <ul class="media-list">
                                                        <?php 
                                                            if($all_message == 0){ ?>
                                                                <li>
                                                                    <div class="media-body">
                                                                            <span class="text-muted"><?=lang('idioma.b_no_mensajes');?></span>
                                                                        </div>
                                                                </li>
                                                            <?php }else{
                                                                foreach ($obj_message as $value) { 
                                                                    switch ($value->type) {
                                                                        case 1:
                                                                            $link =  "bonus";
                                                                            break;
                                                                        case 2:
                                                                            $link =  "support";
                                                                            break;
                                                                        case 3:
                                                                            $link =  "social";
                                                                            break;
                                                                } ?>
                                                                <li class="media">
                                                                        <div class="media-left">
                                                                            <i class="fa fa-comments" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="media-body">
                                                                            <a class="media-heading" href="<?php echo site_url()."backoffice/messages/$link/$value->messages_id";?>">
                                                                                    <span class="text-semibold"><?php $subject = replace_vocales_voculeshtml("$value->subject"); echo corta_texto($subject,40);?></span>
                                                                                    <span class="media-annotation pull-right"><?php echo formato_fecha_barras($value->date);?></span>
                                                                                </a>
                                                                            <span class="text-muted"><?php $message = replace_vocales_voculeshtml("$value->messages"); echo corta_texto($message,40);?></span>
                                                                        </div>
                                                                </li>
                                                                <?php } ?>
                                                           <?php } ?>
                                                    </ul>
						</li>
                                                <li class="external-last"> <a class="danger" href="<?php echo site_url().'backoffice/messages';?>"><i class="fa fa-comments" aria-hidden="true"></i> <?=lang('idioma.b_todos_mensajes');?></a> </li>
                                                
					</ul>
				  </li>
				  <!-- /messages -->
				</ul>
                                
				<!-- /user alerts -->
			</div>
		  </div>
		</div>
		<!-- /main header -->
	<!-- Main section-->
            <?php echo $body;?> 
      <!--START FOOTER-->
      <footer class="footer-main"> 
			© Copyright 2017. All Rights Reserved  -<strong> 3T Club</strong>
      </footer>	
  <!-- /main container -->
</div>
</div>
<!--Load JQuery-->
<script src="static/cms/plugins/wysiwyg/wysihtml5-0.3.0_rc3.min.js"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/bootstrap.min.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.metisMenu.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery-ui.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.blockUI.js';?>"></script>
<!--Float Charts-->
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.flot.min.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.flot.tooltip.min.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.flot.resize.min.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.flot.selection.min.js';?>"></script>        
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.flot.pie.min.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.flot.time.min.js';?>"></script>
<script src="<?php echo site_url().'static/backoffice/js/assets/functions.js';?>"></script>
</body>
</html>
