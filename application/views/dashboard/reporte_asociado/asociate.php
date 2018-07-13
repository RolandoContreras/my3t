<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>


<div class="row-fluid">
    <div class="span6">
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Vista Global de Asociados</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CONCEPTO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a>Total Asociados</a></td>
                                                    <td><b><?php echo $obj_customer;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Asociados Pagados</a></td>
                                                <td><b><?php echo $obj_pagados;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Asociados Financiados</a></td> 
                                                <td><b><?php echo $obj_financiado;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
                
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Activos e Inactivos</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CONCEPTO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                           <tr>
                                               <td><a>Asociados Activo</a></td>
                                                <td><b><?php echo $obj_activos;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Asociados Inactivos</a></td>
                                                    <td><b><?php echo $obj_inactivos;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Ratio de Asociados Haciendo la Red</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CONCEPTO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                           <tr>
                                               <td><a>Ratio de Asociados</a></td>
                                                <td><b><?php echo $ratio;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Promedio de Asociados Activos</a></td>
                                                    <td><b><?php echo $promedio;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Porcentaje de Retención de  Asociados Activos</a></td>
                                                    <td><b><?php echo $porcentaje_retencion."%";?></b></td>
                                            </tr>
                                            
                                            <tr>
                                                    <td><a>Promedio de Asociados Pagados</a></td>
                                                    <td><b><?php echo $promedio_pagado;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Porcentaje de Retención de  Asociados Pagados</a></td>
                                                    <td><b><?php echo $porcentaje_retencion_pagado."%";?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Promedio Total de Asociados </a></td>
                                                    <td><b><?php echo $promedio_total;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Porcentaje de Retención Total de  Asociados</a></td>
                                                    <td><b><?php echo $porcentaje_retencion_total."%";?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        
              <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Medias Absolutas</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CONCEPTO</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                           <tr>
                                               <td><a>Media de Promedio </a></td>
                                                <td><b><?php echo $media_promedio;?></b></td>
                                            </tr>
                                            <tr>
                                                    <td><a>Media de Porcentaje de Retención</a></td>
                                                    <td><b><?php echo $media_porcentaje."%";?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        
    </div>

        <div class="span6">
                  <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Crecimiento Primer año</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>MESES</th>
                                                    <th>TOTAL</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a>Enero</a></td>
                                                    <td><b><?php echo $obj_grow_year->enero;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Febrero</a></td>
                                                <td><b><?php echo $obj_grow_year->febrero;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Marzo</a></td> 
                                                <td><b><?php echo $obj_grow_year->marzo;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Abril</a></td> 
                                                <td><b><?php echo $obj_grow_year->abril;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Mayo</a></td> 
                                                <td><b><?php echo $obj_grow_year->mayo;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Junio</a></td> 
                                                <td><b><?php echo $obj_grow_year->junio;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Julio</a></td> 
                                                <td><b><?php echo $obj_grow_year->julio;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Agosto</a></td> 
                                                <td><b><?php echo $obj_grow_year->agosto;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Setiembre</a></td> 
                                                <td><b><?php echo $obj_grow_year->septiembre;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Octubre</a></td> 
                                                <td><b><?php echo $obj_grow_year->octubre;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Noviembre</a></td> 
                                                <td><b><?php echo $obj_grow_year->noviembre;?></b></td>
                                            </tr>
                                            <tr>
                                                <td><a>Diciembre</a></td> 
                                                <td><b><?php echo $obj_grow_year->diciembre;?></b></td>
                                            </tr>
                                    </tbody>
                            </table>
                    </div>
            </div>
        </div>
</div>
<script src="static/cms/js/panel.js"></script>