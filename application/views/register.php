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
<body class="page-template-default page page-id-12 wpb-js-composer js-comp-ver-5.3 vc_responsive header-absolute">
    <div class="mobile-menu-wrapper mobile-menu-fullscreen">
    	<div class="mobile-menu-container">
		<ul id="menu-main-menu-1" class="menu">
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-27">
                        <a href="<?php echo site_url();?>"><span>Inicio</span></a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32">
                        <a href=""><span>Acerca</span></a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
                        <a href="<?php echo site_url().'plan';?>"><span>Plan</span></a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31">
                        <a href=""><span>Contacto</span></a>
                    </li>
                    <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-28">
                        <a href=""><span>Login</span></a>
                    </li>
                </ul>
            <a href="#" class="mobile-menu-close-link menu-bar exit menu-skin-light"><span class="ham"></span></a>
	</div>
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
<div class="vc-parent-row row-stretch_row_content_no_spaces"><div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_row-no-padding"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper"><style> #el_59e451473d203 { height: 500px; } </style>

<div class="lab-google-map cd-google-map  vc_custom_1497880485373">
	<div id="el_59e451473d203"></div>
    <div class="cd-zoom cd-zoom-in hidden"></div>
    <div class="cd-zoom cd-zoom-out hidden"></div>
</div>

<script type="text/javascript">
var labVcMaps = labVcMaps || [];
labVcMaps.push({
	id: 'el_59e451473d203',
	
	locations: [{"marker_image":"<?php echo site_url().'static/page_front/icon/pin-2.png';?>","retina_marker":"yes","latitude":"-12.1416088","longitude":"-76.99181550000003","marker_title":"3T Lima","marker_description":"<p>Av. La Encalada # 1171,<br \/>\nMonterrico - Santiago de surco,<br \/>\nLima - Perú<\/p>\n<p><b>Horario de Trabajo:<\/b><br \/>\Lunes \u2014 Viernes (08:00 \u2014 17:00)<br \/>\nSabados (09:00 \u2014 15:00)<\/p>\n","marker_image_size":[128,128]}],
	
	zoom: 6,
	scrollwheel: false,
	dropPins: true,
	panBy: [0,0],
	tilt: 0,
	heading: 0,
	
	mapType: 'roadmap',
	
	panControl: false,
	zoomControl: true,
	mapTypeControl: false,
	scaleControl: false,
	streetViewControl: false,
	overviewMapControl: false,
	plusMinusZoom: false,
	
	
	styles: [
  {
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#65afdd"
      },
      {
        "lightness": 50
      },
      {
        "weight": 2
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#0052a0"
      },
      {
        "visibility": "on"
      },
      {
        "weight": 1.5
      }
    ]
  },
  {
    "featureType": "administrative.country",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.province",
    "elementType": "labels.text",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "landscape",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "hue": "#0074b9"
      },
      {
        "saturation": 59
      },
      {
        "lightness": -42
      }
    ]
  },
  {
    "featureType": "landscape.natural.terrain",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "landscape.natural.terrain",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#0078b9"
      },
      {
        "saturation": -29
      },
      {
        "lightness": 30
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#65afdd"
      },
      {
        "lightness": 10
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#0052a0"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#65afdd"
      }
    ]
  }
]});
</script>
                </div>
            </div>
        </div>
    </div>
    <div class="vc_row-full-width vc_clearfix"></div>
