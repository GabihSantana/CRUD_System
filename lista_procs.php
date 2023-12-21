<?php
    require_once 'database.php';
    include_once "cabeçalho.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }

    $consulta = $conexao->prepare('Select * from tabprocedimento');
    $consulta->execute();

    /*  codigoProcedimento 	  nomeProc 	 valorProc    */

    echo "<br><br><br>";
?>

<head>
    <link rel="stylesheet" href="css/PaginasAjuste.css">
</head>

<body>
    <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <div class="listagem">
        <h2 class="z-depth-4">Lista de Procedimentos</h2>
        <br>
        <table class="striped">
                <tr>
                    <th class='center-align'>Código</th>
                    <th class='center-align'>Nome</th>
                    <th class='center-align'>Valor</th>
                </tr>   
<?php
    while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td class='center-align'>{$linha['codigoProcedimento']}</td>";
        echo "<td class='center-align'>{$linha['nomeProc']}</td>";
        echo "<td class='center-align'>{$linha['valorProc']}</td>";
        echo "</tr>";
        //echo "<td><a href='excluir_proc.php?id={$linha['funId']}' class='btn-floating blue'><i class='material-icons'>delete</i></a></td></tr>";
    }

    echo "</table><br><br>";
    echo "<a href='Agendamento.php' class='btn'>Adicionar Agendamento</a>";
    echo "</div></body><br><br>";

    include_once "rodapé.php";
?>