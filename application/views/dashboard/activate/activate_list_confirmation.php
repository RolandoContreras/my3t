<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: auto;">
                                            <a class="brand">LISTADO DE  ASOCIADOS</a>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100%;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                               <th>ID</th>
                                <th>Imagen</th>
                                <th>Usuario</th>
                                <th>Franquicia</th>
                                <th>Mensaje</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_active_message as $key => $value): ?>
                            <tr>
                            <td><?php echo $value->activation_message_id;?></td>
                            <td>
                                <div class="post_title">
                                    <img src="<?php echo site_url().'static/backoffice/uploads/'.$value->img;?>" width="40" />
                                </div>
                                <div class="operation">
                                          <a class="btn btn-small" data-toggle="modal" href="<?php echo "#".$key;?>"><i class="fa fa-eye"></i> Ver</a>
                                </div>
                                <div id="<?php echo $key;?>" class="modal hide" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="overflow:auto;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-body">
                                       <img style="margin:auto;" src="<?php echo site_url().'static/backoffice/uploads/'.$value->img;?>" height="800"/>
                                  </div>
                                       
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                                
                            </td>
                            <td><?php echo $value->username;?>
                                <div class="operation">
                                        <div class="btn-group">
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
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                            <?php if ($value->active == 1) { ?>
                                                <a onclick="update_confirmation('<?php echo $value->activation_message_id;?>','0');" class="btn btn-small"><i class="fa fa-check"></i> Marcar Activo</a>
                                            <?php }else{ ?>
                                                <a onclick="update_confirmation('<?php echo $value->activation_message_id;?>','1');" class="btn btn-small"><i class="fa fa-ban"></i> Marcar Inactivo</a>
                                            <?php } ?>
                                          </div>
                                    </div>
                                 </td>
                        </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
            </div>
           <!--</form>-->         
        </div>
    </div>
</div><!-- main content -->
</div>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
<script src="static/cms/js/active.js"></script>