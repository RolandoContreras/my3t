<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/cobros.js"></script>
<form id="customer-form" name="cobros-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/pagos/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario de Pagos</a>
                                </div>
                        </div>
                </div>
              <strong>ID:</strong><br>
              <input type="text" value="<?php echo isset($obj_pays->pay_id)?$obj_pays->pay_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <input type="hidden" id="pay_id" name="pay_id" value="<?php echo isset($obj_pays->pay_id)?$obj_pays->pay_id:"";?>">
              <br><br>
              <strong>ID Cliente:</strong><br>
              <input type="text" id="customer_id" onblur="validate_customer(this.value);" name="customer_id" value="<?php echo isset($obj_pays->customer_id)?$obj_pays->customer_id:"";?>" class="input-xlarge-fluid" placeholder="Cliente">
              <br><br>
              <strong>Usuario:</strong><br>
              <input type="text" id="username" name="username" value="<?php echo isset($obj_pays->username)?$obj_pays->username:"";?>" class="input-xlarge-fluid" disabled="">
              <br><br>
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_pays->first_name)?$obj_pays->first_name." ".$obj_pays->last_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre" disabled="">
              <br><br>
              <strong>Monto:</strong><br>   
              <input type="text" id="amount" name="amount" value="<?php echo isset($obj_pays->amount)?$obj_pays->amount:0;?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Fecha:</strong><br>              
              <input type="text" id="date" name="date" value="<?php echo isset($obj_pays->date)?formato_fecha_barras($obj_pays->date):"";?>" class="input-xlarge-fluid">
              <br><br>
              <strong>Observaciones:</strong><br>              
              <textarea class="form-control" name="obs" id="obs" style="height: 200px;width: 100% !important"><?php echo ($obj_pays->obs != "") ? $obj_pays->obs : "";?></textarea>
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="status_value" id="status_value">
                         <option value="2" <?php if($obj_pays->status_value == 2){ echo "selected";}?>>Cancelado</option>
                         <option value="3" <?php if($obj_pays->status_value == 3){ echo "selected";}?>>Es espera de procesar</option>
                         <option value="4" <?php if($obj_pays->status_value == 4){ echo "selected";}?>>Pagado</option>
                  </select>
                  </div>
              </div>
              <div id="alert_message"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_pay();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
