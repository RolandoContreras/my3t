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
                        <h2><?php echo replace_vocales_voculeshtml("Inicio de Sesión");?></h2>
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
                                        <h2><?php echo replace_vocales_voculeshtml("Bienvenido a CRIPTOWIN");?></h2>
                                    </header>
                                    <div class="height-50"></div>
                               <form class="contact-formm">
                                   <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-grp">
                                        <label>Usuario</label>
                                        <input id="username" type="text" name="username">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-grp">
                                        <label><?php echo replace_vocales_voculeshtml("Contraseña");?></label>
                                        <input id="password" type="password" name="password">
                                      </div>
                                    </div>
                                        <div class="col-md-12">
                                      <div class="form-grp">
                                          <label><a href="<?php echo site_url().'forgot';?>"><?php echo replace_vocales_voculeshtml("¿Olvidaste tu contraseña? ");?></a></label>
                                      </div>
                                    </div>
                                       
                                       <div class="col-md-12">
                                      <div class="form-grp">
                                          <input class="btn btn-default hvr-bounce-to-right" onclick="send_login();" value="<?php echo replace_vocales_voculeshtml("Iniciar Sesión");?>" />
                                      </div>
                                      
                                        <div id="success">
                                        </div>
                                    </div>
                                   </div>
                                </form>
                            </div>
                    </div>
                </div>
        </section>
        <br><br>
        <script src="<?php echo site_url().'static/page_front/js/login.js';?>"></script>
        <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
        <div id="spinner"></div>
            <?php $this->load->view("footer");?>
        <!--END FOOTER SECTION-->
	</body>
</html>
