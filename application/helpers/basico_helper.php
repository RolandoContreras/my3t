<?php
function corta_texto($texto, $longitud=400) { 
    if((mb_strlen($texto) > $longitud)) {
        $pos_espacios = mb_strpos($texto, ' ', $longitud) - 1;
        if($pos_espacios > 0) {
            $caracteres = count_chars(mb_substr($texto, 0, ($pos_espacios + 1)), 1);
            $texto = mb_substr($texto, 0, ($pos_espacios + 1)).'...';
        }
        if(preg_match_all("|(<([\w]+)[^>]*>)|", $texto, $buffer)) {
            if(!empty($buffer[1])) {
                preg_match_all("|</([a-zA-Z]+)>|", $texto, $buffer2);
                if(count($buffer[2]) != count($buffer2[1])) {
                    $cierrotags = array_diff($buffer[2], $buffer2[1]);
                    $cierrotags = array_reverse($cierrotags);
                    foreach($cierrotags as $tag) {
                            $texto .= '</'.$tag.'>';
                    }
                }
            }
        } 
    }
    return $texto; 
}

function convert_slug($url){
    $search  = array('á', 'é', 'í', 'ó', 'ú',' ','ñ','Á', 'É', 'Í', 'Ó', 'Ú');
    $replace = array('a', 'e', 'i', 'o', 'u','-','n','a', 'e', 'i', 'o', 'u');    
    return strtolower(str_replace($search, $replace, $url));
}

function convert_query($slug){
    $search  = array('-');
    $replace = array(' ');    
    return strtolower(str_replace($search, $replace, $slug));
}

function format_number($number){
    $decimals ="2";
    $number = number_format($number, $decimals);
    return "S/.".$number;
}

function formato_fecha($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);
    
    $dia_semana = dia_semana($mes,$dia,$anio);
    $mostrar_mes = mostrar_mes($mes);
    return  $dia_semana." ".$dia." de ".$mostrar_mes." del ".$anio;
}

function dia_semana($mes,$dia,$anio){
    $dia= date("w",mktime(0, 0, 0, $mes, $dia, $anio));
    switch ($dia) {
        case 0:
            $dia_semana = "Domingo";
            break;
        case 1:
            $dia_semana = "Lunes";
            break;
        case 2:
            $dia_semana = "Martes";
            break;
        case 3:
            $dia_semana = "Miercoles";
            break;
        case 4:
            $dia_semana = "Jueves";
            break;
        case 5:
            $dia_semana = "Viernes";
            break;
        case 6:
            $dia_semana = "Sabado";
            break;
    }
    return $dia_semana;
}

function mostrar_mes($mes){
	switch($mes){
		case 1:
		$nom_mes = "Enero";
		break;
		
		case 2: 
		$nom_mes = "Febrero";
		break;
		 
		case 3:
		$nom_mes = "Marzo";
		break;
		 
		case 4:
		$nom_mes = "Abril";
		break;
		 
		case 5:
		$nom_mes = "Mayo";
		break;
		 
		case 6:
		$nom_mes = "Junio";
		break;
		 
		case 7:
		$nom_mes = "Julio";
		break;
		 
		case 8:
		$nom_mes = "Agosto";
		break;
		 
		case 9:
		$nom_mes = "Septiembre";
		break;
		 
		case 10:
		$nom_mes = "Octubre";
		break;
		 
		case 11:
		$nom_mes = "Noviembre";
		break;
		 
		case 12:
		$nom_mes = "Diciembre";
		break;
		
	}
	return $nom_mes;
}

function get_tag($list_tags, $tag){
    $tags = explode(",",$list_tags);        
    $retorno  = "";    
    foreach ($tags as $value) {
        if ($value==$tag){
            $retorno = "selected=''";
        }
    }    
    return $retorno;
}

function formato_fecha_barras($fecha){    
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4);    
    return  $dia."/".$mes."/".$anio;
}

function convert_formato_fecha_db($day,$month,$year){    
    return $year."/".$month."/".$day;
}

function formato_fecha_db_time($fecha){   
    $dia=substr($fecha, 8, 2);
    $mes=substr($fecha, 5, 2);
    $anio=substr($fecha, 0, 4); 
    return $anio."/".$mes."/".$dia;
}

function get_day_number($fecha){    
    $dia=substr($fecha, 8, 2);
    return  $dia;
}

function get_month_number($fecha){    
    $mes=substr($fecha, 5, 2);
    return  $mes;
}

function get_year_number($fecha){    
    $anio=substr($fecha, 0, 4); 
    return  $anio;
}

function first_capital_letter($name){    
    $name = ucwords($name);
    return  $name;
}

function str_to_minuscula($str){
    $str = trim(strtolower($str));
    return  $str;
}

function get_semilla(){
    $semilla='ab513c75f48d82bcd30aa48e478d2e6e';
    return $semilla;
}

function replace_vocales_voculeshtml($str){
    $search  = array('á', 'é', 'í', 'ó', 'ú','Á', 'É', 'Í', 'Ó', 'Ú', '¿', 'ñ', 'Ñ');
    $replace = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;','&Aacute;','&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&iquest;', '&ntilde;','&Ntilde;');    
    return str_replace($search, $replace, $str);
    
}
?>