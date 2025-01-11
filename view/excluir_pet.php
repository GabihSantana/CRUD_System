<?php
    include_once "cabeçalho.php"; 
    require_once "../model/database.php";  
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

    //Pega o id da url
    $id = $_GET['id'];
    //seleciona todos da tabela pet que correspondem com esse id
    $consulta = $conexao->prepare('SELECT * FROM tabpets WHERE petId = :id');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    
    $info = $consulta->fetch (PDO::FETCH_ASSOC); //armazena o registro selecionado

    $codigo = $id;
    $nome = $info['petNome'];
    $raca = $info['petRaca'];
    $sex = $info['petSexo'];
    $Datanasc = $info['petDataNasc'];
    $tutor = $info['tutorId'];

    //mostra os dados na tela
    echo "<br><br><br>";
    echo "<a href='lista_animais.php'><i class='material-icons prefix medium'>keyboard_arrow_left</i></a>";
    echo "<div class='row'><br>";
    echo "<div class='col s12 m6 push-m3'>";
    echo "<h2>Excluir Animal?</h2><br>";
    echo "<b>Código:       </b>$codigo<br>
        <b>Nome:           </b>$nome<br>
        <b>Tutor:          </b>$tutor<br>
        <b>Raça:           </b>$raca<br>
        <b>Sexo:           </b>$sex<br>
        <b>Data Nascimento: </b>$Datanasc<br>";

    echo "<br><a href='lista_animais.php' class='btn'>Lista de animais</a>";
    echo "<a href='bd_excluir_pet.php?id=$codigo' class='btn red'>Sim, excluir registro.</a>";
    echo "</div></div></div>";
?>