</div>
    <div class="vc-parent-row row-stretch_row vc_custom_1497449323625">
        <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid contact-form-area vc_row-has-fill">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner vc_custom_1498222572351">
                    <div class="wpb_wrapper">
                        <div class="section-title ">
                        <H2><?php echo replace_vocales_voculeshtml("Registro");?></H2>
                        </div>
                        <div class="vc-parent-row row-default">
                            <div class="vc_row wpb_row vc_inner vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-8">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="lab-contact-form contact-form ">
                                                <form action="#" class="contact-form" id="el_59e451473f27d" data-alerts="1" data-alerts-msg="Please fill &quot;%&quot; field." data-check="de6962edc5" data-use-subject="1" novalidate>
                                                        <input type="hidden" name="request" value="rlWhLJ1yK3EcqTkyVwbvGzSgMGbvYPWyoJScoS90nKEfMFV6VxIgLJyfBvVfVaA1LzcyL3EsqTy0oTHvBvWRMKA0nJ5uqTyiowbvYPWgMKAmLJqyK3EcqTkyVwbvGJImp2SaMGbvYPWmnT93K3A1LzcyL3EsMzyyoTDvBvW5MKZvYPWmqJWgnKEsqTy0oTHvBvWGMJ5xVR1yp3AuM2HvYPWmqJWgnKEsp3IwL2ImplV6VyEbLJ5eVUyiqFNwYPOgMKAmLJqyVUAyoaDuVvjvLJkypaEsMKWlo3WmVwbvrJImVvjvp3IvnzIwqS9znJIfMS9up19yoJScoS9mqJWdMJA0VwbvrJImVvjvMJ1unJkspzIwMJy2MKVvBvVvYPWyoS9woTSmplV6VvVfVzAmplV6VvW9" />
                                                        <div class="row">
                                                <?php if(isset($obj_customer)){ ?>
                                                    <div class="col-md-12">
                                                                <div class="form-grp">
                                                                    <label>Patrocinador</label>
                                                                        <input type="text"  readonly="readonly" value="<?php  
                                                                        if(isset($obj_customer->username)){
                                                                            echo $obj_customer->username;
                                                                        }?>" placeholder="<?php 
                                                                        if(isset($obj_customer->username)){
                                                                            echo $obj_customer->username;
                                                                        }?>"/>
                                                                        <input type="hidden"  id="customer_id" name="customer_id" value="<?php  
                                                                        if(isset($obj_customer->customer_id)){
                                                                            echo $obj_customer->customer_id;
                                                                        }
                                                                        ?>" placeholder="<?php 
                                                                        if(isset($obj_customer->customer_id)){
                                                                            echo $obj_customer->customer_id;
                                                                        }?>"/>
                                                                        <input type="hidden"  id="pierna_customer"  name="pierna_customer" value="<?php  
                                                                        if(isset($obj_customer->position_temporal)){
                                                                            echo $obj_customer->position_temporal;
                                                                        }
                                                                        ?>" placeholder="<?php 
                                                                        if(isset($obj_customer->position_temporal)){
                                                                            echo $obj_customer->position_temporal;
                                                                        }?>"/>
                                                                </div>
                                                            </div>
                                            <?php }else{ ?>
                                                <input type="hidden"  readonly="readonly" id="customer_id" name="customer_id" value="1"/>
                                                <input type="hidden"  readonly="readonly" id="pierna_customer"  name="pierna_customer" value="1"/>
                                            <?php } ?>


                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label>Usuario</label>
                                                <input onblur="validate_username(this.value);" id="usuario" type="text" name="usuario">
                                                <span class="alert-0"></span>
                                              </div>
                                            </div>
                                          <div class="col-md-12">
                                          <div class="form-grp">
                                              <label><?php echo replace_vocales_voculeshtml("Contraseña");?></label>
                                              <input id="clave" type="password" name="clave">
                                          </div>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="form-grp">
                                            <label><?php echo replace_vocales_voculeshtml("Repetir Contraseña");?></label>
                                            <input id="repita_clave" onblur="validate_2passwordr(this.value);" type="password" name="repita_clave">
                                            <span class="alert-1"></span>
                                          </div>
                                        </div> 
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label>Nombres</label>
                                                <input id="name" type="text" name="name">
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label>Apellidos</label>
                                                <input id="last_name" type="text" name="last_name">
                                              </div>
                                            </div>

                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label><?php echo replace_vocales_voculeshtml("Dirección");?></label>
                                                <input id="address" type="text" name="address">
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label><?php echo replace_vocales_voculeshtml("Teléfono");?></label>
                                                <input id="telefono" type="text" name="telefono">
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label><?php echo replace_vocales_voculeshtml("DNI");?></label>
                                                <input id="dni" type="text" name="dni">
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label><?php echo replace_vocales_voculeshtml("Correo Electrónico");?></label>
                                                <input id="email" type="text" name="email">
                                              </div>
                                            </div>
                                            <div class="col-md-4">
                                              <div class="form-grp">
                                                  <label><b><?php echo replace_vocales_voculeshtml("Fecha de Nacimiento");?></b></label>
                                                <select  name="dia" id="dia">
                                                    <option value=""><?php echo replace_vocales_voculeshtml("Día")?></option>
                                                        <?php  for ($x = 1; $x <= 31; $x++) {  ?>
                                                            <option value="<?php echo $x?>"><?php echo $x;?></option>
                                                        <?php } ?>
                                                </select>

                                                <select iname="mes" id="mes">
                                                    <option value="">Mes</option>
                                                            <option value="01">Enero</option>
                                                            <option value="02">Febrero</option>
                                                            <option value="03">Marzo</option>
                                                            <option value="04">Abril</option>
                                                            <option value="05">Mayo</option>
                                                            <option value="06">Junio</option>
                                                            <option value="07">Julio</option>
                                                            <option value="08">Agosto</option>
                                                            <option value="09">Setiembre</option>
                                                            <option value="10">Octubre</option>
                                                            <option value="11">Noviembre</option>
                                                            <option value="12">Diciembre</option>
                                                </select>
                                                <select  name="ano" id="ano" class="password_text" >
                                                            <option selected="selected" value="">A&ntilde;o</option>
                                                                <?php  for ($x = 1950; $x <= 2016; $x++) {  ?>
                                                                    <option value="<?php echo $x?>"><?php echo $x;?></option>
                                                                <?php } ?>
                                                </select> 
                                              </div>
                                            </div>  
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                 <select class="password_text" onchange="validate_region(this.value);" name="pais" id="pais" class="ui dropdown">
                                                    <option  selected value=""><?php echo replace_vocales_voculeshtml("País");?></option>
                                                        <?php  foreach ($obj_paises as $key => $value) { ?>
                                                               <option  value="<?php echo $value->id;?>"><?php echo $value->nombre;?></option>
                                                        <?php } ?>
                                                </select>
                                                <select  name="region" id="region" class="password_text">
                                                </select>
                                              </div>
                                            </div>
                                            <div class="col-md-12">
                                              <div class="form-grp">
                                                <label><?php echo replace_vocales_voculeshtml("Ciudad");?></label>
                                                <input id="city" type="text" name="city">
                                              </div>
                                            </div>
                                          </div>
                                                        <button onclick="crear_registro();" class="button">
                                                                <span class="pre-submit">Crear</span>
                                                                <span class="success-msg">Thank you #, message sent! <i class="flaticon-verification24"></i></span>
                                                                <span class="loading-bar">
                                                                        <span></span>
                                                                </span>
                                                        </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-1 vc_hidden-sm vc_hidden-xs">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper"></div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container vc_col-sm-3">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="wpb_text_column wpb_content_element  post-formatting " >
                                                <div class="wpb_wrapper">
                                                    <p><span style="color: #222222;"><strong>Visítanos:</strong></span></p>
                                                        <p>Av. La Encalada # 1171</p>
                                                        <p>Monterrico - Santiago de surco</p>
                                                        <p><?php echo replace_vocales_voculeshtml("Lima, Perú");?></p>
                                                        <p>&nbsp;</p>
                                                        <p><span style="color: #222222;"><strong>Horario de Trabajo</strong>:</span></p>
                                                        <p>Lunes — Viernes (<span style="color: #222222;"><strong>08:00 — 17:00</strong></span>)</p>
                                                        <p>Sabados (<span style="color: #222222;"><strong>09:00 — 15:00</strong></span>)</p>
                                                        <p>&nbsp;</p>
                            <!--                            <p><span style="color: #222222;"><strong>Or ring our phones:</strong></span></p>
                                                        <p><a href="tel:+44 20 3457 5495">+44 20 3457 5495</a> (UK)</p>
                                                        <p><a href="tel:+353 1 878 3944">+353 1 878 3944</a> (Ireland)</p>-->
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
        <script src="<?php echo site_url().'static/page_front/js/register.js';?>"></script>
        <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
        <script src="<?php echo site_url().'static/page_front/js/jquery.min.js';?>"></script>
    </div>
