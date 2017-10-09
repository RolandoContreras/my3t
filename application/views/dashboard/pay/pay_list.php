<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<div class="row-fluid">
    <div class="widget_container">
        <div class="well nomargin">
            <div class="navbar navbar-static navbar_as_heading">
                <div class="navbar-inner">
                    <div class="container" style="width: auto;">
                        <a class="brand">Listado de Pedidos</a>
                    </div>
                </div>
            </div>
            <div class="subnav nobg">
                <form method="post" action="<?php echo site_url();?>dashboard/productos">
                 <div class="span2">
                         <input type="text" id="search_text" name="search_text" value="" class="input-xlarge-fluid" placeholder="Producto">
                 </div>
                <div class="span2"> <button type ="submit" class="btn btn-small btn-duadua">Buscar</button> <a href="<?php echo site_url();?>dashboard/menu"><input  type ="button" value="Todos" class="btn btn-small btn-duadua"></button></a></div>
                <div class="span8">
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
                </form>
            </div>

            <!--- INCIO DE TABLA DE RE4GISTRO -->

            <table class="table smallfont">
                <thead>
                    <tr>
                        <td>Numero de Order</td>
                        <td>Cliente</td>
                        <td>Total</td>
                        <td>Fecha de Pedido</td>
                        <td>Fecha de Envio</td>
                        <td>Direccion</td>
                        <td>Ciudad</td>
                        <td>Referencias</td>
                        <td>Estado</td>
                        <td>Detalle</td>
                    </tr>
                </thead>
                <tbody> 
                    <?php foreach ($obj_order as $value): ?>
                        <tr>
                            <td>
                                <div class="post_title"><?php echo $value->order_id;?></div>
                            </td>
                            <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                            <td><span class="label label-success"><?php echo format_number($value->total);?></span></td>
                            <td><?php echo $value->date_order;?></td>
                            <td><div class="post_title"><?php echo $value->date_send; ?></div></td>
                            <td><?php echo $value->address; ?></td>
                            <td><?php echo $value->city; ?></td>
                            <td><?php echo $value->references; ?></td>
                            <td>
                                <?php if ($value->status_value == 1) {
                                    $valor = "Pendiente";
                                    $stilo = "label label-important";
                                }else{
                                    $valor = "Enviado";
                                    $stilo = "label label-success";
                                } ?>
                                <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
                            </td>
                            <td>
                                <div class="operation">
                                        <div class="btn-group">
                                            <button class="btn btn-small" onclick="change_state('<?php echo $value->order_id;?>');">Enviado</button>
                                            <button class="btn btn-small" onclick="view_details('<?php echo $value->order_id;?>');">Ver</button>
                                        </div>
                                    </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!--- FIN DE TABLA DE RE4GISTRO -->


            <div class="subnav nobg">
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span2"></div>
                <div class="span2"></div>
                <div class="span1"></div>
                <div class="span4">
                    <div class="pagination">
                        <?php echo $pagination; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="static/cms/js/orders.js"></script>