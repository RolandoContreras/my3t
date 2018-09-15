<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase"><?=lang('idioma.b_productos');?></h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <!--SHOW ALERT  MESSAGE INFORMATIVE-->
            <div class="col-md-12"> 
                <div class="panel-group" id="accordion">
                <?php foreach ($messages_informative as $value) { ?>
                        <div class="row">
                            <div class="col-md-12"> 
                                        <div class="panel panel-success">
                                            <header class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse_message"><i class="collapse-caret fa  fa-angle-up"></i> <?=lang('idioma.b_informativo');?></a>
                                            </header>
                                            <div id="collapse_message" class="panel-collapse collapse in center">
                                                    <div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><?=lang('idioma.b_mensaje');?> <b><?php echo $value->title;?></b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?php echo $value->text;?></p> 
                                                </div> 
                                            </div>
                                        </div> 
                                </div>
                        </div>
                <?php } ?>
                </div>
            </div>
            <!--END SHOW ALERT MESSAGE INFORMATIVE-->
            <div class="col-lg-12">
                 <!--Viajes-->
                <div class="row">
                                <div class="col-md-3"> 
				    <div class="panel panel-default">
						<!-- panel body --> 
						<div class="panel-body"> 
                                                    <p>
                                                            <img src="<?php echo site_url().'static/backoffice/images/viaje.jpg';?>" alt="viaje"/>
                                                        </p>
						</div> 
					</div> 
				</div>
                                <div class="col-md-9"> 
                                        <div class="panel panel-success">
                                            <div id="collapse_message" class="panel-collapse collapse in center">
                                                <div class="panel-heading clearfix"> 
                                                        <div class="panel-title"><b>RCI</b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?=lang('idioma.about_somos_principal');?></p>
                                                    <p><?=lang('idioma.about_actualmente');?></p>
                                                    <p><?=lang('idioma.about_en_rci_comprendemos');?></p>
                                                    <br/>
                                                    <a href="https://www.rci.com/" target="_bank"><button class="btn btn-success btn-block" type="button"><?=lang('idioma.b_ir_rci');?></button></a>
                                                </div> 
                                            </div>
                                        </div> 
				</div>
                    </div>
                 <!--Forex-->
                <!--ENTRENAMIENTOS-->
                <div class="row">
                                <div class="col-md-3"> 
				    <div class="panel panel-default">
						<!-- panel body --> 
						<div class="panel-body"> 
							<p>
                                                            <img src="<?php echo site_url().'static/backoffice/images/jaquemente.jpg';?>" alt="jaquemente"/>
                                                        </p>
						</div> 
					</div> 
				</div>
                                <div class="col-md-9"> 
                                        <div class="panel panel-success">
                                            <div id="collapse_message" class="panel-collapse collapse in center">
                                                <div class="panel-heading clearfix"> 
                                                        <div class="panel-title"><b>JAQUEMENTE</b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?=lang('idioma.about_te_damos_coaching');?>
                                                    <?=lang('idioma.about_creemos_crecimiento');?></p>
                                                    <p><?=lang('idioma.about_sistema_coaching');?></p>
                                                    <a href="javascript:void(0)"><button disabled="disabled" class="btn btn-success btn-block" type="button"><?=lang('idioma.b_ir_sistema');?></button></a>
                                                </div> 
                                            </div>
                                        </div> 
				</div>
                    </div>
                 <!--Forex-->
                <div class="row">
                                <div class="col-md-3"> 
				    <div class="panel panel-default">
						<!-- panel body --> 
						<div class="panel-body"> 
							<p>
                                                            <img src="<?php echo site_url().'static/backoffice/images/forex.jpg';?>" alt="forex"/>
                                                        </p>
						</div> 
					</div> 
				</div>
                                <div class="col-md-9"> 
                                        <div class="panel panel-success">
                                            <div id="collapse_message" class="panel-collapse collapse in center">
                                                <div class="panel-heading clearfix"> 
                                                        <div class="panel-title"><b><?=lang('idioma.b_academy_forex');?></b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?=lang('idioma.about_profesionales_calificados');?></p>
                                                    <p><?=lang('idioma.about_academia_3t');?></p>
                                                    <p><?=lang('idioma.about_se_divide');?></p>
                                                    <p><b><?=lang('idioma.about_que_es_blu');?></b></p>
                                                    <p><?=lang('idioma.about_prestigiosa_firma');?></p>
                                                    <br/>
                                                    <a href="javascript:void(0)"><button disabled="" class="btn btn-success btn-block" type="button"><?=lang('idioma.b_academy_forex');?></button></a>
                                                </div> 
                                            </div>
                                        </div> 
				</div>
                    
<!--                                <div class="col-md-9"> 
					<div class="panel panel-default">
						<div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><b>ACADEMIA DE FOREX</b></div> 
						</div> 
						 panel body  
						<div class="panel-body"> 
                                                    <p>Profesionales altamente calificados en el manejo de fondos de inversión con experiencias en compañías prestigiosas en Latinoamérica y Europa forman el staff de <b>3T ACADEMY</b>.
                                                        Nuestros profesionales son referentes y voceros en distintos medios de comunicación como américa noticias, canal N, diario gestión, el comercio, Perú 21, RPP Noticias entre otras.<br/>A la vez con un Track Record de hasta 20% de ganancia mensual en operaciones de manejo de fondos.
                                                        <br/>Fundamentos básicos, entrenamientos personalizados, señales, estrategias y noticias del día tendrás en nuestra academia.</p><br/>
                                                    
                                                    <a href="javascript:void(0)"><button disabled="" class="btn btn-success btn-block" type="button">IR A 3T ACADEMY</button></a>
                                                    <a href="<?php echo site_url().'backoffice/productos/academy';?>"><button disabled="" class="btn btn-success btn-block" type="button">IR A 3T ACADEMY</button></a>
						</div> 
					</div> 
				</div>-->
                    </div>
                </div>
            
    </div>
    </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>