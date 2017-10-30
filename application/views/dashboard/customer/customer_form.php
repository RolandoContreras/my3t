<link href="<?php echo site_url();?>static/cms/css/uploadimg.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/js/core/bootstrap-fileupload.js"></script>
<link href="<?php echo site_url();?>static/cms/plugins/tags/chosen.css" rel="stylesheet" />
<script src="<?php echo site_url();?>static/cms/plugins/tags/chosen.jquery.js"></script>
<script src="<?php echo site_url();?>static/cms/js/customer.js"></script>
<script src="<?php echo site_url();?>static/cms/plugins/ckeditor/ckeditor.js"></script>
<!-- main content -->

<form id="customer-form" name="customer-form" enctype="multipart/form-data" method="post" action="<?php echo site_url()."dashboard/clientes/validate";?>">
<div id="main_content" class="span7">
    <div class="row-fluid">
        <div class="widget_container">
            <div class="well">
                <div class="navbar navbar-static navbar_as_heading">
                        <div class="navbar-inner">
                                <div class="container" style="width: auto;">
                                        <a class="brand"></i> Formulario Clientes</a>
                                </div>
                        </div>
                </div>
                <!--GET CUSTOMER ID-->
                <input type="hidden" name="customer_id" id="customer_id" value="<?php echo isset($obj_customer)?$obj_customer->customer_id:"";?>">
              
                <div class="well nomargin" style="width: 600px;">
                    <div class="inner">
                    <strong>País:</strong>
                        <select name="pais" id="pais">
                        <option value="">[ Seleccionar ]</option>
                            <?php foreach ($obj_paises as $value ): ?>
                        <option value="<?php echo $value->id;?>"
                            <?php 
                                    if(isset($obj_customer->country)){
                                            if($obj_customer->country==$value->id){
                                                echo "selected";
                                            }
                                    }else{
                                              echo "";
                                    }

                            ?>><?php echo $value->nombre;?>
                        </option>
                            <?php endforeach; ?>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        
                        <strong>Región:</strong>
                            <select name="region" id="region">
                            <option value="">[ Seleccionar ]</option>
                                <?php foreach ($obj_regiones as $value ): ?>
                            <option value="<?php echo $value->id;?>"
                                <?php 
                                        if(isset($obj_customer->region)){
                                                if($obj_customer->region==$value->id){
                                                    echo "selected";
                                                }
                                        }else{
                                                  echo "";
                                        }

                                ?>><?php echo $value->nombre;?>
                            </option>
                                <?php endforeach; ?>
                            </select>
                    </div>
                    <br/>
                    <div class="inner">
                        <strong>Paquete:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name="franchise" id="franchise">
                                <option value="">[ Seleccionar ]</option>
                                    <?php foreach ($obj_franchise as $value ): ?>
                                <option value="<?php echo $value->franchise_id;?>"
                                    <?php 
                                            if(isset($obj_customer->franchise_id)){
                                                    if($obj_customer->franchise_id==$value->franchise_id){
                                                        echo "selected";
                                                    }
                                            }else{
                                                      echo "";
                                            }

                                    ?>><?php echo $value->name;?>
                                </option>
                                    <?php endforeach; ?>
                            </select>
                    </div>
                </div>
              <br><br>
              <strong>ID:</strong><br>
              <input type="text" id="customer_id" name="customer_id" value="<?php echo isset($obj_customer->customer_id)?$obj_customer->customer_id:"";?>" class="input-xlarge-fluid" placeholder="ID" disabled="">
              <br><br>
              <strong>Padre ID:</strong><br>
              <input type="text" id="parents_id" name="parents_id" value="<?php echo isset($obj_customer->parents_id)?$obj_customer->parents_id:"";?>" class="input-xlarge-fluid" placeholder="Padre">
              <br><br>
              <strong>Usuario:</strong><br>
              <input type="text" id="username" name="username" value="<?php echo isset($obj_customer->username)?$obj_customer->username:"";?>" class="input-xlarge-fluid" placeholder="Username">
              <br><br>
              <strong>Contraseña:</strong><br>              
              <input type="text" id="password" name="password" value="<?php echo isset($obj_customer->password)?$obj_customer->password:"";?>" class="input-xlarge-fluid" placeholder="Contraseña">
              <br><br>
              <strong>Nombres:</strong><br>   
              <input type="text" id="first_name" name="first_name" value="<?php echo isset($obj_customer->first_name)?$obj_customer->first_name:"";?>" class="input-xlarge-fluid" placeholder="Nombre">
              <br><br>
              <strong>Apellidos:</strong><br>
              <input type="text" id="last_name" name="last_name" value="<?php echo isset($obj_customer->last_name)?$obj_customer->last_name:"";?>" class="input-xlarge-fluid" placeholder="Apellidos">
              <br><br>
              <strong>Correo:</strong><br>
              <input type="text" id="email" name="email" value="<?php echo isset($obj_customer->email)?$obj_customer->email:"";?>" class="input-xlarge-fluid" placeholder="Correo Electrónico">
              <br><br>
              <strong>DNI:</strong><br>
              <input type="text" id="dni" name="dni" value="<?php echo isset($obj_customer->dni)?$obj_customer->dni:"";?>" class="input-xlarge-fluid" placeholder="DNI">
              <br><br>
              <strong>Fecha de Nacimiento:</strong><br>
              <input type="text" id="fecha_de_nacimiento" name="fecha_de_nacimiento" value="<?php echo isset($obj_customer->birth_date)?$obj_customer->birth_date:"";?>" class="input-xlarge-fluid" placeholder="Fecha de Nacimiento">
              <br><br>
              <strong>Telefono:</strong><br>
              <input type="text" id="phone" name="phone" class="input-small-fluid" placeholder="Telefono" value="<?php echo isset($obj_customer->phone)?$obj_customer->phone:"";?>">
              <!--<br><br><hr>-->
