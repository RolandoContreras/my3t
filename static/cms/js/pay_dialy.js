function nuevo_pago(comment_id){
     bootbox.dialog("Confirma que desea realizar el pago de hoy?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/pagos_diarios/hacer_pago",
                   dataType: "json",
                   data: {comment_id : comment_id},
                   success:function(data){                             
                       if(data.message == "true") {
                           bootbox.dialog("Se realizó con éxito los pagos", [        
                                    { "label" : "Cancelar"},
                                    ]);
                       }
                       location.reload();
                   }         
           });
            }
        }
    ]);
}
