<?php
    include_once "cabeçalho.php"; 
    require_once "database.php"; 

    session_start();
    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
    exit;
   }  

    $codigo = $_GET['id']; 

    //Como é uma FK, tem que deletar o relacionamento primeiro
    $excluir_relacionados = $conexao->prepare('DELETE FROM tabpets WHERE tutorId = :code');
    $excluir_relacionados->bindValue(':code', $codigo);
    $excluir_relacionados->execute();

    //realiza a ação de deletar os dados através do id
    $excluir = $conexao->prepare('DELETE FROM tabtutor WHERE tutorCPF = :code');
    $excluir->bindValue(':code', $codigo);

    $excluir->execute();

header('Location: lista_donos.php')

?>