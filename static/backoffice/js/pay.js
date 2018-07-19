function enviar_pago(){
    monto =  $('select[name=monto]').val();
    if(monto != ""){
       $.ajax({
       type: "post",
       url: site+"backoffice/pagos/validar",
       dataType: "json",
       data: {monto : monto},
       success:function(data){
          location.reload();
       }         
   });
    }
}
