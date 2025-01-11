<?php
    require_once '../model/database.php';
    include_once "cabeçalho.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }


    $consulta = $conexao->prepare('Select * from tabpets');
    $consulta->execute();

    /*      petNome 	petRaca 	petSexo 	petDataNasc 	tutorId   */

    echo "<br><br><br>";
?>

<head>
    <link rel="stylesheet" href="../css/PaginasAjuste.css">
</head>

<body>
    <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <div class="listagem">
        <h2 class="z-depth-4">Lista de Pets</h2>
        <br>
            <!--Cria tabela com od títulos de cada coluna-->
        <table class="striped">
                <tr>
                    <th class='center-align'>Código</th>
                    <th class='center-align'>Nome</th>
                    <th class='center-align'>Raça</th>
                    <th class='center-align'>Sexo</th>
                    <th class='center-align'>Data de Nascimento</th>
                    <th class='center-align'>ID do Tutor</th>
                    <th class='center-align' colspan="2">Ações</th>
                </tr>
<?php
    while ($info = $consulta->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td class='center-align'>{$info['petId']}</td>";
        echo "<td class='center-align'>{$info['petNome']}</td>";
        echo "<td class='center-align'>{$info['petRaca']}</td>";
        echo "<td class='center-align'>{$info['petSexo']}</td>";
        echo "<td class='center-align'>{$info['petDataNasc']}</td>";
        echo "<td class='center-align'>{$info['tutorId']}</td>";

        //Alterar:
        echo "<td class='center-align'><a href='alterar_pet.php?id={$info['petId']}' class='btn teal lighten-2'><i class='material-icons'>edit</i></a></td>";

        //Deletar:
        echo "<td class='center-align'><a href='excluir_pet.php?id={$info['petId']}' class='btn red'><i class='material-icons'>delete</i></a></td></tr>";
    }

    echo "</table><br><br>";
    echo "<a href='cadastro_nv_animal.php' class='btn'>Adicionar Animal</a>";
    echo "</div></body><br><br>";

    include_once "rodapé.php";
?>