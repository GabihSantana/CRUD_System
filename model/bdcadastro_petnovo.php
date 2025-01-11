<?php
    require_once "database.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
    exit;
   }  

    if(isset($_POST['btnCadastrar'])){
        //requisita o CPF do tutor
        $tutorCPF = filter_input(INPUT_POST, 'txtCPFtutor');

        ///////////////////////////////////////////////////////////

        //filtra o que foi inserido nas infos do pet
        $PetNome = filter_input(INPUT_POST, 'txtPetNome');
        $PetRaca = filter_input(INPUT_POST, 'txtPetRaca');
        $PetSexo = filter_input(INPUT_POST, 'txtPetSexo');
        $PetDataNasc = filter_input(INPUT_POST, 'txtPetNasc');

        //realiza a inserção
        $sql = $conexao->prepare("INSERT INTO tabpets (petNome, petRaca, petSexo, petDataNasc, tutorId) VALUES (:nomepet, :raca, :sexo, :datanasc, :id)");
        $sql->bindValue(':nomepet', $PetNome);
        $sql->bindValue(':raca', $PetRaca);
        $sql->bindValue(':sexo', $PetSexo);
        $sql->bindValue(':datanasc', $PetDataNasc);
        $sql->bindValue(':id', $tutorCPF);
        $sql->execute();

    }
    header('Location: ../view/PaginaInicial.php');
    exit;
?>