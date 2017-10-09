  <!-- Main section-->
  <section>
      <div class="section-heading row">
        <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
            <h1 class="title text-uppercase"><?php echo replace_vocales_voculeshtml("Información");?></h1>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
            <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
        </div>
    </div> 
      <div class="row">
        <div class="col-lg-12">
          <div id="panelDemo14" class="panel panel-info">
                <div class="panel-body">
                    <div id="archivos_subidos">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">Tipo</th>
                                                <th style="width: 250px;">Nombre</th>
                                                <th style="width: 50px;" class="text-center">Acción</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td>Ficha RUC (PDF)</td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/ficha_ruc_bitshare.pdf';?>" download="ficha_ruc_bitshare" class="btn btn-primary" title="Descargar Ficha Ruc">Descargar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td>Registro Especial de Comercializadores y Procesadores de ORO (PDF)</td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/registro_especial_de_comercializadores_y_procesadores_de_oro.pdf';?>" download="registro_de_comercializadores_oro" class="btn btn-primary" title="Descargar Registro de Comercializadores">Descargar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td><?php echo replace_vocales_voculeshtml("Plan de Acción (PDF)");?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/presentacion-bitshares.pptx';?>" download="presentacion_ppt_es" disabled="true" class="btn btn-primary" title="Descargar Presentación">Descargar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                <em class="fa fa-file-word-o fa-2x"/>
                                                </td>
                                                <td>Contrato Bitshare (DOCX)</td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/Contrato_de_Dsitribuidor_BITSHARE.docx';?>" download="contrato_distribuidor_bitshare" class="btn btn-primary" title="Descargar Contrato Bitshare">Descargar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                <em class="fa fa-file-image-o fa-2x"/>
                                                </td>
                                                <td>Cuenta Corriente Depositos BITSHARE (JPG)</td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/n_cuenta.jpg';?>" download="Numero_Cuenta_Bitshare.jpg" class="btn btn-primary" title="Descargar Número de Cuenta BITSHARE">Descargar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-pdf-o fa-2x"/>
                                                </td>
                                                <td>Plan de Compensación (PDF)</td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/presentacion_bitshare_espanol.pdf';?>" download="presentacion_pdf_es" class="btn btn-primary " title="Descargar Presentación">Descargar</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 25px">
                                                    <em class="fa fa-file-image-o fa-2x"/>
                                                </td>
                                                <td>Correos Corporativos (JPG)</td>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url().'static/plan/document/correos.jpg';?>" download="correos_corporativos" class="btn btn-primary" title="Descargar Correos">Descargar</a>
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
        <!--</div>-->
     

</section>