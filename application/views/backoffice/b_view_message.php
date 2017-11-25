<section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?php echo replace_vocales_voculeshtml("Mensajes");?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div><!-- Main content -->
    <div class="main-content">
        <div class="row">
			<div class="col-lg-3">
				<p><a class="btn btn-block btn-red" href="<?php echo site_url().'backoffice/compose_message';?>">Compose</a></p>
				<ul class="list-unstyled mail-list">
					<li>
                                            <a href="<?php echo site_url().'backoffice/messages';?>"><i class="fa fa-inbox"></i> Inbox <b>(<?php echo $all_message;?>)</b></a>
					</li>
					<li>
						<a href="#/"><i class="fa fa-send-o"></i> Enviados</a>
					</li>
				</ul>
				
				<h3 class="title text-uppercase m-l-20">Labels</h3>
				<ul class="list-unstyled category-list">
                                    <li><a href="<?php echo site_url().'backoffice/messages/bonus';?>"> <i class="fa fa-circle text-purple"></i>Bonos</a></li>
                                    <li><a href="<?php echo site_url().'backoffice/messages/support';?>"> <i class="fa fa-circle text-danger"></i>Soporte</a></li>
                                    <li><a href="<?php echo site_url().'backoffice/messages/social';?>"> <i class="fa fa-circle text-primary"></i>Social</a></li>
                                </ul>
			</div>
			<div class="col-lg-9">
			
				<div class="mail-box">
					<div class="mail-box-header clearfix">
						<h3 class="mail-title">Ver Mensaje</h3>
						<div class="pull-right tooltip-demo">
							<a title="Regresar" data-placement="top" data-toggle="tooltip" class="btn btn-white btn-sm" href="<?php echo site_url().'backoffice/messages';?>" data-original-title="Reply"><i class="fa fa-reply"></i> Regresar</a>
						</div>
						<div class="mail-tools clearfix">
                                                    <h4 class="title">Asunto: <?php echo replace_vocales_voculeshtml("$obj_get_message->subject");?></h4>
                                                    <p><span class="pull-right"><?php echo formato_fecha_barras($obj_get_message->date);?></span><span>De: <?php echo $obj_get_message->label;?></span></p>
						</div>
					</div>
					<div class="mail-body">
                                                 <p><?php echo replace_vocales_voculeshtml("$obj_get_message->messages");?></p>
						 <hr>
					</div>
                                </div>
			</div>
		</div>   
      </div>
      <!-- /main content -->
</section>