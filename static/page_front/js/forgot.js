function send_messages(){
   var username = $("#usuaio").val();     
    if(username != ""){
        $.ajax({
        type: "post",
        url: "forgot/send_messages",
        dataType: "json",
        data: {username:username},
        success:function(data){            
            if (data.message == "false"){                         
                
            }else{
                
            }
            }            
        });
    }
}