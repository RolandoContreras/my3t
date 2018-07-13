function edit_pay(pay_id){    
     var url = 'dashboard/pagos/load/'+pay_id;
     location.href = site+url;   
}
function cancel_pay(){
	var url= 'dashboard/pagos';
	location.href = site+url;
}
function ver_detalle(pay_id){
        var url= 'dashboard/pagos_details/'+pay_id;
	location.href = site+url;
}
function validate_customer(customer_id){
        $.ajax({
        type: "post",
        url: site + "dashboard/pagos/validate_customer",
        dataType: "json",
        data: {customer_id: customer_id},
        success:function(data){            
            if(data.message == "true"){
                document.getElementById("username").value=data.username;    
                document.getElementById("name").value=data.name;
                $("#alert_message").html(data.print);
            }else{
                $("#alert_message").html(data.print);
            }
        }            
    });
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
               url: site+"dashboard/pagos/pagado",
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
               url: site+"dashboard/pagos/devolver",
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