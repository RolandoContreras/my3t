<script src="static/cms/js/core/bootstrap-modal.js"></script>
<script src="static/cms/js/core/bootbox.min.js"></script>
<script src="static/cms/js/core/jquery-1.11.1.min.js"></script>
<script src="static/cms/js/core/jquery.dataTables.min.js"></script>
<link href="static/cms/css/core/jquery.dataTables.css" rel="stylesheet"/>
<div class="row-fluid">
    <div class="span6">
            <div id="popular_posts" class="widget_container">
                    <div class="well">
                            <div class="navbar navbar-static navbar_as_heading">
                                    <div class="navbar-inner">
                                            <div class="container" style="width: auto;">
                                                <a class="brand"><?php echo replace_vocales_voculeshtml("Vista Rápida");?></a>
                                            </div>
                                    </div>
                            </div>
                        <table class="table">
                            <thead>
                                <tr>   
                                    <th>N°</th>
                                    <th>Concepto</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Asociados</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_customer;?></a></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">Comentarios</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_comments;?></a></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">Productos</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_product;?></a></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#">Comisiones</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_commissions;?></a></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#">Franquicias</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_franchise;?></a></td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><a href="#">Bonos</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_bonus;?></a></td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><a href="#">Pagos Realizados</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_pay;?></a></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><a href="#">Categorías</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_category;?></a></td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td><a href="#">Usuarios</a></td>
                                    <td><a class="btn btn-mini btn-warning" href="#"><?php echo $obj_total->total_users;?></a></td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><a href="#">Mensajes Informativos</a></td>
                                    <td><a class="btn btn-mini btn-warning"href="#"><?php echo $obj_total->total_informative;?></a></td>
                                </tr>
                                <tr>
<!--                                    <td><a>Precio del BTC</a>&nbsp;&nbsp;&nbsp;<input type="text" name="btc_price" id="btc_price" value="<?php echo $bitcoin;?>" style="vertical-align: middle !important;">&nbsp;&nbsp;&nbsp;<button onclick="guardar_btc();" class="btn btn-info">Guardar</button></td>
                                    <td></td>
                                    <td></td>-->
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

                <div id="popular_posts" class="widget_container">
                        <div class="well">
                                <div class="navbar navbar-static navbar_as_heading">
                                        <div class="navbar-inner">
                                                <div class="container" style="width: auto;">
                                                        <a class="brand">Registros Pendientes</a>
                                                </div>
                                        </div>
                                </div>
                                <table class="table">
                                    <thead>
                                        <tr>   
                                            <th>N°</th>
                                            <th>Concepto</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                    <td>1</td>
                                                    <td><a href="#">Comentarios</a></td>
                                                    <td><a class="btn btn-mini btn-danger" href="#"><?php echo $obj_pending->pending_comments;?></a></td>
                                            </tr>
                                            <tr>
                                                    <td>2</td>
                                                    <td><a href="#">Confirmación Activaciones</a></td>
                                                    <td><a class="btn btn-mini btn-danger" href="#">20 Comments</a></td>
                                            </tr>
                                            <tr>
                                                    <td>3</td>
                                                    <td><a href="#">Cobros</a></td>
                                                    <td><a class="btn btn-mini btn-danger" href="#"><?php echo $obj_pending->pending_pay;?></a></td>
                                            </tr>
                                    </tbody>
                                </table>
                                <a href="#" class="btn btn-duadua">View More</a>
                        </div>
                </div>
        </div>
</div>
<script src="static/cms/js/panel.js"></script>