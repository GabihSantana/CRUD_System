<?php
    include_once "cabeçalho.php";
    require_once "../model/database.php";
    session_start();

    //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }

    //pega o id que foi passado pela URL após clicar no botão de edição
    $tutor = $_GET['id'];

    //Prepara a consulta na tabela de tutor onde o código corresponde ao que foi passado na URL
    $consulta = $conexao->prepare('SELECT * FROM tabtutor WHERE tutorCPF = :dado');
    $consulta->bindValue(':dado', $tutor);
    $consulta->execute();

    //a variavel recebe as informações do BD que correspondem ao CPF do tutor
    $info = $consulta->fetch (PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/PaginasAjuste.css">
    <title>Alterar Informações do Tutor</title>
</head>
<body>
    <br><br><br>
    <main>
        <a href="lista_donos.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <div class="row">
            <h2 class="center-align">Alterar Informações do Tutor</h2>
            <div class="col s12 m6 push-m3">
            <div class="center-align">
                <?php echo "<h5>Cliente: {$info['tutorCPF']}</h5>"; ?>
            </div>
            <br>
            <form action="../model/bd_altera_tutor.php" method="post">
                <!--Mostra o CPF do tutor-->
                <input type="hidden" name="txtid" value="<?php echo "{$info['tutorCPF']}";?>">
                <!--Imprime o nome no value, então aparece ao usuário o nome do cadastrado no BD que pertence ao CPF-->
                <div class="input-field col s12">
                    <label for="nome">Nome: </label><br>
                    <input type="text" name="txtnome" id="nome" value="<?php echo "{$info['tutorNome']}";?>">
                </div>
                <div class="input-field col s12">
                    <label for="sexo">Sexo: </label><br>
                    <input type="text" name="txtsexo" id="sexo" value="<?php echo "{$info['tutorSexo']}";?>">
                </div>
                <div class=" input-field col s12">
                    <label for="data">Data Nascimento: </label><br>
                    <input type="date" name="txtdatanasc" id="data" value="<?php echo "{$info['tutorDataNasc']}";?>">
                </div>
                <div class="input-field col s12">
                    <label for="fone">Telefone: </label><br>
                    <input type="text" name="txtfone" id="fone" value="<?php echo "{$info['tutorFone']}";?>">
                </div>
                <div class="input-field col s12">
                    <label for="end">Endereço: </label><br>
                    <input type="text" name="txtend" id="end" value="<?php echo "{$info['tutorEndereco']}";?>">
                </div>
                <!--botão para confirmar a alteração -->
                <button type="submit" class="btn" name="btnalterar">Alterar</button>
            </form>
        </div>
    </main>
    <?php
        include_once "rodapé.php";
    ?>
</body>
</html>