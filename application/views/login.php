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
<body class="page-template-default page page-id-91 wpb-js-composer js-comp-ver-5.3 vc_responsive">
	<div class="mobile-menu-wrapper mobile-menu-fullscreen">
            <!--GET NAV MOBILE-->
           <?php $this->load->view("nav_mobile");?>
           <!--END GET NAV MOBILE-->
    </div>
<style data-type="vc_shortcodes-custom-css">
.vc_custom_1497446612800{margin-bottom: 0px !important;background-image: url(static/page_front/images/login.jpg?id=370) !important;background-position: center !important;background-repeat: no-repeat !important;background-size: cover !important;}.vc_custom_1498222750047{padding-top: 0px !important;}.vc_custom_1498743833540{margin-bottom: 0px !important;}.vc_custom_1497012475617{margin-bottom: 0px !important;}
</style>
<div class="mobile-menu-overlay"></div>
	<div class="wrapper" id="main-wrapper">
		<style>header.site-header {padding-top: 35px;}</style>
                <style>header.site-header {padding-bottom: 35px;}</style>
                 <!--START HEADER 2-->
                <?php $this->load->view("header_2");?>
                <!--END HEADER 2-->

<script>
	var headerOptions = headerOptions || {};
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
                        <h1><?=lang('idioma.login');?></h1>
                        </div>
                    <div class="vc_tta-container" data-vc-action="collapse">
                        <div class="vc_general vc_tta vc_tta-tabs vc_tta-color-white vc_tta-style-flat vc_tta-shape-square vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left vc_custom_1497012475617">
                            <div class="vc_tta-tabs-container">
                                <ul class="vc_tta-tabs-list">
                                    <li class="vc_tta-tab vc_active" data-vc-tab>
                                        <a href="#flights" data-vc-tabs data-vc-container=".vc_tta">
                                            <span class="vc_tta-title-text"><?=lang('idioma.login');?></span>
                                            <i class="vc_tta-icon vc-material vc-material-local_airport"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="vc_tta-panels-container">
                                <div class="vc_tta-panels">
                                    <div class="vc_tta-panel vc_active">
                                        <div class="vc_tta-panel-body">
                                            <div id="nf-form-3-cont" class="nf-form-cont">
                                                <div class="vc_column-inner">
                                                    <div class="wpb_wrapper">
                                                        <div class="lab-contact-form contact-form ">
                                                            <form method="post" id="form-login">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="col-md-3">
                                                                                    <label><?=lang('idioma.usuario');?></label>
                                                                                </div>
                                                                                <div class="col-md-9">
                                                                                    <input class="form" name="username" id="username" type="text">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                            <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-3">
                                                                                     <label><?=lang('idioma.contrasena');?></label>   
                                                                                    </div>
                                                                                    <div class="col-md-9">
                                                                                        <input class="form" name="password" id="password" type="password">
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                            </div>
                                                                        
                                                                         <div class="col-sm-12">
                                                                                <div class="form-group">
                                                                                    <div class="col-md-3"></div>
                                                                                    <div class="col-md-9">
                                                                                        <div class="g-recaptcha" data-sitekey="6LdaVHAUAAAAAMF_YlocobAIEftI1olTSkdxOW3H"></div> 
                                                                                        <span id="message_capcha" class="alert alert-danger" style="display:none;text-align: center">Captcha no verificado</span>
                                                                                     </div>
                                                                            </div>
                                                                         </div>
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <a href="<?php echo site_url().'forgot';?>"><?=lang('idioma.olvidar');?></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> <!-- row -->
                                                                    <button type="submit" class="button"><?=lang('idioma.login');?></button>
                                                            </form>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="alert_message"></div>
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
    </div>
  </div>
</div>	
    <!--START FOOTER-->
    <?php $this->load->view("footer");?>
    <!--END FOOTER-->
<link rel='stylesheet' id='vc_tta_style-css'  href='<?php echo site_url().'static/page_front/css/js_composer_tta.min.css?ver=5.3';?>' media='all'/>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src='<?php echo site_url().'static/page_front/js/bos_main.js?ver=1.2';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/bos_date.js?ver=1.0';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/wp-embed.min.js?ver=4.8.2';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/js_composer_front.min.js?ver=5.3';?>'></script>
<script src='<?php echo site_url().'static/page_front/js/main.min.js?ver=2.1.3';?>'></script>
<script>
            var post_max_size = '8';
            var upload_max_filesize = '256';
            var wp_memory_limit = '40';
        </script>
</body>
</html>
