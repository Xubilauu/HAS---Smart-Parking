<?php
    //conexão
    $localhost = "127.0.0.1";
    $useru = "root";
    $senhau = "";
    $db = "estacionamenta";
    $conexao = mysqli_connect($localhost, $useru, $senhau);
    mysqli_select_db($conexao, $db);

    //validar login
    $logado = $_SESSION['logado'];
    switch ($logado){
        case 1:
            if ($logado != (1 or 2)){
                header('Location: index.php');    
            }
            break;
        case 2:
            if ($logado != 2){
                header('Location: index.php');    
            }
        break;
        case 'placa':
        break;
    }

    //Formatar telefones e placas
    function formatarFoneUsu($linha){
        $formatado = preg_replace('/[^0-9]/', '', $linha[2]);
        $matches = [];
        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatado, $matches);
        if ($matches) {
            return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
        }
        return $linha[2];
    }
    function formatarFoneSeg($linha){
        $formatado = preg_replace('/[^0-9]/', '', $linha[4]);
        $matches = [];
        preg_match('/^([0-9]{2})([0-9]{4,5})([0-9]{4})$/', $formatado, $matches);
        if ($matches) {
            return '('.$matches[1].') '.$matches[2].'-'.$matches[3];
         }
        return $linha[4];
    }

    function exibePlaca($linha){
        $placa = $linha[4];
        $tam = strlen($placa);
        $parte1 = substr($placa,0,3);
        $parte2 = substr($placa,3);
        
        $linha[4] = $parte1 ."-". $parte2;
        return $linha[4];
    }

?>