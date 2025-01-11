<?php
    //conexão com o banco de dados
    
    $db_nome = "dbvetforpet";
    $con = "mysql:host=localhost;dbname=${db_nome}";
    
    try{
        $conexao = new PDO($con, 'root', '');
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conectado ao banco de dados com sucesso <br>";
    }
    catch(PDOException $e){ 
        header("Location: ../Index.php?errobd=true");
        exit;
        //echo 'Erro na conexão com o banco de dados: '.$e->getMessage();
    }
?>