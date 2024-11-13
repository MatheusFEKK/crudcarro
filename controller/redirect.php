<?php 
        include_once'/xampp/htdocs/crudcarro/configs/database.php';
        include_once'/xampp/htdocs/crudcarro/objects/car.php';

        $database = new database;
        $db = $database->connect();
        $car = new carro($db);
                                  

        function listAll(){
            global $cars;
            $database = new database();
            $db = $database->connect();
            $car = new carro($db);
            $cars = $car->listAllCars();
        }

        function searchCar(){
            global $searchingCar;
            $database = new database();
            $db = $database->connect();
            $car = new carro($db);
            if (isset($_GET['editar'])){
                $searchingCar = $car->searchCar($_GET['editar']);
            }
        }

        if (isset($_POST['cadastrar_carro'])){
            $car->nome_carro = $_POST['nome_carro'];
            $car->descricao_carro = $_POST['descricao_carro'];
            $car->ano_carro = $_POST['ano_carro'];
            $car->motor_carro = $_POST['motor_carro'];
            if ($car->registerCar()){
                header('Location: ../index.php');
            }
        }

        if (isset($_GET['delete'])){
            $car->id_carro = $_GET['delete'];
                if ($car->deleteCar()){
                    header('Location: ../index.php');
                }
        }