<?php
    include_once "cabeçalho.php"; 
    require_once "database.php"; 

    session_start();
    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
    exit;
   }  

   //pega o elemento que foi selecionado para exclusão
    $codigo = $_GET['id']; 

    //realiza a ação de deletar os dados através do id
    $excluir = $conexao->prepare('DELETE FROM tabagendamento WHERE codAgendamento = :id');
    $excluir->bindValue(':id', $codigo);  // Corrigido de ':code' para ':id'
    $excluir->execute();

    header('Location: ../view/lista_agendamentos.php');
?>
