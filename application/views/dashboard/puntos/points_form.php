<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/point_list.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/puntos/validate";?>">
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
              <input type="text" value="<?php echo isset($obj_points->point_id)?$obj_points->point_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="point_id" name="point_id" value="<?php echo isset($obj_points->point_id)?$obj_points->point_id:"";?>">
              <br><br>
              <strong>ID Cliente:</strong><br>
              <input type="text" id="customer_id" onblur="validate_customer(this.value);" name="customer_id" value="<?php echo isset($obj_points->customer_id)?$obj_points->customer_id:"";?>" class="input-xlarge-fluid" placeholder="Cliente">
              <br><br>
              <strong>Usuario:</strong><br>
              <input type="text" id="username" name="username" value="<?php echo isset($obj_points->username)?$obj_points->username:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="">
              <br><br>
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_points->first_name)?$obj_points->first_name." ".$obj_points->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
              <br><br>
              <strong>Puntos:</strong><br>   
              <input type="text" id="point" name="point" value="<?php echo isset($obj_points->point)?$obj_points->point:0;?>" class="input-xlarge-fluid" placeholder="Puntos">
              <br><br>
              <strong>Bono:</strong><br>   
              <select name="bonus_id" id="bonus_id">
                         <option value="1" <?php if($obj_points->bonus_id == 1){ echo "selected";}?>>Patrocinio</option>
                         <option value="2" <?php if($obj_points->bonus_id == 2){ echo "selected";}?>>Team Builder</option>
                         <option value="3" <?php if($obj_points->bonus_id == 3){ echo "selected";}?>>Productor</option>
                         <option value="4" <?php if($obj_points->bonus_id == 4){ echo "selected";}?>>Rendimiento</option>
                         <option value="5" <?php if($obj_points->bonus_id == 5){ echo "selected";}?>>Unilevel</option>
                         <option value="6" <?php if($obj_points->bonus_id == 6){ echo "selected";}?>>Global</option>
                         <option value="7" <?php if($obj_points->bonus_id == 7){ echo "selected";}?>>Binario</option>
                  </select>
              <br><br>
              <strong>Fecha:</strong><br>              
              <input type="text" id="date" name="date" value="<?php echo isset($obj_points->date)?formato_fecha_barras($obj_points->date):"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="status_value" disabled="" id="status_value">
                         <option value="1" <?php if($obj_points->status_value == 1){ echo "selected";}?>>Abonado</option>
                  </select>
                  </div>
              </div>
              <div id="alert_message"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_points();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
