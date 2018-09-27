function send_messages(){
   var username = $("#usuario").val();     
   var response = grecaptcha.getResponse();
        if(response.length == 0){
            document.getElementById("message_capcha").style.display = "block";
        }else{
            document.getElementById("message_capcha").style.display = "none";
            if(username != ""){
                $.ajax({
                type: "post",
                url: "forgot/send_messages",
                dataType: "json",
                data: {username:username},
                success:function(data){            
                    if (data.message == "false"){                         
                        document.getElementById("alert_message").style.display="block";
                    }else{
                        document.getElementById("alert_message").style.display="none";
                        document.getElementById("alert_message_success").style.display="block";

                    }
                    }            
                });
            }else{
                $("#alert_message").show();
            }
        }
}