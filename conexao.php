<?php

    class Conexao
    {
        public function conectaDB()
        {
            try{
                $Con=new PDO("mysql:host=localhost;dbname=login","root","102030");
                return $Con;
            }
            catch (PDOException $Erro){
                return $Erro->getMessage();
            }
        }
    }

?>