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
    <link rel="stylesheet" href="css/PaginasAjuste.css">
    <title>Adicionar Procedimento</title>
</head>
<body>
    <br><br><br>
    <main>
        <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <h2 class="center-align z-depth-4">Adicionar Procedimento</h2>
        <br><br>
        <!--Form simples para pegar o novo procedimento-->
        <div class="cadastro">
            <form action="bd_cad_proced.php" method="post" class="col s12">
                <div class="row">
                    <h5>Sobre o procedimento: </h5>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">assignment</i>
                        <input id="txtcod" type="text" class="validate" autocomplete="off" name="txtcod" maxlength="5" required>
                        <label for="txtcod">Códgio</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">assignment</i>
                        <input id="txtnome" type="text" class="validate" autocomplete="off" name="txtprodnome" maxlength="60" required>
                        <label for="txtnome">Nome</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">attach_money</i>
                        <input id="txtvalor" type="text" class="validate" autocomplete="off" name="txtvalor" maxlength="10" required>
                        <label for="txtvalor">Valor</label>
                    </div>
                </div>
                
                <div class="botao">
                    <input type="reset" name="txtLimpar" value="Limpar" class="waves-effect waves-light btn-small red darken-2">
                    <input type="submit" value="Cadastrar" name="btncadastrar" class="waves-effect waves-light btn-small">
                </div>
        </form>
    </div>
</main>
    <script src="js/complemento.js"></script>        
</body>
    <?php
        include_once "rodapé.php";
    ?>
</html>
