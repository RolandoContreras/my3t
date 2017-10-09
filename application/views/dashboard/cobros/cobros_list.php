<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>

<!-- main content -->
<div id="main_content" class="span11">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                    <div class="navbar navbar-static navbar_as_heading">
                            <div class="navbar-inner">
                                    <div class="container" style="width: 100%;">
                                            <a class="brand">LISTADO DE  COBROS</a>
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
                                <th>FECHA</th>
                                <th>MONTO</th>
                                <th>CUOTA</th>
                                <th>TOTAL PAGAR</th>
                                <th>USUARIO</th>
                                <th>NOMBRES</th>
                                <th>DIRECCIÓN</th>
                                <th>ESTADO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($obj_pay as $value): ?>
                            <tr>
                                <td align="center"><?php echo $value->pay_id;?></td>
                                <td align="center"><?php echo formato_fecha_barras($value->date);?></td>
                                <td align="center"><b><a class="pending"><?php echo $value->amount;?></a></b></td>
                                <td align="center"><b><a style="color:red;"><?php echo $value->fee;?></a></b></td>
                                <td align="center"><b><a style="color:green;"><?php echo $value->amount_total;?></a></b></td>
                                <td align="center"><b><?php echo $value->username;?></b></td>
                                <td align="center"><?php echo $value->first_name." ".$value->last_name;?></td>
                                <td align="center"><?php echo $value->btc_address;?></td>
                                <td align="center">
                                    <?php if ($value->status_value == 2) {
                                        $valor = "Devuelto o Cancelado";
                                        $stilo = "label label-important";
                                    }elseif($value->status_value == 3){
                                        $valor = "Es espera de procesamiento";
                                        $stilo = "label label-warning";
                                    }elseif($value->status_value == 4){
                                        $valor = "Pagado";
                                        $stilo = "label label-success";
                                    } ?>
                                    <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                                </td>
                                <td align="center">
                                    <div class="operation">
                                            <div class="btn-group">
                                                    <button class="btn btn-small" onclick="ver_detalle('<?php echo $value->pay_id;?>');">VER</button>
                                                    <button class="btn btn-small" onclick="pagado('<?php echo $value->pay_id;?>','<?php echo $value->first_name;?>','<?php echo $value->username;?>','<?php echo $value->amount;?>','<?php echo $value->email;?>');">Pagado</button>
                                                    <button class="btn btn-small" onclick="devolver('<?php echo $value->pay_id;?>','<?php echo $value->first_name;?>','<?php echo $value->username;?>','<?php echo $value->amount;?>','<?php echo $value->email;?>');">Devolver</button>
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
<script src="static/cms/js/cobros.js"></script>