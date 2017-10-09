<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view("head");?>
	<body>
            <!--START NAV-->
		<?php $this->load->view("nav");?>
            <!--END START NAV-->
		<section class="contact_header top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
                                            <h2><?php echo replace_vocales_voculeshtml("Plan de Inversión");?></h2>
					</div>
				</div>
			</div>
		</section>
		<section class="service1-section">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<aside>
							<div class="list-group">
                                                            <a href="<?php echo site_url().'plan';?>" class="list-group-item"><?php echo replace_vocales_voculeshtml("Rentabilidad por Inversión");?></a>
								<a href="<?php echo site_url().'referred';?>"  class="list-group-item"><?php echo replace_vocales_voculeshtml("Bono por Referidos");?></a>
								<a href="<?php echo site_url().'binary';?>"  class="list-group-item active disabled"><?php echo replace_vocales_voculeshtml("Bono Binario");?></a>
								<a href="<?php echo site_url().'bets';?>"  class="list-group-item"><?php echo replace_vocales_voculeshtml("Apuestas en Vivo");?></a>
							</div>

							<div class="brochures-download">
                                                            <h3><?php echo replace_vocales_voculeshtml("Descargar Plan de Compensación");?></h3>
								<div class="list-group">
									<a href="<?php echo site_url().'static/page_front/document/presentacion_cw.pdf';?>" download="presentacion_cw.pdf" alt="<?php echo replace_vocales_voculeshtml("presentación criptowin");?>" class="list-group-item download-pdf"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>Plan de Pagos CW</a>
								</div>
							</div>

							<div class="request-quote">
								<h4><?php echo replace_vocales_voculeshtml("Obtén un Paquete");?></h4>
                                                                <p><?php echo replace_vocales_voculeshtml("Obtenga orientación profesional para crear y administrar su negocio.");?></p>
                                                                <a class="btn btn-default hvr-bounce-to-right" href="<?php echo site_url().'contact';?>" role="button"><?php echo replace_vocales_voculeshtml("Contáctenos");?></a>
							</div>
						</aside>
					</div>
					<div class="col-md-8">
						<div class="service-right-content">
							<div class="service-first">
								<div class="img-box">
                                                                    <img src="<?php echo site_url().'static/page_front/images/plan/binary.jpg';?>" alt=""/>
								</div>
                                                            <h2><?php echo replace_vocales_voculeshtml("Bono Binario")?></h2>
                                                            <p><?php echo replace_vocales_voculeshtml("Ganas el 12% de la pierna menor hasta una profundidad hasta el infinito, condición calificar el binario con 2 directos en ambos lados de la misma cuenta. No hay tope límite de ganancia.");?></p>
                                                                <div class="height-50"></div>
                                                                
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>
		<!-- last section -->
		<section class="get-quote">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<h3>En CRIPTOWIN siempre hacemos la diferencia.</h3>
						<p>
							<?php echo replace_vocales_voculeshtml("No te pierdas esta gran oportunidad y sé parte de los pioneros que se suman a cambiar la vida de miles de personas.");?>
						</p>
					</div>
					<div class="col-lg-3">
                                            <a class="btn btn-default hvr-bounce-to-right-reverse" href="<?php echo site_url().'register'?>" data-text="read-more"><?php echo replace_vocales_voculeshtml("Obtén un Paquete");?></a>
					</div>
				</div>
			</div>

		</section>
		<!-- FOOTER SECTION -->
               <?php $this->load->view("footer");?>
		<!--END FOOTER SECTION-->
	</body>
</html>
