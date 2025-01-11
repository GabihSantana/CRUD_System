<?php
    require_once '../model/database.php';
    include_once "cabeçalho.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

    $consulta = $conexao->prepare('Select * from tabtutor');
    $consulta->execute();

    /*  tutorCPF      tutorNome       tutorSexo       tutorDataNasc       tutorFone       tutorEndereco   */

    echo "<br><br><br>";
?>

<head>
    <link rel="stylesheet" href="../css/PaginasAjuste.css">
</head>

<body>
    <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <div class="listagem">
        <h2 class="z-depth-4">Lista de Tutores</h2>
        <br>
            <!--Cria tabela com od títulos de cada coluna-->
        <table class="striped">
                <tr>
                    <th class="center-align">Nome</th>
                    <th class="center-align">CPF</th>
                    <th class="center-align">Sexo</th>
                    <th class="center-align">Data de Nascimento</th>
                    <th class="center-align">Telefone</th>
                    <th class="center-align">Endereço</th>
                    <th class="center-align" colspan="2">Ações</th>
                </tr>   
<?php
    while ($info = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td class='center-align'>{$info['tutorNome']}</td>";
        echo "<td class='center-align'>{$info['tutorCPF']}</td>";
        echo "<td class='center-align'>{$info['tutorSexo']}</td>";
        echo "<td class='center-align'>{$info['tutorDataNasc']}</td>";
        echo "<td class='center-align'>{$info['tutorFone']}</td>";
        echo "<td class='center-align'>{$info['tutorEndereco']}</td>";

        echo "<td class='center-align'><a href='alterar_tutor.php?id={$info['tutorCPF']}' class='btn teal lighten-2'><i class='material-icons'>edit</i></a></td>";
        echo "<td class='center-align'><a href='excluir_tutor.php?id={$info['tutorCPF']}' class='btn red'><i class='material-icons'>delete</i></a></td></tr>";
    }


    echo "</table><br><br>";
    echo "<a href='cadastro_nv_cli.php' class='btn'>Adicionar Tutor e Animal</a>";
    echo "</div></body><br><br>";

    include_once "rodapé.php";
?>