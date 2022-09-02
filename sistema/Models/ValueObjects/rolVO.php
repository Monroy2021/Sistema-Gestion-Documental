<?php
class rolVO{
    public $id_rol;
    public $nom_rol;
    public $esp_rol;

    public function __construct(){
    }

     //Funciones que se obtienen los valores de los atributos del objeto

    public function getId_rol(){
        return $this->id_rol;
    }

    public function getNom_rol(){
        return $this->nom_rol;
    }

    public function getEsp_rol(){
        return $this->esp_rol;
    }

    //Funciones para recuperar los valores de los atributos del objeto

    public function setId_rol($id_rol){
        $this->id_rol = $id_rol;
    }

    public function setNom_rol($nom_rol){
        $this->nom_rol = $nom_rol;
    }

    public function setEsp_rol($esp_rol){
        $this->esp_rol = $esp_rol;
    }

}
?>