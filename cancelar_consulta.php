<?php
    include_once "cabeçalho.php"; 
    require_once "database.php";  
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }

    //Seleciona todos da tabela agendamento onde o codigo seja igual ao id inserido
    $id = $_GET['id'];
    $consulta = $conexao->prepare('SELECT * FROM tabagendamento WHERE codAgendamento = :id');
    $consulta->bindValue(':id', $id);
    $consulta->execute();
    
    //realiza abusca e armazena em info
    $info = $consulta->fetch (PDO::FETCH_ASSOC); 

    $codigo = $id;
    $numPet = $info['numPet'];
    $tutorCPF = $info['tutorCPF'];
    $data = $info['dataAgendamento'];
    $horario = $info['horarioAgendamento'];
    $codProc = $info['codigoProcedimento'];

    //exibe os dados

    echo "<br><br><br>";
    echo "<a href='lista_agendamentos.php'><i class='material-icons prefix medium'>keyboard_arrow_left</i></a>";
    echo "<div class='row'><br>";
    echo "<div class='col s12 m6 push-m3'>";
    echo "<h2>Cancelar Consulta?</h2><br>";
    echo "<b>Código:       </b>$codigo<br>
        <b>Pet:           </b>$numPet<br>
        <b>Tutor:          </b>$tutorCPF<br>
        <b>Data:           </b>$data<br>
        <b>Horário:           </b>$horario<br>
        <b>Codigo do Procedimento: </b>$codProc<br>";

    echo "<a href='bd_cancelar_agend.php?id=$codigo' class='btn red'>Sim, cancelar agendamento.</a>";
    echo "</div></div>";
?>