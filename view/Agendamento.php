<?php
    include_once "cabeçalho.php";
    session_start();

    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        //caso não esteja, será redirecionado para a página de Login com o erro=True e irá gerar um alerta
        header("Location: ../Index.php?erro=true");
        exit;
    }

    //Obtém a lista de procedimentos do banco de dados
    require_once "../model/database.php";
    $stmtProcedimentos = $conexao->prepare("SELECT codigoProcedimento, nomeProc FROM tabprocedimento");
    $stmtProcedimentos->execute();
    $procedimentos = $stmtProcedimentos->fetchAll(PDO::FETCH_ASSOC);

    //Obtém a lista de pets do banco de dados
    $stmtPets = $conexao->prepare("SELECT petId, petNome, tutorId FROM tabpets");
    $stmtPets->execute();
    $pets = $stmtPets->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginasAjuste.css">
    <title>Agendamento</title>
</head>
<body>
    <br><br><br>
<main>
    <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <h2 class="center-align  z-depth-4">Agendamento de Consultas</h2>
    <br><br>
    <div class="agenda">
    <!--Formulário para agendamento: -->
        <form action="bdAgendamento.php" method="post" class="col s12">
            <div class="row">
                <!--CPF: -->
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">contacts</i>
                    <input type="text" name="txtCPFtutor" minlength="14" maxlength="14" required id="CPFtutor" autocomplete="off" class="validate">
                    <label for="CPFtutor">Informe o CPF do Tutor: </label>
                </div>
            </div>
            <!--Data: -->
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">date_range</i>
                    <input type="date" name="txtdataAgendamento" required id="dataAgend" class="validate">
                    <label for="dataAgend">Data que deseja agendar</label>
                </div>
                <!--Horário: -->
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">query_builder</i>
                    <input type="time" name="txthorarioAgendamento" required id="horarioAgend" class="validate">
                    <label for="horarioAgend">Horário que deseja agendar</label>
                </div>
                <!--opção dos pets: -->
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">pets</i>
                    <select name="numPet" required>
                        <option value="" disabled selected>Escolha um pet</option>
                        <!--Entra no PHP e pega os dados através da conexão com o SQL: -->
                        <?php foreach ($pets as $pet): ?>
                            <!--E os valores das opções são povoadas com os dados obtidos do database: -->
                            <option value="<?= $pet['petId'] ?>" data-tutor="<?= $pet['tutorId'] ?>"><?= $pet['petNome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="numPet">Nome do Pet</label>
                </div>
                <!--Agendamento segue a mesma lógica da opção de pets, mosta todos os serviços ofertados pela clínica: -->
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">local_hospital</i>
                    <select name="codigoProcedimento" required>
                        <option value="" disabled selected>Escolha um procedimento</option>
                        <?php foreach ($procedimentos as $procedimento): ?>
                            <option value="<?= $procedimento['codigoProcedimento'] ?>"><?= $procedimento['nomeProc'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="codigoProcedimento">Procedimento</label>
                </div>
            </div>
            <div class="botao">
                <input type="reset" name="txtLimpar" value="Limpar" class="waves-effect waves-light btn-small red darken-2">
                <input type="submit" value="Agendar" name="btnAgendar" class="waves-effect waves-light btn-small">
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Script que organiza o select: -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</main>
</body>
<?php
    include_once "rodapé.php";
?>
</html>
