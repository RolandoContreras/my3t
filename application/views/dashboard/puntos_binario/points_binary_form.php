<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/binary_list.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/puntos_binario/validate";?>">
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
              <input type="text" value="<?php echo isset($obj_binaries->binary_id)?$obj_binaries->binary_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="binary_id" name="binary_id" value="<?php echo isset($obj_binaries->binary_id)?$obj_binaries->binary_id:"";?>">
              <br><br>
              <strong>ID Cliente:</strong><br>
              <input type="text" id="customer_id" onblur="validate_customer(this.value);" name="customer_id" value="<?php echo isset($obj_binaries->customer_id)?$obj_binaries->customer_id:"";?>" class="input-xlarge-fluid" placeholder="Cliente">
              <br><br>
              <strong>Usuario:</strong><br>
              <input type="text" id="username" name="username" value="<?php echo isset($obj_binaries->username)?$obj_binaries->username:"";?>" class="input-xlarge-fluid" placeholder="Username" disabled="">
              <br><br>
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_binaries->first_name)?$obj_binaries->first_name." ".$obj_binaries->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
              <br><br>
              <strong>Fecha:</strong><br>              
              <input type="text" id="created_at" name="created_at" value="<?php echo isset($obj_binaries->created_at)?formato_fecha_barras($obj_binaries->created_at):"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Puntos Izquierda:</strong><br>   
              <input type="text" id="point_left" name="point_left" value="<?php echo isset($obj_binaries->point_left)?$obj_binaries->point_left:0;?>" class="input-xlarge-fluid" placeholder="Puntos Izquierda">
              <br><br>
              <strong>Puntos Derecha:</strong><br>
              <input type="text" id="point_rigth" name="point_rigth" value="<?php echo isset($obj_binaries->point_rigth)?$obj_binaries->point_rigth:0;?>" class="input-xlarge-fluid" placeholder="Puntos Derecha">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                      <select name="status_value" id="status_value">
                                  <option value="1" <?php if($obj_binaries->status_value == 1){ echo "selected";}?>>No Pagado</option>
                                  <option value="2" <?php if($obj_binaries->status_value == 2){ echo "selected";}?>>Pagado</option>
                      </select>
                  </div>
              </div>
              <div id="alert_message"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_binary();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
