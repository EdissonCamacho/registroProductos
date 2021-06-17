<?php

require_once "conexion.php";
class productoModelo{


    public static function mdlInsertarProducto($nombre,$descripcion,$cantidad,float $precio,$imagen,$codigo,float $iva){

        $mensaje = "";
        $nombreArchivo = $imagen['name'];
        $extension = substr($nombreArchivo, -4);
        $rutaArchivo = "../vista/imagenProducto/" . $codigo . $extension;
        $url =  "vista/imagenProducto/" . $codigo . $extension;


        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {

            if (move_uploaded_file($imagen["tmp_name"], $rutaArchivo)) {

                try {
                    $objRespuesta = conexion::conectar()->prepare("INSERT INTO productos(nombreProducto,descripcion,cantidadStock,precio,imagen,codigo,iva) values (:nombre,:descripcion,:cantidad,:precio,:imagen,:codigo,:iva)");
                    $objRespuesta->bindParam(":nombre", $nombre, PDO::PARAM_STR);
                    $objRespuesta->bindParam(":descripcion", $descripcion, PDO::PARAM_STR);
                    $objRespuesta->bindParam(":cantidad", $cantidad, PDO::PARAM_INT);
                    $objRespuesta->bindParam(":precio", $precio);
                    $objRespuesta->bindParam(":imagen", $url, PDO::PARAM_STR);
                    $objRespuesta->bindParam(":codigo", $codigo, PDO::PARAM_STR);
                    $objRespuesta->bindParam(":iva", $iva);


                    if ($objRespuesta->execute()) {
                        $mensaje = "ok";
                    } else {
                        $mesnaje = "error";
                    }
                } catch (Exception $e) {

                    $mensaje = $e;
                }
            } else {
                $mensaje = "no fue posible subir el archivo";
            }
        } else {

            $mensaje = "El tipo del archivo no es compatible solo se resive archivos jpg,png y jpng";
        }

        return $mensaje;
    }

    public static function mdlCargarTabla(){

        $objConsulta=conexion::conectar()->prepare("SELECT * from productos");
        $objConsulta->execute();
        $lista=$objConsulta->fetchAll();
        $objConsulta=null;
        return $lista;


    }

    public static function mdlEliminar($idEliminar,$imagen){

        $mensaje="";

        if (!unlink("../".$imagen)) { 
            $mensaje="No fue posible eliminar la imagen";
        } else{



            
        try {
            $objEliminar= conexion::conectar()->prepare("delete from productos where idProducto=:id");
            $objEliminar->bindParam(":id", $idEliminar, PDO::PARAM_INT);
            if ($objEliminar->execute()) {
                $mensaje = "ok";
                $objEliminar=null;
            } else {
                $mensaje = "error";
            }


        } catch (Exception $e) {
            $mensaje=$e;
        }


        }
        

        

        return $mensaje;






    }


    public static function mdlModificar(int $idProducto,$nombre,$descripcion,int $cantidad,float $precio,$imagen,$codigo,int $iva,$opcion,$imagenAnterior){
 
        $mensaje ="";
        if($opcion=="1") {

            try {

                $objRespuesta = conexion::conectar()->prepare("UPDATE productos SET nombreProducto='$nombre',descripcion='$descripcion',cantidadStock='$cantidad', precio='$precio',imagen='$imagen',codigo='$codigo',iva='$iva' WHERE idProducto='$idProducto'");
    
                if ($objRespuesta->execute()) {
                    $mensaje = "ok";
                } else {
                    $mensaje = "error";
                }
    
                $objRespuesta =  null;
            } catch (Exception $e) {
    
                $mensaje = $e;
            }
            


        }else if($opcion=="2"){

        $nombreArchivo = $imagen['name'];
        $extension = substr($nombreArchivo, -4);
        $rutaArchivo = "../vista/imagenProducto/" . $codigo . $extension;
        $url =  "vista/imagenProducto/" . $codigo . $extension;



        if (($extension == ".jpg" || $extension == ".JPG") || ($extension == ".png" || $extension == ".PNG") || ($extension == "jpng"  || $extension == "JPNG")) {

            if (move_uploaded_file($imagen["tmp_name"], $rutaArchivo)) {

                if (unlink("../" . $imagenAnterior)) {

                    try {

                        $objRespuesta = conexion::conectar()->prepare("UPDATE productos SET nombreProducto='$nombre',descripcion='$descripcion',cantidadStock='$cantidad',precio='$precio', imagen='$url',codigo='$codigo',iva='$iva' WHERE idProducto='$idProducto'");

                        if ($objRespuesta->execute()) {
                            $mensaje = "ok";
                        } else {
                            $mensaje = "error";
                        }

                        $objRespuesta =  null;
                    } catch (Exception $e) {

                        $mensaje = $e;
                    }
                } else {

                    $mensaje = "nose puede cambiar la foto del registro";
                }
            }
        }


        }


        return $mensaje;

    }

    


    
}