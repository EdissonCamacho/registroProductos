<?php

include_once "../modelo/productoModelo.php";

class productoControl{
 
    public $idProducto;
    public $nombre;
    public $descripcion;
    public $cantidad;
    public $precio;
    public $imagen;
    public $imagenAnterior;
    public $codigo;
    public $iva;
    public $opcion;


    public function ctrlInsertar(){

        $objRespuesta=productoModelo::mdlInsertarProducto($this->nombre,$this->descripcion,$this->cantidad,$this->precio,$this->imagen,$this->codigo,$this->iva);

        echo json_encode($objRespuesta);


    }

    public function ctrlCargarTabla(){
        $objRespuesta= productoModelo::mdlCargarTabla();
        echo json_encode($objRespuesta);

    }

    public function ctrlEliminar(){

        $objEliminar = productoModelo::mdlEliminar($this->idProducto,$this->imagen);
        echo json_encode($objEliminar);
    }

    public function ctlModificar(){

        $objModificar= productoModelo::mdlModificar($this->idProducto,$this->nombre,$this->descripcion,$this->cantidad,$this->precio,$this->imagen,$this->codigo,$this->iva,$this->opcion,$this->imagenAnterior);
        echo json_encode($objModificar);


    }

    








}

if (isset($_POST["nombre"]) && isset($_POST["descripcion"]) && isset($_POST["cantidad"]) && isset($_POST["precio"]) && isset($_POST["codigo"]) && isset($_POST["iva"]) ) {
   $objInsertar = new productoControl();
   $objInsertar->nombre=$_POST["nombre"];
   $objInsertar->descripcion=$_POST["descripcion"];
   $objInsertar->cantidad=$_POST["cantidad"];
   $objInsertar->precio=$_POST["precio"];
   $objInsertar->imagen=$_FILES["imagen"];
   $objInsertar->codigo=$_POST["codigo"];
   $objInsertar->iva=$_POST["iva"];
   $objInsertar->ctrlInsertar();
}

if(isset($_POST["cargar"])=="ok"){
    $objCargar= new productoControl();
    $objCargar->ctrlCargarTabla();


} 

if(isset($_POST["idEliminar"]) && isset($_POST["imagenEliminar"])){
 $objEliminar = new productoControl();
 $objEliminar->idProducto=$_POST["idEliminar"];
 $objEliminar->imagen=$_POST["imagenEliminar"];

 $objEliminar->ctrlEliminar();

}

if (isset($_POST["anteriorImagen"])) {

    $objModificar = new productoControl();
    $objModificar->nombre=$_POST["nombreMod"];
    $objModificar->descripcion=$_POST["descripcionMod"];
    $objModificar->cantidad=$_POST["cantidadMod"];
    $objModificar->precio=$_POST["precioMod"];
    $objModificar->codigo=$_POST["codigoMod"];
    $objModificar->iva=$_POST["ivaMod"];
    $objModificar->imagen=$_POST["anteriorImagen"];
    $objModificar->idProducto=$_POST["idModificar"];
    $objModificar->opcion="1";
    $objModificar->ctlModificar();






   
}
else if (isset($_FILES["imagenMod"])) {
    $objModificar = new productoControl();
    $objModificar->nombre=$_POST["nombreMod"];
    $objModificar->descripcion=$_POST["descripcionMod"];
    $objModificar->cantidad=$_POST["cantidadMod"];
    $objModificar->precio=$_POST["precioMod"];
    $objModificar->codigo=$_POST["codigoMod"];
    $objModificar->iva=$_POST["ivaMod"];
    $objModificar->imagen=$_FILES["imagenMod"];
    $objModificar->idProducto=$_POST["idModificar"];
    $objModificar->imagenAnterior=$_POST["imagenAnteriorMod"];
    $objModificar->opcion="2";
    $objModificar->ctlModificar();





}
