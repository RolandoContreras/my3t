function send_messages(){
   var username = $("#usuario").val();     
    if(username != ""){
        $.ajax({
        type: "post",
        url: "forgot/send_messages",
        dataType: "json",
        data: {username:username},
        success:function(data){            
            if (data.message == "false"){                         
                $("#alert_message").html('<div class="alert alert-danger" style="text-align: center">Usuario no registrado</div>'); 
            }else{
                $("#alert_message").html('<div class="alert alert-success" style="text-align: center">Se envió un mensaje al e-mail registrado</div>'); 
            }
            }            
        });
    }else{
        $("#alert_message").html('<div class="alert alert-danger" style="text-align: center">Ingrese Usuario</div>'); 
    }
}