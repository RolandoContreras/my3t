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
                                            <a class="brand">LISTADO DE  COMISIONES</a>
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
                                <th>ASOCIADO</th>
                                <th>BONO</th>
                                <th>MONTO</th> 
                                <th>ESTADO</th> 
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($obj_comission as $value): ?>
                                <td align="center"><?php echo $value->commissions_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td class="post_title" align="center"><b><?php echo $value->username;?></b></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td align="center"><?php echo $value->bonus;?></td>
                                <td align="center" class="label-success" style="color:#fff;"><b><?php echo $value->amount;?></b></td>
                                <td align="center">
                                    <?php if (($value->status_value == 1) || ($value->status_value == 2)) {
                                        $valor = "Abonado";
                                        $stilo = "label label-default";
                                    }elseif($value->status_value == 3){
                                        $valor = "Espera de procesar";
                                        $stilo = "label label-warning";
                                    }elseif($value->status_value == 4){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    }?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td>
                                    <div class="operation">
                                        <div class="btn-group">
                                                <button class="btn btn-small" onclick="edit_comissions('<?php echo $value->commissions_id;?>');"><i class="fa fa-edit"></i> Editar</button>
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
<script src="static/cms/js/comission.js"></script>