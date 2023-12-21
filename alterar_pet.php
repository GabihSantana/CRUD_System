<?php
    include_once "cabeçalho.php";
    require_once "database.php";
    session_start();

     //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
     if(!(isset($_SESSION['Funcionario']))){
        //caso não esteja, será redirecionado para a página de Login com o erro=True e irá gerar um alerta
        header("Location: Index.php?erro=true");
        exit;
    }

    //pega o id que foi passado pela URL após clicar no botão de edição
    $pet = $_GET['id'];

    //realiza a consulta no banco de dados, selecionando todos os pets que o Id é igual o dado da URL
    $consulta = $conexao->prepare('SELECT * FROM tabpets WHERE petId = :dado');
    //Atribui o valor para :dado através da variavel
    $consulta->bindValue(':dado', $pet);
    //Executa essa consulta
    $consulta->execute();

    //A variável $info armazenará o resultado da consulta, contendo todos os dados associados ao animal com o ID correspondente.        
    $info = $consulta->fetch (PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/PaginasAjuste.css">
    <title>Alterando Pet</title>
</head>
<body>
    <br><br><br>
    <main>
        <a href="lista_animais.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
        <div class="row">
            <h2 class="center-align">Alterando Pet</h2>
            <div class="col s12 m6 push-m3">
            <div class="center-align">
            <!--Imprime o Id do pet-->
                <?php echo "<h5>Animal: {$info['petId']}</h5>"; ?>
            </div>
            <br>
            <form action="bd_altera_pet.php" method="post">
                <!--Imprime o Id do pet no value, então aparece ao usuário o id que está no BD-->
                <input type="hidden" name="txtid" value="<?php echo "{$info['petId']}";?>">
                <div class="input-field col s12">
                <!--E essa lógica se repete em todos os campos, assim o usuário consegue ver os dados antigos e alterá-los-->
                    <label for="nome">Nome: </label><br>
                    <input type="text" name="txtnome" id="nome" value="<?php echo "{$info['petNome']}";?>">
                </div>
                <div class="input-field col s12">
                    <label for="tutor">Tutor: </label><br>
                    <input type="text" name="txttutor" id="tutor" value="<?php echo "{$info['tutorId']}";?>">
                </div>
                <div class="input-field col s12">
                    <label for="raca">Raça: </label><br>
                    <input type="text" name="txtraca" id="raca" value="<?php echo "{$info['petRaca']}";?>">
                </div>
                <div class="input-field col s12">
                    <label for="sexo">Sexo: </label><br>
                    <input type="text" name="txtsexo" id="sexo" value="<?php echo "{$info['petSexo']}";?>">
                </div>
                <div class=" input-field col s12">
                    <label for="data">Data Nascimento: </label><br>
                    <input type="date" name="txtdatanasc" id="data" value="<?php echo "{$info['petDataNasc']}";?>">
                </div>
                <!--Botão para enviar e realizar a alteração do form -->
                <button type="submit" class="btn" name="btnalterar">Alterar</button>
            </form>
        </div>
    </main>
    <?php
        include_once "rodapé.php";
    ?>
</body>
</html>