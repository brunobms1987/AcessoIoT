<?php

    $pagina = isset($_GET['pag'])?$_GET['pag']:1;   
    switch ($pagina){
        case 2:
            $url = "noticias.php";
            break;
        case 3: 
            $url = "relatorios.php";
            break;  
        case 4: 
            $url = "/usuarios/listar.php";
            break;  
        case 5: 
            $url = "/usuarios/cadastrar.php";
            break;  
        case 6: 
            $url = "/usuarios/salvar.php";
            break;  
        case 7: 
            $url = "/usuarios/visualizar.php";
            break;  
        case 8: 
            $url = "/usuarios/editar.php";
            break;  
        case 9: 
            $url = "/locais/listar.php";
            break;  
        case 10: 
            $url = "/locais/cadastrar.php";
            break;  
        case 11: 
            $url = "/locais/salvar.php";
            break;  
        case 12: 
            $url = "/locais/visualizar.php";
            break;  
        case 13: 
            $url = "/locais/editar.php";
            break;  
        case 14: 
            $url = "/logs.php";
            break;  
        default :
            $url = "home.php";
            
    }
    
    

?>