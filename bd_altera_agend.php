<?php
    include_once "cabeçalho.php";
    //requisita a conexão com o BD
    require_once "database.php";
    session_start();

    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }

    //Cria variaveis para os dados dos campos que foram inseridos
    $codigo = $_POST['txtid'];
    $tutorCPF = $_POST['txtCPFtutor'];
    $data = $_POST['txtdataAgendamento'];
    $horario = $_POST['txthorarioAgendamento'];
    $numPet = $_POST['numPet'];
    $codigoProcedimento = $_POST['codigoProcedimento'];

    //realiza o UPDATE (atualização) e faz a atribuição através do SET de cada variável, mas apenas onde o código de agendamento corresponde ao código que foi publicado pelas outras páginas
    $altera = $conexao->prepare('UPDATE tabagendamento SET tutorCPF=:tutorCPF, dataAgendamento=:dataAgendamento, horarioAgendamento=:horarioAgendamento, numPet=:numPet, codigoProcedimento=:codigoProcedimento WHERE codAgendamento=:cod');

    //vincular os parâmetros
    $altera->bindValue(':cod', $codigo);
    $altera->bindValue(':tutorCPF', $tutorCPF);
    $altera->bindValue(':dataAgendamento', $data);
    $altera->bindValue(':horarioAgendamento', $horario);
    $altera->bindValue(':numPet', $numPet);
    $altera->bindValue(':codigoProcedimento', $codigoProcedimento);
    $altera->execute();

    header("Location: lista_agendamentos.php");
?>