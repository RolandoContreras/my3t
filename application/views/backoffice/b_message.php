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
                                            <h3 class="mail-title">Inbox <span class="count">(6)</span></h3>
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
                                                        

                                                        
                                                        
                                                        foreach ($obj_message as $value) { 
                                                            //GET TYPE MESSAGE
                                                            switch ($value->type) {
                                                            case 1:
                                                                $style =  "fa fa-circle text-purple m-r-150";
                                                                break;
                                                            case 2:
                                                                $style =  "";
                                                                break;
                                                            case 3:
                                                                $style =  "";
                                                                break;
                                                            }    
                                                            ?>
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
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-purple m-r-15"></i> Google Inc</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            07:23 AM
                                                                    </td>
                                                            </tr>
                                                            
                                                        <?php } ?>
                                                            
                                                            <tr class="unread">
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox2" checked="checked"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-warning m-r-15"></i> John Smith</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Hello, hope you having a great day ahead.</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            06:18 AM
                                                                    </td>
                                                            </tr>
                                                            <tr class="unread">
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox3"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-danger m-r-15"></i> Manager</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            04:23 PM
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox4"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-primary m-r-15"></i> Facebook</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            16 Aug
                                                                    </td>
                                                            </tr>
                                                            <tr class="unread">
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox5" checked="checked"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-purple m-r-15"></i> LinkedIn</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            26 Jul
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox6"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-info m-r-15"></i> Google Inc</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            12 Jul
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox7"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-warning m-r-15"></i> John Smith</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Hello, hope you having a great day ahead.</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            24 Jun
                                                                    </td>
                                                            </tr>
                                                            <tr class="unread">
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox8" checked="checked"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-danger m-r-15"></i> Manager</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            15 May
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox9"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-primary m-r-15"></i> Facebook</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            12 May
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox10"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-purple m-r-15"></i> LinkedIn</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            28 Apr
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox11"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-info m-r-15"></i> Google Inc</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            16 Apr
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox12"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-warning m-r-15"></i> John Smith</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Hello, hope you having a great day ahead.</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            12 Apr
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox14" checked="checked"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-danger m-r-15"></i> Manager</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            12 Mar
                                                                    </td>
                                                            </tr>
                                                            <tr class="unread">
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox15"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-warning"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-primary m-r-15"></i> Facebook</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            16 Feb
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                    <td class="mail-select">
                                                                            <div class="form-checkbox">
                                                                                    <input type="checkbox" id="checkbox16"> <span class="check"><i class="fa fa-check"></i></span>
                                                                            </div>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-star text-muted"></i>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html"><i class="fa fa-circle text-purple m-r-15"></i> LinkedIn</a>
                                                                    </td>
                                                                    <td>
                                                                            <a href="mail-read.html">Lorem ipsum dolor sit amet, consectetuer adipiscing elit</a>
                                                                    </td>
                                                                    <td>
                                                                            <i class="fa fa-paperclip"></i>
                                                                    </td>
                                                                    <td class="text-right">
                                                                            26 Jan
                                                                    </td>
                                                            </tr>
                                                    </tbody>
                                            </table>
                                    </div>
           </div>

                    </div>
            </div>

      </div>
      <!-- /main content -->
</section>