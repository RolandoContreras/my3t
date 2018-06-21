function consultar(){

    concepto =  $('select[name=concepto]').val();
    
    if(concepto == 1){
        var url= 'backoffice/comisiones/referred';
	location.href = site+url;
    }else if(concepto == 2){
        var url= 'backoffice/comisiones/teambuilder';
	location.href = site+url;
    }else if(concepto == 3){
        var url= 'backoffice/comisiones/productor';
	location.href = site+url;
    }else if(concepto == 4){
        var url= 'backoffice/comisiones/performance';
	location.href = site+url;
    }else if(concepto == 5){
        var url= 'backoffice/comisiones/unilevel';
	location.href = site+url;
    }else if(concepto == 6){
        var url= 'backoffice/comisiones/global';
	location.href = site+url;
    }else if(concepto == 7){
        var url= 'backoffice/comisiones/binary';
	location.href = site+url;
    }else{
        var url= 'backoffice/comisiones/referred';
	location.href = site+url;
    }
          
}
function edit_customer(product_id){    
     var url = 'dashboard/clientes/load/'+product_id;
     location.href = site+url;   
}
function cancelar_customer(){
	var url= 'dashboard/clientes';
	location.href = site+url;
}
