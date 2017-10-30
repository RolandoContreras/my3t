<!DOCTYPE html>
<html lang="en">	
<!-- Mirrored from wbpreview.com/previews/WB0LX21H9/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2012 04:37:29 GMT -->
    <head>
        <meta charset="utf-8">
        <title>CMS - 3T - Travel - Training- Trade</title>
        <base href="<?php echo site_url();?>">
        <link rel="shortcut icon" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>" type="image/x-icon">
        <link rel="icon" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>" type="image/x-icon">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo site_url().'static/page_front/images/favicon/favicon.png';?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="robots" content="noindex, nofollow" />
        <!-- CSS -->
        <link href="static/cms/css/core/bootstrap.css" rel="stylesheet">	
        <link href="static/cms/css/core/combine_fonts.css" rel="stylesheet">	
        <link href="static/cms/css/core/buttons.css" rel="stylesheet">
        <link href="static/cms/css/core/cms.css" rel="stylesheet">
        <link href="static/cms/css/style.css" rel="stylesheet">
        
        <!-- color style -->
        <link href="static/cms/css/core/dark.css" rel="stylesheet">
        <link href="static/cms/css/core/bootstrap-responsive.css" rel="stylesheet">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="plugins/html5.js"></script>
        <![endif]-->
        <script src="static/cms/js/core/jquery.js"></script>        
        <script src="static/cms/plugins/wysiwyg/wysihtml5-0.3.0_rc3.min.js"></script>
        <script src="static/cms/js/core/bootstrap.js"></script>	                    

        <script src="static/cms/plugins/datepicker/js/bootstrap-datepicker.js"></script>
        <script src="static/cms/plugins/wysiwyg/bootstrap-wysihtml5.js"></script>
        <script type="text/javascript" src="static/cms/js/browserplus-min.js"></script>

        <script src="static/cms/js/core/jquery.validate.min.js"></script>
        <script src="static/cms/js/core/bootstrap-alert.js"></script>
        
        <script type="text/javascript">
            var site = '<?php echo site_url();?>';
        </script>
    </head>
<body>
<!-- top fixed navbar -->
    <div id="header" class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="<?php echo site_url();?>dashboard/panel">
                    <img src="<?php echo site_url().'static/page_front/images/logo/logo_small.png'?>" alt="logo" width="50"></a>
                <div class="btn-toolbar pull-right">                        
                <!-- /btn-group -->
                    <div class="btn-group">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                <img class="image_icons" src="<?php echo site_url().'static/cms/png/user91.png';?>"> 
                                <?php echo $_SESSION['usercms']['name'];?>
                                <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu megamenu col2 ud">
                                <ul>
                                    <a href="<?php echo site_url().'dashboard/logout';?>"><img class="image_icons" src="<?php echo site_url().'static/cms/png/door9.png';?>"> Cerrar Session</a>
                                </ul>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- top fixed navbar -->
    <div class="container-fluid">
        <div class="row-fluid">
                <!-- sidebar -->
            <div id="sidebar" class="span2">			
                    <div class="accordion custom-acc" id="accordionSB">
                            <div class="accordion-group fs">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#dashboardsb">
                                        Mantenimientos  
                                        </a>
                                    </div>
                                    <div id="dashboardsb" class="accordion-body collapse">
                                      <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li><a href="<?php echo site_url()."dashboard/clientes";?>"><i class="icon-large icon-th"></i>Clientes</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/comentarios";?>"><i class="icon-large icon-th"></i>Comentarios</a></li>
                                            <li><a href="<?php echo site_url()."dashboard/mesaje_global";?>"><i class="icon-large icon-th"></i>Mensajes</a></li>
                                            <?php if($_SESSION['usercms']['privilage'] == 3){ ?>
                                            <li><a href="<?php echo site_url()."dashboard/usuarios";?>"><i class="icon-large icon-th"></i>Usuarios</a></li>
                                            <?php } ?>
                                            <li><a href="<?php echo site_url()."dashboard/panel";?>"><i class="icon-large icon-th"></i>Panel</a></li>
                                        </ul>
                                        </div>
                                    </div>
                            </div>
                            <?php 
                            if($_SESSION['usercms']['privilage'] == 3){ ?>
                                <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#activaciones">
                                        Activaciones
                                        </a>
                                    </div>
                                    <div id="activaciones" class="accordion-body collapse">
                                      <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                             <li><a href="<?php echo site_url()."dashboard/activaciones";?>"><i class="icon-large icon-th"></i>Activaciones</a></li>
                                        </ul>
                                        </div>
                                    </div>
                            </div>
                        <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#cobros">
                                        Cobros
                                        </a>
                                    </div>
                                    <div id="cobros" class="accordion-body collapse">
                                      <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                             <li><a href="<?php echo site_url()."dashboard/cobros";?>"><i class="icon-large icon-th"></i>Cobros</a></li>
                                        </ul>
                                        </div>
                                    </div>
                            </div>
                        
    
                            <div class="accordion-group">
                                    <div class="accordion-heading">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#recargas">
                                        Recargas
                                        </a>
                                    </div>
                                    <div id="recargas" class="accordion-body collapse">
                                      <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                             <li><a href="<?php echo site_url()."dashboard/recargas";?>"><i class="icon-large icon-th"></i>Recargas de Saldo</a></li>
                                        </ul>
                                        </div>
                                    </div>
                            </div>
                            <?php } ?>
                            
                        
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#reportes">
                                    Reportes
                                    </a>
                                </div>
                                <div id="reportes" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/reportes/asociados";?>"><i class="icon-large icon-th"></i>Asociados</a>
                                            </li>
                                            <li>                                        
                                                <a href="<?php echo site_url()."dashboard/reportes/cuentas";?>"><i class="icon-large icon-th"></i>Cuentas</a>
                                            </li>
                                            <li>                                        
                                                <a href="<?php echo site_url()."dashboard/reportes/pagos";?>"><i class="icon-large icon-th"></i>Pagos</a>
                                            </li>
                                            <li>                                        
                                                <a><i class="icon-large icon-th"></i>Proyecciones</a>
                                            </li>
                                            </ul>                                     
                                    </div>
                                </div>
                            </div>
                        
                        <?php if($_SESSION['usercms']['privilage'] == 2){ ?>
                            <div class="accordion-group">
                                <div class="accordion-heading">
                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordionSB" href="#report">
                                    Reportes
                                    </a>
                                </div>
                                <div id="report" class="accordion-body collapse">
                                    <div class="accordion-inner">
                                        <ul class="nav nav-list">
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/reportes_comision";?>"><i class="icon-large icon-th"></i>Total Comisiones</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/reporte_comision_x_asociado";?>"><i class="icon-large icon-th"></i>Comisión x Asociado</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url()."dashboard/reportes_asociados";?>"><i class="icon-large icon-th"></i>Asociados</a>
                                            </li>
                                        </ul>                                     
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
            </div>
            <!-- sidebar 

            <!-- main content -->
            <div id="main_content" class="span10">
                <div class="widget_container">
                    <div class="well nomargin">
                        <ul class="breadcrumbs-custom in-well">
                            <li><a href="<?php echo $link_modulo?>"><?php echo $modulos?></a></li>                            
                            <li class="active"><?php echo $seccion;?></li>
                        </ul>
                    </div>
                </div>                
                <?php echo $body; ?>	
            </div>
            <!-- main content -->
        </div>
    </div>

</body>
<!-- Mirrored from wbpreview.com/previews/WB0LX21H9/ by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 06 Sep 2012 04:37:36 GMT -->
</html>