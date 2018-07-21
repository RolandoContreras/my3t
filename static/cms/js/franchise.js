function send(){    
var url = 'dashboard/membresias/validate';
if($('#image_file').val() == ''){
            $("#uploaded_image").html('<div class="alert alert-danger" style="text-align: center">Debe seleccionar la imagen</div>  ');
        }else{
                $.ajax({
                url : site+url,
                method: "POST",
                data:new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success:function(data){
                    $("#uploaded_image").html(data);
                }
            });
        }
}

function edit_franchise(range_id){    
     var url = 'dashboard/membresias/load/'+range_id;
     location.href = site+url;   
}
function nuevo_users(){
	var url= 'dashboard/membresias/load';
	location.href = site+url;
}
function cancel_franchise(){
	var url= 'dashboard/membresias';
	location.href = site+url;
}