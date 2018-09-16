<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?=lang('idioma.b_billetera');?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
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
                                    <?=lang('idioma.b_movimientos');?>
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                 <thead>
                                    <tr>
                                         <th><?=lang('idioma.b_fecha');?></th>
                                         <th><?=lang('idioma.b_concepto');?></th>
                                         <th><?=lang('idioma.b_afiliado');?></th>
                                         <th><?=lang('idioma.b_monto');?></th>
                                         <th><?=lang('idioma.b_estado');?></th>
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
                                               <?php if (($value->status_value == 1) || ($value->status_value == 2)) { ?>
                                                   <span class="label label-default"><?=lang('idioma.b_abonado');?></span>
                                                   <?php }elseif($value->status_value == 3){ ?>
                                                   <span class="label label-warning"><?=lang('idioma.b_en_espera');?></span>
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