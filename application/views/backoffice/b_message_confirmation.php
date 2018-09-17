<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase"><?=lang('idioma.b_activacion');?></h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <?php 
            if($messaje_active_count == 0){ ?>
                <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <div class="mail-box-header">
                            <div class="mail-box-header clearfix">
                                    <h3 class="mail-title"><?=lang('idioma.b_correo_activacion');?></h3>
                                    <div class="pull-right tooltip-demo">
                                        <a title="Cancelar" data-placement="top" data-toggle="tooltip" class="btn btn-danger btn-sm" href="<?php echo site_url().'backoffice'?>" data-original-title="Discard email"><i class="fa fa-times"></i> <?=lang('idioma.b_regresar');?></a>
                                    </div>
                            </div>
                    <div class="mail-body">
                        <form method="post" id="upload_form" enctype="multipart/form-data">
                                <label><?=lang('idioma.b_act_de');?></label>
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" placeholder="De" value="<?php echo $obj_customer->first_name." ".$obj_customer->last_name;?>" disabled="">
                                        <input type="hidden" name="name" id="name" value="<?php echo $obj_customer->first_name." ".$obj_customer->last_name;?>">
                                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $obj_customer->customer_id;?>">
                                    </div>
                                 <label><?=lang('idioma.b_act_para');?></label>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="To" value="<?php echo replace_vocales_voculeshtml("Soporte 3T Activación");?>" disabled="">
                                    </div>
                                 <label><?=lang('idioma.b_paquete');?></label>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Paquete" type="text" value="<?php echo $obj_customer->franchise." - $".$obj_customer->price;?>" disabled="">
                                        <input name="franchise" id="franchise" type="hidden" value="<?php echo $obj_customer->franchise." - $".$obj_customer->price;?>" >
                                    </div>
                                 <label><?=lang('idioma.b_sop_asunto');?></label>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Subject" type="text" value="Correo de Activación" disabled="">
                                    </div>
                                 <label><?=lang('idioma.b_seleccionar_imagen');?></label>
                                    <div class="form-group">
                                        <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="<?=lang('idioma.b_sop_mensaje');?>" style="height: 200px;width: 100% !important"></textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group text-right">
                                        <button type="submit" name="upload" id="upload" class="btn btn-primary"><i class="fa fa-reply"></i> <?=lang('idioma.b_enviar');?></button>
                                    </div>
                                     <div id="uploaded_image"></div>
                            </form>
                    </div>
               </div>
            </div>
            <div class="col-lg-1"></div>
                
          <?php }else{ ?>
            <div class="alert alert-success" style="text-align: center"><?=lang('idioma.b_en_24_horas');?></div>
            <?php } ?>
            
        </div>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </div>
   </section>
<script>
$(document).ready(function(){
    $("#upload_form").on('submit',function(e){
        e.preventDefault();
        if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center"><?=lang('idioma.b_seleccionar_imagen');?></div>  ');
        }else{
            if($('#message').val() == ''){
                $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center"><?=lang('idioma.b_debe_llenar_campo');?></div>  ');
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
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>