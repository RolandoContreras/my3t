function edit_informative(otros_id){
     bootbox.dialog("¿Confirma que desea editar el contenido?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/informativos/edit_informative",
                   dataType: "json",
                   data: {otros_id : otros_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}

function new_informative(){
        var url= 'dashboard/informativos/load';
	location.href = site+url;
}
function nuevo_users(){
	var url= 'dashboard/usuarios/load';
	location.href = site+url;
}

function delete_informative(otros_id){
     bootbox.dialog("¿Confirma que desea eliminar el registro?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-warning",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/informativos/delete_informative",
                   dataType: "json",
                   data: {otros_id : otros_id},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
function cancelar_informative(){
	var url= 'dashboard/informativos';
	location.href = site+url;
}
