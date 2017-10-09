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
function active(customer_id,price,parents_id){
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
                      parents_id : parents_id,
                      price:price},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}