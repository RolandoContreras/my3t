function alter_position(){
    var opts = {
        lines: 13 // The number of lines to draw
      , length: 28 // The length of each line
      , width: 14 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0.25 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: false // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
    }
    var target = document.getElementById('spinner')
    var spinner = new Spinner(opts).spin(target);
    
    var customer_id = document.getElementById("customer_id").value;
    var pierna = $("input[type='radio'][name='pierna']:checked").val();
    
        $.ajax({
        type: "post",
        url: site +"b_data/update_position",
        dataType: "json",
        data: {customer_id: customer_id,
               pierna: pierna},
        success:function(data){            
              if(data.message == "true"){  
                location.reload();
            }
        }            
    });
}
function alter_movil(){
    var opts = {
        lines: 13 // The number of lines to draw
      , length: 28 // The length of each line
      , width: 14 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0.50 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: true // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
    }
    var target = document.getElementById('spinner')
    var spinner = new Spinner(opts).spin(target);
    
    var phone = document.getElementById("phone").value;
    var customer_id = document.getElementById("customer_id").value;
    
        $.ajax({
        type: "post",
        url: site +"b_data/update_movil",
        dataType: "json",
        data: {phone: phone,
               customer_id: customer_id},
        success:function(data){            
              if(data.message == "true"){  
              location.reload();
            }
        }            
    });
}

function alter_address(){
    var opts = {
        lines: 13 // The number of lines to draw
      , length: 28 // The length of each line
      , width: 14 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0.25 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: true // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
    }
    
    var target = document.getElementById('spinner')
    var spinner = new Spinner(opts).spin(target);
    
    var address = document.getElementById("address").value;
    var customer_id = document.getElementById("customer_id").value;
    
        $.ajax({
        type: "post",
        url: site +"b_data/udpate_address",
        dataType: "json",
        data: {address: address,
               customer_id: customer_id
               },
        success:function(data){            
              if(data.message == "true"){  
                 location.reload();  
            }
        }            
    });
}


function alter_btc(){
    
    var opts = {
        lines: 13 // The number of lines to draw
      , length: 28 // The length of each line
      , width: 14 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0.25 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: true // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
    }
    
    var target = document.getElementById('spinner');
    var spinner = new Spinner(opts).spin(target);
    
        var customer_id = document.getElementById("customer_id").value;
        var btc = document.getElementById("btc").value;

        $.ajax({
        type: "post",
        url: site +"b_data/update_btc_address",
        dataType: "json",
        data: {btc: btc,
               customer_id:customer_id },
        success:function(data){            
              if(data.message == "true"){  
                location.reload();  
            }
        }            
    });
}

function alter_bank(){
    
        var customer_id = document.getElementById("customer_id").value;
        var bank_name = document.getElementById("bank_name").value;
        var titular_name = document.getElementById("titular_name").value;
        var bank_account = document.getElementById("bank_account").value;
        
        var opts = {
        lines: 13 // The number of lines to draw
      , length: 28 // The length of each line
      , width: 14 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0.25 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: true // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
    }
    
    var target = document.getElementById('spinner')
    var spinner = new Spinner(opts).spin(target);
        
        
        $.ajax({
        type: "post",
        url: site +"b_data/update_bank",
        dataType: "json",
        data: {customer_id:customer_id,
               bank_name:bank_name,
               titular_name:titular_name,
               bank_account:bank_account,
            },
        success:function(data){            
              if(data.message == "true"){
                 location.reload();   
            }
        }            
    });
}

function alter_password(){
        var customer_id = document.getElementById("customer_id").value;
        var password_one = document.getElementById("password_one").value;
        var password_two = document.getElementById("password_two").value;
        
       var opts = {
        lines: 13 // The number of lines to draw
      , length: 28 // The length of each line
      , width: 14 // The line thickness
      , radius: 42 // The radius of the inner circle
      , scale: 1 // Scales overall size of the spinner
      , corners: 1 // Corner roundness (0..1)
      , color: '#000' // #rgb or #rrggbb or array of colors
      , opacity: 0.25 // Opacity of the lines
      , rotate: 0 // The rotation offset
      , direction: 1 // 1: clockwise, -1: counterclockwise
      , speed: 1 // Rounds per second
      , trail: 60 // Afterglow percentage
      , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
      , zIndex: 2e9 // The z-index (defaults to 2000000000)
      , className: 'spinner' // The CSS class to assign to the spinner
      , top: '50%' // Top position relative to parent
      , left: '50%' // Left position relative to parent
      , shadow: true // Whether to render a shadow
      , hwaccel: false // Whether to use hardware acceleration
      , position: 'absolute' // Element positioning
    }
        
        
        if(password_one == password_two){
            var target = document.getElementById('spinner')
            var spinner = new Spinner(opts).spin(target);
                $.ajax({
                    type: "post",
                    url: site + "b_data/update_password",
                    dataType: "json",
                    data: {customer_id: customer_id,
                           password_one: password_one
                       },
                    success:function(data){            
                            if(data.message == "true"){         
                            $(".alert-1").removeClass('text-danger').addClass('text-success').html(data.print);
                            spinner.spin(stop);
                        }else{
                            $(".alert-1").removeClass('text-success').addClass('text-danger').html(data.print)
                            spinner.spin(stop);
                        }
                    }            
                });
        }else{
           $(".alert-1").removeClass('text-success').addClass('text-danger').html("Las contraseñas no coinciden");
        }
}

function validate_password(password){
        var customer_id = document.getElementById("customer_id").value;
        $.ajax({
        type: "post",
        url: site + "b_data/validate_password",
        dataType: "json",
        data: {password: password,
               customer_id: customer_id},
        success:function(data){            
                if(data.message == "true"){         
                $(".alert-0").removeClass('text-danger').addClass('text-success').html(data.print);
                    document.form.password_one.disabled = false;
                    document.form.password_two.disabled = false;
            }else{
                $(".alert-0").removeClass('text-success').addClass('text-danger').html(data.print)
            }
        }            
    });
}