<?php

class Conexion{
    public static function star(){
        try{
            return new PDO ('mysql:host=127.0.0.1;dbname=luna','root','12345678');
        }catch (PDOException $error){
            die($error->getMessage());
        }
    }
}