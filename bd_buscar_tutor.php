<?php
    //conexão com BD
    require_once 'database.php';
    include_once 'cabeçalho.php';

    session_start();
     //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
     if(!(isset($_SESSION['Funcionario']))){
        header("Location: Index.php?erro=true");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/ConteAjuste.css">
    <title>Busca de Tutor</title>
</head>
<body>
    <br><br><br>
    <a href="buscar_tutor.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <div class="center-align">
    <?php
        echo "<h2>Resultado da busca: </h2>";
        //Obtém os dados do formulário a partir de $_GET e aplica o filtro FILTER_DEFAULT
        $campos_form = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    
        if(!empty($campos_form['btnPesquisar'])){
            //$dado é criado adicionando '%' compatível com a função LIKE 
            $dado = "%" . $campos_form['txtPesquisar'] . "%";
    
            $sql = "SELECT * FROM tabtutor WHERE tutorCPF LIKE :valor ORDER BY tutorCPF";
            $consulta = $conexao->prepare($sql); 
            $consulta->bindParam(':valor', $dado);
            $consulta->execute(); 

            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                extract($registro);
                echo "CPF: $tutorCPF <br>";
                echo "Nome: $tutorNome <br>";
                echo "Sexo: $tutorSexo <br>";
                echo "Data de Nascimento: $tutorDataNasc <br>";
                echo "Telefone: $tutorFone<br>";
                echo "Endereço: $tutorEndereco<br>";
                echo "<br><hr>";
            }
        }
    ?>
    </div>
</body>
</html>

