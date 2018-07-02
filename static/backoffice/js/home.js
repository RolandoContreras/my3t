function make_pedido(franchise_id){
        $.ajax({
        type: "post",
        url: site +"b_home/make_pedido",
        dataType: "json",
        data: {franchise_id: franchise_id},
        success:function(data){            
                if(data.message == "true"){
                    location.reload();
                }
        }            
    });
}