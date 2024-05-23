<?php 
$nombre='miguel'
if(is_file("vista/".$pagina.".php")){
    require_once("vista/".$pagina.".php");
}else{
    echo "la cagaste $nombre pa";
}




?>