<!--              <strong>Nombre del Banco:</strong><br>
              <input type="text" id="bank_name" name="bank_name" class="input-small-fluid" placeholder="Nombre del Banco" value="<?php echo isset($obj_customer->bank_name)?$obj_customer->bank_name:"";?>">
              <br><br>
              <strong>Nombre del Títular:</strong><br>
              <input type="text" id="titular_name" name="titular_name" class="input-small-fluid" placeholder="Nombre del Títular" value="<?php echo isset($obj_customer->titular_name)?$obj_customer->titular_name:"";?>">
              <br><br>
              <strong># Cuenta Bancaria:</strong><br>
              <textarea name="bank_account" id="bank_account" placeholder="Cuenta Bancaria ..." style="width: 90%; height: 100px;"><?php echo isset($obj_customer->bank_account)?$obj_customer->bank_account:"";?></textarea>-->
              
<!--              <br><hr>
              <strong><?php echo replace_vocales_voculeshtml("Fecha de Creación:");?></strong><br>
              <input type="text" id="date_start" name="date_start" class="input-small-fluid" placeholder="Fecha de Inicio" value="<?php echo isset($obj_customer->created_at)?  formato_fecha_barras($obj_customer->created_at):"";?>">
              --><br><br>
              <strong><?php echo replace_vocales_voculeshtml("Fecha de Activación:");?></strong><br>
              <input type="text" id="date_end" name="date_end" class="input-small-fluid" placeholder="Fecha de Termino" value="<?php echo isset($obj_customer->date_start)?$obj_customer->date_start:"";?>">
              <br><br>
              
              <div class="inner">
                        <strong>Financiada:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="financy" id="financy">
                                    <option value="">[ Seleccionar ]</option>
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_customer->financy == 1){ echo "selected";}
                                    }else{echo "";} ?>>Si</option>
                                    <option value="0" <?php if(isset($obj_customer)){
                                        if($obj_customer->financy == 0){ echo "selected";}
                                    }else{echo "";} ?>>No</option>
                        </select>
               </div>
              <br><br>
              <div class="inner">
                        <strong>Posición Pierna:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="position" id="position">
                                    <option value="">[ Seleccionar ]</option>
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_customer->position == 1){ echo "selected";}
                                    }else{echo "";} ?>>Izquierda</option>
                                    <option value="2" <?php if(isset($obj_customer)){
                                        if($obj_customer->position == 2){ echo "selected";}
                                    }else{echo "";} ?>>Derecha</option>
                        </select>
               </div>
               <br><br>
              <div class="inner">
                        <strong>Posición Pierna Temporal:</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select name="position_temporal" id="position_temporal">
                                    <option value="">[ Seleccionar ]</option>
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_customer->position_temporal == 1){ echo "selected";}
                                    }else{echo "";} ?>>Izquierda</option>
                                    <option value="2" <?php if(isset($obj_customer)){
                                        if($obj_customer->position_temporal == 2){ echo "selected";}
                                    }else{echo "";} ?>>Derecha</option>
                        </select>
               </div>
              <br><br>
              <strong>Dirección:</strong><br>
              <textarea name="address" id="address" placeholder="Dirección ..." style="width: 90%; height: 100px;"><?php echo isset($obj_customer->address)?$obj_customer->address:"";?></textarea>
              <script type="text/javascript">CKEDITOR.replace("adress")</script> 
              <br><br>
              <strong>Ciudad:</strong><br>
              <input type="text" id="city" name="city" class="input-small-fluid" placeholder="Ciudad" value="<?php echo isset($obj_customer->city)?$obj_customer->city:"";?>">
              <br><br>
              <strong>Dirección de BTC:</strong><br>
              <input type="text" id="btc_address" name="btc_address" class="input-xlarge-fluid" placeholder="Direccion de BitCoin" value="<?php echo isset($obj_customer->btc_address)?$obj_customer->btc_address:"";?>">
