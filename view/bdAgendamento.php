<?php
    require_once "../model/database.php";
    session_start();

    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
    exit;
   }  

    // Inicializa a variável de mensagem
    $mensagem = "";

    if (isset($_POST['btnAgendar'])) {
        $tutorCPF = filter_input(INPUT_POST, 'txtCPFtutor');
        $data = filter_input(INPUT_POST, 'txtdataAgendamento');
        $horario = filter_input(INPUT_POST, 'txthorarioAgendamento');
        $numPet = filter_input(INPUT_POST, 'numPet');
        $codigoProcedimento = filter_input(INPUT_POST, 'codigoProcedimento');

        // Verifica se o tutor do pet tem o mesmo CPF
        $stmtTutor = $conexao->prepare("SELECT tutorId FROM tabpets WHERE petId = :numPet");
        $stmtTutor->bindParam(':numPet', $numPet);
        $stmtTutor->execute();
        $tutorPet = $stmtTutor->fetch(PDO::FETCH_ASSOC);

        if ($tutorPet['tutorId'] != $tutorCPF) {
            $mensagem = "Erro: O CPF do tutor não corresponde ao tutor do pet.";
        } else {
            // Preparação da instrução SQL
            $sql = $conexao->prepare("INSERT INTO tabagendamento (tutorCPF, dataAgendamento, horarioAgendamento, numPet, codigoProcedimento) VALUES (:tutorCPF, :dataAgendamento, :horarioAgendamento, :numPet, :codigoProcedimento)");

            // Vinculação de parâmetros
            $sql->bindParam(':tutorCPF', $tutorCPF);
            $sql->bindParam(':dataAgendamento', $data);
            $sql->bindParam(':horarioAgendamento', $horario);
            $sql->bindParam(':numPet', $numPet);
            $sql->bindParam(':codigoProcedimento', $codigoProcedimento);

            // Execução da instrução SQL
            try {
                $sql->execute();
                $mensagem = "Consulta agendada com sucesso!";
                // Você pode adicionar mais lógica aqui se necessário
            } catch (PDOException $e) {
                $mensagem = 'Erro ao agendar consulta: ' . $e->getMessage();
            }
        }
    }

    // Exibe a mensagem centralizada
    $mensagemHTML = "<div class='row'><div class='col s12 mensagem center-align'>$mensagem</div></div>";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Agendamento</title>
</head>
<body>
    <?php include_once "cabeçalho.php"; ?>
    
    <a href="PaginaInicial.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <h2 class="center-align">Agendamento de Consultas</h2>
    <br><br>
    <div class="agenda">
        <?php echo $mensagemHTML; // Exibe a mensagem ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
    <?php include_once "rodapé.php"; ?>
</body>
</html>
