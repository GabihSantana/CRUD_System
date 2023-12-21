<?php
    require_once 'database.php';
    session_start();

    //se não estiver criada a session tentativa, criará
    if (!isset($_SESSION['tentativas'])) {
        $_SESSION['tentativas'] = 0;
    }

    if ($_SESSION['tentativas'] == 3) {
        $_SESSION['tentativas'] = 0;
        header("Location: Index.php");
        exit;
    }
    //se o botão foi confirmado
    if (isset($_POST['txtemail'])) {
        $func_email = TRIM($_POST['txtemail']);
        $func_senha = $_POST['txtsenha'];

        //banco de dados:
        $sql = "SELECT * FROM tabfuncionarios WHERE TRIM(funcEmail) = :logEmail"; //TRIM -> remove os espaços em branco antes/depois do email

        $consulta = $conexao->prepare($sql);
        $consulta->bindParam(':logEmail', $func_email);
        $consulta->execute();

        $registro = $consulta->fetch(PDO::FETCH_ASSOC);
        //se encontrar o email:
            if ($registro) {
            //verificar a senha inserida com o hash do BD, caso true, entra:
                if (password_verify($func_senha, $registro['funcSenha'])) { 
                     $_SESSION['Funcionario'] = $registro; // Armazenar os dados do funcionário na sessão
                    header("Location: PaginaInicial.php");
                    exit;
                }
                //se false:
                else {
                // Senha inválida
                    $_SESSION['tentativas'] += 1;
                    header("Location: Index.php?sinv=true");
                    exit;
                }
            }
        //no caso do email não estar no BD encontrado:
        else{
            $_SESSION['tentativas'] += 1;
            //redireciona para a pagina inicial para dar o aviso
            header("Location: Index.php?einv=true");
            exit;
        }
    }
?>


