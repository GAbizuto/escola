<?php
    include("conecta.php");
    // PARA PEGAR O TEXTO DOS INPUTS
    $matricula = $_GET["M"];
   
    $comando = $pdo->prepare("DELETE FROM alunos
     WHERE matricula = $matricula");
    
    $resultado = $comando->execute();

    //para voltar no formulário:
    
    header("Location: cadastro.html");

?>