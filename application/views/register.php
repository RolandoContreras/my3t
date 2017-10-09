<!DOCTYPE html>
<html lang="en">
 <!--HEAD-->
 <?php $this->load->view("head");?>
 <!--END HEAD-->
    <body>
 <!----NAV-->
 <?php $this->load->view("nav");?>
 <!--END NAVS-->
        <section class="contact_header top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?php echo replace_vocales_voculeshtml("Registro");?></h2>
                    </div>
                </div>
            </div>
        </section>
            <div class="height-50"></div>
                   <section class="contact_us-second">
                       <div class="container">
                           <div class="row">
                		<div class="col-md-12 col-sm-12 col-xs-12">
                                    <header>
                                        <h2><?php echo replace_vocales_voculeshtml("Formulario de Registro");?></h2>
                                    </header>
                                    <div class="height-50"></div>
                                    <form class="contact" method="post" action="<?php echo site_url().'register/crear_registro'?>">
                                        <div class="row">
                                    <?php if(isset($obj_customer)){ ?>
                                        <div class="col-md-12">
                                            <div class="form-grp">
                                                <label>Patrocinador</label>
                                                    <input type="text"  readonly="readonly" value="<?php  
                                                    if(isset($obj_customer->username)){
                                                        echo $obj_customer->username;
                                                    }?>" placeholder="<?php 
                                                    if(isset($obj_customer->username)){
                                                        echo $obj_customer->username;
                                                    }?>"/>
                                                    <input type="hidden"  id="customer_id" name="customer_id" value="<?php  
                                                    if(isset($obj_customer->customer_id)){
                                                        echo $obj_customer->customer_id;
                                                    }
                                                    ?>" placeholder="<?php 
                                                    if(isset($obj_customer->customer_id)){
                                                        echo $obj_customer->customer_id;
                                                    }?>"/>
                                                    <input type="hidden"  id="pierna_customer"  name="pierna_customer" value="<?php  
                                                    if(isset($obj_customer->position_temporal)){
                                                        echo $obj_customer->position_temporal;
                                                    }
                                                    ?>" placeholder="<?php 
                                                    if(isset($obj_customer->position_temporal)){
                                                        echo $obj_customer->position_temporal;
                                                    }?>"/>
                                            </div>
                                        </div>
                                    <?php }else{ ?>
                                        <input type="hidden"  readonly="readonly" id="customer_id" name="customer_id" value="1"/>
                                        <input type="hidden"  readonly="readonly" id="pierna_customer"  name="pierna_customer" value="1"/>
                                    <?php } ?>
                                   
                                  
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label>Usuario</label>
                                        <input onblur="validate_username(this.value);" id="usuario" type="text" name="usuario">
                                        <span class="alert-0"></span>
                                      </div>
                                    </div>
                                  <div class="col-md-6">
                                  <div class="form-grp">
                                      <label><?php echo replace_vocales_voculeshtml("Contraseña");?></label>
                                      <input id="clave" type="password" name="clave">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-grp">
                                    <label><?php echo replace_vocales_voculeshtml("Repetir Contraseña");?></label>
                                    <input id="repita_clave" onblur="validate_2passwordr(this.value);" type="password" name="repita_clave">
                                    <span class="alert-1"></span>
                                  </div>
                                </div> 
                                    <div class="col-md-6">
                                      <div class="form-grp">
                                        <label>Nombres</label>
                                        <input id="name" type="text" name="name">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-grp">
                                        <label>Apellidos</label>
                                        <input id="last_name" type="text" name="last_name">
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("Dirección");?></label>
                                        <input id="address" type="text" name="address">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("Teléfono");?></label>
                                        <input id="telefono" type="text" name="telefono">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("DNI");?></label>
                                        <input id="dni" type="text" name="dni">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("Correo Electrónico");?></label>
                                        <input id="email" type="text" name="email">
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("Fecha de Nacimiento");?></label>
                                        <select  name="dia" id="dia">
                                            <option value=""><?php echo replace_vocales_voculeshtml("Día")?></option>
                                                <?php  for ($x = 1; $x <= 31; $x++) {  ?>
                                                    <option value="<?php echo $x?>"><?php echo $x;?></option>
                                                <?php } ?>
                                        </select>
                                    
                                        <select iname="mes" id="mes">
                                            <option value="">Mes</option>
                                                    <option value="01">Enero</option>
                                                    <option value="02">Febrero</option>
                                                    <option value="03">Marzo</option>
                                                    <option value="04">Abril</option>
                                                    <option value="05">Mayo</option>
                                                    <option value="06">Junio</option>
                                                    <option value="07">Julio</option>
                                                    <option value="08">Agosto</option>
                                                    <option value="09">Setiembre</option>
                                                    <option value="10">Octubre</option>
                                                    <option value="11">Noviembre</option>
                                                    <option value="12">Diciembre</option>
                                        </select>
                                        <select  name="ano" id="ano" class="password_text" >
                                                    <option selected="selected" value="">A&ntilde;o</option>
                                                        <?php  for ($x = 1950; $x <= 2016; $x++) {  ?>
                                                            <option value="<?php echo $x?>"><?php echo $x;?></option>
                                                        <?php } ?>
                                        </select> 
                                      </div>
                                    </div>  
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("País");?></label>
                                         <select class="password_text" onchange="validate_region(this.value);" name="pais" id="pais" class="ui dropdown">
                                            <option  selected value=""><?php echo replace_vocales_voculeshtml("País");?></option>
                                                <?php  foreach ($obj_paises as $key => $value) { ?>
                                                       <option  value="<?php echo $value->id;?>"><?php echo $value->nombre;?></option>
                                                <?php } ?>
                                        </select>
                                        <select  name="region" id="region" class="password_text">
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("Ciudad");?></label>
                                        <input id="city" type="text" name="city">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                          <input class="btn btn-default hvr-bounce-to-right" onclick="crear_registro();" value="<?php echo replace_vocales_voculeshtml("Crear Cuenta");?>" />
                                      </div>
                                    </div>
                                      
                                  </div>
                                </form>
                            </div>
                    </div>
                </div>
        </section>
        <br><br>
        <div id="spinner"></div>
        <script src="<?php echo site_url().'static/page_front/js/register.js';?>"></script>
        <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
            <?php $this->load->view("footer");?>
        <!--END FOOTER SECTION-->
	</body>
</html>