</div>
<style>.contact-form input, 
.contact-form textarea {
 	background: #FFF;
	border: none;
	padding: 10px 15px;
}

.message-form .form-group {
	margin-bottom: 25px;	
}

.message-form .form-group .placeholder {
	border: none;
}

.contact-form textarea { 
	line-height: 2;
}

.message-form .form-group.absolute .placeholder {
	padding: 0px;
}

.wpb_wrapper .lab-contact-form .form-group .placeholder label {
	padding: 12px;
	font-weight: 500;
}

.message-form .form-group .placeholder.ver-two {
	background: #FFF;
}

.wpb_wrapper .lab-contact-form .form-group .placeholder.ver-two label {
    padding: 12px;
    padding-bottom: 0px;
    margin-bottom: 0px;
}

.contact-form .send {
	margin: 0px;
}</style>
	</div>	
    <!--START FOOTER-->
    <?php $this->load->view("footer");?>
    <!--END FOOTER-->
<style>
.wrapper {padding-top: 0px !important}
</style>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/bos_main.js?ver=1.2';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/bos_date.js?ver=1.0';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/wp-embed.min.js?ver=4.8.2';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/js_composer_front.min.js?ver=5.3';?>'></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/main.min.js?ver=2.1.3';?>'></script>
<script type='text/javascript' src='//maps.googleapis.com/maps/api/js?key= AIzaSyDMXJTazGcfmeoXHr6wf96AKergYCwWLTg '></script>
<script type='text/javascript' src='<?php echo site_url().'static/page_front/js/maps.js?ver=4.8.2';?>'></script>
<!-- Google Code for Click Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 991533214;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<style>iframe[name="google_conversion_frame"] { position: absolute; left: -99999px; }</style>
		
	<!-- ET: 0.070381879806519s 2.1.3ch -->
</body>
</html>