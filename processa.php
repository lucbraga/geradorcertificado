<?php

//Conexão com o Banco
 $nome = $_POST['nome'];
 $cpf = $_POST['cpf'];
 $horas = $_POST['horas'];
 $strcon = mysqli_connect('127.0.0.1','localhost','localhost','certificado');
 if (!$strcon) {
   die('Não foi possível conectar ao MySQL');
 }

 // Criando a declaração SQL:
 $sql = "INSERT INTO usuario(nome, cpf, horas)
 VALUES ('$nome','$cpf','$horas')";
 
 // Executando a declaração no banco de dados:
 $resultado = mysqli_query($strcon,$sql) or die("Erro ao executar a inserção dos dados");
 echo "Registro inserido com sucesso";
 mysqli_close($strcon);
 echo "<br><br><a href='index.html'>Voltar à página inicial</a>";
?>