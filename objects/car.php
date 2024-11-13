<?php

    Class carro{
        public $id_carro;
        public $nome_carro;
        public $descricao_carro;
        public $ano_carro;
        public $motor_carro;
        public $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function listAllCars(){
            $sql = "SELECT * FROM carros";
            $stat = $this->db->query($sql);
            $stat->execute();

            return $stat->fetchAll(PDO::FETCH_OBJ);
        }

        public function registerCar(){
            $sql = "INSERT INTO carros (nome_carro, descricao_carro, ano_carro, motor_carro) VALUES (:nome, :descricao, :ano, :motor)";
            $stat = $this->db->prepare($sql);
            $stat->bindParam(':nome', $this->nome_carro);
            $stat->bindParam(':ano', $this->ano_carro);
            $stat->bindParam(':motor', $this->motor_carro);
            $stat->bindParam(':descricao', $this->descricao_carro);
            if ($stat->execute()){
                return true;
            }else {
                return false;
            }
        }


        public function searchCar($nome){
            $sql = "SELECT * FROM carros WHERE id_carro = :id_carro";
            $stat = $this->db->prepare($sql);
            $stat->bindParam(':id_carro', $nome);
            $stat->execute();

            return $stat->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteCar(){
        $sql = "DELETE FROM carros WHERE id_carro = :id_carro";
        $stat = $this->db->prepare($sql);
        $stat->bindParam(':id_carro', $this->id_carro);
        if($stat->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function editCar(){
        $sql = "UPDATE carro SET nome_carro = :nome_carro, descricao_nome = :descricao_nome, ano_carro = :ano_carro, motor_carro = motor_carro";
        $stat = $this->db->prepare($sql);
        $stat->bindParam(':nome_carro', $this->nome_carro);
        $stat->bindParam(':descricao_carro', $this->descricao_carro);
        $stat->bindParam(':ano_carro', $this->ano_carro);
        $stat->bindParam(':motor_carro', $this->motor_carro);
        if ($stat->execute()){
            return true;
        }else {
            return false;
        }
    }
}