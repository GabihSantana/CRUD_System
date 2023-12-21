<?php
    include_once "cabeçalho.php";
    require_once "database.php";
    session_start();

    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }

    $codigo = $_POST['txtid'];
    $nome = $_POST['txtnome'];
    $sexo = $_POST['txtsexo'];
    $dataNasc = $_POST['txtdatanasc'];
    $fone = $_POST['txtfone'];
    $end = $_POST['txtend'];

    //usando UPDATE para atualizar a tabela através do CPF do tutor(PK) q foi selecionado para alteração
    $altera = $conexao->prepare('UPDATE tabtutor SET tutorNome=:nome, tutorSexo=:sex, tutorDataNasc=:nasc, tutorFone=:fone, tutorEndereco=:ende WHERE tutorCPF=:cod');

    //Atribui o valor da variável $ ao marcador de posição : no update
    $altera->bindValue(':cod', $codigo);
    $altera->bindValue(':nome', $nome);
    $altera->bindValue(':sex', $sexo);
    $altera->bindValue(':nasc', $dataNasc);
    $altera->bindValue(':fone', $fone);
    $altera->bindValue(':ende', $end);
    $altera->execute();

    //direciona para a lista de donos
    header("Location: lista_donos.php");
?>