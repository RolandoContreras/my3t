<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Empresa 100% peruana que brinda distintos servicios e info-productos, que utilizando el sistema de mercadeo en red nos permite fidelizar a consumidores potenciales a la marca.">
<meta name="keywords" content="3T,training,travel,trade,bitcoin,criptocurrency,criptomoneda,mlm,redes,multinivel,peruano,educacion,entrenamiento,forex,bursatil,viajes">
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

<!--Bootstrap-wysihtml5-->
<link rel='stylesheet' id='bos_sb_main_css-css'  href='<?php echo site_url().'static/backoffice/css/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css';?>' type='text/css' media='all' />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
<![endif]-->

<!--[if lte IE 8]>
	<script src="js/plugins/flot/excanvas.min.js"></script>
<![endif]-->
<script type="text/javascript">
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
                                    $style_productos = "";
                                    $style_unilevel = "";
                                    $style_upgrade = "";
                                    $style_comisiones = "";
                                    $style_mired = "";
                                    $style_billetera = "";
                                    $style_pagos = "";
                                    if(isset($url[1])){
                                        switch ($url[1]) {
                                            ////////
                                                    case "profile":
                                                        $style_misdatos = "a_active";
                                                        break;
                                                    case "upgrade":
                                                        $style_upgrade = "a_active";
                                                        break;
                                                    case "unilevel":
                                                        $style_unilevel = "a_active";
                                                        break;
                                                    case "comisiones":
                                                        $style_comisiones = "a_active";
                                                        break;
                                                    case "billetera":
                                                        $style_billetera = "a_active";
                                                        break;
                                                    case "cobros":
                                                        $style_pagos = "a_active";
                                                        break;
                                                    case "productos":
                                                        $style_productos = "a_active";
                                                        break;
                                                    case "academy":
                                                        $style_productos = "a_active";
                                                        break;
                                                    case "message_confirmation":
                                                        $style_inicio = "a_active";
                                                        break;
                                                    case "messages":
                                                        $style_inicio = "a_active";
                                                        break;
                                                    case "compose_message":
                                                        $style_inicio = "a_active";
                                                        break;
                                                    default:
                                                         $title = "Inicio";
                                            }
                                    }else{
                                        $style_inicio = "a_active";
                                    }
                                    ?>  
                        <li class="has-sub"><a class="<?php echo $style_active;?>"><em class="icon-star"></em><span class="title"><?php echo $title_active;?></span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice'?>" class="<?php echo $style_inicio;?>"><i class="fa fa-tachometer fa-lg"></i><span class="title">Dashboard</span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/profile'?>" class="<?php echo $style_misdatos;?>"><i class="fa fa-address-book fa-lg"></i><span class="title">Mi Perfil</span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/productos'?>" class="<?php echo $style_productos;?>"><i class="fa fa-product-hunt fa-lg"></i><span class="title">Productos</span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/upgrade'?>" class="<?php echo $style_upgrade;?>"><i class="fa fa-arrow-up fa-lg"></i><span class="title">Upgrade</span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/unilevel'?>" class="<?php echo $style_unilevel;?>"><i class="fa fa-cubes fa-lg"></i><span class="title">Unilevel</span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/comisiones'?>" class="<?php echo $style_comisiones;?>"><i class="fa fa-area-chart fa-lg"></i><span class="title">Mis Comisiones</span></a></li>
			<li class="has-sub"><a href="<?php echo site_url().'backoffice/billetera'?>" class="<?php echo $style_billetera;?>"><i class="fa fa-btc"></i><span class="title">Billetera</span></a></li>
                        <li class="has-sub"><a href="<?php echo site_url().'backoffice/cobros'?>" class="<?php echo $style_pagos;?>"><i class="fa fa-university fa-lg"></i><span class="title">Cobros</span></a></li>
		</ul>
		<!-- /main navigation -->		
  </div>
  <!-- /page sidebar -->
  
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

                                  <li><a href="<?php echo site_url().'backoffice/profile';?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i>My profile</a></li>
                                  <li><a href="<?php echo site_url().'backoffice/messages'; ?>"><i class="fa fa-comment" aria-hidden="true"></i>Mensajes</a></li>
                                            <li class="divider"></li>
                                            <li><a href="<?php echo site_url().'login/logout';?>"><i class="fa fa-sign-out fa-lg"></i>Salir</a></li>
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
				
				  <!-- /notifications -->
				  
				  <!-- Messages -->
				  <li class="notifications dropdown">
					<a data-close-others="true" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle" href="#">
                                            <i class="icon-mail"></i><span class="badge badge-secondary"><?php echo $all_message;?></span></a>
					<ul class="dropdown-menu pull-right">
						<li class="first">
							<div class="dropdown-content-header">Mensajes</div>
						</li>
						<li>
                                                    <ul class="media-list">
                                                        <?php 
                                                            if($all_message == 0){ ?>
                                                                <li>
                                                                    <div class="media-body">
                                                                            <span class="text-muted">No hay nuevos mensajes</span>
                                                                        </div>
                                                                </li>
                                                            <?php }else{
                                                                foreach ($obj_message as $value) { 
                                                                    switch ($value->type) {
                                                                        case 1:
                                                                            //BONUS
                                                                            $link =  "bonus";
                                                                            break;
                                                                        case 2:
                                                                            //SUPPORT
                                                                            $link =  "support";
                                                                            break;
                                                                        case 3:
                                                                            //SOCIAL
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
                                                                                        <span class="media-annotation pull-right">Tue</span>
                                                                                </a>
                                                                            <span class="text-muted"><?php $message = replace_vocales_voculeshtml("$value->messages"); echo corta_texto($message,40);?></span>
                                                                        </div>
                                                                </li>
                                                                <?php } ?>
                                                           <?php } ?>
                                                    </ul>
						</li>
                                                <li class="external-last"> <a class="danger" href="<?php echo site_url().'backoffice/messages';?>"><i class="fa fa-comments" aria-hidden="true"></i> Todos los Mensajes</a> </li>
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
			© Copyright 2017. All Rights Reserved  -<strong> 3T Company</strong>
      </footer>	
  <!-- /main container -->
  
</div>
<!-- /page container -->

<!--Load JQuery-->
<script src="<?php echo site_url().'static/backoffice/js/assets/jquery.min.js';?>"></script>
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

<!--ChartJs-->
<script src="<?php echo site_url().'static/backoffice/js/assets/Chart.min.js';?>"></script>
</body>
</html>
