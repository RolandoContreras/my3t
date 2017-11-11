    <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?php echo replace_vocales_voculeshtml("Mensajes");?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div><!-- Main content -->
    <div class="main-content">
		
		<div class="row">
			<div class="col-lg-3">
				<p><a class="btn btn-block btn-red" href="<?php echo site_url().'backoffice/compose_message';?>">Compose</a></p>
				<ul class="list-unstyled mail-list">
					<li>
						<a href="mail-inbox.html"><i class="fa fa-inbox"></i> Inbox <b>(6)</b></a>
					</li>
					<li>
						<a href="#/"><i class="fa fa-send-o"></i> Sent</a>
					</li>
					<li>
						<a href="#/"><i class="fa fa-edit"></i> Drafts <b>(15)</b></a>
					</li>
					<li>
						<a href="#/"><i class="fa fa-star-o"></i> Important</a>
					</li>
					<li>
						<a href="#/"><i class="fa fa-trash-o"></i> Trash <b>(205)</b></a>
					</li>
				</ul>
				
				<h3 class="title text-uppercase m-l-20">Labels</h3>
				<ul class="list-unstyled category-list">
					<li><a href="#"> <i class="fa fa-circle text-purple"></i> Work </a></li>
					<li><a href="#"> <i class="fa fa-circle text-warning"></i> Clients</a></li>
					<li><a href="#"> <i class="fa fa-circle text-danger"></i> Documents</a></li>
					<li><a href="#"> <i class="fa fa-circle text-primary"></i> Social</a></li>
					<li><a href="#"> <i class="fa fa-circle text-info"></i> Advertising</a></li>
				</ul>
				
			</div>
			<div class="col-lg-9">
			
				<div class="mail-box">
					<div class="mail-box-header clearfix">
						<h3 class="mail-title">Compose mail</h3>
						<div class="pull-right tooltip-demo">
                                                    <a title="Descarte" data-placement="top" data-toggle="tooltip" class="btn btn-danger btn-sm" href="<?php echo site_url().'';?>" data-original-title="Descarte Mensaje"><i class="fa fa-times"></i> Descarte</a>
						</div>
					</div>
					<div class="mail-body">
						 <form>
							<div class="form-group">
								<input class="form-control" placeholder="To" type="email">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Subject" type="text">
							</div>
							<div class="form-group">
                                                                            <textarea class="textarea wysihtml5 form-control" style="height: 200px;" placeholder="Message body"></textarea>

							</div>
							<hr>
							<div class="form-group text-right">
								<a title="" data-placement="top" data-toggle="tooltip" class="btn btn-primary" href="#/" data-original-title="Send"><i class="fa fa-reply"></i> Send</a>
								<a title="" data-placement="top" data-toggle="tooltip" class="btn btn-white" href="#/" data-original-title="Discard Email"><i class="fa fa-times"></i> Discard</a>
								<a title="" data-placement="top" data-toggle="tooltip" class="btn btn-white" href="#/" data-original-title="Move to Draft"><i class="fa fa-pencil"></i> Draft</a>
							</div>
						</form>
					</div>
                               </div>
			</div>
		</div>
	  </div>
        
        
        
        <!--//ADD plugins PLUGINS WYSIHTML5-->
        <script type='text/javascript' src='<?php echo site_url().'static/backoffice/js/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js';?>'></script>
        <script type='text/javascript' src='<?php echo site_url().'static/backoffice/js/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js';?>'></script>
        
        
        <script>
	 $(document).ready(function(){
	 	$('.wysihtml5').wysihtml5();
                $('.textarea').wysihtml5({
                  toolbar: {
                    fa: true
                  }
                });

                
	});
</script>