<?php
    require_once '../model/database.php';
    include_once "cabeçalho.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

    //seleciona todos da tabela agendamento
    $consulta = $conexao->prepare('Select * from tabagendamento');
    $consulta->execute();

    /*  codAgendamento NumPet, tutorCPF, dataAgendamento, horarioAgendamento, codigoProcedimento   */

    echo "<br><br><br>";
?>

<head>
    <link rel="stylesheet" href="../css/PaginasAjuste.css">
</head>

<body>
    <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <div class="listagem">
        <h2 class="z-depth-4">Lista de Agendamentos</h2>
        <br>
        <!--Cria tabela com od títulos de cada coluna-->
        <table class="striped">
                <tr>
                    <th class='center-align'>Codigo</th>
                    <th class='center-align'>Animal</th>
                    <th class='center-align'>CPF Tutor</th>
                    <th class='center-align'>Data</th>
                    <th class='center-align'>Horário</th>
                    <th class='center-align'>Procedimento</th>
                    <th class='center-align' colspan="2">Ações</th>
                </tr>   
<?php
    //enquanto estiver dados em info, irá posicionar na tabela
    while ($info = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td class='center-align'>{$info['codAgendamento']}</td>";
        echo "<td class='center-align'>{$info['numPet']}</td>";
        echo "<td class='center-align'>{$info['tutorCPF']}</td>";
        echo "<td class='center-align'>{$info['dataAgendamento']}</td>";
        echo "<td class='center-align'>{$info['horarioAgendamento']}</td>";
        echo "<td class='center-align'>{$info['codigoProcedimento']}</td>";

        //botoês com as possíveis ações:

        echo "<td class='center-align'><a href='alterar_proced.php?id={$info['codAgendamento']}' class='btn teal lighten-2'><i class='material-icons'>edit</i></a></td>";
        echo "<td class='center-align'><a href='cancelar_consulta.php?id={$info['codAgendamento']}' class='btn red'><i class='material-icons'>delete</i></a></td></tr>";
    }

    //botões para redirecionar às buscas

    echo "</table><br><br>";
    echo "<div class='cadastro'>";
    echo "<a class='waves-effect waves-light btn-large' href='buscar_animal.php'><i class='material-icons left'>pets</i>Buscar Pet</a>";
    echo "<a class='waves-effect waves-light btn-large' href='buscar_tutor.php'><i class='material-icons left'>assignment_ind</i>Buscar Tutor</a>";
    echo "<a class='waves-effect waves-light btn-large' href='buscar_proc.php'><i class='material-icons left'>pets</i>Buscar Procedimento</a>";
    echo "</div></div><br></body>";


    include_once "rodapé.php";
?>