<?php
include_once('../usuario/Usuario.php');
//$url1 = "/pagina/index.php";
//$url2 = "/pagina/index.php?nome=testeaaaaaaaaaaaaaaaaaaaaaaaaaaa";
//$tamanho = strlen($url1);
//$url3 = substr($url2, 0, $tamanho);
//echo "$tamanho";
//echo "<br>";
//echo "$url3";
//echo "<br>";
//if ($url1 == $url3){
//    echo "Igual";
//} else {
//    echo "Diferente";
//}
//$url4 = explode('?',$url2);
//print_r($url4);

$teste = (new Usuario())->possuiAcesso();
