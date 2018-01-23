<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<!--<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>-->
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>	

<div class="container-fluid">
		<div class="row-fluid">
			<!-- main content -->
			<div id="main_content" class="span12">
				<div class="widget_container">
                                    <div class="well">
                                     <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">Asunto: Correo de Activaciones</a>
                                    </div>
                            </div>
                    </div>
                                    
                                    
			<div class="well nomargin" style="width: 100% !important;">
                    <table id="table" class="table display smallfont" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Usuario</th>
                                <th>Franquicia</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_active_message as $value): ?>
                            <tr>
                            <th><?php echo $value->activation_message_id;?></th>
                            <td>
                                <div class="post_title"><img src="<?php echo site_url().'static/backoffice/uploads/'.$value->img;?>" width="40" /></div>
                                <div class="operation">
                                        <div class="btn-group" style="display:none;">
                                          <a class="btn btn-small" data-toggle="modal" href="#12"><i class="fa fa-eye"></i> View</a>
                                        </div>
                                </div>
                            </td>
                            <td><?php echo $value->username;?>
                                <div class="operation">
                                        <div class="btn-group" style="display:none;">
                                          <a class="btn btn-small"><i class="fa fa-check"></i> Marcar Activo</a>
                                          <a class="btn btn-small"><i class="fa fa-ban"></i> Marcar Inactivo</a>
                                        </div>
                                </div>
                            </td>
                               
                            <td><?php echo $value->franchise;?></td>
                            <td><?php echo $value->message;?></td>
                            <td><?php echo formato_fecha_barras($value->date);?></td>
                            <td align="center">
                                    <?php if ($value->active == 1) {
                                        $valor = "Inactivo";
                                        $stilo = "label label-important";
                                    }else{
                                        $valor = "Activo";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    </div>
            </div>
    </div><!-- main content -->
   </div>
</div>
	
	<div class="modal hide" id="12">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_1</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span4">
						<img class="thumb" src="../examples/thumb-450/01.jpg" />
					</div>
					<div class="span1">&nbsp;</div>
					<div class="span7">
						<form method="post" action="" class="well">
							<label>Title</label>
							<input type="text" name="img_title" value="file_name_1" class="input-xlarge-fluid" />
							<label>Alternate Text</label>
							<input type="text" name="img_alt" value="file_name_1" class="input-xlarge-fluid" />
							<label>Description</label>
							<textarea name="img_desc" style="width:90%; height:70px;"></textarea>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="modal hide" id="myModal2">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_2</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span4">
						<img class="thumb" src="../examples/thumb-450/02.jpg" />
					</div>
					<div class="span1">&nbsp;</div>
					<div class="span7">
						<form method="post" action="" class="well">
							<label>Title</label>
							<input type="text" name="img_title" value="file_name_2" class="input-xlarge-fluid" />
							<label>Alternate Text</label>
							<input type="text" name="img_alt" value="file_name_2" class="input-xlarge-fluid" />
							<label>Description</label>
							<textarea name="img_desc" style="width:90%; height:70px;"></textarea>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="modal hide" id="myModal3">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_3</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span4">
						<img class="thumb" src="../examples/thumb-450/03.jpg" />
					</div>
					<div class="span1">&nbsp;</div>
					<div class="span7">
						<form method="post" action="" class="well">
							<label>Title</label>
							<input type="text" name="img_title" value="file_name_3" class="input-xlarge-fluid" />
							<label>Alternate Text</label>
							<input type="text" name="img_alt" value="file_name_3" class="input-xlarge-fluid" />
							<label>Description</label>
							<textarea name="img_desc" style="width:90%; height:70px;"></textarea>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-warning" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>
	
	<div class="modal hide" id="myModalV1">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_1</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<img class="thumb" src="../examples/thumb-450/01.jpg" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
	</div>
	
	<div class="modal hide" id="myModalV2">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_2</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<img class="thumb" src="../examples/thumb-450/02.jpg" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
	</div>
	
	<div class="modal hide" id="myModalV3">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_3</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						<img class="thumb" src="../examples/thumb-450/03.jpg" />
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
	</div>
	
	<div class="modal hide" id="myModalD1">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">x</button>
			<h3>file_name_x</h3>
		</div>
		<div class="modal-body">
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span12">
						Delete file_name_x ?
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn btn-large" data-dismiss="modal">NO</a>
			<a href="#" class="btn btn-large btn-danger">YES</a>
		</div>
	</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>