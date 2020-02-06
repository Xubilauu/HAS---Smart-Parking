<?php
    session_start();
    include_once('../includes/funcoes.php');	

    $excluir = $_GET['Excluir'];
    if($excluir == 'usuario'){
        $id = $_GET['Usuid'];
        $consulta = mysqli_query($conexao, "SELECT * FROM usuario AS u INNER JOIN veiculo AS v ON u.USU_INT_ID = v.USU_INT_ID WHERE v.USU_INT_ID = $id");
    } elseif($excluir == 'seguranca'){
        $id = $_GET['Segid'];
        $consulta = mysqli_query($conexao, "SELECT * FROM seguranca WHERE SEG_INT_ID = $id");
    }
    
    if ($excluir == 'usuario'){
        $deletarusu = mysqli_query($conexao, "DELETE FROM usuario WHERE USU_INT_ID = $id");	
        if (isset($deletarusu)){
            $deletarvei = mysqli_query($conexao, "DELETE FROM veiculo WHERE USU_INT_ID = $id");
            if (isset($deletarvei)){
                $deletarent = mysqli_query($conexao, "DELETE FROM ent_saida WHERE USU_INT_ID = $id");
                header('Location: usuarios.php');
            }
        }
    } elseif ($excluir == 'seguranca'){
        $deletar = mysqli_query($conexao, "DELETE FROM seguranca WHERE SEG_INT_ID = $id");	
        if (isset($deletar)){
            header('Location: segurancas.php');
            }
        }
	
?>