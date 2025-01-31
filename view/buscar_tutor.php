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
    <title>Buscar Tutor</title>
</head>
<body>
<br><br><br>
<main>
    <!--Form simples para procurar qual tutor corresponde ao CPF da tabela-->
    <a href="lista_agendamentos.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <br><br>
        <form action="bd_buscar_tutor.php" method="get">
            <h4 class="center-align">Informe o CPF do Tutor:</h4>
            <input type="text" name="txtPesquisar" minlength="14" maxlength="14"  autocomplete="off" required id="CPFtutor" autocomplete="off" class="validate">
            <br><br>
            <input type="submit" name="btnPesquisar" class="btn" value="Pesquisar" id="pesquisaCliente">
            <input type="reset" name="btnLimpar" class="btn red" id="limpar" value="Limpar">
        </form>
</main>
    <script src="../js/complemento.js"></script>  
    <?php
        include_once "rodapé.php";
    ?>      
</body>
    
</html>