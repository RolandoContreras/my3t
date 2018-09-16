<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?=lang('idioma.b_comisiones');?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
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
                           <?=lang('idioma.b_com_comisiones');?>
                        </div>
                        <div class="panel-body">
                            <div class="form-inline" >
                                <div class="form-group">
                                    <label for="monto"><?=lang('idioma.b_com_concepto');?></label>
                                     <select class="form-control" name="concepto" id="concepto" required>
                                        <option value="">***Seleccione***</option>
                                        <option value="1" <?php if($bonus_id==1){echo "selected";}?>><?=lang('idioma.b_bono_patrocinio');?></option>
                                        <option value="2" <?php if($bonus_id==2){echo "selected";}?>><?=lang('idioma.b_bono_team');?></option>
                                        <option value="3" <?php if($bonus_id==3){echo "selected";}?>><?=lang('idioma.b_bono_productor');?></option>
                                        <option value="4" <?php if($bonus_id==4){echo "selected";}?>><?=lang('idioma.b_bono_rendimiento');?></option>
                                        <option value="5" <?php if($bonus_id==5){echo "selected";}?>><?=lang('idioma.b_bono_unilevel');?></option>
                                        <option value="6" <?php if($bonus_id==6){echo "selected";}?>><?=lang('idioma.b_bono_global');?></option> 
                                        <option value="7" <?php if($bonus_id==7){echo "selected";}?>><?=lang('idioma.b_bono_binario');?></option> 
                                     </select>
                                </div>
                                <input class="form-inline" type="hidden" name="SolicitarPago" value="1"/>
                                <button onclick="consultar();" class="btn btn-success"><?=lang('idioma.b_consultar');?></button>
                                </div>
                            </div><br/>
                                <div class="panel-heading">
                                    <?=lang('idioma.b_resultados');?>
                                 </div>
                                <div role="alert" class="alert alert-success" style="overflow:auto;">
                                    <table id="table" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                 <th><?=lang('idioma.b_fecha');?></th>
                                                 <th><?=lang('idioma.b_concepto');?></th>
                                                 <th><?=lang('idioma.b_monto_enviando');?></th>
                                                 <th><?=lang('idioma.b_estado');?></th>
                                            </tr>
                                         </thead>
                                 <tbody>
                                     <?php foreach ($obj_commissions as $value) { ?>
                                      <tr>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td><?php echo $value->bonus;?></b></td>
                                          <td><b><?php echo format_number_dolar($value->amount);?></b></td>
                                          <td>
                                               <?php if (($value->status_value == 1) || ($value->status_value == 2)) { ?>
                                                        <span class="label label-default"><?=lang('idioma.b_abonado');?></span>
                                                <?php }elseif($value->status_value == 3){ ?>
                                                        <span class="label label-warning"><?=lang('idioma.b_en_espera');?></span>
                                                <?php }elseif($value->status_value == 4){ ?>
                                                        <span class="label label-success"><?=lang('idioma.b_pagado');?></span>
                                                <?php }?>
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