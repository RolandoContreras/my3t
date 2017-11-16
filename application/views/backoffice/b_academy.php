<section>
    <?php 
    $url = explode("/",uri_string()); 
        if(isset($url[1])){
            switch ($url[1]) {
                ////////
                        case "academy":
                            $style = "section-heading-2";
                            break;
                        default:
                            $style = "section-heading";
                            break;
                }
        }
    ?>
    <div class="<?php echo $style;?> row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">ACADEMY - FOREX</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
    
            <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            
          

        <div class="col-md-12"> 
                <div class="panel panel-default">
                        <div class="panel-heading clearfix"> 
                            <div class="panel-title" style="text-align: center !important"><b>CONOZCA EL STAFF DE FOREX</b></div> 
                        </div> 
                </div> 
        </div>  
    
        <div class="col-sm-9">
		<div class="well padding-10">
			<div class="row">
				<div class="col-md-4">
                                    <img src="<?php echo site_url().'static/backoffice/images/academy/felipe.jpg';?>" class="img-responsive" alt="Felipe Arguedas">
<!--					<ul class="list-inline padding-10">
						<li>
							<i class="fa fa-calendar"></i>
							<a href="javascript:void(0);"> March 12, 2015 </a>
						</li>
						<li>
							<i class="fa fa-comments"></i>
							<a href="javascript:void(0);"> 38 Comments </a>
						</li>
					</ul>-->
				</div>
				<div class="col-md-8 padding-left-0">
					<h3 class="margin-top-0"><a href="javascript:void(0);">Admr. Felipe Arguedas</a><br>
                                            <!--<small class="font-xs"><i>Published by <a href="javascript:void(0);">John Doe</a></i></small>-->
                                        </h3>
					<p>
						<?php echo replace_vocales_voculeshtml("Administrador de Negocios Internacionales de profesión. Ejerció durante 4 años como trader para el X-Trader Brokers (XTB). En los últimos años, se ha desempeñado como asesor de inversiones bursátiles para Sudamérica y Europa. Ha realizado variadas publicaciones sobre economía global y local para El Diario Gestión, El Comercio y RPP Noticias en el país de Perú. Además, ha impartido cursos de formación bursátil para, Metodotrading.com y El Instituto de la Moneda de Lima y la Universidad de Piura.");?>
						<br>Podemos encontrar algunas de sus entrevistas en los siguientes enlaces:<br/>
                                                <br><a href="https://gestion.pe/mercados/subira-fed-su-tasa-interes-xdirect-analiza-posibles-escenarios-2161812">Diario Gestión - Subirá fed su tasa interes analiza posibles escenarios </a>
                                                <br><a href="https://www.youtube.com/watch?v=wi4FCWmh9ck&feature=youtu.be">Canal 4 - América Noticias </a>
                                                <br><a href="http://rpp.pe/economia/economia/bolsa-de-lima-seguira-volatil-por-evaluacion-de-indices-de-msci-afirman-noticia-827436">RPP - Radio Programa del Perú</a>
                                                <br><a href="https://elcomercio.pe/economia/personal/cuatro-opciones-rentabilizar-gratificacion-julio-170674">El Comercio - Diario mas visto del Perú</a><br>
					</p>
				</div>
			</div>
			<hr>
                        <div class="row">
				<div class="col-md-4">
                                    <img src="<?php echo site_url().'static/backoffice/images/academy/oscar.jpg';?>" class="img-responsive" alt="<?php echo replace_vocales_voculeshtml("Oscar Fernandez");?>">
				</div>
				<div class="col-md-8 padding-left-0">
                                    <h3 class="margin-top-0"><a href="javascript:void(0);"><?php echo replace_vocales_voculeshtml("Admr. Oscar Fernandez");?></a>
                                        <!--<br><small class="font-xs"><i>Published by <a href="javascript:void(0);">John Doe</a></i></small>-->
                                    </h3>
					<p>
						<?php echo replace_vocales_voculeshtml("Administrador en Negocios Internacionales por el instituto San Ignacio de Loyola. Administrador en Gerencia por la Universidad Peruana de Ciencias Aplicadas.");?><br/>
                                                <?php echo replace_vocales_voculeshtml("Analista de Inversiones bursátiles para diferentes brókers de mercados financieros líderes en el Perú y Latinoamérica, como analista ha desarrollado diferentes alternativas de inversión y ha dictado distintos seminarios de bolsa de valores, tanto en el MBA de finanzas de la UPC y en las compañías donde ha trabajado, ha escrito informes de mercado de valores y economía para distintos medios de comunicación a nivel nacional.")?><br/>
					</p>
					<!--<a class="btn btn-primary" href="javascript:void(0);"> Read more </a>-->
				</div>
			</div>
                        <hr/>
			<div class="row">
				<div class="col-md-4">
                                    <img src="<?php echo site_url().'static/backoffice/images/academy/gabriel.jpg';?>" class="img-responsive" alt="<?php echo replace_vocales_voculeshtml("Gabriel Gutiérrez");?>">
				</div>
				<div class="col-md-8 padding-left-0">
                                    <h3 class="margin-top-0"><a href="javascript:void(0);"><?php echo replace_vocales_voculeshtml("Admr. Gabriel Gutiérrez López");?></a>
                                        <!--<br><small class="font-xs"><i>Published by <a href="javascript:void(0);">John Doe</a></i></small>-->
                                    </h3>
					<p>
						<?php echo replace_vocales_voculeshtml("Administrador de Negocios Internacionales de profesión. Llevó a cabo sus estudios en la Universidad Peruana de Ciencias Aplicadas (UPC), en la ciudad de Lima, Perú. Luego se especializó en finanzas en la Universidad Nacional de San Marcos.");?><br/>
                                                <?php echo replace_vocales_voculeshtml("Ejerció durante 4 años como trader para el X-Trader Brokers (XTB). En los últimos años, se ha desempeñado como asesor de inversiones bursátiles para Sudamérica y Europa. Ha realizado variadas publicaciones sobre economía global y local para El Diario Gestión, El Comercio y RPP Noticias. Además, ha impartido cursos de formación bursátil para, Metodotrading.com y El Instituto de la Moneda de Lima y la Universidad de Piura en Perú.")?><br/>
                                                <?php echo replace_vocales_voculeshtml("Recientemente fue director de la academia de trading de Quantum Club y actualmente está a cargo de los portafolios de largo plazo en Blu-Trading.")?>Podemos encontrar algunas de sus entrevistas en los siguientes enlaces:<br/>
                                                <br><a href="https://elcomercio.pe/economia/peru/xdirect-dolar-tomara-impulso-primeros-meses-2017-231161"><?php echo replace_vocales_voculeshtml("El Comercio - Dolar tomará impulso los primeros meses del 2017")?></a>
                                                <br><a href="https://gestion.pe/tu-dinero/consejos-rentabilizar-su-grati-2150946"><?php echo replace_vocales_voculeshtml("Diario Gestión - Consejos para rentabilizar su gratificación")?></a>
                                                <br><a href="https://gestion.pe/tu-dinero/gratificaciones-entre-ahorrar-invertir-gastar-excedentes-2150566"><?php echo replace_vocales_voculeshtml("Diario Gestión - Gratificaciones entre ahorrar e invertir")?></a>
					</p>
					<!--<a class="btn btn-primary" href="javascript:void(0);"> Read more </a>-->
				</div>
			</div>
			<hr>
                        <a href="<?php echo site_url().'backoffice/academy/courses';?>"><button class="btn btn-success btn-block" type="button">VER CURSOS</button></a>
		</div>
	</div>
        <div class="col-sm-3">
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-search"></i>Search...</h5>
			<div class="input-group">
				<input class="form-control" type="text">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<i class="fa fa-search"></i>
					</button> </span>
			</div>
			<!-- /input-group -->
		</div>
		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-thumbs-o-up"></i> Siguenos!</h5>
			<ul class="no-padding no-margin">
				<p class="no-margin">
					<a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a>
                                        <a title="Youtube" target="_blank" href="https://www.youtube.com/channel/UCiAZcGdgGlrY2gv3igqdEMw/featured"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-youtube fa-stack-1x"></i></span></a>
                                        <a title="Imstagram" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x"></i></span></a>
                                        <a title="Imstagram" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-vimeo-square fa-stack-1x"></i></span></a>
				</p>
			</ul>
		</div>
		<!-- /well -->
		<!-- /well -->
