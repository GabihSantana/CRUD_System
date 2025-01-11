<?php
    require_once 'database.php';

    session_start();
     //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
     if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

    //se o botão do form foi acionado
    if(isset($_POST['btncadastrar'])) {
        //filtra os campos
        $cod = filter_input(INPUT_POST,'txtcod');
        $nome = filter_input(INPUT_POST,'txtprodnome');
        $valor = filter_input(INPUT_POST,'txtvalor');

        //realiza o INSERT do procedimento na tabela
        $sql = $conexao->prepare("INSERT INTO tabprocedimento(codigoProcedimento, nomeProc, valorProc) VALUES (:cod, :nome, :valor)");
        $sql->bindValue(':cod', $cod);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':valor', $valor);
        
        $sql->execute();
    }
    header('Location: ../view/PaginaInicial.php');
?>