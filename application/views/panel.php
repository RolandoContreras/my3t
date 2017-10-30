<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>


<div class="row-fluid">
    <div class="span6">
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                <a class="brand"><?php echo replace_vocales_voculeshtml("Vista Rápida");?></a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CMS</th>
                                                    <th>Discuciones</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a href="#"><b>0</b> <i class="icon-edit"></i> Reportes</a></td>
                                                    <td><a class="pending"><b class="cmd"><?php echo $inactive;?></b> <i class="icon-edit"></i> Pendientes</a></td>
                                            </tr>
                                            <tr>
                                                    <td><a href="<?php echo site_url().'dashboard/clientes';?>"><b><?php echo $obj_customer?></b> <i class="icon-edit"></i>Total Asociados</a></td>
                                                    <td><a href="<?php echo site_url().'dashboard/financiados';?>" class="pending"><b class="cmd"><?php echo $obj_financiado;?></b> <i class="icon-edit"></i> Financiados</a></td>
                                            </tr>
                                            <tr>
                                                <td><a>Precio del BTC</a>&nbsp;&nbsp;&nbsp;<input type="text" name="btc_price" id="btc_price" value="<?php echo $bitcoin;?>" style="vertical-align: middle !important;">&nbsp;&nbsp;&nbsp;<button onclick="guardar_btc();" class="btn btn-info">Guardar</button></td>
                                                    <td></td>
                                            </tr>
                                           
                                    </tbody>
                            </table>
                    </div>
            </div>
        
            <div class="widget_container">
                    <div class="well nomargin">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Producción e Ingresos</a>
                                            </div>
                                    </div>
                            </div>
                            <table id="quick_view" class="table">
                                    <thead>
                                            <tr>
                                                    <th>CMS</th>
                                                    <th>Discuciones</th>
                                            </tr>
                                    </thead><!-- table heading -->
                                    <tbody>
                                            <tr>
                                                    <td><a href="#"><b>0</b> <i class="icon-edit"></i> Reportes</a></td>
                                                    <td><a class="pending"><b class="cmd"><?php echo $inactive;?></b> <i class="icon-edit"></i> Pendientes</a></td>
                                            </tr>
                                            <tr>
                                                    <td><a href="<?php echo site_url().'dashboard/clientes';?>"><b><?php echo $obj_customer?></b> <i class="icon-edit"></i>Total Asociados</a></td>
                                                    <td><a href="<?php echo site_url().'dashboard/financiados';?>" class="pending"><b class="cmd"><?php echo $obj_financiado;?></b> <i class="icon-edit"></i> Financiados</a></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="right" >
                                                    <a href="<?php echo site_url("dashboard/comentarios");?>" class="btn btn-duadua">Ver más</a>
                                                </td>
                                            </tr>
                                            
                                            
                                    </tbody>
                            </table>
                    </div>
            </div>
        
        

            <div id="quick_post" class="widget_container">
                    <div class="well">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                    <a class="brand">Mensaje Correo Masivo</a>
                                            </div>
                                    </div>
                            </div>

                            <div class="btn-group" data-toggle="buttons-radio" style="margin-bottom:20px;">
                                    <button class="btn btn-duadua active">Red</button>
                                    <button class="btn btn-duadua">Page</button>
                                    <button class="btn btn-duadua">Report</button>
                                    <button class="btn btn-duadua">Event</button>
                            </div>

                            <form>
                            <fieldset>
                            <div class="control-group">
                            <div class="controls">
                            <div class="input-prepend">
                            <span class="add-on"><i class="icon-edit"></i></span>
                            <input class="input-large" size="16" type="text" id="title"  name="title" style="width:88%;" placeholder="<?php echo replace_vocales_voculeshtml("Título");?>" />
                            </div>
                            </div>
                            </div>

                            <div class="control-group">
                            <div class="controls">
                            <textarea class="input-large" id="message_content" name="message_content" rows="5" style="width:97%;height:180px;" placeholder="Content"></textarea>
                            </div>
                            </div>

                            <a onclick="message_public();" class="btn btn-primary">Publicar</a>

                            </fieldset>
                            </form>
                    </div>
            </div>
    </div>

        <div class="span6">
                <div id="quick_comment_view" class="widget_container">
                        <div class="well">							
                                <div class="navbar navbar-static navbar_as_heading">
                                        <div class="navbar-inner">
                                                <div class="container" style="width: auto;">
                                                        <a class="brand">Último Comentario</a>
                                                </div>
                                        </div>
                                </div>
                            <?php 
                            if(count($obj_last_comment) > 0){ ?>
                                <div class="row-fluid">
                                    <div class="comment_container span12" style="margin-left:auto;">
                                        <div class="span2">
                                            <img style="padding: 8px" src="<?php echo site_url('static/cms/images/email-icon.jpg');?>" alt="mensajes"/>
                                        </div>
                                        <div class="span10" style="margin-left:auto;">
                                            <div class="comment_content">
                                                <p class="meta"><span class="comment_date"><?php echo formato_fecha($obj_last_comment->date_comment);?></span> | <a href="#"><?php echo $obj_last_comment->email;?></a></p>
                                                    <p><a href="#" class="comment_author"><?php echo $obj_last_comment->name;?></a> : <?php echo $obj_last_comment->comment;?></p>
                                                    <p>
                                                            <a class="btn btn-mini btn-primary" href="#">Reply</a> <a class="btn btn-mini btn-danger" href="#">Delete</a> <a class="btn btn-mini btn-warning" href="#">Mark as Spam</a> 
                                                    </p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url("dashboard/comentarios");?>" class="btn btn-duadua">Ver más</a>
                                </div>
                            <?php }else{ ?>
                                    <div class="row-fluid">
                                            <div class="comment_container span12" style="margin-left:auto;">
                                                <div class="span10" style="margin-left:auto;">
                                                    <div class="comment_content">
                                                        <h4><b>NO HAY MENSAJES</b></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        <a href="<?php echo site_url("dashboard/comentarios");?>" class="btn btn-duadua">Ver más</a>
                                    </div>
                            <?php }  ?>
                        </div>
                </div>

<!--                <div id="popular_posts" class="widget_container">
                        <div class="well">
                                <div class="navbar navbar-static navbar_as_heading">
                                        <div class="navbar-inner">
                                                <div class="container" style="width: auto;">
                                                        <a class="brand">Últimos Mensajes Masivos</a>
                                                </div>
                                        </div>
                                </div>

                                <table class="table">
                                        <tbody>
                                                <tr>
                                                        <td>1</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">25 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>2</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">20 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>3</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">15 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>4</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">10 Comments</a></td>
                                                </tr>
                                                <tr>
                                                        <td>5</td>
                                                        <td><a href="#">Post Title Here</a></td>
                                                        <td><i class="icon-large icon-chat"></i> <a href="#">5 Comments</a></td>
                                                </tr>
                                        </tbody>
                                </table>
                                <a href="#" class="btn btn-duadua">View More</a>
                        </div>
                </div>-->
        </div>
</div>
<script src="static/cms/js/panel.js"></script>