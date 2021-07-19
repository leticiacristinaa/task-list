<?php

    class Conexao{

        private $host = 'localhost';
        private $dbname = 'db_tarefas';
        private $user = 'root';
        private $pass = 'root';

        public function conectar(){
            try{

                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname",
                    "$this->user",
                    "$this->pass"
                );

                return $conexao;
                echo 'Conectado';

            } catch(PDOException $e){
                echo '<p>' .$e->getMessage() . '</p>';
            }

        }
    }

?>