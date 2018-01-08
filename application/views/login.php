<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en-US"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en-US"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en-US"> 
<!--<![endif]-->
<!--STAR HEAD-->
<?php $this->load->view("head");?>
<!--END HEAD-->

<style type="text/css" data-type="vc_shortcodes-custom-css">
.vc_custom_1497446612800{margin-bottom: 0px !important;background-image: url(static/page_front/images/atenas.jpg?id=370) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1498222750047{padding-top: 0px !important;}.vc_custom_1498743833540{margin-bottom: 0px !important;}.vc_custom_1497012475617{margin-bottom: 0px !important;}
</style>
<body class="page-template-default page page-id-91 wpb-js-composer js-comp-ver-5.3 vc_responsive">
	<div class="mobile-menu-wrapper mobile-menu-fullscreen">
            <!--GET NAV MOBILE-->
           <?php $this->load->view("nav_mobile");?>
           <!--END GET NAV MOBILE-->
    </div>

<div class="mobile-menu-overlay"></div>
	<div class="wrapper" id="main-wrapper">
		<style>header.site-header {padding-top: 35px;}</style>
                <style>header.site-header {padding-bottom: 35px;}</style>
                 <!--START HEADER 2-->
                <?php $this->load->view("header_2");?>
                <!--END HEADER 2-->

<script type="text/javascript">
	var headerOptions = headerOptions || {};
	//jQuery.extend( headerOptions, {"stickyHeader":false} );
	Object.assign( headerOptions, {"stickyHeader":false} );
</script>
<div class="vc-container">
<div class="vc-parent-row row-stretch_row vc_custom_1497446612800">
    <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid tickets vc_row-has-fill vc_row-o-equal-height vc_row-flex">
        <div class="wpb_column vc_column_container vc_col-sm-6">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                </div>
            </div>
        </div>
        <div class="wpb_column vc_column_container vc_col-sm-6">
            <div class="vc_column-inner vc_custom_1498222750047">
                <div class="wpb_wrapper">
                    <div class="section-title  vc_custom_1498743833540">
                        <H1><?php echo replace_vocales_voculeshtml("Inicio De Sesión");?></H1>
                        </div>
                    <div class="vc_tta-container" data-vc-action="collapse">
                        <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-white vc_tta-style-flat vc_tta-shape-square vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left vc_custom_1497012475617">
                            <div class="vc_tta-tabs-container">
                                <ul class="vc_tta-tabs-list">
                                    <li class="vc_tta-tab vc_active" data-vc-tab>
                                        <a href="#flights" data-vc-tabs data-vc-container=".vc_tta">
                                            <span class="vc_tta-title-text">Login</span>
                                            <i class="vc_tta-icon vc-material vc-material-local_airport"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="vc_tta-panels-container">
                                <div class="vc_tta-panels">
                                    <div class="vc_tta-panel vc_active" id="flights" data-vc-content=".vc_tta-panel-body">
                                        <div class="vc_tta-panel-heading">
                                            <h4 class="vc_tta-panel-title">
                                            </h4>
                                        </div>
                                        <div class="vc_tta-panel-body">
                                            <div id="nf-form-3-cont" class="nf-form-cont" aria-live="polite" aria-labelledby="nf-form-title-3" aria-describedby="nf-form-errors-3" role="form">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="lab-contact-form contact-form ">
                                                            <form action="#" class="contact-form" id="el_59e451473f27d" data-alerts="1" data-alerts-msg="Please fill &quot;%&quot; field." data-check="de6962edc5" data-use-subject="1" novalidate>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group labeled-input-row">
                                                                                <label for="el_59e451473f27d_name">Usuario:</label>
                                                                                <input name="username" id="username" type="text" placeholder="Ingrese Usuario">
                                                                            </div>
                                                                        </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group labeled-input-row">
                                                                                    <label for="el_59e451473f27d_subject"><?php echo replace_vocales_voculeshtml("Contraseña:");?></label>
                                                                                    <input name="password" id="password" type="password" placeholder="<?php echo replace_vocales_voculeshtml("Ingrese Contraseña");?>">
                                                                                </div>
                                                                            </div>
                                                                    </div> <!-- row -->
                                                                    <button onclick="send_login();" name="send" class="button">
                                                                        <span class="pre-submit"><?php echo replace_vocales_voculeshtml("Iniciar de Sesión");?></span>
                                                                            <span class="success-msg"><?php echo replace_vocales_voculeshtml("Iniciar de Sesión");?></span>
                                                                            <span class="loading-bar">
                                                                                    <span></span>
                                                                            </span>
                                                                    </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--<div class="nf-loading-spinner"></div>-->
                                            </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
        <script src="<?php echo site_url().'static/page_front/js/login.js';?>"></script>
        <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
        <script src="<?php echo site_url().'static/page_front/js/jquery.min.js';?>"></script>
        <script type="text/javascript" src="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.js"></script>
        <link rel="stylesheet" type="text/css" href="http://rawgit.com/vitmalina/w2ui/master/dist/w2ui.min.css" />
        <div id="spinner"></div>
        
        
</div>
</div>
<style>.main-header.menu-type-standard-menu .standard-menu-container div.menu>ul ul li a:after, 
.main-header.menu-type-standard-menu .standard-menu-container ul.menu ul li a:after {
    background-color: transparent !important;
}</style>
	</div>	
	    <!--START FOOTER-->
            <?php $this->load->view("footer");?>
            <!--END FOOTER-->
<link rel='stylesheet' id='vc_tta_style-css'  href='<?php echo site_url().'static/page_front/css/js_composer_tta.min.css?ver=5.3';?>' type='text/css' media='all' />
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/bos_main.js?ver=1.2';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/bos_date.js?ver=1.0';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/wp-embed.min.js?ver=4.8.2';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/js_composer_front.min.js?ver=5.3';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/main.min.js?ver=2.1.3';?>'></script>
<script>
            var post_max_size = '8';
            var upload_max_filesize = '256';
            var wp_memory_limit = '40';
        </script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<style>iframe[name="google_conversion_frame"] { position: absolute; left: -99999px; }</style>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/991533214/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>
		
	<!-- ET: 0.076863050460815s 2.1.3ch -->
</body>
</html>