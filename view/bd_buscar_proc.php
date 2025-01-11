<?php
    //conexão com o BD
    require_once '../model/database.php';
    include_once 'cabeçalho.php';

    session_start();
     //Verifica se o funcionário está logado, evitando que pessoas de fora consigam acessar a página
     if(!(isset($_SESSION['Funcionario']))){
        header("Location: ../Index.php?erro=true");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ConteAjuste.css">
    <title>Busca de Procedimento</title>
</head>
<body>
    <br><br><br>
    <!--Flecha para voltar à pagina anterior-->
    <a href="buscar_proc.php"><i class="material-icons prefix medium">keyboard_arrow_left</i></a>
    <div class="center-align">
    <?php

        echo "<h2>Resultado da busca: </h2>";

        //Obtém os dados do formulário a partir de $_GET e aplica o filtro FILTER_DEFAULT
        $campos_form = filter_input_array(INPUT_GET, FILTER_DEFAULT);
    
        if(!empty($campos_form['btnPesquisar'])){
            //$dado é criado adicionando '%' antes e depois do termo de pesquisa, tornando compatível com LIKE em SQL
            $dado = "%" . $campos_form['txtPesquisar'] . "%";
    
            $sql = "SELECT * FROM tabprocedimento WHERE codigoProcedimento LIKE :valor ORDER BY codigoProcedimento";
            $consulta = $conexao->prepare($sql); 
            $consulta->bindParam(':valor', $dado);
            $consulta->execute(); 

            //exibir os resultados
            while($registro = $consulta->fetch(PDO::FETCH_ASSOC)){
                extract($registro);
                echo "Código: $codigoProcedimento <br>";
                echo "Nome do Procedimento: $nomeProc <br>";
                echo "Valor: $valorProc <br>";
                echo "<br><hr>";
            }
        }
    ?>
    </div>
</body>
</html>

