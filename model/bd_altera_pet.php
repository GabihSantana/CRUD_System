<?php
    include_once "cabeçalho.php";
    require_once "database.php";
    session_start();

    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

    $codigo = $_POST['txtid'];
    $nome = $_POST['txtnome'];
    $tutor = $_POST['txttutor'];
    $raca = $_POST['txtraca'];
    $sexo = $_POST['txtsexo'];
    $dataNasc = $_POST['txtdatanasc'];

    //usando UPDATE para atualizar a tabela pet onde o petId é igual o Id que foi selecionado para alteração
    $altera = $conexao->prepare('UPDATE tabpets SET petNome=:nome, tutorId=:tutor, petRaca=:raca, petSexo=:sex, petDataNasc=:nasc WHERE petId=:cod');

    //Atribui o valor da variável $ ao marcador de posição : no update
    $altera->bindValue(':cod', $codigo);
    $altera->bindValue(':nome', $nome);
    $altera->bindValue(':tutor', $tutor);
    $altera->bindValue(':raca', $raca);
    $altera->bindValue(':sex', $sexo);
    $altera->bindValue(':nasc', $dataNasc);

    //executa essa alteração
    $altera->execute();

    header("Location: ../view/lista_animais.php");
?>