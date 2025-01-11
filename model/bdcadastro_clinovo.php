<?php
    require_once "database.php";

    session_start();
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
    exit;
   }  

    if(isset($_POST['btnCadastrar'])){
        //Dados do tutor
        $tutorCPF = filter_input(INPUT_POST, 'txtCPFtutor');
        $tutorNome = filter_input(INPUT_POST, 'txtTutorNome');
        $tutorSexo = filter_input(INPUT_POST, 'txtTutorSexo');
        $tutorDataNasc = filter_input(INPUT_POST, 'txtTutorNasc');
        $tutorFone = filter_input(INPUT_POST, 'txtFonetutor');
        $tutorEnd = filter_input(INPUT_POST, 'txtTutorend');

        ///////////////////////////////////////////////////////////

        //Dados do Pet
        $PetNome = filter_input(INPUT_POST, 'txtPetNome');
        $PetRaca = filter_input(INPUT_POST, 'txtPetRaca');
        $PetSexo = filter_input(INPUT_POST, 'txtPetSexo');
        $PetDataNasc = filter_input(INPUT_POST, 'txtPetNasc');

        //inserir os dados do tutor na tabela
        $sql = $conexao->prepare("INSERT INTO tabtutor (tutorCPF, tutorNome, tutorSexo, tutorDataNasc, tutorFone, tutorEndereco) VALUES (:CPF, :nome, :sexo, :datanasc, :fone, :endereco)");
        $sql->bindValue(':CPF', $tutorCPF);
        $sql->bindValue(':nome', $tutorNome);
        $sql->bindValue(':sexo', $tutorSexo);
        $sql->bindValue(':datanasc', $tutorDataNasc);
        $sql->bindValue(':fone', $tutorFone);
        $sql->bindValue(':endereco', $tutorEnd);

        $sql->execute();

        //inserir os dados do pet na tabela
        $sql2 = $conexao->prepare("INSERT INTO tabpets (petNome, petRaca, petSexo, petDataNasc, tutorId) VALUES (:nomepet, :raca, :sexo, :datanasc, :id)");
        $sql2->bindValue(':nomepet', $PetNome);
        $sql2->bindValue(':raca', $PetRaca);
        $sql2->bindValue(':sexo', $PetSexo);
        $sql2->bindValue(':datanasc', $PetDataNasc);
        $sql2->bindValue(':id', $tutorCPF);

        $sql2->execute();

    }
    header('Location: ../view/PaginaInicial.php');
    exit;
?>