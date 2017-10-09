     <!-- Main section-->
      <section>
         <!-- Page content-->
         <div class="content-wrapper">
           <div class="content-heading">
              <div class="pull-right text-success">
                Precio bitcoin: $<?php echo $price_btc;?>
              </div>
                              <div class="col-lg-3">
                <img src="<?php echo site_url().'static/backoffice/images/logo-btc2.png';?>" class="responsive" height="100px;" id="LogoClienteMill">
              </div>
              <div class="clearfix"></div>           
            </div>

            <div class="row">
               <div class="col-lg-12">
                    <div id="panelDemo14" class="panel panel-info">
                     <div class="panel-heading">Mi Balance</div>
                     <div class="panel-body">
                           <table id="table" class="display table table-striped table-hover responsive">
                              <thead>
                                <tr>
                                    <th style="width:120px;" class="all">Fecha</th>
                                    <th>Concepto</th>
                                    <th style="width:100px;">Creditos</th>
                                    <th style="width:150px;">Estado</th>
                                    
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($obj_commissions as $value) { ?>
                                      <tr role="row" class="odd">
                                          <td class="sorting_1"><?php echo formato_fecha($value->date);?></td>
                                          <td>Concepto &nbsp;<?php echo $value->bonus;?></td>
                                            <td>
                                            <span class="text-success"><?php echo "$".$value->amount;?></span>
                                            </td>
                                            <td>
                                               <span class="label label-success">
                                                   <?php 
                                                   if($value->status_value == 1 || $value->status_value == 2){ ?>
                                                       <span class="label label-success">Procesado</span>
                                                   <?php }else{ ?>
                                                       <span class="label label-warning">En espera por procesar</span>
                                                   <?php } ?>
                                               </span> 
                                            </td>
                                       </tr>
                                 <?php } ?>
                              </tbody>
                           </table>
                     </div>
                  </div>
                    
               </div>

            </div>
            
         </div>
      </section>
      <!-- Page footer-->
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
</body>

</html>