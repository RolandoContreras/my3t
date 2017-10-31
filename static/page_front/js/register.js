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
                    texto = texto+'<option value="">Seleccionar  Regi&oacuten</option>';
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
