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
                        <p><a class="btn btn-block btn-red" href="<?php echo site_url().'backoffice/compose_message';?>">Componer</a></p>
                            <ul class="list-unstyled mail-list">
                                    <li class="active">
                                        <a href="<?php echo site_url().'backoffice/messages';?>"><i class="fa fa-inbox"></i> Inbox <b>(<?php echo $all_message;?>)</b></a>
                                    </li>
                                    <li>
                                            <a href="#/"><i class="fa fa-send-o"></i> Enviados</a>
                                    </li>
                            </ul>

                            <h3 class="title text-uppercase m-l-20">Etiquetas</h3>
                            <ul class="list-unstyled category-list">
                                    <li><a href="<?php echo site_url().'backoffice/messages/bonus';?>"> <i class="fa fa-circle text-purple"></i>Bonos</a></li>
                                    <li><a href="<?php echo site_url().'backoffice/messages/support';?>"> <i class="fa fa-circle text-danger"></i>Soporte</a></li>
                                    <li><a href="<?php echo site_url().'backoffice/messages/social';?>"> <i class="fa fa-circle text-primary"></i>Social</a></li>
                            </ul>

                    </div>
                    <div class="col-lg-9">

                            <div class="mail-box">
                                    <div class="mail-box-header clearfix">
                                            <h3 class="mail-title">Inbox</h3>
                                            <div class="mail-tools clearfix">
                                                    <div class="btn-group pull-right">
                                                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-left"></i></button>
                                                            <button class="btn btn-white btn-sm"><i class="fa fa-arrow-right"></i></button>
                                                    </div>
                                                <a href="<?php echo site_url().'backoffice/messages';?>"><button title="Actualizar" data-placement="left" data-toggle="tooltip" class="btn btn-white btn-sm"><i class="fa fa-refresh"></i> Actualizar</button></a>
                                                <button title="Marcar Leido" data-placement="top" data-toggle="tooltip" class="btn btn-white btn-sm"><i class="fa fa-eye"></i><?php echo replace_vocales_voculeshtml("Marcar como Leído");?></button>
                                            </div>
                                    </div>
                                    <div class="table-responsive">
                                            <table class="table table-hover table-mails">
                                                    <tbody>
                                                        <?php 
                                                        if($all_message == 0){ ?>
                                                            <tr>
                                                                <td colspan="5" style="text-align: center;">
                                                                        No hay mensajes
                                                                </td>
                                                            </tr>
                                                            
                                                        <?php }else{
                                                                if(count($obj_message) > 0){
                                                                    
                                                                    foreach ($obj_message as $value) { 
                                                            //GET TYPE MESSAGE
                                                            switch ($value->type) {
                                                            case 1:
                                                                //BONUS
                                                                $style =  "fa fa-circle text-purple m-r-15";
                                                                $link =  "bonus";
                                                                break;
                                                            case 2:
                                                                //SUPPORT
                                                                $style =  "fa fa-circle text-danger m-r-15";
                                                                $link =  "support";
                                                                break;
                                                            case 3:
                                                                //SOCIAL
                                                                $style =  "fa fa-circle text-primary m-r-15";
                                                                $link =  "social";
                                                                break;
                                                            } ?>
                                                            <tr class="unread">
                                                                    <td class="mail-select">
                                                                        <div class="form-checkbox">
                                                                            <input type="checkbox" id="checkbox1" checked="checked"> <span class="check"><i class="fa fa-check"></i></span>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                    </td>
                                                                    <td>
                                                                        <a href='<?php echo site_url()."backoffice/messages/$link/$value->messages_id";?>'><i class="<?php echo $style;?>"></i> <?php echo replace_vocales_voculeshtml("$value->label");?></a>
                                                                    </td>
                                                                    <td>
                                                                        <a href="<?php echo site_url()."backoffice/messages/$link/$value->messages_id";?>"><?php echo replace_vocales_voculeshtml("$value->subject");?></a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right"><?php echo formato_fecha_barras($value->date)?></td>
                                                            </tr>
                                                        <?php } 
                                                                }else{ ?>
                                                                     <tr>
                                                                        <td colspan="5" style="text-align: center;">
                                                                                No hay mensajes
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                    <?php } ?>
                                                    </tbody>
                                            </table>
                                    </div>
           </div>

                    </div>
            </div>

      </div>
      <!-- /main content -->
</section>