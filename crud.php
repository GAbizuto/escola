<?php
    include("conecta.php");
    // PARA PEGAR O TEXTO DOS INPUTS
    $matricula = $_POST["matricula"];
    $nome  = $_POST["nome"];
    $idade = $_POST["idade"];

    //se cliclou no botão INSERIR:

    if(isset($_POST["inserir"]))
    {
    $comando = $pdo->prepare("INSERT INTO aluno(nome,idade) VALUES ('$nome',$idade)");
    
    $resultado = $comando->execute();

    //para voltar no formulário:
    
    header("Location: cadastro.html");
    }
    
    if(isset($_POST["excluir"]))
    {
        $comando = $pdo->prepare("DELETE FROM aluno WHERE matricula = $matricula");
       
       $resultado = $comando->execute();
   
       //para voltar no formulário:
       
       header("Location: cadastro.html");
    }
    if(isset($_POST["alterar"]))
    {
     $comando = $pdo->prepare("UPDATE alunos SET nome='$nome', idade=$idade WHERE matricula=$matricula");
    $resultado = $comando->execute();
    header("location: cadastro.html"); //para voltar no formulario
    }
    if(isset($_POST["listar"]))
    {
        $comando = $pdo->prepare("SELECT * FROM aluno ");
       
       $resultado = $comando->execute();
       while( $linha = $comando -> fetch())
       {
        $m = $linha["matricula"];
        $n = $linha["nome"];
        $i = $linha["idade"];
        echo("Matricula; $m Nome: $n Idade: $i<br>");
       }
   
       //para voltar no formulário:
       
     
    }
  
?>