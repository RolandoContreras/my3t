<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase">Comisiones</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div>
         <!-- Page content-->
         <!--<div class="content-wrapper">-->
            <div class="row">
               <div class="col-lg-12">
                <!--SHOW ALERT  MESSAGE INFORMATIVE-->
                <div class="col-md-12"> 
                    <?php 
                    foreach ($messages_informative as $value) { ?>
                        <div class="row">
                            <div class="col-md-12"> 
                                        <div class="panel panel-warning">
                                                    <div class="panel-heading clearfix"> 
                                                    <div class="panel-title">Mensaje: <b><?php echo $value->title;?></b></div> 
                                                </div> 
                                                <!-- panel body --> 
                                                <div class="panel-body"> 
                                                    <p><?php echo $value->text;?></p> 
                                                </div> 
                                        </div> 
                                </div>
                            </div>
                    <?php } ?>
                </div>  
                <!--END SHOW ALERT MESSAGE INFORMATIVE-->
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           Comisiones
                        </div>
                        <div class="panel-body">
                            <div class="form-inline" >
                                <div class="form-group">
                                    <label for="monto">Concepto:</label>
                                     <select class="form-control" name="concepto" id="concepto" required>
                                        <option value="">***Seleccione***</option>
                                        <option value="1" <?php if($bonus_id==1){echo "selected";}?>>Bono Patrocinio</option>
                                        <option value="2" <?php if($bonus_id==2){echo "selected";}?>>Bono Team Builder</option>
                                        <option value="3" <?php if($bonus_id==3){echo "selected";}?>>Bono Productor</option>
                                        <option value="4" <?php if($bonus_id==4){echo "selected";}?>>Bono Rendimiento</option>
                                        <option value="5" <?php if($bonus_id==5){echo "selected";}?>>Bono Unilevel</option>
                                        <option value="6" <?php if($bonus_id==6){echo "selected";}?>>Bono Global</option> 
                                        <option value="7" <?php if($bonus_id==7){echo "selected";}?>>Bono Binario</option> 
                                     </select>
                                </div>
                                <input class="form-inline" type="hidden" name="SolicitarPago" value="1"/>
                                <button onclick="consultar();" class="btn btn-success">Consultar</button>
                                </div>
                            </div><br/>
                                <div class="panel-heading">
                                    Resultados
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                 <th align="center">Fecha</th>
                                                 <th align="center">Concepto</th>
                                                 <th align="center">Monto Enviado</th>
                                                 <th align="center">Estado</th>
                                            </tr>
                                         </thead>
                                 <tbody>
                                     <?php foreach ($obj_commissions as $value) { ?>
                                      <tr>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td><?php echo $value->bonus;?></b></td>
                                          <td><b><?php echo format_number_dolar($value->amount);?></b></td>
                                          <td>
                                              <span class="label label-success">Abonado</span>
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
<script src="<?php echo site_url().'static/backoffice/js/commission.js';?>"></script>
</html>