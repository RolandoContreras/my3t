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
        <div class="col-sm-9 col-md-9 col-lg-9">
            <ul class="nav nav-tabs">
                <li class="active"><a aria-expanded="true" href="#basico" data-toggle="tab"><?php echo replace_vocales_voculeshtml("BÁSICO");?></a></li>
                <li><a aria-expanded="false" href="#intermedio" data-toggle="tab">INTERMEDIO</a></li>
                <li><a aria-expanded="false" href="#avanzado" data-toggle="tab">AVANZANDO</a></li>
            </ul>
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
                                    <a href="#"><button class="btn btn-success btn-block" type="button">VER VIDEO</button></a>
                            </div>
                        </div>
                  <hr/>
                  <?php } ?>
                   
                </div>
                <!--INTERMEDIO-->
                <div class="tab-pane" id="intermedio">
                    <div class="panel-body">
                        <p><b>No hay Vídeos</b></p>
                    </div>
                </div>
                <!--AVANZADO-->
                <div class="tab-pane" id="avanzado">
                    <div class="panel-body">
                        <p><b>No hay Vídeos</b></p>
                    </div>
                </div>
            </div>
	</div>
            
        <div class="col-sm-3">
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-search"></i>Search...</h5>
			<div class="input-group">
				<input class="form-control" type="text">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">
						<i class="fa fa-search"></i>
					</button> </span>
			</div>
			<!-- /input-group -->
		</div>
		<!-- /well -->
		<div class="well padding-10">
			<h5 class="margin-top-0"><i class="fa fa-thumbs-o-up"></i> Siguenos!</h5>
			<ul class="no-padding no-margin">
				<p class="no-margin">
					<a title="Facebook" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-facebook fa-stack-1x"></i></span></a>
                                        <a title="Youtube" target="_blank" href="https://www.youtube.com/channel/UCiAZcGdgGlrY2gv3igqdEMw/featured"><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-youtube fa-stack-1x"></i></span></a>
                                        <a title="Imstagram" href=""><span class="fa-stack fa-lg"><i class="fa fa-square-o fa-stack-2x"></i><i class="fa fa-instagram fa-stack-1x"></i></span></a>
				</p>
			</ul>
		</div>
            </div>    
            
 
        </div>
        </div>
    </section>

<script>
$(document).ready(function(){
    $("#ui-id-24").click(function(){
        $("#tabs_a").show();
    });
    $("#show").click(function(){
        $("p").show();
    });
});
</script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>