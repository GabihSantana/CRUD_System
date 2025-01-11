<?php
    include_once "cabeçalho.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginasAjuste.css">
    <title>Cliente</title>
</head>
<body>
<br><br><br>
<!--pagina para controle de cadastro de clientes-->
    <main>
        <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <h2 class="center-align z-depth-4">Selecione o tipo de cadastro: </h2>
        <br><br><br><br><br><br><br></br>
        <div class="cadastro">
            <a href="cadastro_nv_cli.php" class="waves-effect waves-light btn-large"><i class="material-icons left">assignment</i> Cadastrar novo cliente</a>
            <a href='cadastro_nv_animal.php' class='waves-effect waves-light btn-large'><i class="material-icons left">pets</i> Cadastrar um novo animal</a>
        </div>
    </main>
<?php
    include_once "rodapé.php";
?>
</body>

</html>