$(document).ready(function() {
	//Sonido
	ion.sound({
		sounds: [
				{name: "button_tiny"}
				],
		path: "../vendor/ion.sound/sounds/",
		preload: true,
		volume: 1.0
	});
})

NotificacionesMensajes();
//NotificacionesGeneralCount();
setInterval(CierreSesion, 20000);
setInterval(NotificacionesMensajes, 20000);
//setInterval(NotificacionesGeneralCount, 20000);

function CierreSesion(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "../includes/ajax.php", 
		data: {"CierreSesionAutomatic":1},
		success: function(result){
			if(result.rps){
				swal({
                    title: "Sesion Expirada", 
                    text: result.mensaje, 
                    type: "error",  
                    confirmButtonText: "Ok",   
                    closeOnConfirm: false,  
                    showCancelButton: false,
                    confirmButtonColor: "#24b145",
                    cancelButtonText: "No"
                    }, 
                    function(isConfirm){ 
                        if(isConfirm){  
                            window.location='logout';
                        } 
                });
				
			}
		},error: function(){ 
			//alert('Se ha producido un error, por favor contacte con soporte. CIERRE DE SESION'); 	
		}
	});
}

function NotificacionesMensajes(){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "../includes/ajax.php", 
		data: {"NotificacionMensajesCount":1},
		async:true,    
		success: function(result){

			if(result.alertNotif==1){
				$.notify({
		          	"status":"success", 
		          	"pos":"bottom-right",
		          	"message": '<em class="icon-envelope-open"></em> Te han enviado un nuevo mensaje!'
		        });

				ion.sound({
				    sounds: [
				        	{name: "button_tiny"}
				        	],
				    path: "../vendor/ion.sound/sounds/",
				    preload: true,
				    volume: 1.0
				});

				ion.sound.play("button_tiny");
			}

			if(result.rps){
				$(".count-mensajes").text(result.total);
				//$(".list-notificacion-sis").html(result.noti_registros);
			}
		},error: function(){ 
			//alert('Se ha producido un error, por favor contacte con soporte. NOTIFICACIONES'); 	
		}
	});
}

function LenguajeSystem(lenguaje){
	$.ajax({
		type: "POST",
		dataType: "json",
		url: "../includes/ajax/ajax_multiidioma.php", 
		data: {"CambioDeLenguajeSystem":lenguaje},
		async: true,
		success: function(result){
			if(result.rps){
				location.reload();
			}
		},error: function(){ 
			//alert('Ha habido un problema'); 	
		}
	});
}