<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span9">
    <div class="row-fluid">
        <div class="widget_container" style="width: 110%;">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 110%;">
                                            <a class="brand">LISTADO DE PUNTOS BINARIOS</a>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100%;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>FECHA</th>
                                <th>USUARIO</th>
                                <th>BONO</th>
                                <th>PUNTOS</th>
                                <th>ESTADO</th> 
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($obj_binarys as $value): ?>
                                <td align="center"><?php echo $value->binary_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->created_at);?></td>
                                <td class="post_title" align="center"><b><?php echo $value->username;?></b></td>
                                <td align="center"><span class="label label-success"><?php echo $value->point_left;?></span></td>
                                <td align="center"><span class="label label-block"><?php echo $value->point_rigth;?></span></td>
                                <td align="center">
                                    <?php if ($value->status_value == 1) {
                                        $valor = "Abonado";
                                        $stilo = "label label-success";
                                    }else{
                                        $valor = "Pagado";
                                        $stilo = "label label-info";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                            <div class="btn-group">
                                                <button class="btn btn-small" onclick="edit_comissions('<?php echo $value->binary_id;?>');">Editar</button>
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
<script src="static/cms/js/customer.js"></script>