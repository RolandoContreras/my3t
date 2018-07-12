<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase">Billetera</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div>
         <!-- Page content-->
            <div class="row">
               <div class="col-lg-12">
                <!--SHOW ALERT  MESSAGE INFORMATIVE-->
                <div class="col-md-12"> 
                    <?php 
                    foreach ($messages_informative as $value) { ?>
                        <div class="row">
                            <div class="col-md-12"> 
                                    <div class="panel-heading clearfix"> 
                                        <div class="panel-title">Mensaje: <b><?php echo $value->title;?></b></div> 
                                    </div> 
                                    <!-- panel body --> 
                                    <div class="panel-body"> 
                                        <p><?php echo $value->text;?></p> 
                                    </div> 
                                </div>
                            </div>
                    <?php } ?>
                </div> 
                <!--END SHOW ALERT MESSAGE INFORMATIVE-->
                     <div class="panel panel-info">
                                <div class="panel-heading">
                                    Movimientos
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                 <thead>
                                    <tr>
                                         <th>Fecha</th>
                                         <th>Concepto</th>
                                         <th>Afiliado</th>
                                         <th>Monto</th>
                                         <th>Estado</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($obj_commissions as $value) { ?>
                                      <tr>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td><?php echo strtoupper($value->bonus);?></td> 
                                          <td><?php echo $value->username;?></td>
                                          <td><b><?php echo "$".$value->amount;?></b></td>
                                          <td>
                                               <?php if (($value->status_value == 1) || ($value->status_value == 2)) {
                                                        $valor = "Abonado";
                                                        $stilo = "label label-default";
                                                    }elseif($value->status_value == 3){
                                                        $valor = "Espera de procesar";
                                                        $stilo = "label label-warning";
                                                    }elseif($value->status_value == 4){
                                                        $valor = "Pagado";
                                                        $stilo = "label label-success";
                                                }?>
                                            <span class="<?php echo $stilo ?>"><?php echo $valor; ?></span>
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