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
                $searchingCar = $car->searchCarById($_GET['editar']);
            }
        }
        
        function searchUser(){
            global $searchUser;
            $database = new database();
            $db = $database->connect();
            $car = new carro($db);
            if (isset($_POST['searching'])){
                $searchUser = $car->searchCar($_POST['searching']);
            }
        }
        
        function searchCheckBox(){
            global $searchCheckBox;
            $database = new database();
            $db = $database->connect();
            $car = new carro($db);
            if(isset($_POST['filtrar']) && isset($_POST['pesquisamotor'])){
                $filtro = implode(", ", $_POST['pesquisamotor']);
                $searchCheckBox = $car->filterCar($filtro);
            }
        }
        
        function searchWithButton(){
            global $searchButton;   
            $database = new database();
            $db = $database->connect();
            $car = new carro($db);
            if (isset($_POST['engines'])){
                $engines = implode(", ", $_POST['engines']);
                $searchButton = $car->filterCar($engines);
                
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
        
        if (isset($_POST['editar'])){
            $car->id_carro = $_POST['id_carro_editar'];
            $car->nome_carro = $_POST['nome_carro_editar'];
            $car->descricao_carro = $_POST['descricao_carro_editar'];
            $car->ano_carro = $_POST['ano_carro_editar'];
            $car->motor_carro = $_POST['motor_carro_editar'];
            if($car->editCar()){
                header('Location: index.php');
            }
        }