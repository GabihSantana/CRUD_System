<?php
    include_once "cabeçalho.php";
    require_once "database.php";
    session_start();

    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }

    //pega o id que foi passado pela URL após clicar no botão de edição
    $agend = $_GET['id'];

    //Prepara a consulta na tabela de agendamento onde o código corresponde ao que foi passado na URL
    $consulta = $conexao->prepare('SELECT * FROM tabagendamento WHERE codAgendamento = :id');
    $consulta->bindValue(':id', $agend);
    $consulta->execute();

    //info armazena as informações obtidas do BD com o ID igual ao da URL
    $info = $consulta->fetch (PDO::FETCH_ASSOC);

    //Seleciona as informações do BD e consulta à tabela de procedimento
    $stmtProcedimentos = $conexao->prepare("SELECT codigoProcedimento, nomeProc FROM tabprocedimento");
    $stmtProcedimentos->execute();
    //armazena os dados em $procedimentos
    $procedimentos = $stmtProcedimentos->fetchAll(PDO::FETCH_ASSOC);

    //Consulta à tabela de pets
    $stmtPets = $conexao->prepare("SELECT petId, petNome, tutorId FROM tabpets ORDER BY petId asc");
    $stmtPets->execute();
    //armazena os dados em $pets
    $pets = $stmtPets->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PaginasAjuste.css">
    <title>Alterar Agendamento</title>
</head>
<body>
    <br><br><br>
    <main>
        <a href="lista_agendamentos.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <div class="row">
            <h2 class="center-align">Alterar Agendamento</h2>
            <div class="col s12 m6 push-m3">
            <div class="center-align">
                <!--Mostra o código do agendamento-->
                <?php echo "<h5>Agendamento: {$info['codAgendamento']}</h5>"; ?>
            </div>
            <br>
            <form action="bd_altera_agend.php" method="post">
                <!--Imprime o Id do agendamento no value, então aparece ao usuário o id do agendamento-->
                <input type="hidden" name="txtid" value="<?php echo "{$info['codAgendamento']}";?>">
                <!--E essa lógica se repete em todos os campos, assim o usuário consegue ver os dados antigos e alterá-los-->
                <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">contacts</i>
                    <input type="text" name="txtCPFtutor" minlength="14" maxlength="14" required id="CPFtutor" autocomplete="off" class="validate" value="<?php echo "{$info['tutorCPF']}";?>">
                    <label for="CPFtutor">CPF do Tutor: </label>
                </div>
                </div>

                <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">date_range</i>
                    <input type="date" name="txtdataAgendamento" required id="dataAgend" class="validate" value="<?php echo "{$info['dataAgendamento']}";?>">
                    <label for="dataAgend">Data: </label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">query_builder</i>
                    <input type="time" name="txthorarioAgendamento" required id="horarioAgend" class="validate" value="<?php echo "{$info['horarioAgendamento']}";?>">
                    <label for="horarioAgend">Horário</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">pets</i>
                    <select name="numPet" required>
                        <option value="" disabled selected><?php echo "{$info['numPet']}";?></option>
                        <?php foreach ($pets as $pet): ?>
                            <option value="<?= $pet['petId'] ?>" data-tutor="<?= $pet['tutorId'] ?>"><?= $pet['petNome'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="numPet">Número do Pet</label>
                </div>

                <div class="input-field col s6">
                    <i class="material-icons prefix tiny">local_hospital</i>
                    <select name="codigoProcedimento" required>
                        <option value="" disabled selected><?php echo "{$info['codigoProcedimento']}";?></option>
                        <?php foreach ($procedimentos as $procedimento): ?>
                            <option value="<?= $procedimento['codigoProcedimento'] ?>"><?= $procedimento['nomeProc'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="codigoProcedimento">Procedimento</label>
                </div>
                </div>
                <div class="botao">
                    <button type="submit" class="btn" name="btnalterar">Alterar</button>
                </div>
            </form>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <!--Script auxiliar dos campos do form de select-->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
<?php
    include_once "rodapé.php";
?>
</body>
</html>