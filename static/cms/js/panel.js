


function message_public(){
    
    data = new FormData(document.forms.namedItem("upload_form"));
    
        if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe seleccionar la imagen</div>  ');
        }else{
            if($('#message').val() == ''){
                $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe llenar el campo Mensaje</div>  ');
            }else{
                $.ajax({
                url : site+'dashboard/panel/masive_messages',
                method: "POST",
                data: new data,
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#uploaded_image").html(data);
                }
            });
            }
        }
}
function guardar_btc(comment_id){
    
    btc_price = $("#btc_price").val();
    
     bootbox.dialog("Confirma que desea guardar el precio del bitcoin?", [        
        { "label" : "Cancelar"},
        {
            "label" : "Confirmar",
            "class" : "btn-success",
            "callback": function() {
               $.ajax({
                   type: "post",
                   url: site+"dashboard/panel/guardar_btc",
                   dataType: "json",
                   data: {btc_price : btc_price},
                   success:function(data){                             
                   location.reload();
                   }         
           });
            }
        }
    ]);
}
//function message_public(){
//    
//    var title = $("#title").val();
//    var message_content = $("#message_content").val();
//    var image_file = $("#image_file").val();
//    
////    alert(img);
//    
//     bootbox.dialog("Confirma que desea enviar el mensaje?", [        
//        { "label" : "Cancelar"},
//        {
//            "label" : "Confirmar",
//            "class" : "btn-success",
//            "callback": function() {
//               $.ajax({
//                   type: "post",
//                   url: site+"dashboard/panel/masive_messages",
//                   dataType: "json",
//                   data: {title:title,
//                          message_content:message_content,
//                          image_file:image_file},
//                   success:function(data){                             
//                        bootbox.dialog(data.message, [        
//                            { "label" : "Cerrar"}
//                        ]);
////                   location.reload();
//                   }         
//           });
//            }
//        }
//    ]);
//}