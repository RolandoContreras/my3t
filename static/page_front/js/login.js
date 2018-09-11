$(document).ready(function() {
    $("#form-login").validate({
        rules: {
            username: { required: true, minlength: 2},
            password: { required: true, minlength: 2}
        },
        messages: {
            username: "Por favor introduzca su usuario",
            password : "Por favor introduzca su contraseña",
        },
        submitHandler: function(form){
            var dataString = $('#username').val()+'&'+$('#password').val();
            $.ajax({
                type: "POST",
                url: site + "login/validar_customer",
                data: {dataString : dataString},
                success: function(data){
                    if(data == "true"){
                        $("#alert_message").html('<div class="alert alert-success" style="text-align: center">Welcome</div>');
                        location.href = site + "backoffice";
                    }else{
                        $("#alert_message").html(data);
                    }
                    
                }
            });
        }
    });
});