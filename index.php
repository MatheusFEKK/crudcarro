<?php
    include_once'./controller/redirect.php';

    listAll();
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
    <div class="info">
        <form action="./controller/redirect.php" method="post">
            <input class="input-sign shadow-sm" type="text" name="nome_carro" placeholder="NOME DO CARRO"><br><br>
            <input class="input-sign shadow-sm" type="text" name="descricao_carro" placeholder="DSECRICAO DO CARRO"><br><br>
            <input class="input-sign shadow-sm" type="text" name="ano_carro" placeholder="ANO DO CARRO"><br><br>
            <input class="input-sign shadow-sm" type="text" name="motor_carro" placeholder="MOTOR DO CARRO"><br><br>
            <button class="btn btn-primary btn-sm" name="cadastrar_carro" style="float:right;margin-top:1rem;">CADASTRAR</button>
        </form>
    </div>
    <div class="container">
            <?php 
                foreach ($cars as $rows){
                    echo '<div class="card w-50">
                            <div class="card-body">
                                <h5 class="card-title">'.$rows->nome_carro.'</h5>
                                    <p class="card-text">'.$rows->descricao_carro.'</p>
                                    <p class="card-text">Carro fabricado no ano: '.$rows->ano_carro.'</p>
                                    <p class="card-text">Motor equipado no '.$rows->nome_carro.': '. $rows->motor_carro.'</p>
                                    <a class="btn btn-danger" href="./controller/redirect.php?delete='.$rows->id_carro.'">DELETAR</a>
                            </div>
                        </div>';
                    
                }
            ?>
    </div>
</body>
</html>