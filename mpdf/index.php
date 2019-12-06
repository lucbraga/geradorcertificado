<?php

require_once __DIR__ . '/vendor/autoload.php';

$servidor = "127.0.0.1";
	$usuario = "localhost";
	$senha = "localhost";
	$dbname = "certificado";
	
	//Conexão com o Banco
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
	if(!$conn){
		die("Falha na conexao: " . mysqli_connect_error());
	}else{
		echo "Conexao realizada com sucesso";
	}


	//Seleciona o id da tabela usuário através de uma query
	//Altere o ID AQUI 
	$id = "14";
	$result_usuario = "SELECT * FROM usuario WHERE id = '$id' LIMIT 1";
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
	
	//Gera o certificado com as informações
	$pagina = 
		"<html>
			<body>
				<h1>Certificado de Partipação</h1>
				
				Certificamos que o participante ".$row_usuario['nome']."<br>
				portador do CPF ".$row_usuario['cpf']."<br>
				com carga horária de ".$row_usuario['horas']." horas<br>
				<h4>Criado para a matéria de Dev Web II</h4>
			</body>
		</html>
		";


//Nome que o arquivo vai ser baixado
$arquivo = "Certificado.pdf";

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($pagina);

//Forma que o arquivo é enviado para quem acessa página.
$mpdf->Output($arquivo, 'I');
?>