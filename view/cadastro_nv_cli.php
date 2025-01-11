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
    <title>Cadastrar um novo cliente</title>
</head>
<body>
<br><br><br>
    <main>
        <a href="cadastro_cli_opc.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <h2 class="center-align z-depth-4">Cadastrar novo cliente</h2>
        <br><br>
        <div class="cadastro">
            <form action="../model/bdcadastro_clinovo.php" method="post" class="col s12">
                <div class="row">
                <!--Form com autocomplete="off" para não sugerir informações de outros clientes-->
                    <h5>Informações do tutor: </h5>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">contacts</i>
                        <input type="text" name="txtCPFtutor" minlength="14" maxlength="14" required id="CPFtutor" autocomplete="off" class="validate">
                        <label for="CPFtutor">Informe o CPF do Tutor: </label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">account_circle</i>
                        <input id="txtnome" type="text" class="validate" name="txtTutorNome" maxlength="60" autocomplete="off" required>
                        <label for="txtnome">Nome</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">perm_identity</i>
                        <input id="txtsexo" type="text" class="validate" name="txtTutorSexo" required autocomplete="off" maxlength="1" placeholder="F ou M">
                        <label for="txtsexo">Sexo</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">date_range</i>
                        <input type="date" name="txtTutorNasc" required id="dataTutorNas" class="validate" autocomplete="off">
                        <label for="dataTutorNas">Data de nascimento</label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">phone</i>
                        <input type="text" name="txtFonetutor" minlength="10" maxlength="15" autocomplete="off" required id="Fonetutor" autocomplete="off" class="validate">
                        <label for="Fonetutor">Informe o Telefone: </label>
                    </div>
                    <div class="input-field col s6">
                        <i class="material-icons prefix tiny">person_pin_circle</i>
                        <input id="txtend" type="text" class="validate" autocomplete="off" name="txtTutorend" required maxlength="60">
                        <label for="txtend">Endereço</label>
                    </div>
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
