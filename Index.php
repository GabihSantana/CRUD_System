<?php
    session_start();

    //caso tentarem entrar em alguma página sem login
    if(isset($_GET['erro'])){
        echo "<script>";
        echo "const erro = 'Acesso restrito para funcionarios!';";
        echo "alert(erro)";
        echo "</script>";
    }
    //caso o email inserido não pertença ao bd
    if(isset($_GET['einv'])){
        echo "<script>";
        echo "const erro = 'Email inválido!';";
        echo "alert(erro)";
        echo "</script>";
    }     
    //caso a senha inserida não corresponda
    if(isset($_GET['sinv'])){
        echo "<script>";
        echo "const erro = 'Senha inválida!';";
        echo "alert(erro)";
        echo "</script>";
    }     
    //usuário: joao.silva@vetforpet.com - senha: 12345  
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="Imagens/Logo.png" />
    <link rel="stylesheet" href="css/PagLogin.css">

    <title>Login - Vet4Pet</title>
</head>
<body>
    <div class="Login">
        <form method="POST" action="bd_verificacao.php">
            <h1>Bem-vindo!</h1> 
            <br>
            <div class="input-field col s6">
                <i class="material-icons prefix tiny">account_circle</i>
                <input id="email" type="email" class="validate" autocomplete="off" name="txtemail">
                <label for="email">Email</label>
                <span class="helper-text" data-error="Insira um email válido" data-success=""></span>
            </div>
            <br>
            <div class="input-field col s6">
                <i class="material-icons prefix tiny">lock</i>
                <input id="senha" type="password" class="validate" autocomplete="off" name="txtsenha" maxlength="10">
                <label for="senha">Senha</label>
                <span class="helper-text" data-error="Senha Incorreta!" data-success=""></span>
            </div>
            <br>

            <div class="botao">
                <input type="reset" name="txtLimpar" value="Limpar" class="waves-effect waves-light btn-small red darken-2">
                <input type="submit" value="Entrar" name="btnEntrar" class="waves-effect waves-light btn-small">
            </div>
        </form>
     </div>
     <!--JavaScript com a animação para os inputs: -->
     <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'>
        $(document).ready(function() {
        M.updateTextFields();
    });
    </script>
</body>
</html>