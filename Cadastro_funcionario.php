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
    <title>Cadastrar Funcionario</title>
</head>
<body>
    <br><br><br>
    <main>
        <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <h2 class="center-align z-depth-4">Cadastrar novo funcionário</h2>
        <br><br>
        <!--Form para cadastro do funcionário-->
        <div class="cadastro">
            <form action="bd_cadastrofunc.php" method="post" class="col s12">
                <div class="row">
                    <h5>Informações do Funcionário: </h5>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">contacts</i>
                        <input type="text" name="txtCPFfunc" maxlength="14" id="CPFfunc" autocomplete="off" required>
                        <label for="CPFfunc">Informe o CPF do funcionário: </label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">account_circle</i>
                        <input id="txtnome" type="text" class="validate" name="txtfuncnome" maxlength="60" autocomplete="off" required>
                        <label for="txtnome">Nome</label>
                    </div>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">account_circle</i>
                        <input id="email" type="email" class="validate" autocomplete="off" name="txtemail">
                        <label for="email">Email</label>
                    </div>
                        <br>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">lock</i>
                        <input id="senha" type="password" class="validate" name="txtsenha" maxlength="10">
                        <label for="senha">Senha</label>
                    </div>
                    <div class="botao">
                        <input type="reset" name="txtLimpar" value="Limpar" class="waves-effect waves-light btn-small red darken-2">
                        <input type="submit" value="Cadastrar" name="btncadastrar" class="waves-effect waves-light btn-small">
                    </div>
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
