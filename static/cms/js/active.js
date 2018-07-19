function active_financiada(customer_id){
    bootbox.dialog("Confirma que desea activar como financiada?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/activaciones/active_financy",
               dataType: "json",
               data: {customer_id : customer_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}
function active(customer_id,point,parents_id,position,identificador){
    bootbox.dialog("Confirma que desea activar la cuenta?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/activaciones/active",
               dataType: "json",
               data: {customer_id : customer_id,
                      point:point,
                      parents_id : parents_id,
                      position : position,
                      identificador : identificador
                      },
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}
function update_confirmation(activation_message_id,status){
    bootbox.dialog("Confirma que desea marcar activo?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/activaciones/update_confirmation",
               dataType: "json",
               data: {status : status,
                      activation_message_id : activation_message_id},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}