<!--                <br><br>
                <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                        <strong>Calificado para Binario:</strong>
                        <select name="calification" id="calification">
                                    <option value="">[ Seleccionar ]</option>
                                    <option value="0" <?php if(isset($obj_customer)){
                                        if($obj_customer->calification == 0){ echo "selected";}
                                    }else{echo "";} ?>>Inactivo</option>
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_customer->calification == 1){ echo "selected";}
                                    }else{echo "";} ?>>Activo</option>
                        </select>
                    </div>
                </div>-->
                <br><br>
                <div class="well nomargin" style="width: 200px;">
                    <div class="inner">
                        <strong>Activo o Pagado:</strong>
                        <select name="active" id="active">
                                    <option value="">[ Seleccionar ]</option>
                                    <option value="0" <?php if(isset($obj_customer)){
                                        if($obj_customer->active == 0){ echo "selected";}
                                    }else{echo "";} ?>>Inactivo</option>
                                    <option value="1" <?php if(isset($obj_customer)){
                                        if($obj_customer->active == 1){ echo "selected";}
                                    }else{echo "";} ?>>Activo</option>
                        </select>
                    </div>
                </div>
                <br><br>
<!--                <strong>Puntos Calificación Izquierda:</strong><br>
                <input type="text" id="point_calification_left" name="point_calification_left" class="input-small-fluid" placeholder="Puntos Calificar Izquierda" value="<?php echo isset($obj_customer->point_calification_left)?$obj_customer->point_calification_left:"";?>">
                <br><br>
                <strong>Puntos Calificación Derecha:</strong><br>
                <input type="text" id="point_calification_rigth" name="point_calification_rigth" class="input-small-fluid" placeholder="Puntos Calificar Derecha" value="<?php echo isset($obj_customer->point_calification_rigth)?$obj_customer->point_calification_rigth:"";?>">
                <br><br>-->
                <strong>Indicador Posición:</strong><br>
                <textarea name="identificador" id="identificador" placeholder="Identificador ..." style="width: 90%; height: 100px;"><?php echo isset($obj_customer->identificador)?$obj_customer->identificador:"";?></textarea>
                <br><br>
                <strong>Puntaje Izquierda:</strong><br>
                <input type="text" id="point_left" name="point_left" class="input-small-fluid" placeholder="Puntos Izquierda" value="<?php echo isset($obj_customer->point_left)?$obj_customer->point_left:"";?>">
                <br><br>
                <strong>Puntaje Derecha:</strong><br>
                <input type="text" id="point_rigth" name="point_rigth" class="input-small-fluid" placeholder="Puntos Derecha" value="<?php echo isset($obj_customer->point_rigth)?$obj_customer->point_rigth:"";?>">
                <br><br>
                <strong>Fecha de Creación:</strong><br>
                <input type="text" id="created_at" name="created_at" class="input-small-fluid" placeholder="Fecha de Creación" value="<?php echo isset($obj_customer->created_at)?$obj_customer->created_at:"";?>" disabled="">
                <br><br>
                
                <div class="well nomargin" style="width: 200px;">
                      <div class="inner">
                          <strong>Estado para el sistema:</strong>
                          <select name="status_value" id="status_value">
                                      <option value="">[ Seleccionar ]</option>
                                      <option value="0" <?php if(isset($obj_customer)){
                                          if($obj_customer->status_value == 0){ echo "selected";}
                                      }else{echo "";} ?>>Inactivo</option>
                                      <option value="1" <?php if(isset($obj_customer)){
                                          if($obj_customer->status_value == 1){ echo "selected";}
                                      }else{echo "";} ?>>Activo</option>
                          </select>
                      </div>
                  </div>
                <br><br>
                <br><br>
                <div class="subnav nobg">
                    <button class="btn btn-danger btn-small pull-left" type="reset" onclick="cancelar_customer();">Cancelar</button>                    
                    <button class="btn btn-primary btn-small pull-right"  type="submit">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div><!-- main content -->
</form>
<script type="text/javascript">
    var show = '<?php echo $modulos?>';
    $('#timepicker1').timepicker({
        minuteStep: 1,    
        showSeconds: true,
        showMeridian: false,
        showInputs: true
    });
</script>
