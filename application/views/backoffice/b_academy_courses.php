<section>
    <div class="section-heading-2 row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase">ACADEMY - FOREX</h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
            <!-- Page content-->
    <div class="content-wrapper">
        <div class="row fix-box-height package-box-fix mt-30">
            <?php 
                   //GET URL
                    $url = explode("/",uri_string());
                    //TEST ISSET PRODUCT_ID
                    $product_id = isset($url['3'])?$url['3']:""; 
                    if($product_id != ""){ ?>
            
        <section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<!-- product -->
			<div class="product-content product-wrap clearfix product-deatil">
				<div class="row">
						<div class="col-md-5 col-sm-12 col-xs-12 ">
							<div class="product-image"> 
                                                            <div class="col-md-5">
                                                                <div class="embed-section">
                                                                    <div id="instructions">
                                                                        <video id="my_video_1" class="video-js vjs-default-skin" width="640px" height="267px"
                                                                            controls preload="none" poster='<?php echo site_url()."static/product/academy/images/basic/$obj_product->img";?>' data-setup='{}'>
                                                                            <source src="<?php echo site_url().'static/product/academy/videos/basic/video_1.mp4';?>" type='video/mp4' />
                                                                        </video>
                                                                    </div>
                                                                </div>
                                <style>
                                  #instructions { max-width: 640px;height: 300px}
                                  #instructions textarea { width: 100%; height: 100px; }

                                  /* Show the controls (hidden at the start by default) */
                                  .video-js .vjs-control-bar { 
                                    display: -webkit-box;
                                    display: -webkit-flex;
                                    display: -ms-flexbox;
                                    display: flex;
                                  }
                                </style>
			</div>
							</div>
						</div>
						<div class="col-md-7 col-sm-12 col-xs-12">
					
						<h2 class="name"><?php echo replace_vocales_voculeshtml("$obj_product->name");?></h2>
						<hr>
						<!--<h3 class="price-container">3T Academy</h3>-->
					
						<div class="certified">
							<ul>
                                                            <a href="javascript:void(0);"><span><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo replace_vocales_voculeshtml("$obj_product->author");?></span></a><br/>
                                                            <a href="javascript:void(0);"><span><i class="fa fa-calendar"></i>&nbsp;&nbsp;<?php echo formato_fecha("$obj_product->date");?></span></a>
							</ul>
						</div>
						<hr>
						<div class="description description-tabs">
							<ul id="myTab" class="nav nav-pills">
                                                            <li class="active"><a href="#description" data-toggle="tab" class="no-margin"><?php echo replace_vocales_voculeshtml("Descripción");?></a></li>
                                                            <li class=""><a href="#author" data-toggle="tab">Autor</a></li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in" id="description">
									<br>
									<p><?php echo replace_vocales_voculeshtml("$obj_product->description");?></p>
								</div>
                                                                <div class="tab-pane" id="author">
									<br>
									<p></p>
								</div>
							</div>
                                                    </div>
						<hr>
                                                <a href='<?php echo site_url()."backoffice/academy/courses";?>'><button class="btn btn-success btn-block" type="button">REGRESAR</button></a>
					</div>
				</div>
			</div>
			<!-- end product -->
		</div>	
	<!-- end row -->
</section>    
        <?php }else{ ?>
            <section>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="tab-content">
                        <!--BASICO-->
                        <div class="tab-pane active" id="basico">
                                <br/> 
                                <?php foreach ($obj_product as $value) { ?>
                              <div class="row">
                                    <div class="col-md-4">
                                        <img src='<?php echo site_url()."static/product/academy/images/basic/$value->img";?>' class="img-responsive" alt="<?php echo $value->img;?>">
                                    </div>
                                    <div class="col-md-8 padding-left-0">
                                        <h3 class="margin-top-0"><a href="javascript:void(0);"><?php echo replace_vocales_voculeshtml("$value->name");?></a><br>
                                            <small class="font-xs"><i>Publicado por: <a href="javascript:void(0);"><?php echo replace_vocales_voculeshtml("$value->author");?></a></i></small><br/>
                                                <small class="font-xs"><i><i class="fa fa-calendar"></i><?php echo formato_fecha("$value->date");?></i></small>
                                            </h3>
                                            <p>
                                                   <?php echo replace_vocales_voculeshtml("$value->summary");?>
                                            </p><br/>
                                            <a href='<?php echo site_url()."backoffice/academy/courses/$value->product_id";?>'><button class="btn btn-success btn-block" type="button">VER VIDEO</button></a>
                                    </div>
                                </div>
                          <hr/>
                            <?php } ?>
                          <br/> 
                        </div>
                        <!--INTERMEDIO-->
                        <div class="tab-pane" id="intermedio">
                            <div class="panel-body">
                                <div class="alert alert-danger" role="alert" style="text-align: center"><strong><?php echo replace_vocales_voculeshtml("Usted aún no tiene acceso a los cursos de Academy Forex Intermedio.");?></strong></div>
                            </div>
                        </div>
                        <!--AVANZADO-->
                        <div class="tab-pane" id="avanzado">
                            <div class="panel-body">
                                <div class="alert alert-danger" role="alert" style="text-align: center"><strong><?php echo replace_vocales_voculeshtml("Usted aún no tiene acceso a los cursos de Academy Forex avanzado.");?></strong></div>
                            </div>
                        </div>
                    </div>
                </div>
    </section>
<?php } ?> 
        </div>
        </div>
    </section>
<style></style>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>