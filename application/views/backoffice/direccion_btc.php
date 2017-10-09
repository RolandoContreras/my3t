<section>
         <!-- Page content-->
         <div class="content-wrapper">
            <div class="content-heading">
              <div class="clearfix"></div>            
            </div>
            
            <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-info">
                      <div class="panel-heading"><?php echo replace_vocales_voculeshtml("Edición del Afiliado ");?><?php echo $obj_customer->username;?></div>
                     <div class="panel-body">
                        <form name="FormEditarAfiliados" class="form-horizontal" data-parsley-validate>
                           <div class="col-lg-4">
                              <legend>Datos Principales</legend>
                              <div class="form-group">
                                 <label for="usuario" class="col-lg-3 control-label">Usuario</label>
                                 <div class="col-lg-9">
                                     <input type="text" class="form-control" id="usuario" disabled value="<?php echo $obj_customer->username;?>">
                                     <input type="hidden" id="customer_id" name="customer_id" disabled value="<?php echo $obj_customer->customer_id;?>">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label for="email" class="col-lg-3 control-label">Email</label>
                                 <div class="col-lg-9">
                                    <input type="email" class="form-control" disabled required data-parsley-type="email" value="<?php echo $obj_customer->email;?>" />
                                 </div>
                              </div>

                              <div class="form-group">
                                  <label for="identidad" class="col-lg-3 control-label"><?php echo replace_vocales_voculeshtml("DNI  # de identificación")?></label>
                                 <div class="col-lg-9">
                                     <input type="text" class="form-control" disabled required value="<?php echo $obj_customer->dni;?>">
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label for="fecha_registro" class="col-lg-3 control-label">Fecha de Registro</label>
                                 <div class="col-lg-9">
                                    <input type="text" class="form-control" id="fecha_registro" disabled value="<?php echo $obj_customer->created_at;?>">
                                 </div>
                              </div>

                            <div class="form-group">
                                 <label for="inlineradio1" class="col-sm-3 control-label">Lado Binario</label>
                                    <div class="col-sm-9">
                                        <label class="radio-inline">
                                            <input id="inlineradio2" type="radio" name="pierna" id="pierna" value="1" 
                                                <?php if($obj_customer->position_temporal == 1){ ?> checked="" <?php } ?> >
                                           <span class=""></span>P. Izquierda</label>
                                        <label class="radio-inline">
                                            <input id="inlineradio3" type="radio" name="pierna" id="pierna" value="2"
                                                <?php if($obj_customer->position_temporal == 2){ ?> checked="" <?php } ?> >
                                           <span class=""></span>P. Derecha</label>
                                    </div>
                              </div>
                              
                              <div class="form-group">
                                 <div class="col-lg-offset-3 col-lg-9">
                                     <br><br>
                                    <input type="hidden" name="GuardarEdicionAfiliado" value="">
                                    <button type="button" onclick="alter_data();" class="btn btn-sm btn-primary bg-danger-dark">Guardar Cambios</button>
                                 </div>
                              </div>  
                           </div>

                           <div class="col-lg-4">
                               <legend><?php echo replace_vocales_voculeshtml("Información Personal");?></legend>
                              <div class="form-group">
                                 <label for="nombre" class="col-lg-3 control-label">Nombre</label>
                                 <div class="col-lg-9">
                                     <input type="text" class="form-control" disabled placeholder="Nombre" value="<?php echo $obj_customer->first_name;?>">
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label for="apellido" class="col-lg-3 control-label">Apellido</label>
                                 <div class="col-lg-9">
                                    <input type="text" class="form-control" disabled placeholder="Apellido" value="<?php echo $obj_customer->last_name;?>">
                                 </div>
                              </div>

                              <div class="form-group">
                                  <label for="direccion" class="col-lg-3 control-label"><?php echo replace_vocales_voculeshtml("Dirección");?></label>
                                 <div class="col-lg-9">
                                    <textarea class="form-control" name="address" id="address" placeholder="Direccion"><?php echo $obj_customer->address;?></textarea>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label for="telefono" class="col-lg-3 control-label">Telefono</label>
                                 <div class="col-lg-9">
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefono" value="<?php echo $obj_customer->phone;?>">
                                 </div>
                              </div>
                                       
                              <div class="form-group">
                                 <label for="pais" class="col-lg-3 control-label">Pais</label>
                                 <div class="col-lg-9">
                                    <select id="pais" class="form-control" disabled>
                                       <option value="<?php echo $obj_customer->phone;?>"><?php echo $obj_customer->pais;?></option>
                                    </select>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <label for="estado_pais" class="col-lg-3 control-label">Estado</label>
                                 <div class="col-lg-9 ajax_estado_pais">
                                    <select id="estado_pais" class="form-control" disabled>
                                       <option value="<?php echo $obj_customer->phone;?>"><?php echo $obj_customer->region;?></option>
                                    </select>
                                </div>
                              </div>

                              <div class="form-group">
                                 <label for="ciudad" class="col-lg-3 control-label">Ciudad</label>
                                 <div class="col-lg-9">
                                    <input type="text" class="form-control" disabled placeholder="Ciudad" value="<?php echo $obj_customer->city;?>">
                                 </div>
                              </div>
                               <div class="form-group" id="messages">
                                   <!--<label style="color:green;"></label>-->
                              </div>
                           </div>
                           <div class="clearfix"></div>
                        </form>
                     </div>
                     
                  </div>
               </div>
               
            </div>
         </div>
      </section>
<script src="<?php echo site_url().'static/backoffice/js/data.js';?>"></script>
<script src="<?php // echo site_url().'static/page_front/js/core.min.js';?>"></script>
<script src="<?php // echo site_url().'static/page_front/js/script.js';?>"></script>
<script src="<?php // echo site_url().'static/bootstrap/js/bootstrap.js';?>"></script>