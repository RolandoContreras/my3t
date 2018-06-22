<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase">Soporte</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div>
         <!-- Page content-->
            <div class="row">
               <div class="col-lg-12">
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           Soporte
                        </div>
                        <div class="panel-body">
                            <div class="form-inline" >
                                <button onclick="show();" class="btn btn-success">Abrir un nuevo tiquet <i class="fa fa-plus-circle"></i></button>
                                </div>
                            </div>
                              <div class="col-md-12">
                                <div style="display: none;" id="form-support">
                                  <br>
                                  <div class="panel teal">
                                    <div class="panel-body">
                                     <form method="post" id="form_support" enctype="multipart/form-data">
                                                 <label>Asunto:</label>
                                                    <div class="form-group">
                                                        <input class="form-control" name="subject" id="subject" placeholder="Asunto" type="text" value="">
                                                    </div>
                                                    <div class="form-group">
                                                           <textarea class="form-control" name="message" id="message" placeholder="Mensaje" style="height: 200px;width: 100% !important" placeholder="Message body"></textarea>
                                                   </div>
                                                   <label>Seleccionar imagen del envio:</label>
                                                    <div class="form-group">
                                                        <input type="file" value="Upload Imagen de Envio" name="image_file" id="image_file">
                                                    </div>
                                                    <hr>
                                                    <div class="form-group text-right">
                                                        <button class="btn btn-danger" onclick="hide();">Cerrar</button>
                                                        <button type="submit" name="upload" id="upload" class="btn btn-primary">Crear Ticket</button>
                                                    </div>
                                                     <div id="message_reponse"></div>
                                            </form>
                                    </div>
                                   </div>
                                </div>
                            </div>
                         <br/>
                                <div class="panel-heading">
                                    Lista
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th align="center">Número de Ticket</th>
                                                <th align="center">Asunto</th>
                                                 <th align="center">Fecha</th>
                                                 <th align="center">Estado</th>
                                            </tr>
                                         </thead>
                                 <tbody>
                                     <?php foreach ($obj_message_support as $value) { ?>
                                      <tr>
                                          <td><?php echo $value->messages_id;?></b></td>
                                          <td><?php echo $value->subject;?></b></td>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td>
                                               <?php 
                                               if($value->active == 1){ ?>
                                                   <span class="label label-success">Abierto</span>
                                               <?php }else{ ?>
                                                   <span class="label label-danger">Cerrado</span>
                                               <?php } ?>
                                           </td>
                                       </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                                </div>
                     </div>
                  </div>  
              <!--SPINNER-->
        <div id="spinner"></div>
    <!--END SPINNER--> 
            </div>
            <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>  
         <!--</div>-->
      </section>
</body>
<script src="<?php echo site_url().'static/cms/js/core/bootstrap-modal.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.dataTables.min.js';?>"></script>
<link href="<?php echo site_url().'static/cms/css/core/jquery.dataTables.css';?>" rel="stylesheet"/>

<script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script>
$(document).ready(function(){
    $("#form_support").on('submit',function(e){
        e.preventDefault();
            if($('#message').val() == '' ||  $('#subject').val() == ''){
                $("#message_reponse").html('<div class="alert alert-danger" style="text-align: center">Debe llenar todos los campos</div>');
            }else{
                $.ajax({
                url : "<?php echo site_url().'backoffice/soporte/validate'?>",
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#message_reponse").html(data);
                }
            });
            }
    });
});
</script>
<script src="<?php echo site_url().'static/backoffice/js/support.js';?>"></script>
</html>