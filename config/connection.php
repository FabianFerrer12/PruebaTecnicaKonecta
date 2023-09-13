<?php
date_default_timezone_set('America/Bogota');
class Conexion {
    function Conexion(){
        $host='localhost';
        $dbname='cafeteria';
        $username='postgres';
        $pasword ='123456';
        $puerto=5432;
        try{
            $conn = new PDO ("pgsql:host=$host,port=$puerto;dbname=$dbname",$username,$pasword);
        }
        catch(PDOException $exp){
            echo ("No se logró conectar correctamente con la base de datos: $dbname, error: $exp");
        }
        return $conn;
    }
    
}