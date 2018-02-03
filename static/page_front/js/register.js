$(document).ready(function() {
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
    // I use element.value instead value here, value parameter was always null
    return arg != element.value; 
}, "Value must not equal arg.");
    
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
            var dataString = $('#usuario').val()+'&'+$('#name').val()+'&'+$('#clave').val()+'&'+$('#last_name').val()+'&'+$('#address').val()+'&'+$('#telefono').val()+'&'+$('#dni').val()+'&'+$('#email').val()+'&'+$('#dia').val()+'&'+$('#mes').val()+'&'+$('#ano').val()+'&'+$('#pais').val()+'&'+$('#region').val()+'&'+$('#city').val()+'&'+$('#customer_id').val();
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

function validate_2passwordr(password2) {
        var password1 = document.getElementById("clave").value;
        var password2 = document.getElementById("repita_clave").value;
        if(password1 == password2){
            $(".alert-1").removeClass('text-danger').addClass('text-success').html("Las contrase&ntilde;as coinciden <i class='fa fa-check-square-o' aria-hidden='true'></i>");
        }else{
            $(".alert-1").removeClass('text-success').addClass('text-danger').html("Las contrase&ntilde;as no coinciden <i class='fa fa-times-circle-o' aria-hidden='true'></i>");
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

function crear_registro() {
    var opts = {
  lines: 13 // The number of lines to draw
, length: 28 // The length of each line
, width: 14 // The line thickness
, radius: 42 // The radius of the inner circle
, scale: 1 // Scales overall size of the spinner
, corners: 1 // Corner roundness (0..1)
, color: '#000' // #rgb or #rrggbb or array of colors
, opacity: 0.25 // Opacity of the lines
, rotate: 0 // The rotation offset
, direction: 1 // 1: clockwise, -1: counterclockwise
, speed: 1 // Rounds per second
, trail: 60 // Afterglow percentage
, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
, zIndex: 2e9 // The z-index (defaults to 2000000000)
, className: 'spinner' // The CSS class to assign to the spinner
, top: '50%' // Top position relative to parent
, left: '50%' // Left position relative to parent
, shadow: false // Whether to render a shadow
, hwaccel: false // Whether to use hardware acceleration
, position: 'absolute' // Element positioning
};
var target = document.getElementById('spinner');
var spinner = new Spinner(opts).spin(target);
    
       var clave = document.getElementById("clave").value;
       var  repita_clave = document.getElementById("repita_clave").value;
       
            if(clave == repita_clave){
               var customer_id = document.getElementById("customer_id").value;
               var pierna_customer = document.getElementById("pierna_customer").value;
               var usuario = document.getElementById("usuario").value;
               var name = document.getElementById("name").value;
               var last_name = document.getElementById("last_name").value;
               var dni = document.getElementById("dni").value;
               var email = document.getElementById("email").value;
               
               var address = document.getElementById("address").value;
               var telefono = document.getElementById("telefono").value;
               var city = document.getElementById("city").value;
               
               var dia = $("#dia").val();
               var mes = $("#mes").val();  
               var ano = $("#ano").val();  
               var pais = $("#pais").val();  
               var region = $("#region").val();  


                $.ajax({
                       type: "post",
                       url: site + "register/crear_registro",
                       dataType: "json",
                       data: {customer_id: customer_id,
                              pierna_customer: pierna_customer,
                              usuario: usuario,
                              clave: clave, 
                              name: name,
                              last_name: last_name,
                              address: address,
                              telefono: telefono,
                              dni: dni,
                              email: email,
                              dia: dia,
                              mes: mes,
                              ano: ano,
                              pais: pais,
                              region: region,
                              city: city},
                          
                       success:function(data){            
                               if(data.message == "true"){         
                                $(location).attr('href',data.url);    
                           }else{
                               spinner.stop(); 
                                llene_campos();   
                           }
                       }            
                   });
                
            }else{
               $(".alert-4").removeClass('text-danger').addClass('text-danger').html("Las contraseñas no coinciden");
            }
}
function llene_campos() {
    w2popup.open({
        title: 'Mensaje',
        body: '<div class="w2ui-centered">Debe llenar todos los campos.</div>'
    });
}
function enviado_correcto() {
    w2popup.open({
        title: 'Felicidades',
        body: '<div class="w2ui-centered">Registro creado con éxito</div>'
    });
}
function exito() {
    w2popup.open({
        title: 'Felicidades',
        body: '<div class="w2ui-centered">Registro creado con éxito</div>'
    });
}
function contraseñas() {
    w2popup.open({
        title: 'Mensaje',
        body: '<div class="w2ui-centered">Las contraseñas no coinciden.</div>'
    });
}