<!--		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-fire"></i> Popular Posts:</h5>
			<ul class="no-padding list-unstyled">
				<li>
					<a href="javascript:void(0);" class="margin-top-0">WPF vs. Windows Forms-Which is better?</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="padding-top-5 display-block">How to create responsive website with Bootstrap?</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">The best Joomla! templates 2014</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">ASP .NET cms list</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">C# Hello, World! program</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="margin-top-5">Java random generator</a>
				</li>
			</ul>
		</div>-->
		<!-- /well -->

		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-file-pdf-o"></i> Track Record:</h5>
                        <small class="font-xs"><i><a href="javascript:void(0);">7-Nov hasta 14-Nov</a></i></small>
			<div class="row">
<!--				<div class="col-lg-12">

					<ul class="list-group no-margin">
						<li class="list-group-item">
							<a href=""> <span class="badge pull-right">15</span> Photograph </a>
						</li>
					</ul>
				</div>-->
                                <br/>
                                
                                
				<div class="col-lg-12">
                                    <div class="margin-top-10">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#modal-2"><img src="<?php echo site_url().'static/backoffice/images/track-7-nov.png';?>" alt="Track Record" class="img-responsive"></button>
                                    </div>
				</div>
			</div>

		</div>
		<!-- /well -->

	</div>
            </div>
        </div>
    </section>
    <!--SECTION MODAL-->
    <div id="modal-2" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title">
                Track Record - Operación con rentabilidad del 11%
            </h4>
          </div>
          <div class="modal-body">
              <p>
                <embed src="<?php echo site_url().'static/backoffice/document/track_nov.pdf';?>" width="100%" height="1500px" />
              </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <a class="btn btn-success" href="<?php echo site_url().'static/backoffice/document/track_nov.pdf';?>" download>Descargar</a></button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>