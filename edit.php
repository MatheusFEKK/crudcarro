<?php 
    include_once'./controller/redirect.php';

    searchCar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php
                foreach ($searchingCar as $rows){
                    echo            '<div class="editbox">
                                        <div class="holder">
                                        <h4 class="text-center">EDITAR <br>('.$rows->nome_carro.')</h4>
                                            <form action="index.php" method="post">
                                                <input class="input-edit shadow-sm" type="hidden" value="'.$_GET['editar'].'" name="id_carro_editar"><br>
                                                <input class="input-edit shadow-sm" type="text" value="'.$rows->nome_carro.'" name="nome_carro_editar"><br>
                                                <input class="input-edit shadow-sm" type="text" value="'.$rows->descricao_carro.'" name="descricao_carro_editar"><br>
                                                <input class="input-edit shadow-sm" type="text" value="'.$rows->motor_carro.'" name="motor_carro_editar"><br>
                                                <input class="input-edit shadow-sm" type="text" value="'.$rows->ano_carro.'" name="ano_carro_editar">
                                                <br>
                                                <button class="btn btn-primary" name="editar">Editar</button>
                                            </form>
                                         </div>
                                    </div>';
                }
            ?>
</body>
</html>