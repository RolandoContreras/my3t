function ver_detalle(pay_id){
        var url= 'dashboard/cobros_details/'+pay_id;
	location.href = site+url;
}
        
function pagado(pay_id,first_name,username,amount,email){
    bootbox.dialog("Confirma que desea marcar como pagado?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/cobros/pagado",
               dataType: "json",
               data: {pay_id : pay_id,
                      first_name:first_name,
                      username:username,
                      amount:amount,
                      email:email},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}

function devolver(pay_id,first_name,username,amount,email){
    bootbox.dialog("Confirma que desea marcar como devuelto?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
           $.ajax({
               type: "post",
               url: site+"dashboard/cobros/devolver",
               dataType: "json",
               data: {pay_id : pay_id,
                      first_name:first_name,
                      username:username,
                      amount:amount,
                      email:email},
               success:function(data){                             
               location.reload();
               }         
           });
           }
        }
    ]);
}