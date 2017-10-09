function send_messages(){
    
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
    }
    var target = document.getElementById('spinner');
    var spinner = new Spinner(opts).spin(target);
    
    
    name = $("#name").val();    
    email = $("#email").val();     
    message = $("#message").val();
    subject = $("#subject").val();
    
    if(name != "" && email != "" && message != "" && subject != ""){
        $.ajax({
        type: "post",
        url: "contact/send_messages",
        dataType: "json",
        data: {name : name, email:email, message:message,subject:subject},
        success:function(data){            
            if (data.message == "false"){                         
                spinner.stop(); 
                no_enviado();
            }else{
                spinner.stop(); 
                enviado_correcto();
            }
        }            
        });
    }else{
        spinner.stop(); 
        llene_campos();
    }
}

function enviado_correcto(){
    w2popup.open({
        title: 'Felicidades',
        body: '<div class="w2ui-centered">Mensaje enviado correctamente</div>'
    });
}function no_enviado() {
    w2popup.open({
        title: 'Mensaje',
        body: '<div class="w2ui-centered">El Mensaje no pudo enviarse.</div>'
    });
}function no_login() {
    w2popup.open({
        title: 'Mensaje',
        body: '<div class="w2ui-centered">Usuario y/o contraseña incorrecta.</div>'
    });
}
function llene_campos() {
    w2popup.open({
        title: 'Mensaje',
        body: '<div class="w2ui-centered">Debe llenar todos los campos.</div>'
    });
}
function mensaje_home(){
    w2popup.open({
        title: 'Mensaje Importante',
        body: '<div class="w2ui-centered">Buenos días nuevos asociados de CRIPWOTIN (CW) la fecha del lanzamiento de la compañía se dará a cabo el día viernes 01 de septiembre, en donde se abrirá la sección de registros para que puedas asociarte a nuestra empresa. Los pre registros para líderes principales o códigos master se están manejando directamente con las personas encargas del proyecto, si tú eres uno de ellos comunícate con la persona que te dio la información y sé parte de los primeros códigos de CW. \n\ Para mayor información puedes comunicarte con nosotros en la sección de contacto gracias. GERENCIA CRIPWOTIN</div>'
    });
}
