<section>
    <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">Tablero</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
         <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">TOTAL PAGADO</h5>
                            <p class="title"><?php if(count($obj_total)>0){echo "$".number_format($obj_total,'2','.',',');}else{echo "$0.00";}?></p>
                            <div class="mt-10"></div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-btc fa-4x" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well media media-badges box-height box">
                            <div class="media-body media-middle">
                            <h5 class="media-heading text-uppercase title-small">BALANCE POR DISPONER</h5>
                            <p class="title"><?php if(count($obj_balance)>0){echo "$".number_format($obj_balance,'2','.',',');}else{echo "$0.00";}?></p>
                            <div class="mt-10">
                            </div>
                            </div>
                        <div class="media-right media-middle">
                            <i class="fa fa-credit-card-alt fa-3x" aria-hidden="true"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <!--SEPARATE SECCION-->
            <div class="row">
                <div class="col-sm-12 mb-25">
                    <div class="panel panel-default panel-tab-box">
                        <div class="panel-body">
                        </div>
                    </div>
                </div>
            </div>
            <!--END SEPARATE SECCION-->
            
            <?php 
            if($messaje_active_count == 0){ ?>
                
                <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <div class="mail-box-header">
                    <div class="mail-box-header clearfix">
                            <h3 class="mail-title">Correo de Activación</h3>
                            <div class="pull-right tooltip-demo">
                                <a title="Cancelar" data-placement="top" data-toggle="tooltip" class="btn btn-danger btn-sm" href="<?php echo site_url().'backoffice'?>" data-original-title="Discard email"><i class="fa fa-times"></i>Regresar</a>
                            </div>
                    </div>
                    <div class="mail-body">
                        <form method="post" id="upload_form" enctype="multipart/form-data">
                                <label>De:</label>
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" placeholder="De" value="<?php echo $obj_customer->first_name." ".$obj_customer->last_name;?>" disabled="">
                                        <input type="hidden" name="name" id="name" value="<?php echo $obj_customer->first_name." ".$obj_customer->last_name;?>">
                                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo $obj_customer->customer_id;?>">
                                    </div>
                                 <label>Para:</label>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="To" value="<?php echo replace_vocales_voculeshtml("Soporte 3T Activación");?>" disabled="">
                                    </div>
                                 <label>Paquete:</label>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Paquete" type="text" value="<?php echo $obj_customer->franchise." - $".$obj_customer->price;?>" disabled="">
                                        <input name="franchise" id="franchise" type="hidden" value="<?php echo $obj_customer->franchise." - $".$obj_customer->price;?>" >
                                    </div>
                                 <label>Asunto:</label>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Subject" type="text" value="Correo de Activación" disabled="">
                                    </div>
                                 <label>Seleccionar imagen del envio:</label>
                                    <div class="form-group">
                                        <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" id="message" placeholder="Mensaje" style="height: 200px;width: 100% !important" placeholder="Message body"></textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group text-right">
                                        <button type="submit" name="upload" id="upload" class="btn btn-primary"><i class="fa fa-reply"></i> Enviar </button>
                                    </div>
                                    
                                    

<!--<div class="alert alert-success">...</div>
<div class="alert alert-info">...</div>
<div class="alert alert-warning">...</div>
<!--<div class="alert alert-danger">hola</div>-->

                                    
                                     <div id="uploaded_image"></div>
                            </form>
                    </div>
               </div>
            </div>
            <div class="col-lg-1"></div>
                
          <?php }else{ ?>
            <div class="alert alert-success" style="text-align: center">En las primeras 24 horas estaremos activando su paquete.</div>
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
<script src="<?php echo site_url().'static/backoffice/js/home.js';?>"></script>
<script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>