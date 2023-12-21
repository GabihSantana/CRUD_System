<?php
    include_once "cabeçalho.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ConteAjuste.css">
    <title>Página Inicial</title>
</head>
<?php
    include_once "cabeçalho.php";
?>
<body>
    <div class="fundo responsive">
    </div>
    <main>
        <hr>
        <div class="Opções">
            <!--Botões para cadastros-->
            <h3 id="cad" class="z-depth-4">Cadastro de Cliente</h3>
            <a class="waves-effect waves-light btn-large" href="cadastro_cli_opc.php"><i class="material-icons left">cloud</i>Cadastrar Clientes</a>
            <br>
            <a class="waves-effect waves-light btn-large" href="Agendamento.php"><i class="material-icons left">assignment</i>Agendar uma consulta</a>
            <br>

            <!--Botões as listas-->
            <h3 id="list" class="z-depth-4">Listas</h3>
            <a class="waves-effect waves-light btn-large" href="lista_agendamentos.php"><i class="material-icons left">assignment_ind</i>Lista de Agendamentos</a>
            <br>
            <a class="waves-effect waves-light btn-large" href="lista_donos.php"><i class="material-icons left">assignment_ind</i>Lista de donos</a>
            <br>
            <a class="waves-effect waves-light btn-large" href="lista_animais.php"><i class="material-icons left">pets</i>Lista de Animais</a>
            <br>
            <a class="waves-effect waves-light btn-large" href="lista_procs.php"><i class="material-icons left">list</i>Lista de procedimentos</a>
            <br>

            <!--Botões para o administrativo-->
            <h3 id="adm" class="z-depth-4"> Administrativo </h3>
            <a class="waves-effect waves-light btn-large" href="Cadastro_funcionario.php"><i class="material-icons left">assignment_ind</i>Cadastro de Funcionário</a>
            <br>
            <a class="waves-effect waves-light btn-large" href="cad_procedimento.php"><i class="material-icons left">assignment_ind</i>Cad Procedimentos</a>
            <br><br><br>
        </div> 
    </main>
    <br><br><br><br><br><br><br><br>
    <hr>
    <script scr="js/materialize.js"></script>
    <?php
        include_once "rodapé.php";
    ?>
</body>
</html>