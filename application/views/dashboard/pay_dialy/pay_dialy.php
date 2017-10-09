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
                                            <a class="brand">PAGOS DIARIOS</a>
                                             <button class="btn btn-small" onclick="nuevo_pago();">Nuevo Pago</button>
                                    </div>
                            </div>
                    </div>
                
             <!--<form>-->
                <div class="well nomargin" style="width: 100% !important;">
                    <!--- INCIO DE TABLA DE RE4GISTRO -->
                   <table id="table" class="display" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Última fecha</th>
                                <th>Concepto</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php foreach ($obj_commissions as $value): ?>
                                <tr>
                                    <td>
                                        <div class="post_title"><?php echo formato_fecha($value->date);?></div>
                                    </td>
                                    <td><?php echo $value->bonus;?></td>
                                    <td>
                                        <span class="label label-success">Procesado</span>
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
        columnDefs: [ {
            targets: [ 0 ],
            orderData: [ 0, 1 ]
        }, {
            targets: [ 1 ],
            orderData: [ 1, 0 ]
        },{
            targets: [ 3 ],
            orderData: [ 3, 0 ]
        }]
    } );
});

</script>
<script src="<?php echo site_url();?>static/cms/js/pay_dialy.js"></script>