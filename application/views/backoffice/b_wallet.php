<!-- Main section-->
      <section>
        <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?php echo replace_vocales_voculeshtml("Billetera");?></h1>
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
                            <p class="title"><?php if(count($obj_balance)>0){echo "$".number_format($obj_balance,'2','.',',');}else{echo "$0.00";}?></p>
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
                            <p class="title"><?php if(count($obj_balance_disponible)>0){echo "$".number_format($obj_balance_disponible,'2','.',',');}else{echo "$0.00";}?></p>
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
            <div class="row">
               <div class="col-lg-12">
                    
                     <div class="panel panel-info">
                        <div class="panel-heading">
                           Movimientos
                        </div>
                        <div class="panel-body">
                           <div class="proceso_1 col-lg-12">
                           <div class="proceso_2 col-lg-12">
                              <table id="table" class="display table table-striped table-hover responsive">
                                 <thead>
                                    <tr>
                                         <th class="all">Usuario Responzable</th>
                                         <th class="all">Fecha</th>
                                         <th>Afiliado</th>
                                         <th>Monto</th>
                                         <th>Concepto</th>
                                         <th>Estado</th>
                                    </tr>
                                 </thead>
                                 <tbody >
                                     <?php foreach ($obj_commissions as $value) { ?>
                                      <tr role="row" class="odd">
                                          <td>Administrador</td>
                                          <td><?php echo formato_fecha($value->date);?></td>
                                          <td class="sorting_1"><?php echo $value->username;?></td>
                                          <td>
                                            <span class="text-success"><?php echo "$".$value->amount;?></span>
                                          </td>
                                          <td>Concepto &nbsp;<?php echo $value->bonus;?></td> 
                                          <td>
                                                   <?php 
                                                   if($value->status_value <= 4){ ?>
                                                       <span class="label label-success">Pagado</span>
                                                   <?php }else{ ?>
                                                       <span class="label label-danger">Salida a billetera externa</span>
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

 <script type="text/javascript">
   $(document).ready(function() {
    $('#table').dataTable( {
         "order": [[ 0, "desc" ]]
    } );
} );
</script>
<script src="<?php echo site_url().'static/backoffice/js/commission.js';?>"></script>
</html>