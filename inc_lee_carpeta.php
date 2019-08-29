<?php
$carpeta_seleccionada = 'nombre de la carpeta';
$lista_imagenes = array();

function lista_archivos($carpeta){
    global $lista_imagenes;
    $extensiones = array('jpg', 'jpeg', 'png', 'gif', 'bmp');
    $carpeta = __DIR__ ."/".$carpeta."/";
    //lee los archivos de la carpeta
    $archivos = scandir($carpeta);
    //pasar todo a minusculas
    $archivos = array_map('strtolower', $archivos);
    //itera los elementos de la carpeta y sólo pone en el array las imágenes
    for ($i=0; $i < count($archivos); $i++) { 
        if ($archivos[$i] != '.' && $archivos[$i] != '..') {
           $archivo = pathinfo($archivos[$i]);
           $extension = $archivo['extension'];
           if (in_array($extension, $extensiones)) {
               array_push($lista_imagenes,$archivos[$i]);
               
           }
        }       
    }
    //randomiza orden dentro del array
    shuffle($lista_imagenes);
    //convierte a lista a json
    $lista_imagenes = json_encode($lista_imagenes, JSON_FORCE_OBJECT);
    
    echo $lista_imagenes;
}

lista_archivos($lista_imagenes);
?>
