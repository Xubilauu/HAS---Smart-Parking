<?php
    session_start();
    include_once('../includes/funcoes.php');	
    
    $id = $_SESSION['id'];
    $alterar = $_POST['hidden'];

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
            $_SESSION['erros'] = 2;
            $_SESSION['alterar'] = $alterar;
            header('Location: alterar.php');
            die();
        }

    switch ($alterar){
        case 'usuario':
            $tipo = $_POST['tipo'];
            $placa = preg_replace('/[^A-Za-z0-9?!]/', '', $_POST['placa']);
            $modelo = $_POST['modelo'];
            $cor = $_POST['cor'];
            $marca = $_POST['marca'];
            
            $alterarusu = mysqli_query($conexao, "UPDATE usuario SET USU_STR_NOM = '$nome', USU_INT_TEL = '$tel', USU_STR_TIP = '$tipo' WHERE USU_INT_ID = $id");	
            if ($alterarusu){
                $alterarvei = mysqli_query($conexao, "UPDATE veiculo SET VEI_STR_PLA = '$placa', VEI_STR_MOD = '$modelo', VEI_STR_COR = '$cor', VEI_STR_FAB = '$marca' WHERE USU_INT_ID = $id");
                if ($alterarvei){    
                    header('Location: usuarios.php');
                } else{
                    $_SESSION['erros'] = 1;
                    $_SESSION['alterar'] = $alterar;
                    header('Location: alterar.php');
                }
            } else{
                $_SESSION['erros'] = 1;
                $_SESSION['alterar'] = $alterar;
                header('Location: alterar.php');
            }
        break;
        case 'seguranca':
            $login = $_POST['login'];
            $senha = md5($_POST['senha']);

            $alterarseg = mysqli_query($conexao, "UPDATE seguranca SET SEG_STR_NOM = '$nome', SEG_STR_LOGIN = '$login', SEG_STR_SEN = '$senha', SEG_INT_TEL = '$tel' WHERE SEG_INT_ID = $id");
            if ($alterarseg){ 
                header('Location: segurancas.php');
            } else {
                $_SESSION['erros'] = 1;
                $_SESSION['alterar'] = $alterar;
                header('Location:alterar.php');
            }
        break;
    }
	
?>