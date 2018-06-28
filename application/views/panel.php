<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<div class="row-fluid">
    <div class="span6">
                        <div class="widget_container">
							<div class="well nomargin">
								<div class="navbar navbar-static navbar_as_heading">
									<div class="navbar-inner">
										<div class="container" style="width: auto;">
											<a class="brand">Vista Rápida</a>
                                                                                        <button class="btn btn-duadua" onclick="pago_binario();">Pago de Binario</button>
										</div>
									</div>
								</div>
								<table id="quick_view" class="table">
									<thead>
										<tr>
											<th>CMS</th>
											<th>Acciones</th>
										</tr>
									</thead><!-- table heading -->
									<tbody>
										<tr>
                                                                                        <td><a href="<?php echo site_url().'dashboard/clientes';?>"><b><?php echo $obj_total->total_customer;?></b><i class="fa fa-users"></i> Asociados</a></td>
                                                                                        <td><a href="<?php echo site_url().'dashboard/confirmation_activaciones';?>"><b class="cmd"><?php echo $obj_pending->pending_messages_activate;?></b><i class="fa fa-users"></i> Por Aprobar</a></td>
										</tr>
										<tr>
											<td><a href="<?php echo site_url().'dashboard/comentarios';?>"><b><?php echo $obj_total->total_comments;?></b><i class="fa fa-comments"></i> Comentarios</a></td>
											<td><a href="<?php echo site_url().'dashboard/comentarios';?>" class="pending"><b class="cmd"><?php echo $obj_pending->pending_comments;?></b><i class="fa fa-comments"></i> Por Leer</a></td>
										</tr>
                                                                                <tr>
											<td><a href="<?php echo site_url().'dashboard/cobros';?>"><b><?php echo $obj_total->total_pay;?></b><i class="fa fa-btc"></i> Pagos Realizados</a></td>
											<td><a href="<?php echo site_url().'dashboard/cobros';?>" class="spam"><b class="cmd"><?php echo $obj_pending->pending_pay;?></b><i class="fa fa-btc"></i> Por Pagar</a></td>
										</tr>
                                                                                <tr>
											<td><a href="<?php echo site_url().'dashboard/soporte';?>"><b><?php echo $obj_total->total_messages_support;?></b><i class="fa fa-question"></i> Soporte</a></td>
                                                                                        <td><a href="<?php echo site_url().'dashboard/soporte';?>" class="spam"><b class="cmd"><?php echo $obj_pending->pending_messages_support;?></b><i class="fa fa-question"></i> Por Solucionar</a></td>
										</tr>
										<tr>
											<td><a href="#"><b><?php echo $obj_total->total_product;?></b><i class="fa fa-product-hunt"></i> Productos</a></td>
										</tr>
										<tr>
											<td><a href="<?php echo site_url()."dashboard/comisiones";?>"><b><?php echo $obj_total->total_commissions;?></b><i class="fa fa-area-chart"></i> Comisiones</a></td>
											<td class="blank">&nbsp;</td>
										</tr>
										<tr>
											<td><a href="<?php echo site_url().'dashboard/bonos';?>"><b><?php echo $obj_total->total_bonus;?></b><i class="fa fa-area-chart"></i> Bonos</a></td>
											<td class="blank">&nbsp;</td>
										</tr>
                                                                                <tr>
											<td><a href="<?php echo site_url().'dashboard/categorias';?>"><b><?php echo $obj_total->total_category;?></b><i class="fa fa-tags"></i> Categorías</a></td>
											<td class="blank">&nbsp;</td>
										</tr>
                                                                                <tr>
											<td><a href="<?php echo site_url().'dashboard/rangos';?>"><b><?php echo $obj_total->total_ranges;?></b><i class="fa fa-level-up"></i> Rangos</a></td>
											<td class="blank">&nbsp;</td>
										</tr>
                                                                                <tr>
											<td><a href="<?php echo site_url().'dashboard/informativos';?>"><b><?php echo $obj_total->total_informative;?></b><i class="fa fa-envelope-open-o"></i> Mensajes Informativos</a></td>
											<td class="blank">&nbsp;</td>
										</tr>
                                                                                <tr>
											<td><a href="<?php echo site_url().'dashboard/usuarios';?>"><b><?php echo $obj_total->total_users;?></b><i class="fa fa-user-secret"></i> Usuarios</a></td>
											<td class="blank">&nbsp;</td>
										</tr>
                                                                                
									</tbody>
								</table>
							</div>
						</div>
        
        
            <div id="quick_post" class="widget_container">
                    <div class="well">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Mensaje Correo Masivo</a>
                                            </div>
                                    </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons-radio" style="margin-bottom:20px;">
                                    <button class="btn btn-duadua active">Red</button>
                                    <button class="btn btn-duadua">Page</button>
                                    <button class="btn btn-duadua">Report</button>
                                    <button class="btn btn-duadua">Event</button>
                            </div>

                            <form>
                            <fieldset>
                            <div class="control-group">
                            <div class="controls">
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-edit"></i></span>
                            <input class="input-large" size="16" type="text" id="title"  name="title" style="width:88%;" placeholder="<?php echo replace_vocales_voculeshtml("Título");?>" />
                            </div>
                            </div>
                            </div>

                            <div class="control-group">
                            <div class="controls">
                            <textarea class="input-large" id="message_content" name="message_content" rows="5" style="width:97%;height:180px;" placeholder="Content"></textarea>
                            </div>
                            </div>

                            <a onclick="message_public();" class="btn btn-primary">Publicar</a>

                            </fieldset>
                            </form>
                    </div>
            </div>
    </div>

        <div class="span6">
                <div id="quick_comment_view" class="widget_container">
                        <div class="well">							
                                <div class="navbar navbar-static navbar_as_heading">
                                        <div class="navbar-inner">
                                                <div class="container" style="width: auto;">
                                                        <a class="brand">Último Comentario</a>
                                                </div>
                                        </div>
                                </div>
                            <?php 
                            if(count($obj_last_comment) > 0){ ?>
                                <div class="row-fluid">
                                    <div class="comment_container span12" style="margin-left:auto;">
                                        <div class="span2">
                                            <img style="padding: 8px" src="<?php echo site_url('static/cms/images/email-icon.jpg');?>" alt="mensajes"/>
                                        </div>
                                        <div class="span10" style="margin-left:auto;">
                                            <div class="comment_content">
                                                <p class="meta"><span class="comment_date"><?php echo formato_fecha($obj_last_comment->date_comment);?></span> | <a href="#"><?php echo $obj_last_comment->email;?></a></p>
                                                    <p><a href="#" class="comment_author"><?php echo $obj_last_comment->name;?></a> : <?php echo $obj_last_comment->comment;?></p>
                                                    <p>
                                                            <a class="btn btn-mini btn-primary" href="#">Reply</a> <a class="btn btn-mini btn-danger" href="#">Delete</a> <a class="btn btn-mini btn-warning" href="#">Mark as Spam</a> 
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url("dashboard/comentarios");?>" class="btn btn-duadua">Ver más</a>
                                </div>
                            <?php }else{ ?>
                                    <div class="row-fluid">
                                            <div class="comment_container span12" style="margin-left:auto;">
                                                <div class="span10" style="margin-left:auto;">
                                                    <div class="comment_content">
                                                        <h4><b>NO HAY MENSAJES</b></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <a href="<?php echo site_url("dashboard/comentarios");?>" class="btn btn-duadua">Ver más</a>
                                    </div>
                            <?php }  ?>
                        </div>
                </div>
        </div>
</div>
<script src="static/cms/js/panel.js"></script>
<script src="static/cms/js/jobs.js"></script>