<?php

class conexion{


    public static function conectar(){
        $servidor="localhost";
        $baseDatos="adsiTienda";
        $usuario="root";
        $contraseña="";

        try {

            $objConexion= new PDO('mysql:host='.$servidor.';dbname='.$baseDatos.';',$usuario,$contraseña);
            $objConexion->exec("set names utf8");

            
        } catch (Exception $e) {
            $objConexion =$e;
            

        }
        return $objConexion;



    }
}