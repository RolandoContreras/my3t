<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<script src="static/cms/js/franchise.js"></script>
<form method="post" id="upload_form" enctype="multipart/form-data" action="<?php echo site_url()."dashboard/membresias/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Membresias</a>
                                </div>
                        </div>
                </div>
              <input type="hidden" name="franchise_id" id="franchise_id" value="<?php echo isset($obj_franchise)?$obj_franchise->franchise_id:"";?>">
              <strong>Nombre:</strong><br>              
              <input type="text" id="name" name="name" value="<?php echo isset($obj_franchise->name)?$obj_franchise->name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Precio:</strong><br>   
              <input type="text" id="price" name="price" value="<?php echo isset($obj_franchise->price)?$obj_franchise->price:"";?>" class="input-xlarge-fluid" placeholder="Precio">
              <br><br>
              <strong>Puntos:</strong><br>   
              <input type="text" id="point" name="point" value="<?php echo isset($obj_franchise->point)?$obj_franchise->point:"";?>" class="input-xlarge-fluid" placeholder="Puntos">
              <br><br>
              <strong>Descripción:</strong><br>   
              <textarea class="form-control" name="description" id="" placeholder="Descripción" style="height: 200px;width: 100% !important" placeholder="Descripcion"><?php echo isset($obj_franchise->description)?$obj_franchise->description:"";?></textarea>
              <br><br>
              <?php 
              if(isset($obj_franchise->franchise_id)){ ?>
              <img src='<?php echo site_url()."static/backoffice/images/$obj_franchise->img";?>' width="100" />
              <input type="hidden" name="img2" id="img2" value="<?php echo isset($obj_franchise)?$obj_franchise->img:"";?>">
              <br><br>
              <?php } ?>
              
              <strong>Imagen:</strong><br>   
              <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
              <br><br>
              <div class="well nomargin" style="width: 200px;">
                  <div class="inner">
                  <strong>Estado:</strong>
                  <select name="status_value" id="status_value">
                         <option value="1" <?php echo isset($obj_franchise->status_value) == 1 ? "selected":"";?>>Activo</option>
                         <option value="0" <?php echo isset($obj_franchise->status_value) == 0 ? "selected":"";?>>Inactivo</option>
                  </select>
                  </div>
              </div>
              <div id="uploaded_image"></div>
              <br><br>
              <br><br>
              <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancel_franchise();">Cancelar</button>  
                    <button type="submit" name="upload" id="upload" class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
               </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
<script>
$(document).ready(function(){
    $("#upload_form").on('submit',function(e){
        e.preventDefault();
        if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe seleccionar la imagen</div>  ');
        }else{
            if($('#message').val() == ''){
                $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe llenar el campo Mensaje</div>  ');
            }else{
                $.ajax({
                url : "<?php echo site_url().'backoffice/message_confirmation/upload'?>",
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#uploaded_image").html(data);
                }
            });
            }
            
        }
    });
});
</script>
