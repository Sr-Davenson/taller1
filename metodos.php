<?php
$palabra= $_POST['palabra'];

if($palabra==null){
    echo 'no ingreso ninguna palabra';
}elseif($palabra){

}else{
    $separarPalabra = [];
    $acronimo = [];
    $separarPalabra = preg_split('/[\s-]+/', $palabra);

}