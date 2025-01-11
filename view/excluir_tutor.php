<?php
    include_once "cabeçalho.php"; 
    require_once "../model/database.php";  
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }
    
    $id = $_GET['id'];
    //seleciona todos da tabela tutor com o cpf igual ao id da url
    $consulta = $conexao->prepare('SELECT * FROM tabtutor WHERE tutorCPF = :id');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    
    $info = $consulta->fetch (PDO::FETCH_ASSOC); //armazena o registro selecionado

    $codigo = $id;
    $nome = $info['tutorNome'];
    $sex = $info['tutorSexo'];
    $Datanasc = $info['tutorDataNasc'];
    $Fone = $info['tutorFone'];
    $end = $info['tutorEndereco'];

    //printa os dados
    echo "<br><br><br>";
    echo "<a href='lista_donos.php'><i class='material-icons prefix medium'>keyboard_arrow_left</i></a>";
    echo "<div class='row'><br>";
    echo "<div class='col s12 m6 push-m3'>";
    echo "<h2>Excluir Tutor?</h2><br>";
    echo "<b>CPF:       </b>$codigo<br>
        <b>Nome:           </b>$nome<br>
        <b>Data Nascimento: </b>$Datanasc<br>
        <b>Sexo:           </b>$sex<br>
        <b>Telefone:           </b>$Fone<br>
        <b>Endereço:            </b>$end<br>";

    echo "<br><a href='lista_donos.php' class='btn'>Lista de animais</a>";
    echo "<a href='bd_excluir_dono.php?id=$codigo' class='btn red'>Sim, excluir registro.</a>";
    echo "</div></div></div>";
?>