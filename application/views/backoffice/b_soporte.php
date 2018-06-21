<!-- Main section-->
      <section>
          <div class="section-heading row">
            <div class=" col-lg-9 col-md-8 col-sm-7 col-xs-12">
                <h1 class="title text-uppercase"><?php echo replace_vocales_voculeshtml("Pagos");?></h1>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 pull-right count-down-box">
                <a class="white"><?php echo "Precio del BITCOIN: "?><?php echo $price_btc;?></a>
            </div>
        </div>

<div class="content-dashboard">
<div class="row">
    <button class="btn-action pull-right" id="newtkt">Abrir un nuevo tiquet <i class="fa fa-plus-circle"></i></button>
  <br>
  <div class="col-md-12">
    <div class="" style="display: none ;" id="tkt-form">
      <br>
      <div class="panel teal">
        <div class="panel-heading">
          <div class="panel-title">
            Nuevo Ticket
          </div>
        </div>
          
        <div class="panel-body">
          <form class="new_ticket" id="new_ticket" enctype="multipart/form-data" action="/help" accept-charset="UTF-8" method="post">
              <input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="0Yj8kg+WH5fRQRI5SKx451l/OrNv3frNh4PvfIXKVO8sNw/9rB5xYXefKkNHpuWvIwsfoJ70uX0VYoNBxwAmIw==">
                    <div class="btn custom-select col-md-12 btn-ripple">
                      <label for="title"> Category </label>
                    <select name="ticket[title]" id="ticket_title"><option value=""></option>
                <option value="Direct bonus">Direct bonus</option>
                <option value="Reward bonus / Timer">Reward bonus / Timer</option>
                <option value="Binary Bonus">Binary Bonus</option>
                <option value="Matrix Bonus">Matrix Bonus</option>
                <option value="Monthly fee / Retirement Plan">Monthly fee / Retirement Plan</option>
                <option value="Change email and reset password">Change email and reset password</option>
                <option value="Bitcoin Deposit">Bitcoin Deposit</option>
                <option value="Wire transfer via Bank account / purchase of Bitc">Wire transfer via Bank account / purchase of Bitc</option>
                <option value="Payout / withdrawal Request">Payout / withdrawal Request</option>
                <option value="Leadership / Growing your Business">Leadership / Growing your Business</option></select>
                    </div>
    <input value="60856" type="hidden" name="ticket[user_id]" id="ticket_user_id">
    <input value="open" type="hidden" name="ticket[status]" id="ticket_status">
    
      <div class="col-md-12"><div class="inputer floating-label inputer-yellow"><div class="input-wrapper"><textarea label="Mensaje" color="yellow" class="form-control       js-auto-size" required="required" name="ticket[ticketmessages_attributes][0][message]" id="ticket_ticketmessages_attributes_0_message" cols="md-12"></textarea><label for="ticket_ticketmessages_attributes_0_message">Message</label></div></div></div>
      <input value="user" type="hidden" name="ticket[ticketmessages_attributes][0][kind]" id="ticket_ticketmessages_attributes_0_kind">
    
    <div class="col-md-12">
      Cargar captura de pantalla
      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
          <i class="ion-ios-folder-outline fileinput-exists"></i>
          <span class="fileinput-filename"></span>
        </div>
									<span class="input-group-addon btn btn-flat btn-default btn-file btn-ripple">
										<span class="fileinput-new">Seleccione el archivo</span>
										<span class="fileinput-exists">Cambiar</span>
                    <input type="file" name="ticket[ticket_attachments_attributes][0][attachment]" id="ticket_ticket_attachments_attributes_0_attachment">
									</span>
        <a href="#" class="input-group-addon btn btn-default fileinput-exists btn-ripple" data-dismiss="fileinput">Remover
        </a>
      </div>
    </div>
  
    <div class="col-md-12">
      Cargar captura de pantalla
      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
          <i class="ion-ios-folder-outline fileinput-exists"></i>
          <span class="fileinput-filename"></span>
        </div>
									<span class="input-group-addon btn btn-flat btn-default btn-file btn-ripple">
										<span class="fileinput-new">Seleccione el archivo</span>
										<span class="fileinput-exists">Cambiar</span>
                    <input type="file" name="ticket[ticket_attachments_attributes][1][attachment]" id="ticket_ticket_attachments_attributes_1_attachment">
									</span>
        <a href="#" class="input-group-addon btn btn-default fileinput-exists btn-ripple" data-dismiss="fileinput">Remover
        </a>
      </div>
    </div>
  
    <div class="col-md-12">
      Cargar captura de pantalla
      <div class="fileinput fileinput-new input-group" data-provides="fileinput">
        <div class="form-control" data-trigger="fileinput">
          <i class="ion-ios-folder-outline fileinput-exists"></i>
          <span class="fileinput-filename"></span>
        </div>
									<span class="input-group-addon btn btn-flat btn-default btn-file btn-ripple">
										<span class="fileinput-new">Seleccione el archivo</span>
										<span class="fileinput-exists">Cambiar</span>
                    <input type="file" name="ticket[ticket_attachments_attributes][2][attachment]" id="ticket_ticket_attachments_attributes_2_attachment">
									</span>
        <a href="#" class="input-group-addon btn btn-default fileinput-exists btn-ripple" data-dismiss="fileinput">Remover
        </a>
      </div>
    </div>
    <div class="col-md-12"><div class="inputer floating-label inputer-yellow"><div class="input-wrapper"><input size="md-12" label="Token" color="yellow" class="form-control" required="required" type="text" name="ticket[token]" id="ticket_token"><label for="ticket_token">Token</label></div></div></div>
    <input type="submit" name="commit" value="Create Ticket" class="btn btn-large btn-indigo pull-right btn-ripple">
</form><form id="ticket-token" class="new_token" action="/tokens" accept-charset="UTF-8" method="post"><input name="utf8" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="0Yj8kg+WH5fRQRI5SKx451l/OrNv3frNh4PvfIXKVO8sNw/9rB5xYXefKkNHpuWvIwsfoJ70uX0VYoNBxwAmIw==">
  <input value="60856" type="hidden" name="token[user_id]" id="token_user_id">
  <input value="open_ticket" type="hidden" name="token[token_type]" id="token_token_type">
  <input type="submit" name="commit" value="Request Token" class="btn btn-primary btn-ripple" id="submit-token">
</form>
        </div>
      </div>

    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel cyan">
      <div class="panel-heading">
        <div class="panel-title">
          Tickets cerrados
        </div>
      </div>
      <div class="panel-body">

          <table class="table">
            <thead>
            <tr>
              <td>Número de Ticket</td>
              <td>Asunto</td>
              <td>Creado</td>
              <td></td>
            </tr>
            </thead>
            <tbody>
              <tr>
                <td>198447</td>
                <td><a href="/help/198447">Payout / withdrawal Request</a></td>
                <td>02:06, December 08, 2017</td>
                <td><span class="label label-danger pull-right">Cerrado</span></td>
              </tr>
              <tr>
                <td>53034</td>
                <td><a href="/help/53034">Rewards/Bonus Programs</a></td>
                <td>13:34, May 05, 2017</td>
                <td><span class="label label-danger pull-right">Cerrado</span></td>
              </tr>
            </tbody>
          </table>
      </div>
    </div>
  </div>
</div>
</div>