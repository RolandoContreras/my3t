<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/bonus.js"></script>
<form id="customer-form" name="points-binary-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/bonos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Bonos</a>
                                </div>
                        </div>
                </div>
              <strong>ID:</strong><br>
              <input type="text" value="<?php echo isset($obj_bonus->bonus_id)?$obj_bonus->bonus_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="bonus_id" name="bonus_id" value="<?php echo isset($obj_bonus->bonus_id)?$obj_bonus->bonus_id:"";?>">
              <br><br>
              <strong>Nombre:</strong><br>
              <input type="text" id="name" name="name" value="<?php echo isset($obj_bonus->name)?$obj_bonus->name:"";?>" class="input-xlarge-fluid" placeholder="Name">
              <br><br>
              <strong>Porcentaje:</strong><br>              
              <input type="text" id="percent" name="percent" value="<?php echo isset($obj_bonus->percent)?$obj_bonus->percent:"";?>" class="input-xlarge-fluid" placeholder="Porcentaje">
              <br><br>
                  <strong>Estado:</strong>
                      <select name="status_value" id="status_value">
                                  <option value="1" <?php if($obj_bonus->status_value == 1){ echo "selected";}?>>Activo</option>
                                  <option value="0" <?php if($obj_bonus->status_value == 0){ echo "selected";}?>>Inactivo</option>
                      </select>
                <div id="alert_message"></div>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_bonus();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>   
               </div>
            
           
            
              </div>
              
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
