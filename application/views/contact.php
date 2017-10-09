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
                        <h2><?php echo replace_vocales_voculeshtml("Contáctenos");?></h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact_us-second">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12 col-xs-12">
                        <header>
                                <h2><?php echo replace_vocales_voculeshtml("Contáctenos Hoy");?></h2>
                                <p>
                                       <?php echo replace_vocales_voculeshtml("Valoramos sus comentarios y responderemos a su pregunta lo más rápido posible.");?>
                                </p>
                        </header>
				<form class="contact-formm">
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-grp">
                                        <label>Nombre</label>
                                        <input id="name" type="text" name="name">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-grp">
                                        <label>Email</label>
                                        <input id="email" type="text" name="email">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label>Asunto</label>
                                        <input id="subject" type="text" name="subject">
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="form-grp">
                                        <label>Mensaje</label>
                                        <textarea id="message" name="message"></textarea>
                                        <input onclick="send_messages();" class="btn btn-default hvr-bounce-to-right" value="Enviar Mensaje" />
                                      </div>
                                    </div>
                                  </div>
                                </form>
						</div>
                        <div class="col-md-4 col-sm-8 col-xs-12 keep-in"> 
                        	<header>
                                    <h2><?php echo replace_vocales_voculeshtml("¡Redes Sociales!")?></h2>
							</header>                        
						
						<ul class="social-icons">
							<li>
								<a href="" ><i class="fa fa-facebook" aria-hidden="true"></i></a>
							</li>
							<li>
								<a href="" ><i class="fa fa-linkedin" aria-hidden="true"></i></a>
							</li>
                                                        <li>
								<a href="" ><i class="fa fa-youtube" aria-hidden="true"></i></a>
							</li>

						</ul>
						<div class="contact-box">
							<h3>Locations</h3>
                                                    <div class="address-box">
                                                        <div class="icon-box"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                                        <p class="address-text"> info@criptowin.com</p>
                                                    </div>	
                                                    <div class="address-box">
                                                        <div class="icon-box"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                                                        <p class="address-text">Lun - Vie: 09.00am a 18.00pm</p>
                                                    </div>	
						</div>
                        </div>
                        
                    </div>
                </div>
        </section>
        <script src="<?php echo site_url().'static/page_front/js/contact.js';?>"></script>
        <script src="<?php echo site_url().'static/assets/spin/js/spin.min.js';?>"></script>
        <div id="spinner"></div>
        <br><br>
        <section class="map-section">
            <div class="container">
                <div class="row">
                	<div class="col-md-12"> 
                		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.566710887688!2d-73.98620474897389!3d40.74955874315235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9edc73a69%3A0x334707e907aa24a1!2s384+5th+Ave%2C+New+York%2C+NY+10018%2C+EE.+UU.!5e0!3m2!1ses!2spe!4v1503914976717" width="1100" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>			

                		</div>                       
                	</div>
                </div>                     
        </section>
        <!-- FOOTER SECTION -->
            <?php $this->load->view("footer");?>
        <!--END FOOTER SECTION-->
	</body>
</html>
