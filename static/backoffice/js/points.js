function consultar_date(){
        var datepicker1 = document.getElementById("datepicker1").value;
        var datepicker2 = document.getElementById("datepicker2").value;

        $.ajax({
        type: "post",
        url: site +"b_points/validate",
        dataType: "json",
        data: {datepicker1: datepicker1,
               datepicker2: datepicker2},
        success:function(data){            
              if(data.message == "true"){  
                    obj_points = data.print;
                    var texto = "";
                    var x = 0;               
                    $.each(obj_points, function(){
                        texto = texto+'<tr>';
                        texto = texto+'<td>'+obj_points[x]['date']+'</td>';
                        texto = texto+'<td style="text-transform: uppercase;">'+obj_points[x]['name']+'</td>';
                        texto = texto+'<td>'+obj_points[x]['point']+'</td>';
                        texto = texto+'<td>Abonado</td>';
                        texto = texto+'<td></td>';
                        texto = texto+'<td></td>';
                        texto = texto+'</tr>';
                        x++; 
                    });
                    $("#table_data").html(texto);
            }else{
                    var texto = "";
                    texto = texto+'<tr>';
                    texto = texto+'<td colspan="6" class="dataTables_empty" valign="top">No data available in table</td>';
                    texto = texto+'</tr>';
                    $("#table_data").html(texto);
            }
        }            
    });
}