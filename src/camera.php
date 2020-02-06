<?php
    session_start();
    $_SESSION['logado'] = 'placa';
    include_once('../includes/funcoes.php');
    if (isset($_GET['placa'])){
        $placa = preg_replace('/[^A-Za-z0-9?!]/', '', $_GET['placa']);
        $tam = strlen($placa);
        $parte1 = substr($placa,0,3);
        $parte2 = substr($placa,3);

        $consulta = mysqli_query($conexao, "SELECT VEI_STR_PLA, USU_STR_NOM FROM usuario AS u INNER JOIN veiculo AS v ON v.VEI_STR_PLA = '$placa' WHERE u.USU_INT_ID = v.USU_INT_ID");
        $dados = mysqli_fetch_array($consulta);
        $nome = $dados[1];

        if ($dados > 1){
            $valida = '<span class="concedida">Concedida!</span>';
        } else {
            $valida = '<span class="negada">Negada!</span>';
        }
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>HAS SMART PARKING</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="icon" type="../imagem/png" href="../images/meufavicon.png" />
        <script type='text/javascript' src="../assets/js/formatacoes.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<style>
			.btn_submit{
				position: absolute;
				left: 43.5%;
			}
            h3 {
                color: #4F4F4F;
                text-align: center;
                line-height: 1.5;
                font-size: 20px;
            }
            .concedida {
                color: #00FF7F;
                font-size: 30px;
            }	
            .negada {
                color: #FF0000;
                font-size: 30px;
            }
		</style>
	</head>
	<body class="login">
		<div id="page-wrapper">
			<?php 
				include_once('../includes/menu.php');
			?>
			<!-- Highlights -->
				<section id="highlights" class="wrapper style3">
					<div class="title" id="titulo">Câmera</div>
					<div class="container">
						<div class="row aln-center">
							<form id="formulario" method="GET" action="#">
								<h2>Pesquisar:</h2>
								<input class="campo_placa" type="text" name="placa" placeholder="Insira aqui a placa..."/><br>
								<input class="btn_submit" name="enviar" type="submit" value="Pesquisar"><br /><br /><br /><br />
							</form>
						</div>
                        <div class="row aln-center">
                        <h3>Digite a placa do carro acima e veja se ele tem permissão para acessar o estacionamento!</h3><br/>
                        <?php
                            if (isset($placa)){
                                if ($dados > 1){
                                    echo ('<h3>O carro de placa '.$parte1.'-'.$parte2.', do(a) proprietário(a) '.$nome.' tem sua permissão: <br />'.$valida.'</h3>');
                                } else {
                                    echo ('<h3>O carro de placa '.$parte1.'-'.$parte2.' não existe no banco de dados, portanto tem sua permissão: <br />'.$valida.'</h3>');
                                }
                            } else {
                                echo("");
                            }
                        ?>
                        </div>
					</div>
					<br />
					<br />
				</section>
		</div>
		<?php 
			include_once('../includes/footer.php');
		?>
	</body>
    <script>
		$('[name="placa"]').keyup(mascaraPlaca);
	</script>
</html>
