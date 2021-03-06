<script src="<?php echo site_url().'static/cms/js/core/jquery-1.11.1.min.js';?>"></script>  
<!-- Main section-->
  <section>
      <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase"><?=lang('idioma.b_centro_informacion');?></h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?=lang('idioma.b_precio_btc');?> <?php echo $price_btc;?></a>
        </div>
    </div> 
      <div class="row">
        <div class="col-lg-12">
          <div id="panelDemo14" class="panel panel-success">
                <div class="panel-body">
                    <div id="archivos_subidos">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th><b><?=lang('idioma.b_tipo');?></b></th>
                                                <th><b><?=lang('idioma.b_centro_nombre');?></b></th>
                                                <th class="text-center"><b><?=lang('idioma.b_accion');?></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_presentacion_espanol');?></td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/presentacion_oficial_es.pdf';?>" download="Presentación_3TClub_Es.pdf" class="btn btn-success " title="Descargar Presentación 3T Club"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
<!--                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px">Presentación 3T Club - Ingles</td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/presentacion_oficial_en.pdf';?>" download="Presentación_3TClub_En.pdf" class="btn btn-success" title="Presentation 3T Club"><i class="fa fa-download"></i> Descargar</a>
                                                </td>
                                            </tr>-->
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_plan_accion');?></td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/plan_de_accion.pdf';?>" download="Plan_accion_3TClub.pdf" class="btn btn-success " title="Plan Accion 3T Club"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-image-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_ruc_blu');?></td>
                                                <td class="text-center" style="padding: 25px">
                                                    <a href="<?php echo site_url().'static/backoffice/document/blutrading_ruc.jpg';?>" download="Ficha Ruc Blu Trading.jpg" class="btn btn-success" title="Descargar Ficha Ruc Blu Trading"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_presentacion_blu');?></td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/blu-trading.pdf';?>" download="Presentación Blu Trading.pdf" class="btn btn-success" title="Descargar Presentación Blu Trading"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_contrato_apertura');?></td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/contrato_apertura.pdf';?>" download="Contrato de Apertura.pdf" class="btn btn-success" title="Descargar Presentación Blu Trading"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_ficha_cliente');?></td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/ficha-cliente-natural.pdf';?>" download="Ficha Cliente Natural.pdf" class="btn btn-success" title="Descargar Presentación Blu Trading"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_contrato_poder');?></td>
                                                <td style="padding: 25px" class="text-center">
                                                    <a href="<?php echo site_url().'static/backoffice/document/power-of-attorney.pdf';?>" download="Power of Attormey.pdf" class="btn btn-success" title="Descargar Presentación Blu Trading"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-image-o fa-2x"/>
                                                </td>
                                                <td style="padding: 25px"><?=lang('idioma.b_ruc_trade');?></td>
                                                <td class="text-center" style="padding: 25px">
                                                    <a href="<?php echo site_url().'static/backoffice/document/tradeit_ruc.jpg';?>" download="Ficha Ruc Trade It Broker House.jpg" class="btn btn-success" title="Descargar Ficha Ruc Trade It Broker House"><i class="fa fa-download"></i> <?=lang('idioma.b_descargar');?></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>
</section>