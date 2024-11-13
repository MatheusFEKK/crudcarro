<?php
    include_once'./controller/redirect.php';

    listAll();
    
    searchCar();
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
<body>
    <script>
        function pop_up(){
            let body = document.body;
            let window = document.getElementById("holder");
            let div = document.getElementById("info");
            let pop_up = `<div class='editbox'>
            <?php
                foreach ($searchingCar as $rows){
                    echo            '<input type="text" value="'.$_GET['editar'].'" name="id_carro_editar">
                                    <input type="text" value="'.$rows->nome_carro.'" name="nome_carro_editar">
                                    <input type="text" value="'.$rows->descricao_carro.'" name="descricao_carro_editar">
                                    <input type="text" value="'.$rows->ano_carro.'" name="ano_carro_editar">';
                }
                ?>
                </div>`;
                // Tentando fazer POP UP
        
            }
    </script>
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
                        echo '<div class="card w-75">
                                <div class="card-body">
                                    <h5 class="card-title">'.$rows->nome_carro.'</h5>
                                        <p class="card-text">'.$rows->descricao_carro.'</p>
                                        <p class="card-text">Carro fabricado no ano: '.$rows->ano_carro.'</p>
                                        <p class="card-text">Motor equipado no '.$rows->nome_carro.': '. $rows->motor_carro.'</p>
                                        <a class="btn btn-danger" href="./controller/redirect.php?delete='.$rows->id_carro.'">DELETAR</a>
                                        <a href="./index.php?editar='.$rows->id_carro.'">
                                            <button class="btn btn-primary" onclick="pop_up()">EDITAR</button>
                                        </a>
                                </div>
                            </div>';
                    }
                ?>
        </div>
    </div>
</body>
</html>