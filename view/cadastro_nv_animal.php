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
    <title>Cadastrar um novo animal</title>
</head>
<body>
    <br><br><br>
    <!--Form para cadastro-->
    <main>
        <a href="cadastro_cli_opc.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <h2 class="center-align  z-depth-4">Cadastrar novo animal</h2>
        <br><br>
        <div class="cadastro">
            <form action="../model/bdcadastro_petnovo.php" method="post" class="col s12">
                <div class="row">
                    <h5>Informações do tutor: </h5>

                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">contacts</i>
                        <input type="text" name="txtCPFtutor" minlength="14" maxlength="14" required id="CPFtutor" autocomplete="off" class="validate">
                        <label for="CPFtutor">Informe o CPF do Tutor: </label>
                    </div>
                </div>
            <div class="row">
                <h5>Informações do Animal: </h5>

                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">pets</i>
                    <input id="txtpetnome" type="text" class="validate" name="txtPetNome" maxlength="60" autocomplete="off" required>
                    <label for="txtpetnome">Nome</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">pets</i>
                    <input id="txtpetraca" type="text" class="validate" name="txtPetRaca" maxlength="60" autocomplete="off" required>
                    <label for="txtpetraca">Raça</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">pets</i>
                    <input id="txtpetsexo" type="text" class="validate" name="txtPetSexo" required maxlength="1" autocomplete="off" placeholder="F ou M">
                    <label for="txtpetsexo">Sexo</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">date_range</i>
                    <input type="date" name="txtPetNasc" required id="dataPetNas" class="validate" autocomplete="off">
                    <label for="txtPetNasc">Data de nascimento</label>
                </div>
            </div>

            <div class="botao">
                <input type="reset" name="txtLimpar" value="Limpar" class="waves-effect waves-light btn-small red darken-2">
                <input type="submit" value="Cadastrar" name="btnCadastrar" class="waves-effect waves-light btn-small">
            </div>  
        </form>
    </div>
</main>
    <script src="../js/complemento.js"></script>        
</body>
<?php
    include_once "rodapé.php";
?>
</html>