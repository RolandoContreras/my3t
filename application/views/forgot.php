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
                        <h2><?php echo replace_vocales_voculeshtml("Recuperar contraseña");?></h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact_us-second">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <header>
                                <h2><?php echo replace_vocales_voculeshtml("Recuperar contraseña");?></h2>
                                <p>
                                        <?php echo replace_vocales_voculeshtml("Ingrese su usuario electrónico registrador para poder enviarle su contraseña.");?>
                                </p>
                        </header>
				<form class="contact-formm">
                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label>Ingrese Usuario</label>
                                        <input id="username" type="text" name="username">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <input onclick="send_messages();" class="btn btn-default hvr-bounce-to-right" value="Recuperar" />
                                      </div>
                                    </div>
                                  </div>
                                </form>
                    </div>
                    </div>
                </div>
        </section>
        <script src="<?php echo site_url().'static/page_front/js/forgot.js';?>"></script>
        <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
        <div id="spinner"></div>
        <br>
        <!-- FOOTER SECTION -->
            <?php $this->load->view("footer");?>
        <!--END FOOTER SECTION-->
	</body>
</html>
