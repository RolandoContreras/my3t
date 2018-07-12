<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/ranges.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/rangos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Puntos Binario</a>
                                </div>
                        </div>
                </div>
              <strong>ID:</strong><br>
              <input type="text" value="<?php echo isset($obj_ranges->range_id)?$obj_ranges->range_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="range_id" name="range_id" value="<?php echo isset($obj_ranges->range_id)?$obj_ranges->range_id:"";?>">
              <br><br>
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_ranges->name)?$obj_ranges->name:"";?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Puntos Personales:</strong><br>   
              <input type="text" id="point_personal" name="point_personal" value="<?php echo isset($obj_ranges->point_personal)?$obj_ranges->point_personal:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
              <br><br>
              <strong>Puntos Grupales:</strong><br>   
              <input type="text" id="point_grupal" name="point_grupal" value="<?php echo isset($obj_ranges->point_grupal)?$obj_ranges->point_grupal:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
              <br><br>
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="active" id="status_value">
                         <option value="1" <?php if($obj_ranges->active == 1){ echo "selected";}?>>Activo</option>
                         <option value="0" <?php if($obj_ranges->active == 0){ echo "selected";}?>>Inactivo</option>
                  </select>
                  </div>
              </div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_ranges();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
