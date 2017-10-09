function change_state(comment_id){
     bootbox.dialog("Confirma que desea marcar como leído en Comentario?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/comentarios/cambiar_status",
                   dataType: "json",
                   data: {comment_id : comment_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}

function change_state_no(comment_id){
     bootbox.dialog("Confirma que desea no publicar el Comentario?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/comentarios/cambiar_status_no",
                   dataType: "json",
                   data: {comment_id : comment_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
