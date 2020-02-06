<?php
    session_start();
    include_once('../includes/funcoes.php');	

    $username = $_POST['username'];
    $password = md5($_POST['senha']);
	
    $consultadm = mysqli_query($conexao, "SELECT * FROM administrador WHERE ADM_STR_LOGIN ='$username' AND ADM_STR_SEN = '$password'");
    if (mysqli_num_rows($consultadm) > 0){
        //se for administrador...
		$row_resultadm = mysqli_fetch_array($consultadm);
        $_SESSION["nome"] = $row_resultadm['ADM_STR_NOM'];
        $_SESSION["logado"] = 1;
        header("Location: administrador.php");
    } else {
        //se não for administrador...
        $consultaseg = mysqli_query($conexao, "SELECT * FROM seguranca WHERE SEG_STR_LOGIN ='$username' AND SEG_STR_SEN = '$password'");
        if (mysqli_num_rows($consultaseg) > 0){
            //se for segurança...
			$row_resultseg = mysqli_fetch_array($consultaseg);
            $_SESSION["nome"] = $row_resultseg['SEG_STR_NOM'];
            $_SESSION["logado"] = 2;
            header("Location: seguranca.php");
        } else {
            //se não for segurança nem administrador...´
            $_SESSION['erro'] = 1;
            header("Location: login.php");
            
        }
    }
?>