<?php
    require_once 'database.php';
    session_start();
        //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
    if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
    exit;
   }    

    if(isset($_POST['btncadastrar'])) {
        //filtra os inputs
        $cpf = filter_input(INPUT_POST,'txtCPFfunc');
        $nome = filter_input(INPUT_POST,'txtfuncnome');
        $email = filter_input(INPUT_POST,'txtemail');
        $senha = filter_input(INPUT_POST,'txtsenha');

        //Aplica hash na senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        //realiza a inserção na tabela
        $sql = $conexao->prepare("INSERT INTO tabfuncionarios (funcCPF, funcNome, funcEmail, funcSenha) VALUES (:cpf, :nome, :email, :senha)");
        $sql->bindValue(':cpf', $cpf);
        $sql->bindValue(':nome', $nome);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':senha', $senha_hash); //armazena a senha com hash no bd
        $sql->execute();
        header('Location: ../view/PaginaInicial.php');
    }

?>