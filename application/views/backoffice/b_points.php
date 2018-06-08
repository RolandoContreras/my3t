<!-- Main section-->
      <section>
         <!-- Page content-->
        <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase">Comisiones</h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
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
                        <div class="panel-heading">Puntaje</div>
                        <div class="panel-body">
                           <div class="proceso_1 col-lg-12">

                              <div class="proceso_1 col-lg-12">
                              <!--<form>-->
                                 <fieldset>
                                    <legend>Puntos Del Mes</legend>
<!--                                    <div class="col-lg-5">
                                       <div class="form-group">
                                          <label class="col-lg-3 control-label">Concepto</label>
                                          <div class="col-lg-9">
                                             <select class="form-control" name="concepto" id="concepto" required>
                                                <option value="">***Seleccione***</option>
                                                <option value="1" <?php if($bonus_id==1){echo "selected";}?>>Bono Patrocinio</option>
                                                <option value="2" <?php if($bonus_id==2){echo "selected";}?>>Bono Team Builder</option>
                                                <option value="3" <?php if($bonus_id==3){echo "selected";}?>>Bono Productor</option>
                                                <option value="4" <?php if($bonus_id==4){echo "selected";}?>>Bono Rendimiento</option>
                                                <option value="5" <?php if($bonus_id==5){echo "selected";}?>>Bono Unilevel</option>
                                                <option value="5" <?php if($bonus_id==5){echo "selected";}?>>Bono Global</option> 
                                             </select>
                                          </div>
                                       </div>
                                    </div>-->
<!--                                    <div class="col-lg-2">
                                       <input type="hidden" name="Calcularconceptos" value="1">
                                       <button onclick="consultar();" class="btn btn-sm btn-primary bg-danger-dark">Consultar</button>
                                    </div>-->
                                  </fieldset>
                              <!--</form>-->
                           </div>

                           <div class="proceso_2 col-lg-12">
                              <!--<legend>Resultados de la busqueda</legend>-->

                              <table id="table" class="display table table-striped table-hover responsive">
                                 <thead>
                                    <tr>
                                       <th class="all">Fecha</th>
                                       <th>Concepto</th>
                                       <th>Puntos<th>
                                       <th>Estado<th>
                                    </tr>
                                 </thead>
                                 <tbody id="resultado">
                                     <?php if(count($obj_points) > 0){ 
                                                foreach ($obj_points as $value) { ?>
                                                    <tr>
                                                        <td><?php echo formato_fecha($value->date);?></td>
                                                        <td><?php echo $value->name;?></td>
                                                        <td><span class="text-success"><?php echo $value->point;?></span></td>
                                                        <td><span class="label label-success">Procesado</span></td>
                                                    </tr>
                                                 <?php }
                                          }else{ ?>
                                                <tr>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                    <td style="display: none;"></td>
                                                   <td colspan="4" align="center"><?php echo replace_vocales_voculeshtml("No hay Registros");?></td>
<!--                                                   <td style="display: none;"></td>
                                                   <td style="display: none;"></td>
                                                   <td style="display: none;"></td>-->
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
<!--<script src="<?php //echo site_url().'static/backoffice/js/commission.js';?>"></script>-->
</html>