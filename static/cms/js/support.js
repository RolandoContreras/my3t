function actualizar_soporte(message_id,number){
    
    var message  = document.getElementById(number).value;
    bootbox.dialog("Confirma que desea actualizar?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/soporte/update",
               dataType: "json",
               data: {message_id : message_id,
                      message:message
                      },
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}