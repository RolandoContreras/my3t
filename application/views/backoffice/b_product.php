<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">PRODUCTOS</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <!--SHOW ALERT  MESSAGE INFORMATIVE-->
            <div class="col-md-12"> 
                <?php 
                foreach ($messages_informative as $value) { ?>
                    <div class="row">
                        <div class="col-md-12"> 
                                    <div class="panel panel-warning">
						<div class="panel-heading clearfix"> 
                                                <div class="panel-title">Mensaje: <b><?php echo $value->title;?></b></div> 
                                            </div> 
                                            <!-- panel body --> 
                                            <div class="panel-body"> 
                                                <p><?php echo $value->text;?></p> 
                                            </div> 
                                    </div> 
                            </div>
                        </div>
                <?php } ?>
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
					<div class="panel panel-default">
						<div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><b>PLATAFORMA GLOBAL PASS</b></div> 
						</div> 
						<!-- panel body --> 
						<div class="panel-body"> 
                                                    <p>Te otorgamos un estilo de vida distinto, podrás viajar a lugares paradisiacos con nosotros siendo parte de 3T LIFESTYLE. 	
                                                    Tendrás 3 plataformas GLOBAL PASS PERÚ, INTERNACIONAL Y ELITE que te permitirán tener hasta el 70% de descuentos en: cientos de establecimiento dentro de Perú, hoteles, restaurantes, autos, cruceros, vuelos y mucho más.<br/>Puedes acumular puntos boomerang o millas para canjearlos por viajes, cruceros, vuelos o cualquier servicio de la plataforma todo pagado simplemente por recomendar la plataforma y que tus recomendados compren a través tuyo. 
                                                    </p><br/>
                                                    <a href="<?php echo site_url().'backoffice/productos/globalpass';?>"><button class="btn btn-success btn-block" type="button">VER PLATAFORMAS</button></a>
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
					<div class="panel panel-default">
						<div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><b>SISTEMA JAQUEMENTE</b></div> 
						</div> 
						<!-- panel body --> 
						<div class="panel-body"> 
                                                    <p>Descubre el mecanismo de tu “mente” con el coaching transformacional basado en experiencias vivenciales de ciencia práctica que te ayudarán a recuperar el poder de tu vida a través de la autoconfianza. Un sistema probado que esta llevando al éxitos a cientos de persona.<br/>Tendrás temas como:
¿Cómo eliminar la basura mental?, entrena tu enfoque para ver oportunidades, ¿Cómo crear relaciones y la vida social que siempre quisiste?, ¿Cómo superar los miedos?, convertir espirales de muerte a vida y mucho más.
</p><br/>
                                                    <a href="http://sistemadenuevepasos.com/miembros/" target="_blank"><button disabled="" class="btn btn-success btn-block" type="button">IR AL SISTEMA</button></a>
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
					<div class="panel panel-default">
						<div class="panel-heading clearfix"> 
                                                    <div class="panel-title"><b>ACADEMIA DE FOREX</b></div> 
						</div> 
						<!-- panel body --> 
						<div class="panel-body"> 
                                                    <p>Profesionales altamente calificados en el manejo de fondos de inversión con experiencias en compañías prestigiosas en Latinoamérica y Europa forman el staff de 3T ACADEMY.
                                                        Nuestros profesionales son referentes y voceros en distintos medios de comunicación como américa noticias, canal N, diario gestión, el comercio, Perú 21, RPP Noticias entre otras.<br/>A la vez con un Track Record de hasta 20% de ganancia mensual en operaciones de manejo de fondos.
                                                        <br/>Fundamentos básicos, entrenamientos personalizados, señales, estrategias y noticias del día tendrás en nuestra academia.</p><br/>
                                                    <a href="<?php echo site_url().'backoffice/productos/academy';?>"><button disabled="" class="btn btn-success btn-block" type="button">IR A 3T ACADEMY</button></a>
						</div> 
					</div> 
				</div>
                    </div>
                </div>
            
    </div>
    </div>
   </section>
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>