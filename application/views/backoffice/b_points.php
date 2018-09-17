<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?=lang('idioma.b_puntaje');?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
            </div>
        </div>
         <!-- Page content-->
            <div class="row">
               <div class="col-lg-12">
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           <?=lang('idioma.b_puntos_mes');?>
                        </div>
                        <div class="panel-body">
                            <div class="form-inline" >
                                <div class="col-lg-1"><p><?=lang('idioma.b_de');?></p></div>
                                <div class="col-lg-2"><input type="text" id="datepicker1" name="datepicker1"></div>
                                <div class="col-lg-1"><p><?=lang('idioma.b_hasta');?></p></div>
                                <div class="col-lg-2"><input type="text" id="datepicker2" name="datepicker2"></div>
                                <div class="col-lg-1"><button onclick="consultar_date();" class="btn btn-success"><?=lang('idioma.b_consultar');?></button></div>
                                <div class="col-lg-5"></div>
                                    
                            </div>
                            </div>
                         <br/>
                                <div class="panel-heading">
                                    <?=lang('idioma.b_perfil');?>Lista
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th><?=lang('idioma.b_fecha');?></th>
                                                <th><?=lang('idioma.b_concepto');?></th>
                                                <th><?=lang('idioma.b_puntos');?><th>
                                                <th><?=lang('idioma.b_estado');?><th>
                                            </tr>
                                         </thead>
                                 <tbody id="table_data">
                                     <?php foreach ($obj_points as $value) { ?>
                                      <tr>
                                            <td><?php echo formato_fecha($value->date);?></td>
                                            <td><?php echo strtoupper($value->name);?></td>
                                            <td><b><?php echo $value->point;?></b></td>
                                            <td align="center"><?=lang('idioma.b_abonado');?></td>
                                            <td></td>
                                            <td></td>
                                       </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                                </div>
                     </div>
                  </div>  
      </section>
</body>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.dataTables.min.js';?>"></script>
<link href="<?php echo site_url().'static/cms/css/core/jquery.dataTables.css';?>" rel="stylesheet"/>
<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 4, "desc" ]]
    } );
} );
</script>
<script>
  $( function() {
    $( "#datepicker1" ).datepicker();
    $( "#datepicker2" ).datepicker();
  } );
</script>
<script src="<?php echo site_url().'static/backoffice/js/points.js';?>"></script>
</html>