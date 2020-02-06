<?php
    session_start();
    include_once('../includes/funcoes.php');	

    $inserir = $_SESSION['insere'];

    $nome = $_POST['username'];
    $tel = preg_replace('/[^0-9.]/', '', $_POST['tel']);
            if ($tel == '00000000000' || 
                $tel == '11111111111' || 
                $tel == '22222222222' || 
                $tel == '33333333333' || 
                $tel == '44444444444' || 
                $tel == '55555555555' || 
                $tel == '66666666666' || 
                $tel == '77777777777' || 
                $tel == '88888888888' || 
                $tel == '99999999999') {
                $_SESSION['erro'] = 2;
                if ($inserir == 'usuario'){
                    header('Location: inserirusuario.php');
                    die();
                } elseif ($inserir == 'seguranca'){
                    header('Location: inserirseguranca.php');
                    die();
                }
            }

    switch ($inserir){
        case 'usuario':
            $tipo = $_POST['tipo'];
            $placa = preg_replace('/[^A-Za-z0-9?!]/', '', $_POST['placa']);
            $modelo = $_POST['modelo'];
            $cor = $_POST['cor'];
            $marca = $_POST['marca'];

            $inserir1 = mysqli_query($conexao, "INSERT INTO usuario (USU_STR_NOM, USU_INT_TEL, USU_STR_TIP) VALUES ('$nome', '$tel', '$tipo')");
            if ($inserir1){
                $buscaid = mysqli_query($conexao, "SELECT USU_INT_ID FROM usuario ORDER BY USU_INT_ID DESC LIMIT 1");
                $recebeid = mysqli_fetch_array($buscaid);
                $inserir2 = mysqli_query($conexao,"INSERT INTO veiculo (USU_INT_ID, VEI_STR_PLA, VEI_STR_MOD, VEI_STR_COR, VEI_STR_FAB) 
            VALUES ($recebeid[0],'$placa', '$modelo', '$cor', '$marca')");
                header('Location: usuarios.php');
            } else{
                $_SESSION['erro'] = 1;
                header('Location: inserirusuario.php');
                die();
            }
            break;
        
        case 'seguranca':
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);

            $inserirseg = mysqli_query($conexao, "INSERT INTO seguranca (SEG_STR_NOM, SEG_STR_LOGIN, SEG_STR_SEN, SEG_INT_TEL) 
            VALUES ('$nome', '$login', '$senha', $tel)");
            if ($inserirseg){
                header("Location: segurancas.php");
            } else {
                $_SESSION['erro'] = 1;
                header("Location: inserirseguranca.php");
                die();
            }
        break;
    }
?>