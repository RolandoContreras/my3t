      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?=lang('idioma.b_cobros');?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
            </div>
        </div>
            <div class="row">
               <div class="col-lg-12">
                <!--SHOW ALERT  MESSAGE INFORMATIVE-->
                <div class="col-md-12"> 
                   <?php 
                    foreach ($messages_informative as $value) { ?>
                        <div class="row">
                            <div class="col-md-12"> 
                                            <div class="panel panel-success">
                                                <header class="panel-heading">
                                                    <a data-toggle="collapse" data-parent="#accordion" id="collapseOne" href="#collapse_message"><i class="collapse-caret fa  fa-angle-up"></i> <?=lang('idioma.b_informativo');?></a>
                                                </header>
                                                <div id="collapse_message" class="panel-collapse collapse in center">
                                                        <div class="panel-heading clearfix"> 
                                                        <div class="panel-title"><?=lang('idioma.b_mensaje');?> <b><?php echo $value->title;?></b></div> 
                                                    </div> 
                                                    <!-- panel body --> 
                                                    <div class="panel-body"> 
                                                        <p><?php echo $value->text;?></p> 
                                                    </div> 
                                                </div>
                                            </div> 
                                    </div>
                            </div>
                    <?php } ?>
                </div>  
                <!--END SHOW ALERT MESSAGE INFORMATIVE-->
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           <?=lang('idioma.b_solicitar_pago');?>
                        </div>
                        <div class="panel-body">
                            <div role="alert" class="alert alert-info">
                                <strong><?=lang('idioma.b_nota');?></strong><br>
                            <?=lang('idioma.b_los_pedidos_cobro');?><br><?=lang('idioma.b_monto_minimo');?>
                            </div><br/>
                            <div class="form-inline" >
                                <p class="lead">
                                <?=lang('idioma.b_saldo_disponible');?>
                                <b><?php if(count($obj_balance_disponible) > 0){echo "$".$obj_balance_disponible;}else{echo "$0.00";}?></b>
                                </p>
                                <div class="form-group">
                                <label for="monto"><?=lang('idioma.b_monto_solicita');?></label>
                                <select id="monto" name="monto" class="form-control">
                                    <option value=""><?=lang('idioma.b_seleccionar');?></option>
                                    <option value="3"><?php if(count($obj_balance_disponible)>0){echo "$".$obj_balance_disponible." - "."Total";}else{echo "$0.00 - Total";}?></option>
                                </select>
                                </div>
                                <?php 
                                //GET TODAY DATE
                                $today = date("Y-m-d"); 
                                //GET WEDNESDAY
                                $s_and_s = date('w',strtotime($today));
                                if($s_and_s != '3'){$style="disabled";}else{$style="";} ?>
                                <!--BLOCK THE BOTON IF IS SATUDAY OR SUNDAY-->
                                        <input class="form-inline" type="hidden" name="SolicitarPago" value="1"/>
                                        <button onclick="enviar_pago();" <?php echo $style;?> class="btn btn-success"><?=lang('idioma.b_enviar_solicitud');?></button>
                                </div>
                            </div><br/>
                                <div class="panel-heading">
                                   <?=lang('idioma.b_movimientos');?>
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                 <thead>
                                    <tr>
                                         <th align="center"><?=lang('idioma.b_concepto');?></th>
                                         <th align="center"><?=lang('idioma.b_fecha');?></th>
                                         <th align="center"><?=lang('idioma.b_monto_enviando');?></th>
                                         <th align="center"><?=lang('idioma.b_estado');?></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                     <?php foreach ($obj_commissions as $value) { ?>
                                      <tr>
                                          <td><?=lang('idioma.b_pagos_comisiones');?></td>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td><b><?php echo format_number_dolar($value->amount);?></b></td>
                                          <td>
                                               <?php 
                                               if($value->status_value == 2){ ?>
                                                   <span class="label label-danger"><?=lang('idioma.b_cancelado');?></span>
                                               <?php }elseif($value->status_value == 3){ ?>
                                                   <span style="color: #00620C" class="label label-warning"><?=lang('idioma.b_en_espera');?></span>
                                               <?php }elseif($value->status_value == 4){ ?>
                                                   <span class="label label-success"><?=lang('idioma.b_pagado');?></span>
                                               <?php } ?>
                                           </td>
                                       </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                                </div>
                     </div>
                  </div>  
            </div>
      </section>
</body>
<script src="<?php echo site_url().'static/cms/js/core/bootstrap-modal.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/bootbox.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>
<script src="<?php echo site_url().'static/cms/js/core/jquery.dataTables.min.js';?>"></script>
<link href="<?php echo site_url().'static/cms/css/core/jquery.dataTables.css';?>" rel="stylesheet"/>
 <script>
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="<?php echo site_url().'static/backoffice/js/pay.js';?>"></script>
</html>