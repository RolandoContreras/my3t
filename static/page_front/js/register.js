$(document).ready(function() {
    $("#form-register").validate({
      rules: {
            usuario: { required: true, minlength: 2},
            clave: { required: true, minlength: 4},
            repita_clave: {required: true, minlength: 4, equalTo: "#clave"},
            name: { required: true, minlength: 2},
            last_name: { required: true, minlength: 2},
            address: { required: true, minlength: 2},
            telefono: { required: true, minlength: 2},
            dni: { required: true, minlength: 2, number: true},
            email: { required:true, email: true},
            dia: { required:true},
            mes: { required:true},
            ano: { required:true},
            pais: { required:true},
            region: { required:true},
            city: { required:true, minlength: 2}
                    },
        messages: {
            usuario: "Por favor introduzca su usuario.",
            name: "Por favor introduzca su nombre.",
            clave: "Por favor introduzca una contraseña mínimo valor 4 caracteres.",
            last_name: "Por favor introduzca su apellido.",
            repita_clave: "Por favor introduzca el mismo valor.",
            address: "Por favor introduzca su dirección.",
            telefono: "Por favor introduzca su teléfono.",
            dni: "Por favor introduzca su documento de identidad solo números.",
            dia: "Por favor introduzca el día de nacimiento.",
            mes: "Por favor introduzca el mes de nacimiento.",
            ano: "Por favor introduzca el año de nacimiento.",
            pais: "Por favor introduzca su país.",
            region : "Por favor introduzca su región.",
            city: "Por favor introduzca su ciudad.",
            email : "Por favor introduzca un e-mail válido."
        },
        submitHandler: function(form){
            var dataString = $('#usuario').val()+'&'+$('#name').val()+'&'+$('#clave').val()+'&'+$('#last_name').val()+'&'+$('#address').val()+'&'+$('#telefono').val()+'&'+$('#dni').val()+'&'+$('#email').val()+'&'+$('#dia').val()+'&'+$('#mes').val()+'&'+$('#ano').val()+'&'+$('#pais').val()+'&'+$('#region').val()+'&'+$('#city').val()+'&'+$('#customer_id').val()+'&'+$('#pierna_customer').val()+'&'+$('#point_left').val()+'&'+$('#point_rigth').val()+'&'+$('#identificador').val();
            $.ajax({
                type: "POST",
                url: site + 'register/crear_registro',
                data: {dataString : dataString},
                success: function(data){
                        $("#alert_message").html(data);
                }
            });
        }
    });
});
function validate_username(username){
    if(username == ""){
        $(".alert-0").removeClass('text-success').addClass('text-danger').html("Usuario Invalido <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
    }else{
        $.ajax({
        type: "post",
        url: site + "register/validate_username",
        dataType: "json",
        data: {username: username},
        success:function(data){            
            if(data.message == "true"){         
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print);
            }else{
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
            }
        }            
        });
    }
}
function validate_2passwordr(password2) {
        var password1 = document.getElementById("clave").value;
        var password2 = document.getElementById("repita_clave").value;
        
        if(password1 == "" && password2 == ""){
            $(".alert-1").removeClass('text-success').addClass('text-danger').html("Contrase&ntilde;as Invalida <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
        }else{
             if(password1 == password2){
                    $(".alert-1").removeClass('text-danger').addClass('text-success').html("Las contrase&ntilde;as coinciden <i class='fa fa-check-square-o' aria-hidden='true'></i>");
                }else{
                    $(".alert-1").removeClass('text-success').addClass('text-danger').html("Las contrase&ntilde;as no coinciden <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
                }
        }
    }

function validate_region(id) {
        $.ajax({
        type: "post",
        url: site + "register/validate_region",
        dataType: "json",
        data: {id: id},
        success:function(data){            
                if(data.message == "true"){         
                    obj_region = data.print;
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar  Región</option>';
                    var x = 0;               
                    $.each(obj_region, function(){
                        texto = texto+'<option value="'+obj_region[x]['id']+'">'+obj_region[x]['nombre']+'</option>';
                        x++; 
                    });
                    $("#region").html(texto);
            }else{
                    var texto = "";
                    texto = texto+'<option value="">Seleccionar País</option>';
                    $("#region").html(texto);
            }
        }            
    });
}
function Numtext(string){//solo letras y numeros
    var out = '';
    //Se añaden las letras validas
    var filtro = 'abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890';//Caracteres validos
    for (var i=0; i<string.length; i++)
       if (filtro.indexOf(string.charAt(i)) != -1) 
	     out += string.charAt(i);
    return out;
}