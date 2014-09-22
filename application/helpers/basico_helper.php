<?php
function corta_texto($texto, $longitud=400) { 
    if((mb_strlen($texto) > $longitud)) {
        $pos_espacios = mb_strpos($texto, ' ', $longitud) - 1;
        if($pos_espacios > 0) {
            $caracteres = count_chars(mb_substr($texto, 0, ($pos_espacios + 1)), 1);
            /*if ($caracteres[ord('<')] > $caracteres[ord('>')]) {
                $pos_espacios = mb_strpos($texto, ">", $pos_espacios) - 1;
            }*/
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
    $search  = array('á', 'é', 'í', 'ó', 'ú',' ','ñ');
    $replace = array('a', 'e', 'i', 'o', 'u','-','n');    
    return strtolower(str_replace($search, $replace, $url));
}

function get_semilla(){
    $semilla='ab513c75f48d82bcd30aa48e478d2e6e';
    return $semilla;
}
?>