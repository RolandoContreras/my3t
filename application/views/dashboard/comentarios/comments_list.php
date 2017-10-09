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
                                            <a class="brand">COMENTARIOS</a>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombres</th>
                                <th>Correo Electrónico</th>
                                <th>Comentario</th>
                                <th>Fecha de Comentario</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_comments as $value): ?>
                                <tr>
                            <th><?php echo $value->comment_id;?></th>
                            <td>
                                <div class="post_title"><?php echo $value->name;?></div>
                            </td>
                            <td><?php echo $value->email;?></td>
                            <td><?php echo $value->comment;?></td>
                            <td><?php echo formato_fecha($value->date_comment);?></td>
                            <td>
                                <?php if ($value->status_value == 1) {
                                    $valor = "Leido";
                                    $stilo = "label label-success";
                                }else{
                                    $valor = "No Leido";
                                    $stilo = "label label-important";
                                } ?>
                                <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <?php 
                                            if($value->status_value == 1){ ?>
                                                    <button class="btn btn-small" onclick="change_state_no('<?php echo $value->comment_id;?>');">Marcar como no Contestado</button>
                                            <?php }else{ ?>
                                                    <button class="btn btn-small" onclick="change_state('<?php echo $value->comment_id;?>');">Marcar como Contestado</button> 
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
<script src="<?php echo site_url();?>static/cms/js/comments.js"></script>