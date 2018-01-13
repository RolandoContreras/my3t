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
                                            <a class="brand">LISTADO DE CATEGORÍAS</a>
                                            <button class="btn btn-small" onclick="new_category();"><i class="fa fa-plus-square"></i> Nuevo</button>
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
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php foreach ($obj_category as $value): ?>
                                <td align="center"><b><?php echo $value->category_id;?></b></td>
                                <td align="center"><?php echo $value->name;?></td>
                                <td align="center"><?php echo $value->description;?></td>
                                <td align="center">
                                    <?php if ($value->active == 0) {
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
                                                <button class="btn btn-small" onclick="edit_category('<?php echo $value->category_id;?>');"><i class="fa fa-pencil-square-o"></i> Editar</button><button class="btn btn-small" onclick="delete_informative('<?php echo $value->category_id;?>');"><i class="fa fa-trash-o"></i> Eliminar</button>
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
         "order": [[ 0, "asc" ]]
    } );
} );
</script>
<script src="static/cms/js/category.js"></script>