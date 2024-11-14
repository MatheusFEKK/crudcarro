<?php
    include_once'./controller/redirect.php';

    listAll();
    
    searchCar();
    searchUser();
    searchCheckBox();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARROS - CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="font-family: Arial, Helvetica, sans-serif;">
    <div class="searching" style="padding-top: 2rem;">
        <h5>PESQUISA</h5>
        <form action="index.php" method="post">
            <input class="input-sign shadow-sm" type="text" name="searching" placeholder="PESQUISAR"><br>
                <h6>Pesquisar por Motor: </h6><input type="checkbox" name="pesquisamotor[]" value="V6">
                <label for="">V6</label>
                <input type="checkbox" name="pesquisamotor[]" value="V8">
                <label for="">V8</label>
                <input type="checkbox" name="pesquisamotor[]" value="V12">
                <label for="">V12</label><button class="btn btn-info btn-sm" style="margin:1rem; border-radius:1rem;" name="filtrar">Filtrar</button>
            <button class="btn btn-primary btn-sm" name="searchBtn" style="float:right; margin-top:1rem;">PESQUISA</button>
        </form>
    </div>
    <div class="resultSearch">
        <?php 
        print_r($_POST['pesquisamotor']);
        echo implode(", ", $_POST['pesquisamotor']);
            if (isset($_POST['searchBtn'])){
                foreach ($searchUser as $rows){
                    echo '<p class="text-center">Nome do Carro: '.$rows->nome_carro.'
                            <br>Descrição do Carro: '.$rows->descricao_carro.'
                            <br>Motor do Carro: '.$rows->motor_carro.'</p>';
                }
            }

            if (isset($_POST['filtrar']) && $_POST['pesquisamotor']){
                    foreach($searchCheckBox as $rowss){
                        print_r($searchCheckBox);
                        echo '<p class="text-center">Nome do Carro:'.$rowss->nome_carro.'
                        <br>Descrição do Carro: '.$rowss->descricao_carro.'
                        <br>Motor do Carro:'.$rowss->motor_carro.'';
                    }
            }
        ?>
    </div>
    <div class="container">
        <div id="info">
            <div id="holder shadow" style="border-radius: 1rem; padding:5rem;">
                <h5 class="text-center">CADASTRO DE CARROS</h5><br>
                <form action="./controller/redirect.php" method="post">
                    <input class="input-sign shadow-sm" type="text" name="nome_carro" placeholder="NOME DO CARRO"><br><br>
                    <input class="input-sign shadow-sm" type="text" name="descricao_carro" placeholder="DESCRICAO DO CARRO"><br><br>
                    <input class="input-sign shadow-sm" type="text" name="ano_carro" placeholder="ANO DO CARRO"><br><br>
                    <input class="input-sign shadow-sm" type="text" name="motor_carro" placeholder="MOTOR DO CARRO"><br><br>
                    <button class="btn btn-primary btn-sm" name="cadastrar_carro" style="float:right;margin-top:1rem;">CADASTRAR</button>
                </form>
            </div>
        </div>
        <div class="box">
                <?php 
                    foreach ($cars as $rows){
                        echo '<div class="card h-auto w-25">
                                <div class="card-body">
                                    <h5 class="card-title">'.$rows->nome_carro.'</h5>
                                        <p class="card-text">'.$rows->descricao_carro.'</p>
                                        <p class="card-text">Carro fabricado no ano: '.$rows->ano_carro.'</p>
                                        <p class="card-text">Motor equipado no '.$rows->nome_carro.': '. $rows->motor_carro.'</p>
                                        <a class="btn btn-danger" href="./controller/redirect.php?delete='.$rows->id_carro.'">DELETAR</a>
                                        <a href="./edit.php?editar='.$rows->id_carro.'">
                                            <button class="btn btn-primary">EDITAR</button>
                                        </a>
                                </div>
                            </div>';
                    }
                ?>
        </div>
    </div>
</body>
</html>